<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;

class AllComment extends Component
{
    public $comments;
    protected $listeners = ['RefreshTable' => 'allComment'];

    public function allComment()
    {
        $this->comments = Comment::where('user_id', '!=', 1)->get();
    }

    public function render()
    {
        $this->allComment();
        return view('livewire.admin.all-comment', [
            'AllComments' => $this->comments
        ]);
    }
}
