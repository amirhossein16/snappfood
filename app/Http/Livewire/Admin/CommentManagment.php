<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;

class CommentManagment extends Component
{
    public $reject;
    protected $listeners = ['RefreshTable' => 'rejectComment'];

    public function rejectComment()
    {
        $this->reject = Comment::where('status', 'reject')->get();
    }

    public function render()
    {
        $this->rejectComment();
        return view('livewire.admin.comment-managment', [
            'rejectComments' => $this->reject
        ]);
    }
}
