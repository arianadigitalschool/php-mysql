<?php
require 'config.php';

if (empty($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}

    $getUsers = $connect->prepare("SELECT * FROM users");
    $getUsers->execute();
    $users = $getUsers->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; margin: 0; padding: 0; }
        .navbar {
            background: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
        }
        .container {
            display: flex;
            padding: 20px;
        }
        .users-table {
            width: 60%;
            margin-right: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }
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

<div class="navbar">
    <div>Welcome, <?php echo $_SESSION['username'] ?></div>
    <div><a class="logout-btn" href="logout.php">Logout</a></div>
</div>

<div class="container">
    <!-- Users Table -->
    <div class="users-table">
        <h3>All Users</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach($users as $user){ ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['surname']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                <a href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a> |
                <a href="update.php?edit_id=<?php echo $user['id']; ?>">Edit</a>

                </td>

                <?php
            }
                ?>
        </table>
    </div>
    
</body>
</html>
