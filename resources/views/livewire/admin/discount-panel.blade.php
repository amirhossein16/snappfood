<div>
    <livewire:delete-modal/>
    <livewire:admin.modals.discount-edit-modal/>
    <livewire:admin.modals.food-discount-add-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات کدتخفیف
                    </x-tables.header>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="$emit('confirmDiscountAdd')" class="btn btn-primary shadow-md ml-2">افزودن
                            کد تخفیف جدید
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
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عنوان تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">نوع تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">مقدار تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تاریخ انقضا</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تعداد روز باقی
                                            مانده
                                        </th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($Discounts as $Discount)
                                        @if( $Discount->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Discount->id }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Discount->title }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Discount->type }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Discount->amount }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Discount->ExpireTime}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @php
                                                        $expireTime = \Carbon\Carbon::parse($Discount->ExpireTime);
                                                        echo $expireTime->diffInDays();
                                                    @endphp
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <button class="btn btn-elevated-primary w-24 ml-1 mb-2"
                                                            wire:click="$emit('EditModalConfirm',{{$Discount->id}})">
                                                        ویرایش
                                                    </button>
                                                    <x-jet-button
                                                        class="btn btn-elevated-secondary w-24 ml-1 mb-2 text-indigo-900"
                                                        wire:click="$emit('DeleteModals','App\\\Models\\\Discount',{{$Discount->id}},'حذف کد تخفیف' ,'آیا از حذف کد تخفیف {{$Discount->title}} مطمئن هستید ؟')"
                                                    >حذف
                                                    </x-jet-button>
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
