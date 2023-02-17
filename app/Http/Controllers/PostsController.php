<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return all stuff
        // return $request->all();

        // return the title just
        // return $request->title;

        // post the data prc # 1
        Post::create($request->all());
        return redirect('/posts');

        // post the data prc # 2
        // $input = $request->all();
        // $input['title'] = $request->title;
        // Post::create($request->all());

        // post the data prc # 3
        // $post = new Post;
        // $post->title = $request->title;
        // $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function idPassing($id)
    {
        return "The id passed is " . $id;
    }

    public function contact()
    {

        $people = ["Shad", "Reza", "Sidratul", "Muntaha", "Tuba"];

        return view('contact', compact('people'));
    }

    public function passName($name, $age, $misc)
    {
        // return view('post')->with('NAME', $name);
        return view('post', compact('name', 'age', 'misc'));
    }
}
