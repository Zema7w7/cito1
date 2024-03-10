<?php
// Create a database connection using the config file
include_once("config.php");

// Fetch all users' data from the database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            padding: 4px 8px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <a href="add.php">Add New User</a><br><br>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Favorite Color</th>
            <th>Favorite Game</th>
            <th>Actions</th>
        </tr>

        <?php while ($user_data = mysqli_fetch_array($result)) : ?>
            <tr>
                <td><?= htmlspecialchars($user_data['firstName']) ?></td>
                <td><?= htmlspecialchars($user_data['lastName']) ?></td>
                <td><?= htmlspecialchars($user_data['favoriteColor']) ?></td>
                <td><?= htmlspecialchars($user_data['favoriteGame']) ?></td>
                <td>
                    <a href='edit.php?id=<?= $user_data['id'] ?>'>Edit</a> |
                    <a href='delete.php?id=<?= $user_data['id'] ?>'>Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>