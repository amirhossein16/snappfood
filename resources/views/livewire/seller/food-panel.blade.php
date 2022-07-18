<div>
    <livewire:delete-modal/>
    <livewire:edit-modal/>
    <livewire:add-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات غذاها
                    </x-tables.header>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                        <button wire:click="$emit('confirmCategoryAdd')" class="btn btn-primary shadow-md ml-2">افزودن
                            محصول جدید
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
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">نام غذا</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">دسته بندی</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">مواد اولیه</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">انقضا کد تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">مقدار تخفیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">قیمت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $Row = 0 @endphp
                                    @foreach ($Category as $Categories)
                                        @if( $Categories->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ ++$Row }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Categories->title }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ \App\Models\foodCategories::where('id','=',$Categories->food_categories_id)->get()->first()->FoodType }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Categories->raw_material }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@if($Categories->off == null || $Categories->off == 0)
                                                        ندارد
                                                    @elseif($Categories->off == 1)
                                                        {{\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()[0]->discount_id)->title}}
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@php
                                                        if ($Categories->off == 1){
                                                            $expireTime = \Carbon\Carbon::parse(\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()[0]->discount_id)->ExpireTime);
                                                            echo $expireTime->diffInDays();
                                                        }else{
                                                            echo "----";
                                                        }
                                                    @endphp</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@if($Categories->off == null || $Categories->off == 0)
                                                        ----
                                                    @elseif($Categories->off == 1)
                                                        @php
                                                            $discounts =\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()->first()->discount_id);
                                                        @endphp
                                                        @if ( $discounts->type == 'Percentage')
                                                            {{\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id',$Categories->id)->get()->first()->discount_id)->amount}}
                                                            %
                                                        @elseif($discounts->type == 'Price')
                                                            <span class="text-sm">{{\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id',$Categories->id)->get()->first()->discount_id)->amount}} تومان</span>
                                                        @endif
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@if($Categories->off == null || $Categories->off == 0)
                                                        {{ $Categories->price }}
                                                    @elseif($Categories->off == 1)
                                                        @php
                                                            $discounts =\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()->first()->discount_id);
                                                        @endphp
                                                        @if ( $discounts->type == 'Percentage')
                                                            <span
                                                                class="text-red-500"><s> {{
                                                        ($Categories->price)*(100 - $discounts->amount)
                                                         }}</s></span>
                                                            <span
                                                                class="text-green-500"> {!! $Categories->price !!} </span>
                                                        @elseif($discounts->type == 'Price')
                                                            <span
                                                                class="text-red-500"><s> {!! $Categories->price !!}</s></span>
                                                            <span
                                                                class="text-green-500">{!! $Categories->price -= $discounts->amount !!}</span>
                                                        @endif
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <button class="btn btn-elevated-primary w-24 ml-1 mb-2"
                                                            wire:click="$emit('EditModalConfirm',{{$Categories->id}})">
                                                        ویرایش
                                                    </button>
                                                    <x-jet-button
                                                        class="btn btn-elevated-secondary w-24 ml-1 mb-2 text-indigo-900"
                                                        wire:click="$emit('DeleteModal',{{$Categories->id}})"
                                                    >حذف
                                                    </x-jet-button>
                                                    @if($Categories->off == null || $Categories->off == 0)
                                                        <button
                                                            class="btn btn-elevated-dark w-24 ml-1 mb-2"
                                                            wire:click="confirmAddDiscount( {{ $Categories->id }})"
                                                            wire:loading.attr="disabled">
                                                            کد تخفیف
                                                        </button>
                                                    @elseif($Categories->off == 1)
                                                        <button
                                                            class="btn btn-elevated-dark w-32 p-2 ml-1 mb-2 text-sm text-green-50"
                                                            wire:click="confirmEditDiscount( {{ $Categories->id }})"
                                                            wire:loading.attr="disabled">
                                                            ویرایش کد تخفیف
                                                        </button>
                                                    @endif
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

/*********************************/
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
        {{ isset($this->food->id) ? 'Edit Product' : 'Add Product' }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('نام غذا') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full"
                         wire:model.defer="food.title"/>
            <x-jet-input-error for="food.title" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="name" value="{{ __('مواد اولیه') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full"
                         wire:model.defer="food.raw_material"/>
            <x-jet-input-error for="food.raw_material" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="name" value="{{ __('قیمت') }}"/>
            <x-jet-input id="number" type="text" class="mt-1 block w-full"
                         wire:model.defer="food.price"/>
            <x-jet-input-error for="food.price" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="name" value="{{ __('دسته بندی') }}"/>
            <select id="Category" wire:model.defer="food.food_categories_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled>Select Category</option>
                @foreach(\App\Models\foodCategories::all() as $category)
                    <option value="{{$category->id}}">{{$category->FoodType}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="food.food_categories_id" class="mt-2"/>
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
<x-jet-dialog-modal wire:model="confirmingDiscount">
    <x-slot name="title">
        {{ isset($this->food->id) ? 'Add Discount To Food' : "" }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('نام غذا') }}"/>
            <x-jet-input id="name" type="text"
                         class="mt-1 block w-full disabled:opacity-50 disabled:cursor-not-allowed"
                         wire:model.defer="food.title" disabled/>
            <x-jet-input-error for="food.title" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="discount" value="{{ __('کد تخفیف') }}"/>
            <select id="discount" wire:model.defer="discount.id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>Select Category</option>
                @foreach(\App\Models\Discount::all() as $discount)
                    <option value="{{$discount->id}}">{{$discount->title}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="discount.id" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingDiscount', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="addDiscount()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
<x-jet-dialog-modal wire:model="confirmingEditDiscount">
    <x-slot name="title">
        {{ isset($this->food->id) ? 'Add Discount To Food' : "" }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('نام غذا') }}"/>
            <x-jet-input id="name" type="text"
                         class="mt-1 block w-full disabled:opacity-50 disabled:cursor-not-allowed"
                         wire:model.defer="food.title" disabled/>
            <x-jet-input-error for="food.title" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-4">
            <x-jet-label for="discount" value="{{ __('کد تخفیف') }}"/>
            <select id="discount" wire:model.defer="discount.id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled>Select Category</option>
                @foreach(\App\Models\Discount::all() as $discount)
                    <option value="{{$discount->id}}">{{$discount->title}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="discount.id" class="mt-2"/>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingDiscount', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="editDiscount()" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>

