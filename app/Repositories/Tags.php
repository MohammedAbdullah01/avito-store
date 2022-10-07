<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\Interfaces\TagsRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Tags implements TagsRepository
{
    public $tag;
    
    public function __construct(Tag $tag)
    {
        return $this->tag = $tag;
    }

    public function getAll()
    {
        $tags  = $this->tag::withCount('products')->latest()->get();
        return $tags;
    }


    public function getTag($slug)
    {
        $tags  = $this->tag::where('slug', $slug)->with('products')->firstOrfail();
        return $tags;
    }


    public function store($request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => "required|string|between:3,15|unique:tags,name",
        ]);

        if ($validator->fails()) {
            Toastr::error('There is something not right');
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $tag = $this->tag::create([

            'name'        => $request->post('name'),
            'slug'        => Str::slug($request->post('name')),

        ]);

        Toastr::success('Successfully Created tag');
        return redirect()->back();
    }


    public function update($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'        => "required|string|between:3,15|unique:tags,name,$request->id",
        ]);

        if ($validator->fails()) {
            Toastr::error('There is something not right');
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $tag = $this->tag::findOrFail($id);

        $tag->update([

            'name'        => $request->post('name'),
            'slug'        => Str::slug($request->post('name')),

        ]);
        Toastr::success('Successfully Updated Tags');
        return redirect()->back();
    }


    public function destory($id)
    {
        $tag = $this->tag::findOrFail($id);
        $tag->delete();
        Toastr::success('Successfully Deleted Tags');
        return redirect()->back();
    }
}
