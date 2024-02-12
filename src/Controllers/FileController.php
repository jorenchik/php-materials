<?php

namespace Controllers;

use Utils\Request;

class FileController
{
    public static function fileUploadPage($request,)
    {
        Request::renderTemplate($request, "fileUpload");
    }

    public static function fileUpload($request,)
    {
        $file = $_FILES["file"];
        $uploadedFileTempName = $file["tmp_name"];
        // var_dump($file);
        // exit();
        $uploadedFileName =  $file["full_path"];
        $uploadedFilePath = $uploadedFileTempName . "/"  . $file["full_path"];
        $storedPath = MEDIA_PATH . "/$uploadedFileName";
        if (file_exists($storedPath)) {
            $pattern = '/^.+-(\d+)\.\w+$/';
            var_dump(preg_match($pattern, $storedPath));
            if (preg_match($pattern, $storedPath, $matches)) {
                var_dump($matches);
            } else {
                $storedPath = preg_replace('/^(.+)(\.\w+)/', '$1-1$2', $storedPath);
            }
        }
        # move outide else once done
        if (move_uploaded_file($uploadedFileTempName, $storedPath)) {
            echo "Uploaded successfully";
        } else {
            echo "Not uploaded!";
        }
        echo $storedPath;
    }
}
