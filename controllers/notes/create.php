<?php

use Core\Database;
use Core\Validator;
require base_path('Core/Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validator();

    if (! Validator::string($_POST['about'], 1, 200)) {
        $errors['body'] = 'The content should have at least 1 character and not more than 200 characters.';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
            'body' => $_POST['about'],
            'user_id' => 1
        ]);
    }
}

view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
]);