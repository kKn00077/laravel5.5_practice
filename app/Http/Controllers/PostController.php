<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class PostController extends Controller
{
    //
    public function create()
    {
        $posts = Post::with(['tags'])->get();

        // compact -> 변수명(여러개)을 적으면 그만큼의 변수를 배열로 만들어줌
        return view('posts.create', compact('posts'));
    }

    public function store(Request $request)
    {
        // user 모델에 있는 posts 관계를 가져와 post 모델을 저장한다
        // request에서 받아온 데이터 중 오로지 title 데이터로 이용해 post 모델을 저장
        $post = $request->user()->posts()->create($request->only(['title']));

        // 태그 , 분리, 공백제거, 길이체크
        $tags = explode(',', $request->tags);
        $tags = array_map('trim', $tags);
        $tags = array_filter($tags, 'strlen');

        foreach ($tags as $tag) {
            // name 값이 이미 테이블에 있으면 update
            // 없으면 insert
            $tag = Tag::updateOrCreate([
                'name' => $tag
            ]);

            // 중간테이블 post_tag에 저장
            $post->tags()->attach($tag->id);
        }

        return redirect()->back();
    }
}
