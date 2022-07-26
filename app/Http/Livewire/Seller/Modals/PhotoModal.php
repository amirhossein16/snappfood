<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Food;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoModal extends Component
{
    use WithFileUploads;

    public $photos = [];
    public $photo;
    public $food;
    public $delPhoto = [];
    public $PhotoModaldelete = false;
    public $PhotoModalConfirm = false;
    protected $listeners = ['PhotoModal', 'deletePhoto'];

    protected $rules = [
        'photos.*' => 'image|mimes:jpg|max:102400'
    ];

    public function PhotoModal(Food $id)
    {
        $this->food = $id;
        $this->PhotoModalConfirm = true;
    }

    public function AddPhoto()
    {
        $this->validate();
        $row = 1;
        if (count($this->photos) < 6)
            foreach ($this->photos as $photo) {
                $restaurantName = str_replace(" ", "_", $this->food->title);
                $filename = $restaurantName . '_' . $row . '.' . $photo->extension();
                if (!Storage::disk('public')->exists("photos/Foods/$filename"))
                    $photo->storeAs('photos/Foods', $filename);
                $row++;
            }
        $this->emit('RefreshTable');
        $this->reset(['photos']);
        $this->PhotoModalConfirm = false;
    }

    public function deletePhoto()
    {
        for ($i = 1; $i < 6; $i++) {
            $restaurantName = str_replace(" ", "_", $this->food->title);
            $filename = $restaurantName . '_' . $i . '.jpg';
            if (Storage::disk('public')->exists("photos/Foods/$filename")) {
                Storage::disk('public')->delete("photos/Foods/$filename");
                File::deleteDirectory('storage/photos/public');
//                Storage::disk('temp')->delete("photos/Foods/$filename");
            }
        }
        $this->reset();
        $this->emit('RefreshTable');
        $this->PhotoModalConfirm = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.photo-modal');
    }
}
