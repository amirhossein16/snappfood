<?php

namespace App\Http\Livewire\Seller\Modals;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowAndEditCommentModal extends Component
{
    public $comment;
    public $sellerComment;
    public $ShowAndEditConfirm = false;
    protected $listeners = ['ShowAndEdit'];

    protected $rules = ['sellerComment.opinion' => 'required|string'];

    public function ShowAndEdit(Comment $id)
    {
        $sellerId = DB::table('parent_child_comment')->where('parent_comment_id', $id->id)->get()->first()->child_comment_id;
        $this->comment = $id->opinion;
        $this->sellerComment = Comment::find($sellerId);
        $this->ShowAndEditConfirm = true;
    }

    public function editAnswer()
    {
        if (isset($this->sellerComment->id)){
            $this->sellerComment->save();
            $this->emitTo('livewire-toast', 'show', " پاسخ با موفقیت ویرایش شد :) ");
        }
        $this->emit('RefreshTable');
        $this->ShowAndEditConfirm = false;
    }

    public function render()
    {
        return view('livewire.seller.modals.show-and-edit-comment-modal');
    }
}
