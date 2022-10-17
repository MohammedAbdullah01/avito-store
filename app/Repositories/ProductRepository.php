<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ICrudRepository;
use App\Repositories\trait\Uploading;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\orderProduct;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductRepository implements ICrudRepository
{
    use Uploading;

    public function __construct(private Product $product)
    {
        $this->productModel = $product;
    }

    /**
     * @return Collection
     */
    public function getAll()
    {
        return $this->productModel::where('activate', 1)
            ->with('images', 'category', 'supplier')
            ->latest()
            ->paginate(16);
    }

    /**
     * @param string $slug
     * @return Collection
     */
    public function showData($slug)
    {
        return $this->productModel::where('slug', $slug)
            ->with('category', 'comments', 'supplier', 'images')
            ->withCount('comments')
            ->firstOrFail();
    }

    public function getRelatedProducts($slug)
    {
        $product = $this->showData($slug);
        return $this->productModel::where('category_id', $product->category_id)
        ->where('id','<>',$product->id )
            ->where('activate', 1)
            ->latest()
            ->limit(4)
            ->get();
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function storeData($request)
    {
        $request->validate($this->productModel::rules());

        $product = $this->productModel::create($this->data($request));

        $this->uploadFile($request->file('main_picture'), 'products', $product, 'main_picture', 'update');

        $this->uploadFiles($request->file('sub_images'),  $product->images, $product->images(),  'create', 'sub_images',  'products/sub_images');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function updateData($request, $pro)
    {
        $request->validate($this->productModel::rules($pro, 'nullable'));

        $product = $this->productModel::findOrFail($pro);

        $this->uploadFile($request->file('main_picture'), 'products', $product, 'main_picture', 'update');

        $this->uploadFiles($request->file('sub_images'),  $product->images, $product->images(),  'create', 'sub_images',  'products/sub_images');

        $product->update($this->data($request));
    }

    public function getInactiveProducts()
    {
        $inactiveProducts = $this->productModel::where('activate', 0)->with('images', 'category', 'supplier')->latest()->paginate();
        return $inactiveProducts;
    }

    public function setProductActivate($id)
    {
        $product = $this->productModel::findOrFail($id);
        $product->update([
            'activate' => 1
        ]);
        return $product;
    }

    /**
     * @param  int $id
     */
    public function destroyData($id)
    {
        $product = $this->productModel::findOrFail($id);

        $this->checkTheExistingFileToDelete('products',  $product->main_picture);
        $this->checkTheExistingFilesToDelete($product->images, 'products/sub_images',  'sub_images');
        $product->delete();
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function data($request)
    {
        return [
            'title'         => $request->post('title'),
            'slug'          => Str::slug($request->post('title')),
            'description'   => $request->post('description'),
            'price'         => $request->post('price'),
            'sale_price'    => $request->post('sale_price'),
            'quantity'      => $request->post('quantity'),
            'category_id'   => $request->post('category'),
            'color'         => $request->post('color'),
            'size'          => $request->post('size'),
            'supplier_id'   => Auth::guard('supplier')->id() ?? null,
            'admin_id'      => Auth::guard('admin')->id() ?? null,
        ];
    }

    public function getTopProductsOrderCount()
    {
        return orderProduct::select(
            'product_name',
            'product_id',
            'price',
            DB::raw('count(*) as product_count'),
            DB::raw('SUM(quantity) as sales')
        )->groupBy('product_name', 'product_id', 'price')->orderBy('product_count', 'DESC')->with('product')->limit(4)->get();
    }
}
