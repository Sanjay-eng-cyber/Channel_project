<?php

namespace App\Lib\Webhook;

use App\Lib\ApiCode;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\SiData;
use App\Models\Subscription as ModelsSubscription;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Subscription extends Webhook
{
    public static function authenticated($payload): void
    {
        self::updateSiStatus($payload);
    }

    public static function activated($payload): void
    {
        self::updateSiStatus($payload);
    }

    public static function charged($payload)
    {
        $si = self::updateSiStatus($payload['subscription']);

        DB::transaction(function () use ($si, $payload) {
            self::processSubscription($si, $payload);
            User::find($si->user_id)->alert('renewed');
        });
        return 'sub.charged';
        // return respond(ApiCode::SUB_STARTED);
    }

    public static function pending($payload): void
    {
        $si = self::updateSiStatus($payload, true);
        self::turnOffAutoRenew($si);
    }

    public static function halted($payload): void
    {
        $si = self::updateSiStatus($payload, true);
        self::turnOffAutoRenew($si);

    }

    public static function cancelled($payload): void
    {
        $si = self::updateSiStatus($payload);
        self::turnOffAutoRenew($si);
    }

    public static function paused($payload): void
    {
        self::updateSiStatus($payload);
    }

    public static function resumed($payload): void
    {
        self::updateSiStatus($payload);
    }

    /**
     * @param $si
     * @param $payload
     */
    protected static function processSubscription($si, $payload): void
    {
        $payment = $payload['payment'];
        $amount = amt($payment['amount']);
        $discount = self::applicabelDiscount($payload['subscription'], $amount);
        $newSub = ModelsSubscription::start(self::$plan['id'], ['sub_id' => $si->id, 'user_id' => $si->user_id]);
        $order = Order::where('api_order_id', $payment['order_id'])->first();
        self::updateOrder($order, $amount, $discount, $newSub, $si);
        [$gst, $baseAmount, $taxable] = self::extracted($order->total_amount);
        $order->item->update([
            'amount' => $baseAmount,
            'taxable_amount' => $taxable,
            'cgst_percent' => config('app.cgst'),
            'sgst_percent' => config('app.sgst'),
            'cgst' => $gst['cgst'],
            'sgst' => $gst['sgst'],
        ]);

        $payment['order_id'] = $order->id;

//        self::createOrderItems($plan, $order);
        self::createTransaction($payment);
        self::createInvoice([
//            'invoice_id' => $payment['invoice_id'],
            'subscription_id' => $newSub->id,
            'user_id' => $si->user_id,
            'order_id' => $order->id,
        ]);
    }

    /**
     * @param $payload
     * @param bool $turnOff
     * @param bool $start
     */
    protected static function updateSiStatus($payload) : SiData
    {
        $si = SiData::where('sub_id', $payload['id'])
            ->first();
        $si->update(['status' => $payload['status']]);
        return $si;
//        if ($turnOff) {
//            self::turnOffAutoRenew($si);
//        }
//        if ($start) {
//            self::startNewSubscription($si);
//        }

    }

    protected static function checkOfferApplied($subscription) : bool
    {
        return isset($subscription['offer_id']) && $subscription['offer_id'] !== null;
    }

    /**
     * @param $subscription
     * @param int $amount
     * @return int
     */
    protected static function applicabelDiscount($subscription, int $amount): int
    {
        return self::checkOfferApplied($subscription) ?
            Coupon::where('offer_id', $subscription['offer_id'])
                ->first()
                ->discount($amount) : 0;
    }

    /**
     * @param $si
     */
    protected static function turnOffAutoRenew($si): void
    {
        $si->user->getActiveSubscription()->update([
            'is_active' => false,
            'auto_renew' => false
        ]);
    }

    /**
     * @param $si
     */
    protected static function startNewSubscription($si): void
    {
        ModelsSubscription::start(self::$plan['id'], ['si_data_id' => $si->id, 'user_id' => $si->user_id]);
    }

}
