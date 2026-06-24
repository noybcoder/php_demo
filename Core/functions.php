<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER["REQUEST_URI"] === $value;
}

function setClass($value) {
    return urlIs($value) ? "rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" : "rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white";
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort($status);
    }
}

function abort($status = RESPONSE::NOT_FOUND) {
    http_response_code($status);
    require base_path("views/{$status}.php");
    die();
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);
    require base_path('views/' . $path);
}