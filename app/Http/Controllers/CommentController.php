<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //
    public function index()
    {
        // lazy loading 방식 -> n+1 문제가 생김 
        // 1+n == 외래키가 연결되어있는 다른 테이블의 데이터를 불러오기 위해 foreach를 사용해야함
        // 그만큼 쿼리 수행이 많아서 속도가 느려짐
        //$comments = Comment::all();

        // eager loading 방식
        $comments = Comment::with('blog')->get();


        return view('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
        Comment::create([
            'user_id' => $request->user()->id,
            'blog_id' => $request->blog_id,
            'body' => $request->body
        ]);

        return redirect()->back();
    }
}
