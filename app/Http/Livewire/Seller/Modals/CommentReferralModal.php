<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Comment;
use Livewire\Component;

class CommentReferralModal extends Component
{
    public $comment;
    public $referralCommentModal = false;
    protected $listeners = ['referralComment'];

    public function referralComment(Comment $id)
    {
        $this->resetErrorBag();
        $this->comment = $id;
        $this->referralCommentModal = true;
    }

    public function referralModalComment()
    {
        $this->comment->status = 'reject';
        $this->comment->save();

        $this->emit('RefreshTable');
        $this->referralCommentModal = false;
        $this->emitTo('livewire-toast', 'showWarning', " با موفقیت ارجاع داده شد :) ");
    }

    public function render()
    {
        return view('livewire.seller.modals.comment-referral-modal');
    }
}
