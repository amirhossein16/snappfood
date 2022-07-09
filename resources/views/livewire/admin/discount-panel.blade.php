<div class="py-12">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Restaurant Category') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                {{-- Header Section --}}
                <div class="mt-8 pb-4 text-2xl flex justify-between">
                    <div>افزودن دسته بندی جدید</div>
                    {{-- Add Button Action --}}
                    <div class="mr-2">
                        <x-jet-button wire:click="confirmCategoryAdd" class="bg-indigo-700 hover:bg-indigo-900">
                            افزودن دسته بندی
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
                                            عنوان تخفیف
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            نوع تخفیف
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            مقدار تخفیف
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            تاریخ انقضا
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            تعداد روز باقی مانده
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            عملیات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($Discounts as $Discount)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ $Discount->id }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Discount->title }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Discount->type }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Discount->amount }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$Discount->ExpireTime}}
                                            </td>
                                            <td class="px-6 py-4">
                                                @php
                                                    $expireTime = \Carbon\Carbon::parse($Discount->ExpireTime);
                                                    echo $expireTime->diffInDays();
                                                @endphp
                                            </td>
                                            <td class="px-6 py-4">
                                                {{-- Edit Button Action --}}
                                                <x-jet-button wire:click="confirmCategoryEdit( {{ $Discount->id }})"
                                                              class="bg-orange-500 hover:bg-orange-700">
                                                    ویرایش
                                                </x-jet-button>
                                                {{-- Delete Button Action --}}
                                                <x-jet-danger-button
                                                    wire:click="confirmCategoryDeletion( {{ $Discount->id }})"
                                                    wire:loading.attr="disabled">
                                                    حذف
                                                </x-jet-danger-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer Section --}}
                {{--        <div class="mt-4">--}}
                {{--            {{ $restaurantCategory->links() }}--}}
                {{--        </div>--}}

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

            </div>
        </div>
    </div>
</div>
