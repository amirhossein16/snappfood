<div>
    <livewire:delete-modal/>
    <livewire:edit-modal/>
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
                        <button wire:click="confirmCategoryAdd" class="btn btn-primary shadow-md ml-2">افزودن محصول جدید
                        </button>
                        <div class="dropdown mr-auto sm:ml-0">
                            <button class="dropdown-toggle btn px-2 box text-white dark:text-gray-200"
                                    aria-expanded="false">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4"
                                                                                       data-feather="plus"></i> </span>
                            </button>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <button
                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="file-plus" class="w-4 h-4 ml-2"></i>دسته بندی جدید
                                    </button>
                                    <a href=""
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="users" class="w-4 h-4 ml-2"></i> گروه جدید </a>
                                </div>
                            </div>
                        </div>
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
                                                        wire:click="$emit('DeleteModal',{{$Discount->id}})"
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

<x-jet-confirmation-modal wire:model="confirmingCategoryDeletion">
    <x-slot name="title">
        {{ __('Delete Product') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete Product? ') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingCategoryDeletion', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteCategory({{ $confirmingCategoryDeletion }})"
                             wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>

<x-jet-dialog-modal wire:model="confirmingCategoryUpdate">
    <x-slot name="title">
        {{ isset($this->discount->id) ? 'Edit Product' : 'Add Product' }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Title') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full"
                         wire:model.defer="discount.title"/>
            <x-jet-input-error for="discount.title" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="name" value="{{ __('Price') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full"
                         wire:model.defer="discount.amount"/>
            <x-jet-input-error for="discount.amount" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="date" value="{{ __('Date') }}"/>
            <div class="flex items-center justify-center">
                <div class="datepicker relative form-floating mb-3 xl:w-96">
                    <input type="date"
                           class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Select a date"
                           wire:model.defer="discount.ExpireTime"/>
                    <label for="floatingInput" class="text-gray-700">Select a date</label>
                </div>
            </div>
            <x-jet-input-error for="discount.ExpireTime" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="name" value="{{ __('Type') }}"/>
            <select id="Category" wire:model.defer="discount.type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled>Select Category</option>
                @foreach($DiscountType as $type)
                    <option value="{{$type}}">{{$type}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="discount.type" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingCategoryUpdate', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="saveCategory()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
