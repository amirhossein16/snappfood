<?php

namespace App\Http\Livewire\Seller;

use Livewire\Component;

class WeekOpeningPanel extends Component
{
    public $schedule;
    public $time;
    public $result = [];
    protected $rules = [
        'schedule.1.start' => 'required'
    ];


    public function mount()
    {
        $this->schedule = auth()->user()->restaurantDetail->WeekOpeningTime->map(function ($value) {
            $this->result['start'] = $value->start;
            $this->result['end'] = $value->end;
            $this->result['day'] = $value->day;
            collect($this->result['day'])->map(function ($value) {
                $days = ['saturday' => 1, 'sunday' => 2, 'monday' => 3, 'tuesday' => 4, 'wednesday' => 5, 'thursday' => 6, 'friday' => 7];
                $this->result['day'] = $days[$value];
            });
            return $this->result;
        });
        $this->schedule = $this->schedule->keyBy('day')->map(function ($value) {
            unset($value['day']);
            return $value;
        });
    }

    public function updated($time)
    {
        $this->validateOnly($time);
    }

    public function setSchedule()
    {
        $this->emit('setSchedule', $this->schedule);
    }

    public function render()
    {
        return view('livewire.seller.week-opening-panel');
    }
}
