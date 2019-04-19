<?php

namespace App\Traits;


trait Search {

    public function filterQueries($query, $params) {
        if (!is_null($params['keyword'])) {
            if ($params['keyword_type'] == 1) {
                return $query->join('brands', 'brands.id', '=', 'gears.brand_id')
                    ->where('gears.name', "like", "%".$params['keyword']."%")
                    ->orWhere('gears.discription', "like", "%".$params['keyword']."%")
                    ->orWhere('brands.name', 'like', '%'.$params['keyword']."%");
            } elseif ($params['keyword_type'] == 2) {
                return $query->where('name', "like", "%".$params['keyword']."%")
                    ->orWhere('description', "like", "%".$params['keyword']."%");
            } elseif ($params['keyword_type'] == 3) {
                return $query->join('brands', 'brands.id', '=', 'gears.brand_id')
                        ->where('brands.name', "like", "%".$params['keyword']."%");
            }
        }
        if (isset($params['brand_id'])) {
            $query->join('brands', 'brands.id', '=', 'gears.brand_id')
                ->where('brands.id', $params['brand_id']);
        }
        if (isset($params['genre_id'])) {
            return $query->join('genres', 'genres.id', '=', 'gears.genre_id')
                ->where('genres.id', $params['genre_id']);
        }
        if (isset($params['category_id'])) {
            return $query->join('category_has_gears', 'category_has_gears.category_id', '=', 'gears.category_id')
                ->where('category_has_gears.category_id', $params['category_id']);
        }
        if (isset($params['big_category_id'])) {
            return $query->leftJoin('category_has_gears', 'category_has_gears.category_id', '=', 'gears.category_id')
                ->join('categories', 'categories.id', '=', 'category_has_gears.category_id')
                ->join('big_categories', 'big_categories.id', '=', 'categories.big_category_id')
                ->leftJoin('genres', 'genres.id', '=', 'gears.genre_id')
                ->join('categories', 'categories.id', '=', 'genres.category_id')
                ->join('big_categories', 'big_categories.id', '=', 'categories.big_category_id')
                ->where('big_categories.id', $params['big_category_id']);
        }
    }
}
