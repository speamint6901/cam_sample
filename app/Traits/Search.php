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
        if (isset($params['genre_id'])) {
            return $query->where('genre_id', $params['genre_id']);
        }
        if (isset($params['category_id'])) {
            $category_id = $params['category_id'];
            return $query->whereHas('category', function($query) use ($category_id) {
                $query ->where('id', $category_id);
            });
        }
        if (isset($params['big_category_id'])) {
            $big_category_id = $params['big_category_id'];
            return $query->whereHas('category.big_category', function($query) use ($big_category_id) {
                $query->where('id', $big_category_id);
            })
            ->orWhereHas('genre.category.big_category', function($query) use ($big_category_id) {
                 $query->where('id', $big_category_id);               
            });
        }
    }
}
