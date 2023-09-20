<?php

namespace App\Providers;

use App\Events\OrderPlacedEvent;
use App\Events\OrderCancelledEvent;
use App\Events\OrderDeliveredEvent;
use App\Events\OrderProccessingEvent;
use Illuminate\Support\Facades\Event;
use App\Listeners\OrderPlacedListener;
use Illuminate\Auth\Events\Registered;
use App\Listeners\OrderCancelledListener;
use App\Listeners\OrderDeliveredListener;
use App\Listeners\OrderProccessingListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCancelledEvent::class => [
            OrderCancelledListener::class,
        ],
        OrderPlacedEvent::class => [
            OrderPlacedListener::class,
        ],
        OrderProccessingEvent::class => [
            OrderProccessingListener::class,
        ],
        OrderDeliveredEvent::class => [
            OrderDeliveredListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
