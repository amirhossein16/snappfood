<?php

namespace App\Http\Livewire\Seller;

use App\Models\Comment;
use App\Models\DiscountFood;
use App\Models\Food;
use App\Models\Orders;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CommentsPanelController extends Component
{
    public $comment;
    public $totlaComment;
    public $comments;
    public $discount;
    public $confirmingComment = false;
    public $referralComment = false;
    public $ConfirmAnswerComments = false;
    public $confirmingEditDiscount = false;
    /**
     * @var Authenticatable|mixed|null
     */
    public mixed $user;
    protected $listeners = ['reloadCommentTable'];

    protected $rules = [
        'comment.opinion' => 'string|required',
        'comments.response' => 'required',
    ];

    public function confirmCategoryAdd()
    {
        $this->reset(['comment']);
        $this->confirmingComment = true;
    }

    public function editDiscount()
    {
        if (isset($this->comment->id)) {
            $this->comment->save();
            $dis = DiscountFood::where('food_id', '=', $this->comment->id)->get()[0];
            $dis->discount_id = $this->discount['id'];
            $dis->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success', 'message' => 'دسته بندی با موفقیت بروزرسانی شد :)'
            ]);
        }
        $this->confirmingEditDiscount = false;
    }

    public
    function addDiscount()
    {
        $validatedData = $this->validate([
            'comment.title' => 'required',
            'discount.id' => 'required'
        ]);
        DiscountFood::create([
            'food_id' => $this->comment->id,
            'discount_id' => $this->discount['id']
        ]);
        $discountAdd = Food::find($this->comment->id);
        if ($discountAdd->off === null) {
            $discountAdd->off = true;
            $discountAdd->save();
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'دسته بندی با موفقیت اضافه شد :)'
        ]);
        $this->ConfirmAnswerComments = false;
    }

    public
    function confirmComment(Comment $id)
    {
        $this->resetErrorBag();
        $this->comment = $id;
        $this->confirmingComment = true;
    }

    public
    function AnswerComments(Comment $id)
    {
        $this->resetErrorBag();
        $this->comment = $id;
        $this->ConfirmAnswerComments = true;
    }

    public
    function confirmEditDiscount(Comment $id)
    {
        $this->resetErrorBag();
        $this->comment = $id;
        $this->confirmingEditDiscount = true;
    }

    public
    function confirmCategoryDeletion($id)
    {
        $this->confirmingComment = $id;
    }

    public function ConfirmModalComment(Comment $comment)
    {
        $comment->confirm = true;
        $comment->save();
        $this->confirmingComment = false;
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success', 'message' => 'کامنت با موفقیت تایید شد'
        ]);
    }

    public function reloadCommentTable()
    {
        $this->totlaComment = Comment::where([['restaurant_detail_id', '=', \auth()->user()->restaurantDetail->id], ['user_id', '!=', auth()->user()->id]])->get();
    }

    public function render()
    {
        $this->reloadCommentTable();
        return view('livewire.seller.comments-panel-controller', [
            'Category' => $this->totlaComment
        ]);
    }
}
