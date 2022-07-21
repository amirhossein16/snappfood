<?php

namespace App\Http\Livewire\Admin;

use App\Models\FoodParty;
use Livewire\Component;

class FoodPartyPanel extends Component
{
    public $foodParty;
    protected $listeners = ['reloadFoodPartyTable', 'ChangeStatus'];

    public function ChangeStatus(FoodParty $id)
    {
        if (!$id->status) {
            $id->status = true;
        } else {
            $id->status = false;
        }
        $id->save();
        $this->emit('reloadFoodPartyTable');
    }

    public function reloadFoodPartyTable()
    {
        $this->foodParty = FoodParty::all();
    }

    public function render()
    {
        $this->reloadFoodPartyTable();
        return view('livewire.admin.food-party-panel', [
            'FoodParty' => $this->foodParty
        ]);
    }
}
