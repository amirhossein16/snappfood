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
            'confirm' => true,
        ]);
        DB::table('parent_child_comment')->insert([
            'parent_comment_id' => $this->comment->id,
            'child_comment_id' => $res->id,
        ]);
        $this->comment->confirm = 1;
        $this->comment->save();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
        ]);
        $this->emit('reloadCommentTable');
        $this->confirmAndAnswerCommentModal = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.answer-comment-modal');
    }
}
