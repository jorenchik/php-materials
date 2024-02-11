<?php

namespace Utils;

use Utils\Files;

class Request
{

    public static function renderTemplate($request, string $templateName, array $vars = []): string
    {
        $templateFiles = Files::list_directory_files(TEMPLATE_DIRECTORY, "php");
        $templateFileName = "$templateName.php";
        if (!in_array($templateFileName, $templateFiles)) {
            throw new \Exception("Template not found");
        }
        $templateFile = TEMPLATE_DIRECTORY . "/" . $templateFileName;
        extract($vars);
        ob_start();
        echo include($templateFile);
        $template = ob_get_clean();
        echo preg_replace("/(.*)\d$/", "$1", $template);
        return "";
    }

    public static function executeRoute($routes)
    {
        $currentRoute = $_SERVER["REQUEST_URI"];
        $found = false;
        foreach ($routes as $key => $value) {
            if (preg_match($key, $currentRoute, $matches)) {
                $vars = array_slice($matches, 1);
                $value($vars);
                $found = true;
                break;
            }
        }
        if (!$found) {
            echo MESSAGE_404;
        }
    }
}
