<?php

namespace App\Components;

use App\Models\CategoryProduct;

class Recursive
{
    private $htmlSelect = '';
    private $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    public function categoryRecursive($category_parent, $category_id = 0, $text = '')
    {
        foreach ($this->categories as $category) {
            if ($category['category_parent'] == $category_id) {
                if (!empty($category_parent) && ($category_parent == $category['category_id'])) {
                    $this->htmlSelect .= "<option selected value=\"" . $category['category_id'] . "\">" . $text . $category['category_name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value=\"" . $category['category_id'] . "\">" . $text . $category['category_name'] . "</option>";
                }
                $this->categoryRecursive($category_parent, $category['category_id'], $text . '--');
            }
        }

        return $this->htmlSelect;
    }
}
