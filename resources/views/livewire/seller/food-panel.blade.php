<div class="py-12">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Food Panel') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                {{-- Header Section --}}
                <div class="mt-8 pb-4 text-2xl flex justify-between">
                    <div>افزودن غذای جدید</div>
                    {{-- Add Button Action --}}
                    <div class="mr-2">
                        <x-jet-button wire:click="confirmCategoryAdd" class="bg-indigo-700 hover:bg-indigo-900">
                            افزودن غذا
                        </x-jet-button>
                    </div>
                </div>

                {{-- Table Section --}}
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            ردیف
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            نام غذا
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            دسته بندی
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            مواد اولیه
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            تخفیف
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            انقضا کد تخفیف
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            قیمت
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            عملیات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($Category as $Categories)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $Categories->id }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Categories->title }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ \App\Models\foodCategories::where('id','=',$Categories->food_categories_id)->get()[0]->FoodType }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Categories->raw_material }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($Categories->off == null || $Categories->off == 0)
                                                    ندارد
                                                @elseif($Categories->off == 1)
                                                    {{\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()[0]->discount_id)->title}}
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                @php
                                                    if ($Categories->off == 1){
                                                        $expireTime = \Carbon\Carbon::parse(\App\Models\Discount::find(\App\Models\DiscountFood::where('food_id','=',$Categories->id)->get()[0]->discount_id)->ExpireTime);
                                                        echo $expireTime->diffInDays();
                                                    }else{
                                                        echo "----";
                                                    }
                                                @endphp
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Categories->price }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{-- Edit Button Action --}}
                                                <x-jet-button wire:click="confirmCategoryEdit( {{ $Categories->id }})"
                                                              class="bg-orange-500 hover:bg-orange-700">
                                                    ویرایش
                                                </x-jet-button>
                                                {{-- Delete Button Action --}}
                                                <x-jet-danger-button
                                                    wire:click="confirmCategoryDeletion( {{ $Categories->id }})"
                                                    wire:loading.attr="disabled">
                                                    حذف
                                                </x-jet-danger-button>
                                                {{-- Discount Button Action --}}
                                                @if($Categories->off == null || $Categories->off == 0)
                                                    <x-jet-secondary-button
                                                        wire:click="confirmAddDiscount( {{ $Categories->id }})"
                                                        wire:loading.attr="disabled">
                                                        کد تخفیف
                                                    </x-jet-secondary-button>
                                                @elseif($Categories->off == 1)
                                                    <x-jet-secondary-button
                                                        wire:click="confirmEditDiscount( {{ $Categories->id }})"
                                                        wire:loading.attr="disabled">
                                                        ویرایش کد تخفیف
                                                    </x-jet-secondary-button>
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

                {{-- Modal Section --}}
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

            </div>
        </div>
    </div>
</div>
