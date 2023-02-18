<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    // ----------------------------------------------
    // Query Scope
    // create shortcuts for really complex operations
    // ----------------------------------------------



    public function index()
    {
        //
        // $posts = Post::all();

        // this will be showing the latests posts
        // $posts = Post::latest()->get();

        // this will be showing the id as ascending order


        // this will be showing the id as ascending order
        $posts = Post::latestById();
        return view('posts.index', compact('posts'));
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
    public function store(CreatePostRequest $request)
    {

        // this will return a temporary file path that continuously keeps on changing
        // return $request->file('file');


        // this will result it as the original name and the size
        $file = $request->file('file');
        echo "<br>";
        echo $file->getClientOriginalName();
        echo "<br>";
        echo $file->getSize();

        // advanced validation class added so no need

        // $this->validate($request, [
        //     'title' => 'required|max:10',
        // ]);




        // return all stuff
        // return $request->all();

        // return the title just
        // return $request->title;

        // post the data prc # 1
        // Post::create($request->all());
        // return redirect('/posts');

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
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
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
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
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
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
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
