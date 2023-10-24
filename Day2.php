<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forms get</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "registration";
    $con = mysqli_connect($servername, $username, $password, $database);

    if (!$con) {
        die("Sorry, we failed to connect: " . mysqli_connect_error());
    } else {
        echo "Connection was successful";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['insert'])) {
            $name = $_POST['Name'];
            $id = $_POST['Userid'];
            $pass = $_POST['Password'];
            $reenter = $_POST['Reenterpass'];

            $sql = "INSERT INTO `login` (`Name`, `Userid`, `Password`, `Reenterpass`) VALUES ('$name', '$id', '$pass', '$reenter')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "Data inserted successfully";
            } else {
                echo "Data not inserted successfully";
            }
        } elseif (isset($_POST['delete'])) {
            $id = $_POST['DeleteUserid'];
            $sql = "DELETE FROM `login` WHERE `Userid`='$id'";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "User with Userid $id deleted successfully";
            } else {
                echo "Error deleting user with Userid $id";
            }
        } elseif (isset($_POST['update'])) {
            $id = $_POST['UpdateUserid'];
            $newName = $_POST['NewName'];
            $newPass = $_POST['NewPassword'];

            $sql = "UPDATE `login` SET `Name`='$newName', `Password`='$newPass' WHERE `Userid`='$id'";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "User with Userid $id updated successfully";
            } else {
                echo "Error updating user with Userid $id";
            }
        }
    }
    ?>

    <form action="/Day2/Day2.php" method="post">
        <br><br>
        Userid to Update:
        <input type="text" id="UpdateUserid" name="UpdateUserid"><br><br>
        New Name:
        <input type="text" id="NewName" name="NewName"><br><br>
        New Password:
        <input type="text" id="NewPassword" name="NewPassword"><br><br>
        <input type="submit" value="Update" name="update">
    </form>

    <form action="/Day2/Day2.php" method="post">
        <br><br>
        Name:
        <input type="text" id="Name" name="Name"><br><br>

        Userid:
        <input type="text" id="Userid" name="Userid"><br><br>

        Password:
        <input type="text" id="Password" name="Password"><br><br>

        Re-Enter Password:
        <input type="text" id="Reenterpass" name="Reenterpass"><br><br>

        <input type="submit" value="Insert" name="insert">
    </form>

    <form action="/Day2/Day2.php" method="post">
        <br><br>
        Userid to Delete:
        <input type="text" id="DeleteUserid" name="DeleteUserid"><br><br>
        <input type="submit" value="Delete" name="delete">
    </form>
</body>

</html>
