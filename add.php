<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            width: 25%;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 8px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            background-color: #008CBA;
            color: white;
            padding: 10px;
            border-radius: 4px;
        }

        a:hover {
            background-color: #0077A4;
        }

        .success {
            color: #008CBA;
        }

        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br><br>

    <form action="add.php" method="post" name="form1">
        <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="firstName" required></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lastName" required></td>
            </tr>
            <tr>
                <td>Favorite Color</td>
                <td><input type="text" name="favoriteColor"></td>
            </tr>
            <tr>
                <td>Favorite Game</td>
                <td><input type="text" name="favoriteGame"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php
    // Check if the form is submitted
    if (isset($_POST['Submit'])) {
        // Get form data
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $favoriteColor = $_POST['favoriteColor'];
        $favoriteGame = $_POST['favoriteGame'];

        // Include database connection file
        include_once("config.php");

        // Insert user data into the table
        $result = mysqli_query($mysqli, "INSERT INTO users(firstName, lastName, favoriteColor, favoriteGame) VALUES('$firstName', '$lastName', '$favoriteColor', '$favoriteGame')");

        // Display success or error message
        if ($result) {
            echo '<p class="success">User added successfully. <a href="index.php">View Users</a></p>';
        } else {
            echo '<p class="error">Error: ' . mysqli_error($mysqli) . '</p>';
        }
    }
    ?>
</body>

</html>