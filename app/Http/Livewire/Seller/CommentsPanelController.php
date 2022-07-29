<?php

namespace App\Http\Livewire\Seller;

use App\Models\Comment;
use Livewire\Component;

class CommentsPanelController extends Component
{
    public $totlaComment;
    protected $listeners = ['RefreshTable'=>'reloadCommentTable'];

    public function reloadCommentTable()
    {
        $this->totlaComment = Comment::where([['restaurant_detail_id', '=', \auth()->user()->restaurantDetail->id], ['user_id', '!=', auth()->user()->id], ['user_id', '!=', 1]])->get();
    }

    public function render()
    {
        $this->reloadCommentTable();
        return view('livewire.seller.comments-panel-controller', [
            'Category' => $this->totlaComment
        ]);
    }
}
