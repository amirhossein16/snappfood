<div class="py-12">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders Panel') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                {{-- Header Section --}}
                <div class="mt-8 pb-4 text-center text-2xl flex justify-around">
                    <div>لیست سفارشات</div>
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
                                            کاربر
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            قیمت
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            آدرس
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            تاریخ
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
                                            وضعیت
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left">
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
                                                {{\App\Models\User::find(\App\Models\Cart::where('id',$Category->first()->cart_id)->get()->first()->user_id)->name}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ \App\Models\Cart::where('id',$Category->first()->cart_id)->get()->first()->price }}
                                            </td>
                                            <td class="px-6 py-4">
                                                // pvot for address
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$Categories->created_at}}
                                            </td>
                                            <td class="px-6 py-4">
                                                @php
                                                    if ($Categories->OrderStatus == 1)
                                                        echo "در حال بررسی";
                                                    elseif ($Categories->OrderStatus == 2)
                                                        echo "در حال آماده سازی";
                                                    elseif ($Categories->OrderStatus == 3)
                                                        echo "ارسال به مقصد";
                                                    elseif ($Categories->OrderStatus == 4)
                                                        echo "تحویل گرفته شد";
                                                @endphp
                                            </td>

                                            <td class="px-6 py-4">
                                                {{-- Edit Button Action --}}
                                                @if($Categories->OrderStatus == 4)
                                                    <x-jet-button
                                                        class="bg-green-600 hover:bg-green-700 disabled:opacity-75 disabled:cursor-not-allowed"
                                                        disabled> سفارش تکمیل شد
                                                    </x-jet-button>
                                                @else
                                                    <x-jet-button
                                                        wire:click="ChangeOrderStatus( {{ $Categories->id }})"
                                                        class="bg-orange-500 hover:bg-orange-700"
                                                    >
                                                        تبدیل وضعیت سفارش
                                                    </x-jet-button>
                                                @endif
                                                {{-- Delete Button Action --}}
                                                <x-jet-danger-button
                                                    wire:click="OrderDetails( {{ $Categories->id }})"
                                                    wire:loading.attr="disabled">
                                                    جزئیات سفارش
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

                {{-- Modal Section --}}
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

            </div>
        </div>
    </div>
</div>
