<?php

use Utils\Request;
use Controllers\LoginController;
use Controllers\FileController;

$routes = [
    '/^\/$/' => fn ($vars) => Request::renderTemplate($_REQUEST, "main", []),
    '/^\/about$/' => fn ($vars) => Request::renderTemplate($_REQUEST, "about", []),
    '/^\/post\/(\d+)$/' => fn ($vars) => Request::renderTemplate($_REQUEST, "post", ['id' => $vars[0]]),
    '/^\/login$/' => fn ($vars) => LoginController::loginPage($_REQUEST, ...$vars),
    '/^\/file-upload$/' => fn ($vars) => FileController::fileUploadPage($_REQUEST, ...$vars),
    '/^\/files\/upload$/' => fn ($vars) => FileController::fileUpload($_REQUEST, ...$vars),

    '/^\/users\/login$/' => fn ($vars) => LoginController::loginUser($_REQUEST, ...$vars),
];
