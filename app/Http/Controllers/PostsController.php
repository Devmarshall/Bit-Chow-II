<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Carbon\Carbon;
use Cloudder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostsController extends Controller
{
    //

    public function create(Request $request)
    {

        $this->validate($request, [
            'brand_id' => 'required|integer:unsigned',
            'text' => 'required|max:255',
            'img' => 'mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);

        $post = new Post();

        $post->brand_id = $request->input('brand_id');
        $post->text = $request->input('text');
        $time = Carbon::now()->toDateTimeString();
        $Uid = Auth::user()->id;
        $hash = $request->input('brand_id') . $time . $Uid;
        $post->hash = Hash::make($hash, [
            'rounds' => 12,
        ]);

        if ($request->file('img') !== null) {
            $cloudinaryOptions = ['upload_preset' => 'zxuygtly'];
            $post->img = $this->uploadImg($request->file('img'), $cloudinaryOptions);
        }

        $post->save();

        return redirect(url('/home'))->with('success', 'Post Created');
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
