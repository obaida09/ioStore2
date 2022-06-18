<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TagDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagDataTable $tags)
    {
        if (!auth()->user()->ability('admin', 'manage_tags, show_tags')) {
            return redirect('admin/index');
        }

        $title = 'Control Tags';
        return $tags->render('admin.tags.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->ability('admin', 'create_tags')) {
            return redirect('admin/index');
        }

        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        if (!auth()->user()->ability('admin', 'create_tags')) {
            return redirect('admin/index');
        }

        $data[] = $request->validated();
        $data['slug'] =  Str::slug($request->name);

        Tag::create($data);

        return redirect()->route('admin.tags.index')->with([
            'message' => 'Created successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.product_categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if (!auth()->user()->ability('admin', 'update_tags')) {
            return redirect('admin/index');
        }

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        if (!auth()->user()->ability('admin', 'update_tags')) {
            return redirect('admin/index');
        }
        $data = $request->validated();
        $data['slug'] =  Str::slug($request->name);

        $tag->update($data);

        return redirect()->route('admin.tags.index')->with([
            'message' => 'Updated successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if (!auth()->user()->ability('admin', 'delete_tags')) {
            return redirect('admin/index');
        }
        $tag->delete();

        return redirect()->route('admin.tags.index')->with([
            'message' => 'Deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
