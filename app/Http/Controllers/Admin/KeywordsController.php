<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddKeywordsRequest;
use App\Http\Requests\UpdateKeywordsRequest;
use App\Models\Keywords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeywordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.keywords.index')->with([
            "keywords" => Keywords::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.keywords.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddKeywordsRequest $request)
    {
        if($request->validated()){
            $data=$request->validated();
            $data['slug'] = Str::slug($request->name);
            Keywords::create($data);
            return redirect()->route('admin.keywords.index')->with([
                "success" => "Keyword created successfully"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keywords $keyword)
    {
        return view('admin.keywords.edit')->with([
            "keyword" => $keyword
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeywordsRequest $request, Keywords $keywords)
    {
        if($request->validated()){
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name);
            $keywords->update($data);
            return redirect()->route('admin.keywords.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keywords $keyword)
    {
        $keyword->delete();
        return redirect()->route('admin.keywords.index')->with([
            "success" => "Keyword deleted successfully"
        ]);
    }
}
