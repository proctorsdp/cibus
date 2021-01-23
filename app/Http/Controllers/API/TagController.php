<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tag as ResourceTag;
use App\Http\Resources\TagCollection;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = request('paginate') == 'false' ? 1000000 : 15;
        $search = '%' . request('search') . '%';
        $tags = Tag::where('name', 'LIKE', $search)
            ->orWhere('description', 'LIKE', $search)
            ->orderBy('name')
            ->paginate($pages);
        return new TagCollection($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTag = Tag::create($request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]));

        return new ResourceTag($newTag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $tag->update($request->all());

        return new ResourceTag($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        return $tag->delete();
    }
}
