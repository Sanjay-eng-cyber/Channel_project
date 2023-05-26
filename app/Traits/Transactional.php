<?php

namespace App\Traits;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Plan;
use App\Models\SiData;
use App\Models\Transaction;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;

trait Transactional
{
//    /**
//     * @param float $amount
//     * @param array $options
//     * @return Order
//     */
//    public function createOrder(float $amount, array $options = []) : Order
//    {
//        $options['discount_amount'] = $options['discount_amount'] ?? 0;
//        return Order::create([
//            'subscription_id' => $options['sub_id'] ?? null,
//            'api_order_id' => $options['api_order_id'] ?? null,
//            'si_data_id' => $options['si_data_id'] ?? null,
//            'model_type' => $options['model_type'] ?? 'plan',
//            'model_id' => $options['model_id'] ?? null,
//            'user_id' => $options['user_id'] ?? Auth::id(),
//            'total_amount' => $amount - $options['discount_amount'],
//            'discount_amount' => $options['discount_amount'],
//            'status' => $options['status'] ?? 'initial',
//        ]);
//    }
//
//    /**
//     * @param int $planId
//     * @param int $orderId
//     * @param float $amount
//     * @param float|int $disc
//     * @return OrderItem
//     */
//    public function createOrderItems(int $planId, int $orderId, float $amount, float $disc = 0) : OrderItem
//    {
//        [$gst, $baseAmount, $taxable] = $this->extracted($amount, $disc);
//        return OrderItem::create([
//            'package_id' => $planId,
//            'order_id' => $orderId,
//            'amount' => $baseAmount,
//            'taxable_amount' => $taxable,
//            'cgst_percent' => config('app.cgst'),
//            'sgst_percent' => config('app.sgst'),
//            'cgst' => $gst['cgst'],
//            'sgst' => $gst['sgst'],
//        ]);
//    }
//
//   public function createSi($data)
//   {
//       return SiData::create([
//           'sub_id' => $data['id'],
//           'user_id' => auth()->id(),
//           'total_count' => $data['total_count'],
//           'paid_count' => $data['paid_count'],
//           'customer_id' => $data['customer_id'] ?? null,
//           'remaining_count' => $data['remaining_count'],
//           'status' => $data['status']
//       ]);
//   }

    /**
     * @param float $amount
     * @param array $options
     * @return Order
     */
    public static function createOrder(float $amount, array $options = []) : Order
    {
        $options['discount_amount'] = $options['discount_amount'] ?? 0;

        return Order::create([
            'subscription_id' => $options['sub_id'] ?? null,
            'api_order_id' => $options['api_order_id'] ?? null,
            'si_data_id' => $options['si_data_id'] ?? null,
            'model_type' => $options['model_type'] ?? 'plan',
            'model_id' => $options['model_id'] ?? null,
            'user_id' => $options['user_id'] ?? Auth::id(),
            'total_amount' => $amount - $options['discount_amount'],
            'discount_amount' => $options['discount_amount'],
            'status' => $options['status'] ?? 'initial',
        ]);
    }

    /**
     * @param int $planId
     * @param int $orderId
     * @param float $amount
     * @param float|int $disc
     * @return OrderItem
     */
    public static function createOrderItems(object $plan, Order $order) : OrderItem
    {
        // dd($plan['id']);
        [$gst, $baseAmount, $taxable] = self::extracted($order->total_amount, $order->discount_amount);
        return OrderItem::create([
            'model_type' => $order['model_type'] ?? 'plan',
            'model_id' => $plan['id'],
            'order_id' => $order->id,
            'amount' => $baseAmount,
            'taxable_amount' => $taxable,
            'cgst_percent' => config('app.cgst'),
            'sgst_percent' => config('app.sgst'),
            'cgst' => $gst['cgst'],
            'sgst' => $gst['sgst'],
        ]);
    }

    public static function createSi($data)
    {
        return SiData::create([
            'sub_id' => $data['id'],
            'user_id' => auth()->id(),
            'total_count' => $data['total_count'],
            'paid_count' => $data['paid_count'],
            'customer_id' => $data['customer_id'] ?? null,
            'remaining_count' => $data['remaining_count'],
            'status' => $data['status']
        ]);
    }

    public static function createTransaction($data): void
    {
        Transaction::create($data);
    }

    public static function createInvoice($data): void
    {
        Invoice::create($data);
    }

    public static function updateOrder(Order $order, int $amount, int $discount, $newSub, $si): void
    {
        $order->update([
            'total_amount' => $amount,
            'discount_amount' => $discount,
            'subscription_id' => $newSub->id,
            'user_id' => $si->user_id,
            'status' => 'completed'
        ]);
        // dd($order);
    }

    public static function updateItem(Plan $plan, Order $order, $amount): void
    {
        [$gst, $baseAmount, $taxable] = self::extracted($amount, $order->discount_amount);
         $order->item->update([
            'amount' => $baseAmount,
            'taxable_amount' => $taxable,
            'cgst_percent' => config('app.cgst'),
            'sgst_percent' => config('app.sgst'),
            'cgst' => $gst['cgst'],
            'sgst' => $gst['sgst'],
        ]);
    }

    public static function __callStatic($method, $arguments)
    {
        if ( !method_exists(__CLASS__, $method) ) {
            throw new \BadMethodCallException(sprintf('method "%s" does not exist', $method));
        }

        return (self::Transactional)->$method(...$arguments);
    }
}
