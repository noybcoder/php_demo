<?php

require "functions.php";
require "Database.php";
require "router.php";
require "views/Response.php";

routeToController($uri, $routes);