<?php

namespace App\Http\Controllers;

use App\Brand;
use App\follower;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Cloudder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function follow($brand_id)
    {
        $user_id = Auth::user()->id;
        $brand = Brand::where('id', $brand_id)->first();

        $follower = new follower();

        $follower->brand_id = $brand_id;
        $follower->user_id = $user_id;

        $follower->save();

        return $brand->name . ' followed successfully';

    }

    public function unfollow($brand_id)
    {
        $user_id = Auth::user()->id;
        $brand = Brand::where('id', $brand_id)->first();

        $follower = follower::where('user_id', $user_id)->where('brand_id', $brand_id)->first();

        $follower->delete();

        return $brand->name . ' unfollowed successfully';

    }

    public function updateProfile(Request $request)
    {

        $this->validate($request, [
            'f_name' => 'required|string|max:191',
            'l_name' => 'required|string|max:191',
            'user_handle' => 'required|string|max:191',
            'avatar' => 'mimes:jpeg,bmp,jpg,png|between:1,6000',
        ]);

        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        if ($request->file('avatar') !== null) {
            $cloudinaryOptions = ['upload_preset' => 'doz0wmeb'];
            $user->avatar = $this->uploadImg($request->file('avatar'), $cloudinaryOptions);
        }

        $user->f_name = $request->input('f_name');
        $user->l_name = $request->input('l_name');
        $user->user_handle = $request->input('user_handle');

        $user->save();

        return redirect(url('/profile/my/main/edit'))->with('success', 'Brand Created');
    }

    private function uploadImg($img, $options)
    {
        $img_src = $img->getRealpath();
        list($width, $height) = getimagesize($img_src);
        Cloudder::upload($img_src, null, $options);
        $url = Cloudder::secureShow(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);
        return $url;
    }

}
