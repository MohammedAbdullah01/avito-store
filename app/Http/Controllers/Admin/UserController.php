<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FavouriteProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate();
        return view('admin.pages.users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $path_photo_user = public_path('storage/users/' . $user->avatar);

        if (File::exists($path_photo_user)) {
            File::delete($path_photo_user);
        }
        $save_data = $user->delete();
        if ($save_data) {
            Toastr::success('Sueessfully Deleted User');
            return redirect()->back();
        } else {
            Toastr::error('There is something not right');
            return redirect()->back();
        }
    }
}
