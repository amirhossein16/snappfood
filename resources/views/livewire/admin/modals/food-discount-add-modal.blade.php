<div>
    <x-jet-dialog-modal wire:model="confirmingDiscountaddModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">
                {{ isset($this->discount->id) ? 'ویرایش کد تخفیف' : 'افزودن کدتخفیف' }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('نام دسته بندی') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="نام دسته بندی . . ."
                           wire:model.defer="discount.title">
                    <x-jet-input-error for="discount.title" class="mt-2"/>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('مقدار تخفیف') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="مقدار تخفیف . . ."
                           wire:model.defer="discount.amount">
                    <x-jet-input-error for="discount.amount" class="mt-2"/>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12">
                <div id="input-group-datepicker" class="p-5">
                    <label for="date" class="form-label p-2">{{ __('تاریخ') }}</label>
                    <div class="preview">
                        <div class="relative w-full mx-auto">
                            <div
                                class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4">
                                <i data-feather="calendar" class="w-4 h-4"></i></div>
                            <input type="date" id="date" class="form-control pl-12" data-single-mode="true"
                                   wire:model.defer="discount.ExpireTime">
                            <x-jet-input-error for="discount.ExpireTime" class="mt-2"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-12 mb-32">
                <div class="mt-3">
                    <label for="discountType">نوع تخفیف</label>
                    <div class="mt-2">
                        <select id="discountType" data-search="true" class="tail-select w-full"
                                wire:model.defer="discount.type">
                            <optgroup label="نوع تخفیف را انتخاب نمایدد . . .">
                                <option value="Price">Price</option>
                                <option value="Percentage">Percentage</option>
                            </optgroup>
                        </select>
                        <x-jet-input-error for="discount.type" class="mt-2"/>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingDiscountaddModal', false)"
                                    wire:loading.attr="disabled" class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="addDiscount()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
