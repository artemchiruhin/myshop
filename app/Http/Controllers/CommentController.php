<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentFormRequest $request, Product $product)
    {
        $request->validated();
        Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'comment' => $request->comment
        ]);
        return back();
    }
}
