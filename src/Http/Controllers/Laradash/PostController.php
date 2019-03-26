<?php

namespace App\Http\Controllers\Laradash;

use App\Models\Laradash\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    protected $repository;

    public function __construct(Post $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->repository->orderBy('id', 'desc')->get();

        return view('laradash.action.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laradash.action.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => str_slug(request('title'), '-')]);
        $post = $this->repository->create($request->all());
        $post->addCategory($request->categories);
        $post->addTag($request->tags);
        return redirect()->back()->with('success', 'Data has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->repository->with('category')
            ->with('tag')->findOrFail($id);
        return view('laradash.action.posts.create', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->repository->findOrFail($id);
        $post->category()->delete();
        $post->tag()->delete();
        $post->delete();
        return redirect()->back()->with("success", "Post has  been deleted.");
    }
}
