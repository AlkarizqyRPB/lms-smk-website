<?php

namespace App\Repositories;

use App\Models\Category;
use App\Traits\FileUploadTrait;

class CategoryRepository{

    use FileUploadTrait; // Use the FileUploadTrait

    public function saveCategory($data, $image){
      $category = new Category();

      // Handle File Upload
      if($image){
        $data['image'] = $this->uploadFile($image, 'category', $category->image);
      }

      $category->create($data);
      return $category;
    }

    public function updateCategory($data, $image, $id){
      $category = Category::find($id);

      // Handle File Upload
      if($image){
        $data['image'] = $this->uploadFile($image, 'category', $category->image);
      }

      $category->update($data);
      return $category;
    }
}