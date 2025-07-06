<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Traits\FileUploadTrait;

class SliderRepository{

    use FileUploadTrait; // Use the FileUploadTrait

    public function saveSlider($data, $image){
      $slider = new Slider();

      // Handle File Upload
      if($image){
        $data['image'] = $this->uploadFile($image, 'slider', $slider->image);
      }

      $slider->create($data);
      return $slider;
    }

    public function updateSlider($data, $image, $id){
      $slider = Slider::find($id);

      // Handle File Upload
      if($image){
        $data['image'] = $this->uploadFile($image, 'slider', $slider->image);
      }

      $slider->update($data);
      return $slider;
    }
}