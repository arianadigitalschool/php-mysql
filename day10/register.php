<?php

    include_once('config.php');

    if(isset($_POST['submit']))
    {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $tempPass = $_POST['password']; //endriti123 -> iuqwdrgbqwuidhquwduioq@#$%^&1235757
            $password = password_hash($tempPass, PASSWORD_DEFAULT);

    if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($password)){
        echo "You need to fill all these fields!";
    }else{
        $sql = "SELECT username FROM users WHERE username = :username";

        $tempSQL = $conn->prepare($sql);
        $tempSQL -> bindParam(':username, $username');
        $tempSQL->execute();

        if($tempSQL > 0){
            echo "Username exists";
            header("refresh:2, url=signupform.php");
        }else{
            $sql = "INSERT INTO users(name,surname,username, email, password) values(:name,:surname,:username, :email, :password)";
            $insertSql = $conn -> prepare($sql);
            $insertSql->bindParam(':name', $name);
            $insertSql->bindParam(':surname', $surname);
            $insertSql->bindParam(':username', $username);
            $insertSql->bindParam(':email', $email);
            $insertSql->bindParam(':password', $password);

            $insertSql->execute()

            echo "Data saved sucessfully!";
            header("refresh:2, url=signin.php");
        }
    }
    }

?>