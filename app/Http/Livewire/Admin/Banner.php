<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Banner extends Component
{
    public $banner;
    protected $listeners = ['RefreshTable'];

    public function RefreshTable()
    {
        $this->banner = \App\Models\Banner::all();
    }

    public function render()
    {
        $this->RefreshTable();
        return view('livewire.admin.banner', [
            'image' => $this->banner
        ]);
    }
}
