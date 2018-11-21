<?php

namespace App\Http\Controllers\Smartmd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function imSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|max:4096|image'
        ]);
        if ($validator->passes()) {
            $temp = $request->file('image');
            $name = $temp->hashName();
            $im = Image::make($temp->getPathname());
            $width = $im->width();
            $height = $im->height();
            if ($width > 1200) {
                $scale = 1200 / $width;
                $width = ceil($width * $scale);
                $height = ceil($height * $scale);
                $im->resize($width, $height);
            }
            $im->save(config('smartmd.image.root') . '/' . $name, 80);
            return response()->json(
                [
                    'path' => config('smartmd.image.url') . '/' . $name,
                    'size' => [
                        'width' => $width,
                        'height' => $height
                    ],
                    'message' => '图片上传成功'
                ]
            );
        }
        return response()->json(['message' => $validator->errors()->first()],400);
    }
}
