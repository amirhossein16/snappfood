<div>
    <x-jet-dialog-modal wire:model="ChangeOrderStatusModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">
                {{ isset($this->food->id) ? 'ویرایش غذا' : 'افزودن غذای جدید' }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12">
                @if(isset($this->order))
                    @php

                        if (isset(\App\Models\Orders::where('OrderStatus',$this->order->OrderStatus)->get()->first()->OrderStatus )){
                            if (\App\Models\Orders::where('OrderStatus',$this->order->OrderStatus)->get()->first()->OrderStatus == 1)
                                echo "<p style='direction:rtl' class='text-center'> تبدیل وضعیت از <span class='text-xl text-red-500'>در حال بررسی</span> به <span class='text-xl text-green-500'>در حال آماده سازی</span></p>";
                            elseif (\App\Models\Orders::where('OrderStatus','=',$this->order->OrderStatus)->get()->first()->OrderStatus == 2)
                                echo "<p style='direction:rtl' class='text-center'> تبدیل وضعیت از <span class='text-xl text-red-500'>در حال آماده سازی</span> به <span class='text-xl text-green-500'>ارسال به مقصد</span></p>";
                            elseif (\App\Models\Orders::where('OrderStatus','=',$this->order->OrderStatus)->get()->first()->OrderStatus == 3)
                                echo "<p style='direction:rtl' class='text-center'> تبدیل وضعیت از <span class='text-xl text-red-500'>ارسال به مقصد</span> به <span class='text-xl text-green-500'>تحویل گرفته شد</span></p>";
                            elseif (\App\Models\Orders::where('OrderStatus','=',$this->order->OrderStatus)->get()->first()->OrderStatus == 4|| \App\Models\Orders::where('OrderStatus','=',$this->order->OrderStatus)->get()->first()->OrderStatus == 5)
                                echo "تحویل گرفته شد";
                        }
                    @endphp
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('ChangeOrderStatusModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="ConvertOrderStatus()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
