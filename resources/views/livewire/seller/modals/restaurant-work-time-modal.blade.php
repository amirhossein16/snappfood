<div>
    <x-jet-dialog-modal wire:model="confirmRestaurantWorkingTimeModal">
        <x-slot name="title">
            <h2 class="font-medium text-base ml-auto">ویرایش زمتنبندی رستوران</h2>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-12 sm:col-span-12">
                <div class="mb-6">
                    <div class="mt-3">
                        <div class="flex flex-row
                         gap-4 w-full">
                            <div class="flex flex-col justify-around w-full">
                                <div class="flex flex-row items-center justify-around">
                                    <label for="schedula_1" class="form-label">شنبه</label>
                                    <input type="time" id="schedula_1"
                                           wire:model.defer="Saturday_start"
                                           class="form-control form-control-rounded w-32 mb-4 ml-4">
                                    <input type="time" id="schedula_1" wire:model.defer="Saturday_end"
                                           class="form-control form-control-rounded w-32 mb-4">
                                </div>
                                    <x-jet-input-error for="Saturday_start" class="mt-2"/>
                                    <x-jet-input-error for="Saturday_end" class="mt-2"/>
                                <div class="flex flex-row items-center justify-around">
                                    <label for="schedula_2" class="form-label">یکشنبه</label>
                                    <input type="time" id="schedula_2"
                                           wire:model.defer="Sunday_start"
                                           class="form-control form-control-rounded w-32 mb-4 ml-4">
                                    <input type="time" id="schedula_2" wire:model.defer="Sunday_end"
                                           class="form-control form-control-rounded w-32 mb-4">
                                </div>
                                    <x-jet-input-error for="Sunday_start" class="mt-2"/>
                                    <x-jet-input-error for="Sunday_end" class="mt-2"/>
                                <div class="flex flex-row items-center justify-around">
                                    <label for="schedula_3" class="form-label">دوشنبه</label>
                                    <input type="time" id="schedula_3" wire:model.defer="Monday_start"
                                           class="form-control form-control-rounded w-32 mb-4">
                                    <input type="time" id="schedula_3" wire:model.defer="Monday_end"
                                           class="form-control form-control-rounded w-32 mb-4">
                                </div>
                                    <x-jet-input-error for="Monday_start" class="mt-2"/>
                                    <x-jet-input-error for="Monday_end" class="mt-2"/>
                                <div class="flex flex-row items-center justify-around">
                                    <label for="schedula_4" class="form-label">سه شنبه</label>
                                    <input type="time" id="schedula_4" wire:model.defer="Tuesday_start"
                                           class="form-control form-control-rounded w-32 mb-4">
                                    <input type="time" id="schedula_4" wire:model.defer="Tuesday_end"
                                           class="form-control form-control-rounded w-32 mb-4">
                                </div>
                                    <x-jet-input-error for="Tuesday_start" class="mt-2"/>
                                    <x-jet-input-error for="Tuesday_end" class="mt-2"/>
                                <div class="flex flex-row items-center justify-around">
                                    <label for="schedula_5" class="form-label">چهارشنبه</label>
                                    <input type="time" id="schedula_5" wire:model.defer="Wednesday_start"
                                           class="form-control form-control-rounded w-32 mb-4">
                                    <input type="time" id="schedula_5" wire:model.defer="Wednesday_end"
                                           class="form-control form-control-rounded w-32 mb-4">
                                </div>
                                    <x-jet-input-error for="Wednesday_start" class="mt-2"/>
                                    <x-jet-input-error for="Wednesday_end" class="mt-2"/>
                                <div class="flex flex-row items-center justify-around">
                                    <label for="schedula_6" class="form-label">پنجشنبه</label>
                                    <input type="time" id="schedula_6" wire:model.defer="Thursday_start"
                                           class="form-control form-control-rounded w-32 mb-4">
                                    <input type="time" id="schedula_6" wire:model.defer="Thursday_end"
                                           class="form-control form-control-rounded w-32 mb-4">
                                </div>
                                    <x-jet-input-error for="Thursday_start" class="mt-2"/>
                                    <x-jet-input-error for="Thursday_end" class="mt-2"/>
                                <div class="flex flex-row items-center justify-around">
                                    <label for="schedula_7" class="form-label">جمعه</label>
                                    <input type="time" id="schedula_7" wire:model.defer="Friday_start"
                                           class="form-control form-control-rounded w-32 mb-4">
                                    <input type="time" id="schedula_7" wire:model.defer="Friday_end"
                                           class="form-control form-control-rounded w-32 mb-4">
                                </div>
                                    <x-jet-input-error for="Friday_start" class="mt-2"/>
                                <x-jet-input-error for="Friday_end" class="mt-2"/>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmRestaurantWorkingTimeModal', false)"
                                    class="btn btn-outline-secondary w-20 ml-1">
                {{ __('لغو') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2 btn btn-primary w-20" wire:click="EditWorkingTime()">
                {{ __('ذخیره') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
