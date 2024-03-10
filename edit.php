<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
    $favoriteColor = mysqli_real_escape_string($mysqli, $_POST['favoriteColor']);
    $favoriteGame = mysqli_real_escape_string($mysqli, $_POST['favoriteGame']);

    // update user data using prepared statement
    $stmt = $mysqli->prepare("UPDATE users SET firstName=?, lastName=?, favoriteColor=?, favoriteGame=? WHERE id=?");
    $stmt->bind_param("ssssi", $firstName, $lastName, $favoriteColor, $favoriteGame, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}

// Display selected user data based on id
// Getting id from URL
$id = $_GET['id'];

// Fetch user data based on id using prepared statement
$stmt = $mysqli->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

while ($user_data = mysqli_fetch_array($result)) {
    $firstName = $user_data['firstName'];
    $lastName = $user_data['lastName'];
    $favoriteColor = $user_data['favoriteColor'];
    $favoriteGame = $user_data['favoriteGame'];
}
?>

<html>

<head>
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br /><br />

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>First Name</td>
                <td><input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>"></td>
            </tr>
            <tr>
                <td>Favorite Color</td>
                <td><input type="text" name="favoriteColor" value="<?php echo htmlspecialchars($favoriteColor); ?>"></td>
            </tr>
            <tr>
                <td>Favorite Game</td>
                <td><input type="text" name="favoriteGame" value="<?php echo htmlspecialchars($favoriteGame); ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>