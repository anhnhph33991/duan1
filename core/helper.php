<?php
if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
}


if (!function_exists('upload_file')) {
    function upload_file($file, $pathFolderUpload)
    {
        $imagePath = $pathFolderUpload . time() . '-' . basename($file['name']);

        if (move_uploaded_file($file['tmp_name'], PATH_UPLOAD . $imagePath)) {
            return $imagePath;
        }

        return null;
    }
}
