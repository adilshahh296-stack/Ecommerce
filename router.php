<?php
/**
 * Laravel Development Server Router
 * Handles asset versioning query strings properly
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Strip version query parameters from asset requests
if (preg_match('/\.(css|js|woff2|woff|ttf|otf|eot|svg|png|jpg|jpeg|gif|ico)(\?.*)?$/i', $uri)) {
    // Remove query string to get actual file path
    $file_path = parse_url($uri, PHP_URL_PATH);
    $file = __DIR__ . '/public' . $file_path;
    
    if (is_file($file)) {
        // Serve the file directly
        return false;
    }
}

// For other requests, let Laravel handle it
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

require_once __DIR__ . '/public/index.php';
?>
