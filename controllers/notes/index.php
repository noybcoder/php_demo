<?php

$config = require base_path("config.php");
$db = new Database($config["database"]);

$notes = $db->query("SELECT * FROM notes WHERE user_id = 1")->get();

$heading = "My Notes";

require base_path("views/notes/index.view.php");