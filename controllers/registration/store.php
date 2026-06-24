<?php

use Core\Database;
use Core\App;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email.';
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please enter a password with at least 7 characters and at most 255 characters.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}