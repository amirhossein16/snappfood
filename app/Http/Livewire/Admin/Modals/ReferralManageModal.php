<?php

namespace App\Http\Livewire\Admin\Modals;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReferralManageModal extends Component
{
    public $comments;
    public $comment;
    public $AnswerManageModalConfirm = false;
    protected $listeners = ['AnswerManageModal'];

    protected $rules = [
        'comment.opinion' => 'string|required',
        'comments.response' => 'required',
    ];

    public function AnswerManageModal(Comment $id)
    {
        $this->AnswerManageModalConfirm = true;
        $this->comment = $id;
    }

    public function saveAnswer()
    {
        $this->validate();

        $res = Comment::create([
            'user_id' => auth()->user()->id,
            'orders_id' => $this->comment->orders_id,
            'restaurant_detail_id' => $this->comment->restaurant_detail_id,
            'opinion' => $this->comments['response'],
            'score' => null,
            'status' => 'suspended',
        ]);

        DB::table('parent_child_comment')->insert([
            'parent_comment_id' => $this->comment->id,
            'child_comment_id' => $res->id,
        ]);

        $this->comment->status = 'suspended';
        $this->comment->save();

        $this->emitTo('livewire-toast', 'show', 'نظر با موفقیت به فروشنده بازگشت داده شد :)');
        $this->emit('RefreshTable');
        $this->AnswerManageModalConfirm = false;
    }

    public function render()
    {
        return view('livewire.admin.modals.referral-manage-modal');
    }
}
