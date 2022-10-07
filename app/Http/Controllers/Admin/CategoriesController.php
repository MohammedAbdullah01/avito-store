<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.pages.categories.index', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->categoryRepository->storeData($request);
        return redirect()->back()->with('success', 'Category Created Successfully');
    }


    public function update(Request $request, $id)
    {
        $this->categoryRepository->updateData($request, $id);
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }



    public function destroy($id)
    {
        $this->categoryRepository->destroyData($id);
        return redirect()->back()->with('success', 'Category Deleted Successfully ');

    }
}
