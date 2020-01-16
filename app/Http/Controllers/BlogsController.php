<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Blog;
use Facades\App\Repository\Blogs;
use Illuminate\Support\Facades\Artisan;

use App\Http\Resources\Blog as BlogResource;
use App\Http\Requests;


class BlogsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', ['except' => ['show', 'index','apiFetch']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('vueMain');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $blog=$request->isMethod('put')?Blog::findOrFail
//        ($request->id):new Blog;
        $blog = new Blog;

        //$blog->id=$request->input('id');
        $blog->user_id = 1;
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        if ($blog->save()) {
            return new BlogResource($blog);
        }


//        $this->validate($request, [
//            'title' => 'required',
//            'content' => 'required'
//        ]);
//
//        //create blog
//
//        //Blog::create($request->all());
//        $blog = new Blog();
//        $blog->user_id = auth()->user()->id;
//        $blog->title = $request->input('title');
//        $blog->content = $request->input('content');
//        $blog->save();
//
//        Artisan::call('cache:clear');
//
//        return redirect('/')->with('success', 'New Task Created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::fetchone($id);
        //dd($blog);
        return new BlogResource($blog);
        //return view('blogs.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $blog = Blog::find($id);

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');

        if ($blog->save()) {
            return new BlogResource($blog);
        }


        //return 'index';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //api for delete

        $blog = Blog::find($id);

        if ($blog->delete()) {
            return new BlogResource($blog);
        }


//        //initial implementation without vue
//        $blog = Blog::find($id);
//        $blog->delete();
//
//        Artisan::call('cache:clear');
//        return redirect('/home')->with('success', ' Task Deleted');

    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function apiFetch()
    {
        $blogs = Blogs::all();

        return BlogResource::collection($blogs);
    }


}
