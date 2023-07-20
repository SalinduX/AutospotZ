<?php
include 'config.php';

if(isset($_GET['updateid'])){
    $id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $License_No = $_POST['License_No'];
    $Phone_No = $_POST['Phone_No'];
    $Password = $_POST['Password'];

    $sql = "UPDATE `crud` SET name = '$First_Name', Last_Name = '$Last_Name', Username = '$Username',
     Email = '$Email', License_No = '$License_No', Phone_No = '$Phone_No', Password = '$Password' WHERE User_ID = '$id'";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        header('location: display-um.php');
    } else {
        die(mysqli_error($conn));
    }

}

$sql = "SELECT * FROM `users` WHERE User_ID=$id";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        $row = mysqli_fetch_assoc($result);
        $First_Name = $row['First_Name'];
        $Last_Name = $row['Last_Name'];
        $Username = $row['Username'];
        $Email = $row['Email'];
        $License_No = $row['License_No'];
        $Phone_No = $row['Phone_No'];
        $Password = $row['Password'];
    }else{
        die(mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Form</title>
    <link rel="stylesheet" href="css/addupdate.css">
    <link rel="stylesheet" href="sbutton.css">
</head>
<body>
    <div class="form">
        <form method="post" action="update-um.php">
            <label for="name">First Name:</label>
            <input type="text" name="First_Name" id="First_Name" value="<?php echo $First_Name; ?>" placeholder="Enter your first name" required>
            <br>
            <label for="Last_Name">Last Name:</label>
            <input type="text" name="Last_Name" id="Last_Name" value="<?php echo $Last_Name; ?>" placeholder="Enter your Last Name" required>
            <br>
            <label for="Username">Userame:</label>
            <input type="text" name="Username" id="Username" value="<?php echo $Username; ?>" placeholder="Enter your Username" required>
            <br>
            <label for="Email">E-mail:</label>
            <input type="Email" name="Email" id="Email" value="<?php echo $Email; ?>" placeholder="Enter your Email" required>
            <br>
            <label for="Phone_No">Phone:</label>
            <input type="text" name="Phone_No" id="Phone_No" value="<?php echo $Phone_No; ?>" placeholder="Enter your mobile" required>
            <br>
            <label for="License_No">License_No:</label>
            <input type="text" name="License_No" id="License_No" value="<?php echo $License_No; ?>" placeholder="Enter your License_No" required>
            <br>
            <label for="Password">Password:</label>
            <input type="Password" name="Password" id="Password" placeholder="Enter your Password" required>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
