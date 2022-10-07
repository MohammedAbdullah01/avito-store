<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(private CommentRepository $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = $this->commentRepo->getAll();
        return view('admin.pages.comments.index', compact('comments'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
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
