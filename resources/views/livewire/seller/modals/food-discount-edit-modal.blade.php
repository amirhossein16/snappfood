<div>
    <x-jet-dialog-modal wire:model="confirmingEditDiscountModal">
        <x-slot name="title">

            <h2 class="font-medium text-base ml-auto">
                {{ isset($this->food->id) ? 'ویرایش کدتخفیف' : 'افزودن کدتخفیف' }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('نام غذا') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded cursor-not-allowed opacity-50" disabled
                           placeholder="{{ __('نام غذا') }}. . ."
                           wire:model.defer="food.title">
                    <x-jet-input-error for="food.title" class="mt-2"/>
                </div>
                <div class="mt-3">
                    <label for="Category" class="form-label">{{ __('دسته بندی') }}</label>
                    <select data-search="true" class="form-control-rounded form-control w-full" id="Category"
                            wire:model.defer="discount.id">
                        <optgroup label="کدتخفیف غذای خود را انتخاب نمایید">
                            @foreach(\App\Models\Discount::all() as $discount)
                                <option value="{{$discount->id}}">{{$discount->title}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <x-jet-input-error for="discount.id" class="mt-2"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingEditDiscountModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="editDiscount()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
