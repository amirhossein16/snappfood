<?php

namespace App\Http\Livewire\Admin\Charts;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Restaurant extends Component
{

    public function RestaurantchartJs()
    {
        $users = \App\Models\User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');
        $labels = $users->keys();
        $data = $users->values();

        return $RestaurantData[] = compact('labels', 'data');
    }

    public function render()
    {
        return view('livewire.admin.charts.restaurant',[
            'RestaurantchartJs' => $this->RestaurantchartJs()
        ]);
    }
}
