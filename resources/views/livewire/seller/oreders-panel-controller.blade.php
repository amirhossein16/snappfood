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
                                    @foreach ($Category as $Categories)
                                        @if( $Categories->id % 2 == 0  )
                                            <tr>
                                        @else
                                            <tr class="bg-gray-200 dark:bg-dark-1">
                                                @endif
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{ $Categories->id }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{\App\Models\User::find(\App\Models\Cart::where('id',$Category->first()->cart_id)->get()->first()->user_id)->name}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium"> {{ \App\Models\Cart::where('id',$Category->first()->cart_id)->get()->first()->price }}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">// pvot for
                                                    address
                                                </td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">{{$Categories->created_at}}</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">@php
                                                        if ($Categories->OrderStatus == 1)
                                                            echo "در حال بررسی";
                                                        elseif ($Categories->OrderStatus == 2)
                                                            echo "در حال آماده سازی";
                                                        elseif ($Categories->OrderStatus == 3)
                                                            echo "ارسال به مقصد";
                                                        elseif ($Categories->OrderStatus == 4)
                                                            echo "تحویل گرفته شد";
                                                    @endphp</td>
                                                <td class="border-b dark:border-dark-5 text-lg font-medium">
                                                    @if($Categories->OrderStatus == 4)
                                                        <x-jet-button
                                                            class="btn btn-elevated-success w-44 h-12 ml-1 mb-2 disabled:opacity-75 disabled:cursor-not-allowed"
                                                            disabled> سفارش تکمیل شد
                                                        </x-jet-button>
                                                    @else
                                                        <x-jet-button
                                                            wire:click="ChangeOrderStatus( {{ $Categories->id }})"
                                                            class="btn btn-elevated-primary w-44 h-12 ml-1 mb-2"
                                                        >
                                                            تبدیل وضعیت سفارش
                                                        </x-jet-button>
                                                    @endif
                                                        <button
                                                            wire:click="ChangeOrderStatus( {{ $Categories->id }})"
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

<x-jet-confirmation-modal wire:model="OrderDetailsShow">
    <x-slot name="title">
        {{ __('جزئیات سفارش') }}
    </x-slot>

    <x-slot name="content">
        @if(isset($this->details) && !empty($this->details))
            @foreach($this->details as $item)
                Row : {{$item->id}} <br>
                Food Name : {{\App\Models\Food::where('id',$item->food_id)->get()->first()->title}} <br>
                User
                : {{\App\Models\User::where('id',\App\Models\Cart::find($item->cart_id)->get()->first()->user_id)->get()->first()->name}}
                <br>
                Count : {{$item->count}} <br>
                Price {{$item->price}} <br>
                <hr>
                <hr>
                <hr>
            @endforeach
        @endif
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('OrderDetailsShow', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>
    </x-slot>
</x-jet-confirmation-modal>

<x-jet-dialog-modal wire:model="confirmingChangeOrderStatus">
    <x-slot name="title">
        {{ isset($this->order->id) ? 'Edit OrderStatus' : '' }}
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            @if(isset($this->order))
                @php

                    if (isset(\App\Models\Orders::where('OrderStatus',$this->order->OrderStatus)->get()->first()->OrderStatus )){
                        if (\App\Models\Orders::where('OrderStatus',$this->order->OrderStatus)->get()->first()->OrderStatus == 1)
                            echo "<p style='direction:rtl' class='text-center'> تبدیل وضعیت از <span class='text-xl text-red-500'>در حال بررسی</span> به <span class='text-xl text-green-500'>در حال آماده سازی</span></p>";
                        elseif (\App\Models\Orders::where('OrderStatus','=',$this->order->OrderStatus)->get()->first()->OrderStatus == 2)
                            echo "<p style='direction:rtl' class='text-center'> تبدیل وضعیت از <span class='text-xl text-red-500'>در حال آماده سازی</span> به <span class='text-xl text-green-500'>ارسال به مقصد</span></p>";
                        elseif (\App\Models\Orders::where('OrderStatus','=',$this->order->OrderStatus)->get()->first()->OrderStatus == 3)
                            echo "<p style='direction:rtl' class='text-center'> تبدیل وضعیت از <span class='text-xl text-red-500'>ارسال به مقصد</span> به <span class='text-xl text-green-500'>تحویل گرفته شد</span></p>";
                        elseif (\App\Models\Orders::where('OrderStatus','=',$this->order->OrderStatus)->get()->first()->OrderStatus == 4|| \App\Models\Orders::where('OrderStatus','=',$this->order->OrderStatus)->get()->first()->OrderStatus == 5)
                            echo "تحویل گرفته شد";
                    }
                @endphp
            @endif
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('confirmingChangeOrderStatus', false)"
                                wire:loading.attr="disabled">
            {{ __('Conceal') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="ConvertOrderStatus()"
                             wire:loading.attr="disabled">
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
