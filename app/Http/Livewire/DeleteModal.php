<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteModal extends Component
{
    protected $listeners = ['DeleteModal' => 'deleteMethod'];

    public $confirmingCategoryDeletion = false;
    public $data;

    public function deleteMethod($id)
    {
        $this->confirmingCategoryDeletion = true;
        $this->data = $id;
    }

    public function CandelDelete()
    {
        $this->confirmingCategoryDeletion = false;
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
