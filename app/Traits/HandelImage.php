<?php

namespace App\Traits;

use http\Env\Request;
use Intervention\Image\Facades\Image;

trait HandelImage
{
    public function createImage($request, $product)
    {
        if ($product) {
            $imageName = $this->saveImage($request);
            $product->update(['image' => $imageName]);
        }
    }

    public function updateImage($request, $currentImage)
    {
        $imageName = $currentImage;
        if ($this->isVeryFileImage($request)) {
            $this->delete($currentImage);
            $imageName = $this->saveImage($request);
        }

        return $imageName;
    }


    public function delete($imageName)
    {
        if ($imageName && file_exists(PRODUCT_PATH . $imageName)) {
            unlink(PRODUCT_PATH . $imageName);
        }
    }

    public function saveImage($request)
    {
        $imageName = '';
        if ($this->isVeryFileImage($request)) {
            $image = $request->file('image');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(PRODUCT_PATH . $imageName);
        }

        return $imageName;
    }

    public function isVeryFileImage($request)
    {
        return $request->hasFile('image');
    }
}

