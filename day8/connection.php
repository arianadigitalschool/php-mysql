<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=database", "root", "");

        $username = "Ariana";
        $password = password_hash("mypassword", PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username,password) VALUES ("$username", "$password")";

        $pdo->exec($sql);

        echo "New record created succssefully";
    }catch(DOExecption $e){
        echo $e->getMessage();
    }



?>