<div class="flex flex-row gap-4">
    <label for="schedula_1" class="form-label">شنبه</label>
    <div>
        <input type="time" id="schedula_1" wire:model.defer="schedule.1.start" wire:change="setSchedules"
               class="form-control form-control-rounded w-32 mb-4">
        <input type="time" id="schedula_1" wire:model.defer="schedule.1.end" wire:change="setSchedules"
               class="form-control form-control-rounded w-32">
        <x-jet-input-error for="schedule.1.start" class="mt-2"/>
        <x-jet-input-error for="schedule.1.end" class="mt-2"/>
    </div>
    <label for="schedula_2" class="form-label">یکشنبه</label>
    <div>
        <input type="time" id="schedula_2" wire:model.defer="schedule.2.start" wire:change="setSchedules"
               class="form-control form-control-rounded w-32 mb-4">
        <input type="time" id="schedula_2" wire:model.defer="schedule.2.end" wire:change="setSchedules"
               class="form-control form-control-rounded w-32">
        <x-jet-input-error for="schedule.2.start" class="mt-2"/>
        <x-jet-input-error for="schedule.2.end" class="mt-2"/>
    </div>
    <label for="schedula_3" class="form-label">دوشنبه</label>
    <div>
        <input type="time" id="schedula_3" wire:model.defer="schedule.3.start" wire:change="setSchedules"
               class="form-control form-control-rounded w-32 mb-4">
        <input type="time" id="schedula_3" wire:model.defer="schedule.3.end" wire:change="setSchedules"
               class="form-control form-control-rounded w-32">
        <x-jet-input-error for="schedule.3.start" class="mt-2"/>
        <x-jet-input-error for="schedule.3.end" class="mt-2"/>
    </div>
    <label for="schedula_4" class="form-label">سه شنبه</label>
    <div>
        <input type="time" id="schedula_4" wire:model.defer="schedule.4.start" wire:change="setSchedules"
               class="form-control form-control-rounded w-32 mb-4">
        <input type="time" id="schedula_4" wire:model.defer="schedule.4.end" wire:change="setSchedules"
               class="form-control form-control-rounded w-32">
        <x-jet-input-error for="schedule.4.start" class="mt-2"/>
        <x-jet-input-error for="schedule.4.end" class="mt-2"/>
    </div>
    <label for="schedula_5" class="form-label">چهارشنبه</label>
    <div>
        <input type="time" id="schedula_5" wire:model.defer="schedule.5.start" wire:change="setSchedules"
               class="form-control form-control-rounded w-32 mb-4">
        <input type="time" id="schedula_5" wire:model.defer="schedule.5.end" wire:change="setSchedules"
               class="form-control form-control-rounded w-32">
        <x-jet-input-error for="schedule.5.start" class="mt-2"/>
        <x-jet-input-error for="schedule.5.end" class="mt-2"/>
    </div>
    <label for="schedula_6" class="form-label">پنجشنبه</label>
    <div>
        <input type="time" id="schedula_6" wire:model.defer="schedule.6.start" wire:change="setSchedules"
               class="form-control form-control-rounded w-32 mb-4">
        <input type="time" id="schedula_6" wire:model.defer="schedule.6.end" wire:change="setSchedules"
               class="form-control form-control-rounded w-32">
        <x-jet-input-error for="schedule.6.start" class="mt-2"/>
        <x-jet-input-error for="schedule.6.end" class="mt-2"/>
    </div>
    <label for="schedula_7" class="form-label">جمعه</label>
    <div>
        <input type="time" id="schedula_7" wire:model.defer="schedule.7.start" wire:change="setSchedules"
               class="form-control form-control-rounded w-32 mb-4">
        <input type="time" id="schedula_7" wire:model.defer="schedule.7.end" wire:change="setSchedules"
               class="form-control form-control-rounded w-32">
        <x-jet-input-error for="schedule.7.start" class="mt-2"/>
        <x-jet-input-error for="schedule.7.end" class="mt-2"/>
    </div>
</div>
