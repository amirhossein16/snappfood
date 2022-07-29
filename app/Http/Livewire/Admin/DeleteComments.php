<?php

namespace App\Http\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;

class DeleteComments extends Component
{
    public $comments;
    protected $listeners = ['RefreshTable' => 'deleteComment'];

    public function deleteComment()
    {
        $this->comments = Comment::onlyTrashed()->get();
    }

    public function render()
    {
        $this->deleteComment();
        return view('livewire.admin.delete-comments', [
            'comments' => $this->comments
        ]);
    }
}
