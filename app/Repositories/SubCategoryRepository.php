<?php


namespace App\Repositories;

use App\Models\SubCategory;

class SubCategoryRepository
{

    // New findSubCategory function
    public function findSubCategory($id)
    {
        return SubCategory::find($id);
    }


    public function saveSubCategory($data)
    {
       $subcategory = new SubCategory();

        // Save the subCategory
        $subcategory->create($data);

        return $subcategory;
    }

    public function updateSubCategory($data, $id)
    {
        $subcategory = SubCategory::find($id);

        $subcategory->update($data);

        return $subcategory;
    }
}