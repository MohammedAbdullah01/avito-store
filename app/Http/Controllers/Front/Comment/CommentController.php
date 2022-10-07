<?php

namespace App\Http\Controllers\front\Comment;

use App\Http\Controllers\Controller;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private CommentRepository $commentRepo)
    {
        $this->comment = $commentRepo;
    }

    public function store(Request $request)
    {
        $this->commentRepo->storeData($request);
        return redirect()->back()->with('success', 'Successfully Added Comment');
    }

    public function update(Request $request, $id)
    {
        $comments = $this->commentRepo->updateData($request, $id);
        return redirect()->back()->with('success', 'Successfully Updated Comment');
    }

    /**
     * @param  int|string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->commentRepo->destroyData($id);
        return redirect()->back()->with('success', 'Successfully Deleted Comment');
    }
}
