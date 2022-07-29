<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AnswerCommentModal extends Component
{
    public $comment;
    public $comments;
    public $confirmAndAnswerCommentModal = false;
    protected $listeners = ['confirmAndAnswerComment'];

    protected $rules = [
        'comment.opinion' => 'string|required',
        'comments.response' => 'required',
    ];

    public function confirmAndAnswerComment(Comment $id)
    {
        $this->reset(['comment']);
        $this->comment = $id;
        $this->confirmAndAnswerCommentModal = true;
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
            'status' => 'confirm',
        ]);

        DB::table('parent_child_comment')->insert([
            'parent_comment_id' => $this->comment->id,
            'child_comment_id' => $res->id,
        ]);

        $this->comment->status = 'confirm';
        $this->comment->save();

        $this->emitTo('livewire-toast', 'show', 'نظر با موفقیت تایید و پاسخ شما ثبت شد :)');
        $this->emit('RefreshTable');
        $this->confirmAndAnswerCommentModal = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.answer-comment-modal');
    }
}
