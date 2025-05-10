<?php
session_start();
include_once("config.php");

if (isset($_POST['update'])) {
    // Get data from the form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Get password from the form

    // If password is provided, hash it before saving
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        // If no password is provided, keep the existing password in the database
        $hashedPassword = null;
    }

    // Prepare the update SQL query
    if ($hashedPassword) {
        // If password is being updated, include the password column in the update query
        $sql = "UPDATE users SET username=:username, name=:name, surname=:surname, email=:email, password=:password WHERE id=:id";
    } else {
        // If password is not being updated, omit the password column
        $sql = "UPDATE users SET username=:username, name=:name, surname=:surname, email=:email WHERE id=:id";
    }

    // Prepare the statement
    $prep = $connect->prepare($sql);
    
    // Bind the parameters
    $prep->bindParam(':id', $id);
    $prep->bindParam(':name', $name);
    $prep->bindParam(':surname', $surname);
    $prep->bindParam(':username', $username);
    $prep->bindParam(':email', $email);
    
    // Bind the password if it's being updated
    if ($hashedPassword) {
        $prep->bindParam(':password', $hashedPassword);
    }

    // Execute the query
    $prep->execute();

    // Redirect back to the index page
    header('Location:index.php');
}
?>
