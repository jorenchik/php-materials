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
        var_dump($_FILES);
    }
}
