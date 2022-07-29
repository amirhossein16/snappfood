<?php

namespace App\Http\Livewire\Seller\Modals;

use Livewire\Component;
use Livewire\WithFileUploads;

class RestaurantProfileModal extends Component
{
    use WithFileUploads;

    public $photo = [];
    public $confirmRestaurantProfileModal = false;
    protected $listeners = ['OpenProfileModal'];

    protected $rules = ['photo' => 'required'];

    public function OpenProfileModal()
    {
        $this->confirmRestaurantProfileModal = true;
    }

    public function EditProfilePhoto()
    {
        $this->validate();

        $restaurantName = str_replace(" ", "_", auth()->user()->restaurantDetail->name);
        $filename = $restaurantName . '.' . $this->photo[0]->extension();

        $this->photo[0]->storeAs('photos/Restaurant', $filename);

        if (isset(auth()->user()->restaurantDetail->id)) {
            auth()->user()->restaurantDetail->save();
            $this->emitTo('livewire-toast', 'show', 'تصویر با موفقیت بروز شد :)');
        }
        $this->reset(['photo']);
        $this->confirmRestaurantProfileModal = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.restaurant-profile-modal');
    }
}
