<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Food;
use App\Models\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use JsonSerializable;

class CommentsResource extends JsonResource
{
    public $response;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|\Hamcrest\Core\IsNot|int
     */
    public function toArray($request)
    {
        $parent = DB::table('parent_child_comment')->where('parent_comment_id', $this->id)->get();
        if (!empty(DB::table('parent_child_comment')->where('parent_comment_id', $this->id)->get()->first())) {
            $id = DB::table('parent_child_comment')->where('parent_comment_id', $this->id)->get()->first()->child_comment_id;
            $this->response = Comment::where('id', $id)->get()->first();
        }
        if (!empty(Food::where('restaurant_detail_id', $this->id)->get()) && $this->score != null)
            return [
                'author' => CommentNameResource::collection(User::where('id', $this->user_id)->get()),
                'foods' => FoodCommentResource::collection(Food::where('restaurant_detail_id', $this->id)->get()),
                'created_at' => $this->created_at,
                'score' => $this->score,
                'content' => $this->opinion,
                'response' => $this->when(!empty($parent), function () {
                    return new CommentResponseResource($this->response);
                })
            ];
        else
            return e('-------');
    }
}
