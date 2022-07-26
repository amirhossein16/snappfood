<?php

namespace App\Observers;

use App\Jobs\DiscountJob;
use App\Models\Discount;
use Carbon\Carbon;

class DiscountObserver
{
    /**
     * Handle the Discount "created" event.
     *
     * @param \App\Models\Discount $discount
     * @return void
     */
    public function created(Discount $discount)
    {
        DiscountJob::dispatch($discount)->onQueue("discount")->delay(Carbon::parse($discount->ExpireTime));
    }

    /**
     * Handle the Discount "updated" event.
     *
     * @param \App\Models\Discount $discount
     * @return void
     */
    public function updated(Discount $discount)
    {
        DiscountJob::dispatch($discount)->onQueue("discount")->delay(Carbon::parse($discount->ExpireTime));
    }

    /**
     * Handle the Discount "deleted" event.
     *
     * @param \App\Models\Discount $discount
     * @return void
     */
    public function deleted(Discount $discount)
    {
        //
    }

    /**
     * Handle the Discount "restored" event.
     *
     * @param \App\Models\Discount $discount
     * @return void
     */
    public function restored(Discount $discount)
    {
        //
    }

    /**
     * Handle the Discount "force deleted" event.
     *
     * @param \App\Models\Discount $discount
     * @return void
     */
    public function forceDeleted(Discount $discount)
    {
        //
    }
}
