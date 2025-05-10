<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .profile-form {
            width: 35%;
            background: #f5f5f5;
            padding: 15px;
        }
        .logout-btn {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
        }
        input[type=text], input[type=email], input[type=password] {
            width: 100%; padding: 8px; margin-bottom: 10px;
        }
        input[type=submit] {
            background: green; color: white; padding: 10px 15px; border: none;
        }
    </style>
</head>
<body>
<div class="profile-form">
        <h3>Edit Your Profile</h3>
        <form method="POST">
            <input type="text" name="name" value="<?php echo htmlspecialchars($logged_user['name']); ?>" required>
            <input type="text" name="surname" value="<?php echo htmlspecialchars($logged_user['surname']); ?>" required>
            <input type="text" name="username" value="<?php echo htmlspecialchars($logged_user['username']); ?>" required>
            <input type="email" name="email" value="<?php echo htmlspecialchars($logged_user['email']); ?>" required>
            <input type="password" name="password" value="<?php echo htmlspecialchars($logged_user['password']); ?>" required>
            <input type="submit" name="update_profile" value="Update Profile">
        </form>
    </div>
</div>

</body>
</html>