<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\FoodParty;
use Livewire\Component;

class FoodPartyAddModal extends Component
{
    public $foodParty;
    public $confirmFoodPartyAddModal = false;

    protected $listeners = ['confirmFoodPartyAdd', 'EditModalConfirm' => 'confirmFoodPartyAdd'];

    public function confirmFoodPartyAdd(FoodParty $id)
    {
        $this->foodParty = $id;
        $this->confirmFoodPartyAddModal = true;
    }

    protected $rules = [
        'foodParty.foodPartyName' => 'required|min:5'
    ];

    public function addFoodPart()
    {
        $this->validate();
        if ($this->foodParty->id) {
            $this->foodParty->save();
            $this->emitTo('livewire-toast', 'show', " فودپارتی با موفقیت ویرایش شد :) ");
        } else
            FoodParty::create([
                'foodPartyName' => $this->foodParty->foodPartyName,
                'status' => false
            ]);
        $this->emit('RefreshTable');
        $this->emitTo('livewire-toast', 'show', " فودپارتی با موفقیت اضافه شد :) ");
        $this->confirmFoodPartyAddModal = false;
    }

    public function render()
    {
        return view('livewire.admin.modals.food-party-add-modal');
    }
}
