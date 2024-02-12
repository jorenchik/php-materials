<?php

// Define the file path (absolute path or relative to the script)
$filePath = 'path/to/your/file.pdf'; // Ensure this is the correct path to your file

// Check if the file exists
if (file_exists($filePath)) {
    // Determine if the file should be downloaded or viewed inline
    $download = isset($_GET['download']) ? true : false;

    // Set the appropriate Content-Type for the file
    $contentType = 'application/pdf'; // Change this according to your file's MIME type

    // Use Content-Disposition: attachment to force a download
    // Use Content-Disposition: inline to display in the browser (if supported)
    $disposition = $download ? 'attachment' : 'inline';

    // Set the headers
    header('Content-Type: ' . $contentType);
    header('Content-Disposition: ' . $disposition . '; filename="' . basename($filePath) . '"');
    header('Content-Length: ' . filesize($filePath));

    // Clear any previous output
    ob_clean();
    flush();

    // Read the file and output its contents
    readfile($filePath);

    exit;
} else {
    // Handle the error if the file does not exist
    echo 'File not found.';
}
?>
