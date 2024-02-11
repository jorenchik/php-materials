<?php
// Autoload register function to setup built in autoload 
spl_autoload_register(function ($class) {
    // Project source directory, adopt it to point to the source directory
    $root = __DIR__ . '/src/';
    // Convert namespace to file path
    $file = $root . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});

// Using a class defined in  
use MyNamespace\MyClass;

MyClass::myFunction();
