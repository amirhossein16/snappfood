<?php

namespace App\Http\Livewire\Admin\Modals;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BannerModal extends Component
{
    use WithFileUploads;

    public $photo = '';
    public $confirmBannerAddModal = false;
    protected $listeners = ['confirmBannerAdd'];

    protected $rules = [
        'photo' => 'image|mimes:jpg,png|max:2048|dimensions:min_width=1600,min_height=400'
    ];

    public function confirmBannerAdd()
    {
        $this->confirmBannerAddModal = true;
    }

    public function AddBanner()
    {
        $this->validate();

        $BannerName = str_replace(" ", "_", $this->photo->hashName());
        $filename = $BannerName . '.' . $this->photo->getClientOriginalExtension();

        if (!Storage::disk('public')->exists("photos/Banners/$filename")) {

            \App\Models\Banner::create([
                'name' => $BannerName,
                'path' => "photos/Banners/$filename"
            ]);

            $this->photo->storeAs('photos/Banners', $filename);
            $this->confirmBannerAddModal = false;
            $this->emitTo('livewire-toast', 'show', 'ّبنر با موفقیت اضافه شد :)');
        }

        $this->emit('RefreshTable');
        $this->confirmBannerAddModal = false;
    }

    public function render()
    {
        return view('livewire.admin.modals.banner-modal');
    }
}
