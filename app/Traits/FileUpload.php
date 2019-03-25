<?php

namespace App\Traits;


trait FileUpload {


    public function putFile($request, $params) {
        $files = $request->file();
        if (empty($files)) {
            return $params;
        }

        foreach ($files as $key => $file) {
            $params[$key] = $request->file($key)->store($key.'s');
        }

        return $params;
    }

}
