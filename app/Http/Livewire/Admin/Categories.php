<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Categories extends Component
{
    public $confirmingProductDeletion = false;
    public $confirmingProductUpdate = false;

    public function confirmProductAdd()
    {
        $this->confirmingProductUpdate = true;
    }

    public function confirmProductEdit()
    {
        $this->confirmingProductUpdate = true;
    }

    public function confirmProductDeletion()
    {
        $this->confirmingProductDeletion = true;
    }

    public function deleteProduct()
    {
        dd('deleteProduct');
    }

    public function render()
    {
        return view('livewire.admin.categories');
    }
}
