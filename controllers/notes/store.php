<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['about'], 1, 200)) {
    $errors['body'] = 'The content should have at least 1 character and not more than 200 characters.';
}

if (! empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['about'],
        'user_id' => 1
    ]);

    header('location: /notes');
    exit();
}
