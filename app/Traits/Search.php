<?php

namespace App\Traits;


trait Search {

    public function filterQueries($query, $params) {
        if (!is_null($params['keyword'])) {
            $keyword = $params['keyword'];
            if ($params['keyword_type'] == 1) {
                return $query->whereHas('brand', function($query) use ($keyword) {
                    $query->where('name', 'like', '%'.$keyword.'%');
                })
                ->orWhere('name', "like", "%".$keyword."%")
                ->orWhere('discription', "like", "%".$keyword."%");
            } elseif ($params['keyword_type'] == 2) {
                return $query->where('name', "like", "%".$params['keyword']."%")
                    ->orWhere('discription', "like", "%".$params['keyword']."%");
            } elseif ($params['keyword_type'] == 3) {
                return $query->whereHas('brand', function($query) use ($keyword) {
                    $query->where('name', 'like', '%'.$keyword.'%');
                });
            }
        }

        if (isset($params['brand_id'])) {
            $query->where('brand_id', $params['brand_id']);
        }

        if (isset($params['category_type']) && $params['category_type']) {
            $category_type = $params['category_type'];
            $category_id = $params['category_id'];
            if ($category_type == 3) {
                return $query->where('genre_id', $category_id);
            } elseif ($category_type == 2) {
                return $query->whereHas('category', function($query) use ($category_id) {
                    $query->where('category_id', $category_id);
                })
                ->orWhereHas('genre.category', function($query) use ($category_id) {
                    $query->where('id', $category_id);
                });
            } else {
                return $query->whereHas('category.big_category', function($query) use ($category_id) {
                    $query->where('id', $category_id);
                })
                ->orWhereHas('genre.category.big_category', function($query) use ($category_id) {
                     $query->where('id', $category_id);
                });
            }
        }
    }
}
