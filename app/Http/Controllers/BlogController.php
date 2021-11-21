<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{

    public function show($id)
    {
        // with를 사용할 경우 블로그 데이터에 댓글들 데이터도 담겨 view로 보내짐
        // ex) $blog->comments
        $blog = Blog::with(['comments'])->where('id', $id)->firstOrFail();
        
        return view('blogs.show', compact('blog'));
    }

    //
    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        // dd($request->url()); // 현재 이 메서드와 매핑되는 url 정보

        // $blog = new Blog;
        // $blog->user_id = $request->user()->id;
        // $blog->title = $request->title; // == $request->input('title');
        // $blog->description = $request->description; // == $request->input('description');
        // $blog->save();

        Blog::create([
            'user_id' => $request->user()->id,
            'title' =>  $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back(); 
        
        //return $request->all(); // 무슨 데이터를 입력했는지 확인할 수 있게 함 (= request에 담겨져 온 데이터)
        //dd($request->all()); // 무슨 데이터를 입력했는지 코드 형식으로 보게함 (return 사용 x)
    }
}
