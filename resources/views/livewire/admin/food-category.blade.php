<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Food Category') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                @if (session()->has('message'))
                    <div class="relative flex shadow bg-indigo-500 text-white text-sm font-bold p-4" role="alert"
                         x-data="{show: true}" x-show="show">
                        <p>{{ session('message') }}</p>
                        <button role="button" aria-label="close alert" class="absolute top-0 bottom-0 right-0 p-4"
                                @click="show = false">
                            ×
                        </button>
                    </div>
                @endif

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
                                            نام دسته بندی
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
                                                {{ $Categories->FoodType }}
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
                {{--            {{ $foodCategory->links() }}--}}
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
                        {{ isset($this->foodCategory->id) ? 'Edit Product' : 'Add Product' }}
                    </x-slot>

                    <x-slot name="content">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="name" value="{{ __('Name') }}"/>
                            <x-jet-input id="name" type="text" class="mt-1 block w-full"
                                         wire:model.defer="foodCategory.FoodType"/>
                            <x-jet-input-error for="foodCategory.FoodType" class="mt-2"/>
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
