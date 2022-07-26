<?php

namespace App\Jobs;

use App\Models\DiscountFood;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DiscountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $discount;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($discount)
    {
        $this->discount = $discount;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (Carbon::parse($this->discount->ExpireTime)->isPast()) {
            DiscountFood::where('discount_id', $this->discount->id)->delete();
        }
    }
}
