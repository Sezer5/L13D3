<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.article.index')->with([
            "articles" => Article::with(['category','keywords'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create')->with([
            "categories" => Category::all(),
            "keywords" => Keyword::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddArticleRequest $request)
    {
        if($request->validated()){
            $data = $request->validated();

            if($request->has('thumbnail')){
                $data['thumbnail'] = $this->saveImage($request->file('thumbnail'));
            }

            $article = Article::create($data);
            $article->keywords()->sync($request->keyword_id);

            return redirect()->route('admin.article.index')->with([
                "success" => "Article $request->title created successfully!"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function saveImage($file){
        $image_name = time().'_'.$file->getClientOriginalName();
        $file->storeAs('images/articles',$image_name,'public');
        return 'storage/images/articles/'.$image_name;
    }
}
