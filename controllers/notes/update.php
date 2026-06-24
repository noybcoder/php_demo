<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_POST["id"]
])->findOrFail();

authorize($note["user_id"] === $currentUserId);

$errors = [];

if (! Validator::string($_POST['about'], 1, 200)) {
    $errors['body'] = 'The content should have at least 1 character and not more than 200 characters.';
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' =>$_POST['about'],
    'id' => $_POST['id']
]);

header('location: /notes');
exit();