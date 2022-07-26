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
        $this->comment->confirm = 2;
        $this->comment->save();
        $this->referralCommentModal = false;
        $this->emitTo('livewire-toast', 'show', " با موفقیت ارجاع داده شد :) ");
    }

    public function render()
    {
        return view('livewire.seller.modals.comment-referral-modal');
    }
}
