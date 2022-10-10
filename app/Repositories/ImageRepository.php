<?php


namespace App\Repositories;


use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageRepository
{

    private $thumbPath;
    private $imagePath;

    public function __construct()
    {
        $this->imagePath = public_path('images/');
        $this->thumbPath = public_path('images/thumbs/');
    }

    public function saveImages($request, $imgDimensions)
    {
        $image = $request->file('image');
        $name = time() . '.' . $image->extension();
        $img = InterventionImage::make($image->path());

        if (!file_exists($this->imagePath)) {
            mkdir($this->imagePath, 666, true);
        }
        if (!file_exists($this->thumbPath)) {
            mkdir($this->thumbPath, 666, true);
        }
        $img->widen($imgDimensions['imgWidth'])->heighten($imgDimensions['imgHeight'])->encode()->save($this->imagePath . $name);
        $img->widen($imgDimensions['thumbWidth'])->heighten($imgDimensions['thumbHeight'])->encode()->save($this->thumbPath . $name);
        return $name;
    }

    public function getInputs($request, $imgDimensions)
    {
        $inputs = $request->except(['image']);
        if($request->image) {
            $inputs['image'] = $this->saveImages($request, $imgDimensions);
        }
        return $inputs;
    }

    public function deleteImages($image)
    {
        File::delete([
            $this->imagePath . $image,
            $this->thumbPath . $image,
        ]);
    }

}
