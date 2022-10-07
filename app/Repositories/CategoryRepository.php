<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ICrudRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\trait\Uploading;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryRepository implements ICrudRepository
{
    use Uploading;


    public function __construct(private Category $ModelCategory)
    {
        $this->ModelsCategory = $ModelCategory;
    }


    /**
     * @return Collection
     */
    public function getAll()
    {
        return $this->ModelsCategory::withCount('products')->latest()->paginate();
    }

    /**
     * @param string $slug
     * @return Collection
     */
    public function showData($slug)
    {
        return $this->ModelsCategory::where('slug', $slug)->with('products')->withCount('products')->firstOrFail();
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function storeData($request)
    {
        $request->validate($this->ModelsCategory::rules());

        $category = $this->ModelsCategory::create($this->data($request));

        $this->uploadFile($request->file('avatar'), 'categories', $category, 'avatar', 'update');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  object $object
     */
    public function updateData($request, $object)
    {
        $request->validate($this->ModelsCategory::rules($object, 'nullable'));

        $category = $this->ModelsCategory::findOrFail($object);

        $this->uploadFile($request->file('avatar'), 'categories', $category, 'avatar', 'update');

        $category->update($this->data($request));
    }

    /**
     * @param  object $object
     */
    public function destroyData(object $object)
    {
        $product = $this->ModelsCategory::findOrFail($object);

        $product->delete();

        $this->checkTheExistingFileToDelete('categories',  $product->avatar);
    }

    public function data($request)
    {
        return [
            'name'        => $request->post('name'),
            'slug'        => Str::slug($request->post('name')),
            'description' => $request->post('description'),
        ];
    }






    // /**
    //  * @return Collection 
    //  */
    // public function getAll()
    // {
    //     $categories = $this->ModelsCategory::withCount('products')->latest()->paginate();
    //     return $categories;
    // }









    // /**
    //  * @return Collection 
    //  */
    // public function getAll()
    // {
    //     $categories = $this->ModelsCategory::withCount('products')->latest()->paginate();
    //     return $categories;
    // }

    // /**
    //  * @param string $slug
    //  */
    // public function getCategory(string $slug)
    // {
    //     return $this->ModelsCategory::where('slug', $slug)->with('products')->firstOrFail();
    // }

    // /**
    //  * @param Request $request
    //  */
    // public function store($request)
    // {
    //     $this->validated($request);

    //     $category = $this->ModelsCategory::create([
    //         'name'        => $request->post('name'),
    //         'slug'        => Str::slug($request->post('name')),
    //         'description' => $request->post('description'),
    //     ]);

    //     $this->uploading($request, $category);

    //     Toastr::success('Successfully Created Category');
    //     return redirect()->back();
    // }

    // /**
    //  * @param Request $request
    //  * @param int $id
    //  */
    // public function update($request, int $id)
    // {
    //     $this->validated($request, $request->id);

    //     $category = $this->ModelsCategory::findOrFail($id);

    //     $category->update([

    //         'name'        => $request->post('name'),
    //         'slug'        => Str::slug($request->post('name')),
    //         'description' => $request->post('description'),

    //     ]);

    //     $this->uploading($request, $category);

    //     Toastr::success('Successfully Updated Category');
    //     return redirect()->back();
    // }


    // public function destroy($id)
    // {
    //     $category = $this->ModelsCategory::findOrFail($id);
    //     $category->forceDelete();
    //     $this->deleteThePictureFromTheStoredFolder($category);

    //     Toastr::success('Successfully Deleted Category');
    //     return redirect()->back();
    // }

    // /**
    //  * @param Request $request
    //  * @param ModelsCategory $category
    //  */
    // private function uploading($request, ModelsCategory $category)
    // {
    //     if ($request->hasFile('avatar')) {
    //         if ($request->file('avatar')->isValid()) {

    //             $this->deleteThePictureFromTheStoredFolder($category);

    //             $avatar_name = time() . '_' . $request->post('name') . '.' . $request->avatar->extension();
    //             $request->avatar->storeAs('categories/', $avatar_name, 'public');

    //             $category->avatar = $avatar_name;
    //             $category->save();
    //         } else {
    //             Toastr::error('There Is Something Wrong With Uploading Photos');
    //             return redirect()->back();
    //         }
    //     }
    // }

    // /**
    //  * @param ModelsCategory $category
    //  */
    // private function deleteThePictureFromTheStoredFolder($category)
    // {
    //     $file = $category->avatar;
    //     $path_avatar = public_path('storage/categories/' . $file);

    //     if (File::exists($path_avatar)) {
    //         File::delete($path_avatar);
    //     }
    // }


}
