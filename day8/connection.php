<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=ariana", "root", "");

        // $username = "TEST1233";
        // $password = password_hash("mypassword123", PASSWORD_DEFAULT);
        // $email = "test@gmail.com";

        // $sql = "INSERT INTO users(username,password, email) VALUES ('$username', '$password', '$email')";

        // $sql= "ALTER table users ADD email VARCHAR(255)";

        // $sql = "ALTER table users DROP COLUMN email";

        $sql = "DROP TABLE PRODUCTS";

        $pdo->exec($sql);

        echo "New TABLE deleted succssefully";
    }catch(DOExecption $e){
        echo $e->getMessage();
    }



?>