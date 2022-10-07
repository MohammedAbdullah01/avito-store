<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ICrudRepository;
use App\Models\Comment as commentModel;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements ICrudRepository
{
    public function __construct(private commentModel $commentModel ,private ProductRepository  $productRepo )
    {
        $this->commentModel = $commentModel;
        $this->productRepo  = $productRepo ;
    }


    /**
     * @return Collection
     */
    public function getAll()
    {
        $comments =  $this->commentModel::with('user', 'product')->latest()->paginate();
        return $comments;
    }

    public function getCommentsToProduct($slug)
    {
        $product = $this->productRepo->showData($slug);
        $comments = $product->comments()->with('user')->latest()->paginate();
        return $comments;
    }

    /**
     * @param string $slug
     * @return Collection
     */
    public function showData($slug)
    {
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function storeData($request)
    {
        $request->validate($this->commentModel::rules());

        $this->commentModel::create($this->data($request));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  object $id
     */
    public function updateData($request, object $object)
    {
        $request->validate($this->productModel::rules());

        $comment = $this->commentModel::findOrFail($object);
        $comment->update($this->data($request));
    }

    /**
     * @param  int $id
     */
    public function destroyData(object $object)
    {
        $comment = $this->productModel::findOrFail($object);
        $comment->destroy();
    }

    public function data($request)
    {
        return [
            'product_id' => $request->post('product_id'),
            'user_id'    => Auth::guard('web')->id(),
            'body'       => $request->post('comment'),
        ];
    }
}
