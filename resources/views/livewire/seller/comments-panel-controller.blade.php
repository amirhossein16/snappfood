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
                                            نام
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            ایمیل
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            شماره سفارش
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            وضعیت نظر
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            متن نظر
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            امتیاز
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            عملیات
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">

                                    @php $Row = 0 @endphp
                                    @foreach ($Category as $Categories)
                                        <tr>
                                            <td class="px-6 py-4">
                                                {{ ++$Row }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Categories->user->name }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $Categories->user->email }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$Categories->orders_id }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($Categories->confirm)
                                                    <span class="text-green-500">تایید شده</span>
                                                @else
                                                    <span class="text-red-500">تایید نشده</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$Categories->opinion}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$Categories->score}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{-- Edit Button Action --}}
                                                <x-jet-button wire:click="confirmComment( {{ $Categories->id }})"
                                                              class="bg-emerald-400 w-full text-gray-700 hover:text-gray-200 hover:bg-
                                                              emerald-700 px-auto justify-around">
                                                    تایید
                                                </x-jet-button>
                                                {{-- Delete Button Action --}}
                                                <x-jet-danger-button
                                                    wire:click="referralComment( {{ $Categories->id }})"
                                                    wire:loading.attr="disabled"
                                                    class="w-full  justify-around">
                                                    ارجاع به مدیر
                                                </x-jet-danger-button>
                                                {{-- Discount Button Action --}}
                                                <x-jet-secondary-button
                                                    wire:click="AnswerComments( {{ $Categories->id }})"
                                                    wire:loading.attr="disabled"
                                                    class="w-full  justify-around">
                                                    تایید و پاسخ
                                                </x-jet-secondary-button>
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
                <x-jet-confirmation-modal wire:model="confirmingComment">
                    <x-slot name="title">
                        {{ __('Confirming Comment') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to Confirming Comment? ') }}
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$set('confirmingComment', false)"
                                                wire:loading.attr="disabled">
                            {{ __('Conceal') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="ConfirmModalComment({{ $confirmingComment }})"
                                             wire:loading.attr="disabled">
                            {{ __('Confirm') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-confirmation-modal>
                <x-jet-confirmation-modal wire:model="referralComment">
                    <x-slot name="title">
                        {{ __('Referral Comment') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to Referral Comment? ') }}
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$set('referralComment', false)"
                                                wire:loading.attr="disabled">
                            {{ __('Conceal') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="ReferralModalComment({{ $referralComment }})"
                                             wire:loading.attr="disabled">
                            {{ __('Confirm') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-confirmation-modal>

                <x-jet-dialog-modal wire:model="ConfirmAnswerComments">
                    <x-slot name="title">
                        {{ isset($this->food->id) ? 'Edit Product' : 'Add Product' }}
                    </x-slot>

                    <x-slot name="content">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="name" value="{{ __('نظر کاربر') }}"/>
                            <x-jet-input id="name" type="text" class="mt-1 block w-full disabled:opacity-50 disabled:cursor-not-allowed disabled:select-none" disabled
                                         wire:model.defer="comment.opinion"/>
                            <x-jet-input-error for="comment.opinion" class="mt-2"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4 mt-6">
                            <x-jet-label for="name" value="{{ __('پاسخ شما') }}"/>
                            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="comments.response"/>
                            <x-jet-input-error for="comments.response" class="mt-2"/>
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$set('ConfirmAnswerComments', false)"
                                                wire:loading.attr="disabled">
                            {{ __('Conceal') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="saveAnswer()" wire:loading.attr="disabled">
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
