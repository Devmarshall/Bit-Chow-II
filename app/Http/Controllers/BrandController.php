<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Controllers\Controller;
use Auth;
use Cloudder;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //

    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:brands|string|max:255',
            'description' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'founded_on' => 'required|date',
            'avatar' => 'mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);

        $user = Auth::user();

        $brand = new Brand();

        $brand->owner_id = $user->id;
        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        $brand->email = $request->input('email');
        $brand->founded_on = $request->input('founded_on');

        if ($request->file('avatar') !== null) {

            $avatar = $request->file('avatar')->getRealPath();

            $cloudinaryOptions = ['upload_preset' => 'zh5zmnzn'];
            list($width, $height) = getimagesize($avatar);
            Cloudder::upload($avatar, null, $cloudinaryOptions);

            $brand->avatar = Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);

        }

        $brand->save();

        return redirect(url('/home'))->with('success', 'Brand Created');
    }

    public function delete($brand_id)
    {
        
    }

}
