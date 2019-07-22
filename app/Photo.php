<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Photo extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function uploadImage($image, $path)
    {
        if ($image) {
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenametostore = $filename . '_' . time() . '.' . $extension;
            $image->storeAs('public/category', $filenametostore);
            $thumbnailpath = public_path('storage/' . $path . '/' . $filenametostore);
            $img = Image::make($thumbnailpath)->resize(30, 30, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            return 'storage/' . $path . '/' . $filenametostore;
        }
        return null;
    }
}
