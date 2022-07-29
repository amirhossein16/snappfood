<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\Comment;
use Livewire\Component;

class RestoreComment extends Component
{
    public $modalHeading = '';
    public $modalMessage = '';
    public $RestoreCommentModal = false;
    public $restoreComment;

    protected $listeners = ['RestoreComment'];

    public function RestoreComment($id, $modalHeading, $modalMessage)
    {
        $this->restoreComment = $id;
        $this->modalHeading = $modalHeading;
        $this->modalMessage = $modalMessage;
        $this->RestoreCommentModal = true;
    }

    public function Restore()
    {
        Comment::withTrashed()->find($this->restoreComment)->restore();
        $this->RestoreCommentModal = false;
        $this->emitTo('livewire-toast', 'show', 'نظر با موفقیت بازگردانی شد :)');
        $this->emit('RefreshTable');
    }

    public function render()
    {
        return view('livewire.admin.modals.restore-comment');
    }
}
