<div>
    <x-jet-dialog-modal wire:model="confirmingfoodEditModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">
                {{ isset($this->food->id) ? 'ویرایش غذا' : 'افزودن غذای جدید' }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('نام غذا') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="{{ __('نام غذا') }}. . ."
                           wire:model.defer="food.title">
                    <x-jet-input-error for="food.title" class="mt-2"/>
                </div>
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('مواد اولیه') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="{{ __('مواد اولیه') }}. . ."
                           wire:model.defer="food.raw_material">
                    <x-jet-input-error for="food.raw_material" class="mt-2"/>
                </div>
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('قیمت') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="{{ __('قیمت') }}. . ."
                           wire:model.defer="food.price">
                    <x-jet-input-error for="food.price" class="mt-2"/>
                </div>
                <div class="mt-3">
                    <label for="Category" class="form-label">{{ __('دسته بندی') }}</label>
                    <select data-search="true" class="form-control-rounded form-control w-full" id="Category"
                            wire:model.defer="food.food_categories_id">
                        <optgroup label="دسته بندی غذا خود را انتخاب نمایید">
                            @foreach(\App\Models\foodCategories::all() as $category)
                                <option value="{{$category->id}}">{{$category->FoodType}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <x-jet-input-error for="food.food_categories_id" class="mt-2"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingfoodEditModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="editFood()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
