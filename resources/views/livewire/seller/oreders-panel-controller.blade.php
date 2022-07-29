<div>
    <livewire:seller.modals.order-details-modal/>
    <livewire:seller.modals.change-order-status-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <x-tables.header>
                        لیست سفارشات
                    </x-tables.header>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="$emit('confirmCategoryAdd')" class="btn btn-primary shadow-md ml-2">افزودن
                            محصول جدید
                        </button>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="p-5" id="striped-rows-table">
                        <div class="preview">
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">ردیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">کاربر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">قیمت</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">آدرس</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تاریخ</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">وضعیت</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($Orders as $order)
                                        @if( $order->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $order->id }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    {{$order->cart->user->name}}
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    {{\App\Models\Cart::where('id',$order->cart->id)->get()->first()->price}}
                                                </td>
                                                @if($order->cart->user->UserAddress->where('currentAddress',1)->first() !=null)
                                                    <td class="report-box__indicator tooltip cursor-pointer border-b dark:border-dark-5 text-lg font-medium"
                                                        title="{{$order->cart->user->UserAddress->where('currentAddress',1)->first()->address}}">
                                                        {{ Str::limit($order->cart->user->UserAddress->where('currentAddress',1)->first()->address, 50) }}
                                                    </td>
                                                @else
                                                    <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    </td>
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$order->created_at}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@php
                                                        if ($order->OrderStatus == 1)
                                                            echo "در حال بررسی";
                                                        elseif ($order->OrderStatus == 2)
                                                            echo "در حال آماده سازی";
                                                        elseif ($order->OrderStatus == 3)
                                                            echo "ارسال به مقصد";
                                                        elseif ($order->OrderStatus == 4)
                                                            echo "تحویل گرفته شد";
                                                    @endphp</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @if($order->OrderStatus == 4)
                                                        <x-jet-button
                                                            class="btn btn-elevated-success w-44 h-12 ml-1 mb-2 disabled:opacity-75 disabled:cursor-not-allowed"
                                                            disabled> سفارش تکمیل شد
                                                        </x-jet-button>
                                                    @else
                                                        <x-jet-button
                                                            wire:click="$emit('ChangeOrderStatus',{{ $order->id }})"
                                                            class="btn btn-elevated-primary w-44 h-12 ml-1 mb-2"
                                                        >
                                                            تبدیل وضعیت سفارش
                                                        </x-jet-button>
                                                    @endif
                                                    <button
                                                        wire:click="$emit('OrderDetails', {{ $order->id }})"
                                                        class="btn btn-elevated-secondary text-indigo-900 w-32 h-12 ml-1 mb-2"
                                                    >
                                                        جزئیات سفارش
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
