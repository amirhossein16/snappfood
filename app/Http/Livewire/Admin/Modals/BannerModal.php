<?php

namespace App\Http\Livewire\Admin\Modals;

use Livewire\Component;
use Livewire\WithFileUploads;

class BannerModal extends Component
{
    use WithFileUploads;

    public $picture;
    public $img;
    public $EditConfirmModal = false;
    protected $listeners = ['EditModalConfirm'];

    protected $rules = [
        'picture.*' => 'image|mimes:jpg,png|max:2048'
    ];

    public function EditModalConfirm($id)
    {
        $this->EditConfirmModal = true;
        $this->img = $id;
    }

    public function AddBanner()
    {
        dd($this, $this->picture);
    }

    public function render()
    {
        return view('livewire.admin.modals.banner-modal');
    }
}
