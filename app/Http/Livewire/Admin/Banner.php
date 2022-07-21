<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Banner extends Component
{
    public $banner;

    public function BannerReader()
    {
        $this->banner = Storage::disk('public')->allFiles("photos/banners");
    }

    public function render()
    {
        $this->BannerReader();
        return view('livewire.admin.banner', [
            'image' => $this->banner
        ]);
    }
}
