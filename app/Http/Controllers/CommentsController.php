<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|min:1|max:48'
        ]);

        $data = [
            'user_id' => Auth::id(),
            'body' => $request->get('body'),
            'answer_id' => $request->get('answer_id')
        ];

        if (Comment::create($data)) {
            return back();
        }
    }
}
