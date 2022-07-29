<div>
    <x-jet-dialog-modal wire:model="confirmFoodAddToPartyModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">افزودن غذای به فودپارتی</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mt-3">
                    <div id="multi-select" class="p-5">
                        <div class="preview">
                            <label>
                                <select wire:model="discount.foodPrties" data-placeholder="Select your favorite actors"
                                        data-search="true"
                                        class="w-full" multiple>
                                    @foreach($foods as $food)
                                        <option value="{{$food->id}}">{{$food->title}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                    <x-jet-input-error for="food.title" class="mt-2"/>
                </div>
                <div class="mt-3">
                    <label for="name" class="form-label">{{ __('مقدار تخفیف') }}</label>
                    <input id="name" type="text" class="form-control form-control-rounded"
                           placeholder="مقدار تخفیف . . ."
                           wire:model.defer="discount.amount">
                    <x-jet-input-error for="discount.amount" class="mt-2"/>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmFoodAddToPartyModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="AddFoodToParty()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

