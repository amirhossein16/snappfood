<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Rap2hpoutre\FastExcel\FastExcel;

class AllUsers extends Component
{
    public $users;
    public $search;
    protected $listeners = ['ExportXlsx'];

    public function Users()
    {
        $this->users = User::where('name', '!=', null)->search(trim($this->search))->get();
    }

    public function ExportXlsx()
    {
        $users = User::where('name', '!=', null)->get()->map(fn($payment) => [
            'id' => $payment->id,
            'user_name' => $payment->name,
            'user_email' => $payment->email,
            'user_role' => $payment->role,
            'date' => Carbon::parse($payment->created_at)->format('Y/m/d H:i:s'),
        ]);
        return (new FastExcel($users))->download('users.xlsx');
    }

    public function render()
    {
        $this->Users();
        return view('livewire.admin.all-users', [
            'users' => $this->users
        ]);
    }
}
