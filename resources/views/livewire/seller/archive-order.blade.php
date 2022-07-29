<div>
    <livewire:delete-modal/>
    <livewire:seller.modals.order-details-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col col-span-12 sm:flex-row items-center mt-8">
                    <x-tables.header class="col-span-3">
                        لیست آرشیو سفارشات
                    </x-tables.header>
                    <div class="flex flex-col">
                        <!-- BEGIN: Pricing Tab -->
                        <div class="flex justify-end" wire:ignore>
                            <div class="pricing-tabs nav nav-tabs box rounded-full overflow-hidden" role="tablist">
                                <a id="layout-1-monthly-fees-tab" data-toggle="tab" data-target="#layout-1-monthly-fees"
                                   href="javascript:;"
                                   class="flex-1 w-32 lg:w-40 py-2 lg:py-3 whitespace-nowrap text-center active"
                                   role="tab"
                                   aria-controls="layout-1-monthly-fees" aria-selected="true" wire:click="resetInput">فیلتر
                                    بر اساس قیمت </a>
                                <a id="layout-1-annual-fees-tab" data-toggle="tab" data-target="#layout-1-annual-fees"
                                   href="javascript:;"
                                   class="flex-1 w-32 lg:w-40 py-2 lg:py-3 whitespace-nowrap text-center" role="tab"
                                   aria-controls="layout-1-annual-fees" aria-selected="false" wire:click="resetInput">فیلتر
                                    بر اساس تاریخ</a>
                            </div>
                        </div>
                        <!-- END: Pricing Tab -->
                        <!-- BEGIN: Pricing Content -->
                        <div class="flex w-full" wire:ignore>
                            <div class="tab-content w-full">
                                <div id="layout-1-monthly-fees" class="tab-pane flex flex-col lg:flex-row active w-full"
                                     role="tabpanel" aria-labelledby="layout-1-monthly-fees-tab">
                                    <div class="col-span-12 flex-row flex items-center justify-center w-full">
                                        <label for="search"></label><input id="search" type="text"
                                                                           wire:model.debounce.350ms="search"
                                                                           class="shadow-md w-full form-control form-control-rounded justify-center mt-2"/>
                                    </div>
                                </div>
                                <div id="layout-1-annual-fees" class="tab-pane flex flex-col lg:flex-row w-full"
                                     role="tabpanel"
                                     aria-labelledby="layout-1-annual-fees-tab w-full">
                                    <div class="col-span-12 flex-row flex items-center justify-center w-full">
                                        <label for="dateSearch"></label><input id="dateSearch" type="date"
                                                                               wire:model.debounce.350ms="search"
                                                                               class="shadow-md w-full form-control form-control-rounded justify-center mt-2"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Pricing Content -->
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
                                    @foreach ($AllOrders as $order)
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
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @if ($order->OrderStatus == 4)
                                                        تحویل گرفته شد
                                                    @endif
                                                </td>
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
