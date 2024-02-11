<?php

namespace Utils;


class Files
{
    public static function list_directory_files(string $path, string $extension): array
    {
        $files = [];
        $directory =  opendir($path);
        while ($dir = readdir($directory)) {
            if (preg_match("/.+\.$extension/", $dir)) {
                array_push($files, $dir);
            }
        }
        return $files;
    }
}
