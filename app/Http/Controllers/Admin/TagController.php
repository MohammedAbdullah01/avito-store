<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TagsRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{

    private $tagRepositroy;

    public function __construct(TagsRepository $tagRepositroy)
    {
        $this->tagRepositroy = $tagRepositroy;
    }


    public function index()
    {
        return view(
            'admin.pages.tags.index',
            [
                'tags' => $this->tagRepositroy->getAll()
            ]
        );
    }


    public function store(Request $request)
    {
        return $this->tagRepositroy->store($request);
    }


    public function update(Request $request, $id)
    {
        return $this->tagRepositroy->update($request, $id);
    }


    public function destroy($id)
    {
        return $this->tagRepositroy->destory($id);
    }
}
