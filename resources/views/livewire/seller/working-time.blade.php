<div class="flex flex-row gap-4">
    <div class="flex flex-col">
        <label for="schedula_1" class="form-label">شنبه</label>
    </div>
    <div>
        <input type="time" id="schedula_1" wire:model.defer="RestaurantTime.Saturday_start"
               class="form-control form-control-rounded w-32 mb-4">
        <input type="time" id="schedula_1" wire:model.defer="RestaurantTime.Saturday_end"
               class="form-control form-control-rounded w-32">
        <x-jet-input-error for="RestaurantTime.Thursday_start" class="mt-2"/>
        <x-jet-input-error for="RestaurantTime.Thursday_end" class="mt-2"/>
    </div>
    <div class="flex flex-col">
        <label for="schedula_2" class="form-label">یکشنبه</label>
        <div>
            <input type="time" id="schedula_2" wire:model.defer="RestaurantTime.Sunday_start"
                   class="form-control form-control-rounded w-32 mb-4">
            <input type="time" id="schedula_2" wire:model.defer="RestaurantTime.Sunday_end"
                   class="form-control form-control-rounded w-32">
            <x-jet-input-error for="RestaurantTime.Thursday_start" class="mt-2"/>
            <x-jet-input-error for="RestaurantTime.Thursday_end" class="mt-2"/>
        </div>
        <label for="schedula_3" class="form-label">دوشنبه</label>
        <div>
            <input type="time" id="schedula_3" wire:model.defer="RestaurantTime.Monday_start"
                   class="form-control form-control-rounded w-32 mb-4">
            <input type="time" id="schedula_3" wire:model.defer="RestaurantTime.Monday_end"
                   class="form-control form-control-rounded w-32">
            <x-jet-input-error for="RestaurantTime.Thursday_start" class="mt-2"/>
            <x-jet-input-error for="RestaurantTime.Thursday_end" class="mt-2"/>
        </div>
        <label for="schedula_4" class="form-label">سه شنبه</label>
        <div>
            <input type="time" id="schedula_4" wire:model.defer="RestaurantTime.Tuesday_start"
                   class="form-control form-control-rounded w-32 mb-4">
            <input type="time" id="schedula_4" wire:model.defer="RestaurantTime.Tuesday_end"
                   class="form-control form-control-rounded w-32">
            <x-jet-input-error for="RestaurantTime.Thursday_start" class="mt-2"/>
            <x-jet-input-error for="RestaurantTime.Thursday_end" class="mt-2"/>
        </div>
        <label for="schedula_5" class="form-label">چهارشنبه</label>
        <div>
            <input type="time" id="schedula_5" wire:model.defer="RestaurantTime.Wednesday_start"
                   class="form-control form-control-rounded w-32 mb-4">
            <input type="time" id="schedula_5" wire:model.defer="RestaurantTime.Wednesday_end"
                   class="form-control form-control-rounded w-32">
            <x-jet-input-error for="RestaurantTime.Thursday_start" class="mt-2"/>
            <x-jet-input-error for="RestaurantTime.Thursday_end" class="mt-2"/>
        </div>
        <label for="schedula_6" class="form-label">پنجشنبه</label>
        <div>
            <input type="time" id="schedula_6" wire:model.defer="RestaurantTime.Thursday_start"
                   class="form-control form-control-rounded w-32 mb-4">
            <input type="time" id="schedula_6" wire:model.defer="RestaurantTime.Thursday_end"
                   class="form-control form-control-rounded w-32">
            <x-jet-input-error for="RestaurantTime.Thursday_start" class="mt-2"/>
            <x-jet-input-error for="RestaurantTime.Thursday_end" class="mt-2"/>
        </div>
        <label for="schedula_7" class="form-label">جمعه</label>
        <div>
            <input type="time" id="schedula_7" wire:model.defer="RestaurantTime.Friday_start"
                   class="form-control form-control-rounded w-32 mb-4">
            <input type="time" id="schedula_7" wire:model.defer="RestaurantTime.Friday_end"
                   class="form-control form-control-rounded w-32">
            <x-jet-input-error for="RestaurantTime.Thursday_start" class="mt-2"/>
            <x-jet-input-error for="RestaurantTime.Thursday_end" class="mt-2"/>
        </div>
    </div>
</div>
