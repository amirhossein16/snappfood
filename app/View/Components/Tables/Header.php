<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Header extends Component
{
    public $Category;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Category = "<h1>Category</h1>";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tables.header');
    }
}
