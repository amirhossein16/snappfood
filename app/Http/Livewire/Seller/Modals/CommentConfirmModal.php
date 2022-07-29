<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Comment;
use Livewire\Component;

class CommentConfirmModal extends Component
{
    public $comment;
    public $ConfirmCommentModal = false;
    protected $listeners = ['ConfirmModal', 'CancelConfirming'];

    public function ConfirmModal(Comment $id)
    {
        $this->ConfirmCommentModal = true;
        $this->comment = $id;
    }

    public function ConfirmModalComment()
    {
        $this->comment->status = 'confirm';
        $this->comment->save();

        $this->ConfirmCommentModal = false;
        $this->emitTo('livewire-toast', 'show', 'نظر با موفقیت تایید شد :)');
        $this->emit('RefreshTable');
    }

    public function render()
    {
        return view('livewire.seller.modals.comment-confirm-modal');
    }
}
