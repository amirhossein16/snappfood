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
                        لیست نظرات
                    </x-tables.header>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="p-5" id="striped-rows-table">
                        <div class="preview">
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">ردیف</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">نام</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">ایمیل</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">شماره سفارش</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">وضعیت نظر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">متن نظر</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">امتیاز</th>
                                        <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">عملیات</th>
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
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Categories->user->name }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium"> {{ $Categories->user->email }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Categories->orders_id }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@if($Categories->confirm)
                                                        <span class="text-green-500">تایید شده</span>
                                                    @else
                                                        <span class="text-red-500">تایید نشده</span>
                                                    @endif</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Categories->opinion}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Categories->score}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    <button class="btn btn-elevated-success w-24 ml-1 mb-2 p-2"
                                                            wire:click="$emit('EditModalConfirm',{{$Categories->id}})">
                                                        تایید
                                                    </button>
                                                    <button class="btn btn-elevated-warning w-24 text-sm py-3 px-2 ml-1 mb-2"
                                                            wire:click="$emit('referralComment',{{$Categories->id}})">
                                                        ارجاع به مدیر
                                                    </button>
                                                    <x-jet-button
                                                        class="btn btn-elevated-danger w-32 ml-1 mb-2 px-2 h-12 text-indigo-900"
                                                        wire:click="$emit('confirmComment',{{$Categories->id}})"
                                                    >تایید و پاسخ
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
            <x-jet-input id="name" type="text"
                         class="mt-1 block w-full disabled:opacity-50 disabled:cursor-not-allowed disabled:select-none"
                         disabled
                         wire:model.defer="comment.opinion"/>
            <x-jet-input-error for="comment.opinion" class="mt-2"/>
        </div>
        <div class="col-span-6 sm:col-span-4 mt-6">
            <x-jet-label for="name" value="{{ __('پاسخ شما') }}"/>
            <x-jet-input id="name" type="text" class="mt-1 block w-full"
                         wire:model.defer="comments.response"/>
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
