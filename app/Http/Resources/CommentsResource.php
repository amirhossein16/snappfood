<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class CommentsResource extends JsonResource
{
    public $response;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'author' => CommentNameResource::collection(User::where('id', $this->user_id)->get()),
            'foods' => FoodCommentResource::collection(\App\Models\Food::where('restaurant_detail_id', $this->id)->get()),
            'created_at' => $this->created_at,
            'score' => $this->score,
            'content' => $this->opinion,
//            'response' => $this->when(empty($res), function () {
//                return CommentResponseResource::collection(Comment::where('id', DB::table('parent_child_comment')->where('parent_comment_id', $this->id)->get()->first()->child_comment_id)->get());
//            })
        ];
    }
}
