<div>
    <livewire:delete-modal/>
    <livewire:seller.modals.restaurant-profile-modal/>
    <livewire:seller.modals.restaurant-location-modal/>
    <livewire:seller.modals.restaurant-work-time-modal/>
    <!-- BEGIN: Content -->
    <div class="wrapper wrapper--top-nav">
        <div class="wrapper-box">
            <!-- BEGIN: Content -->
            <div class="content">
                @if(empty(auth()->user()->restaurantDetail->restaurant_categories_id))
                    <x-jet-confirmation-modal wire:model="confirmingPanelModal">
                        <x-slot name="title">
                            {{ __('اطلاعات ناقص') }}
                        </x-slot>

                        <x-slot name="content">
                            {{ __('برای دسترسی به پنل مدیریت رستوران، لطفا اطلاعات رستوران خود را تکمیل کنید !') }}
                        </x-slot>

                        <x-slot name="footer">
                        </x-slot>
                    </x-jet-confirmation-modal>
                @elseif(auth()->user()->restaurantDetail->latitude == null)
                    <x-jet-confirmation-modal wire:model="confirminglocationModal">
                        <x-slot name="title">
                            {{ __('اطلاعات ناقص') }}
                        </x-slot>

                        <x-slot name="content">
                            {{ __('ثبت موقعیت مکانی رستوران اجباری میباشد !') }}
                        </x-slot>

                        <x-slot name="footer">
                        </x-slot>
                    </x-jet-confirmation-modal>
                @endif
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

                    <x-tables.header>
                        تنظیمات رستوران
                    </x-tables.header>
                    <div class="mt-2 mx-4" wire:ignore>
                        <div class="form-check">
                            @if($opening)
                                <label class="form-check-label" for="green-toggle">رستوران باز است</label>
                            @else
                                <label class="form-check-label" for="green-toggle">رستوران بسته است</label>
                            @endif
                            <input wire:click="open" id="green-toggle"
                                   wire:model.defer="opening" class="form-check-switch mr-2" type="checkbox">
                        </div>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="mb-6">
                        <div class="mt-3">
                            <label for="RestaurantName" class="form-label">نام رستوران
                                <x-jet-input-error for="Restaurant.name" class="mt-2"/>
                            </label>
                            <input id="RestaurantName" wire:model.defer="Restaurant.name" type="text"
                                   class="form-control form-control-rounded" placeholder="نام رستوران . . .">
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="mt-3">
                            <label for="Address" class="form-label">آدرس رستوران
                                <x-jet-input-error for="Restaurant.address" class="mt-2"/>
                            </label>
                            <input id="Address" wire:model.defer="Restaurant.address" type="text"
                                   class="form-control form-control-rounded" placeholder="آدرس رستوران . . .">
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="mt-3">
                            <label for="ShippingCost" class="form-label">هزینه ارسال
                                <x-jet-input-error for="Restaurant.ShippingCost" class="mt-2"/>
                            </label>
                            <input type="number" min="0" max="100000" id="ShippingCost"
                                   wire:model.defer="Restaurant.ShippingCost"
                                   class="form-control form-control-rounded" placeholder="هزینه ارسال . . .">
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="mt-3">
                            <label for="accountNumber" class="form-label">شماره حساب
                                <x-jet-input-error for="Restaurant.accountNumber" class="mt-2"/>
                            </label>
                            <input type="number" min="0" max="100000" id="accountNumber"
                                   wire:model.defer="Restaurant.accountNumber"
                                   class="form-control form-control-rounded" placeholder="هزینه ارسال . . .">
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="mt-3">
                            <label for="Phone" class="form-label">شماره تماس
                                <x-jet-input-error for="Restaurant.phone" class="mt-2"/>
                            </label>
                            <input type="text" id="Phone" wire:model.defer="Restaurant.phone"
                                   class="form-control form-control-rounded" placeholder="شماره تماس . . .">
                        </div>
                    </div>
                    <div class="mb-6">
                        <div class="mt-3">
                            <label for="Category">دسته بندی رستوران
                                <x-jet-input-error for="Restaurant.restaurant_categories_id" class="mt-2"/>
                            </label>
                            <div class="mt-2">
                                <select data-search="true"
                                        class="w-full form-control form-control-rounded" id="Category"
                                        wire:model.defer="Restaurant.restaurant_categories_id">
                                    <optgroup label="دسته بندی رستوران خود را انتخاب نمایید">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->RestaurantType}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="intro-y pr-1">
                        <div class="box p-2">
                            <div class="pos__tabs nav nav-tabs justify-center gap-4" role="tablist">
                                <a id="ticket-tab" data-toggle="tab" data-target="#ticket" href="javascript:;"
                                   class="flex-1 py-2 rounded-md text-center bg-blue-400 active border border-indigo-400 border-collapse hover:bg-blue-800 hover:text-emerald-50"
                                   role="tab" wire:click="$emit('OpenProfileModal')"
                                   aria-controls="ticket" aria-selected="true">ویرایش تصویرروفایل رستوران</a>
                                <a id="details-tab" data-toggle="tab" data-target="#details" href="javascript:;"
                                   class="flex-1 py-2 rounded-md text-center bg-blue-400 border border-indigo-400 border-collapse hover:bg-blue-800 hover:text-emerald-50"
                                   role="tab" aria-controls="details"
                                   aria-selected="false" wire:click="$emit('OpenLocationModal')">ویرایش
                                    لوکیشن</a>
                                @foreach($detail as $det)
                                    <a id="details-tab" data-toggle="tab" data-target="#details" href="javascript:;"
                                       class="flex-1 py-2 rounded-md text-center bg-blue-400 border border-indigo-400 border-collapse hover:bg-blue-800 hover:text-emerald-50"
                                       role="tab" aria-controls="details"
                                       aria-selected="false" wire:click="$emit('OpenWorkingTimeModal',{{$det->id}})">ویرایش
                                        زمانبندی رستوران</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button wire:click="saveRestaurant"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-1/2 px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-1/2 mr-96 mt-6">
                        ویرایش اطلاعات
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content -->

