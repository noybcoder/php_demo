<?php

const BASE_PATH = __DIR__ . '/../';

require (BASE_PATH . "functions.php");
require base_path("Database.php");
require base_path("router.php");
require base_path("views/Response.php");

routeToController($uri, $routes);