<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "moon";
$conn = mysqli_connect($servername, $username, $password, $database_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $address = $_POST['address'];

    // Perform SQL query to update the profile table
    $sql = "INSERT INTO profile (name, email, phone_number, address) VALUES ('$name','$email','$phone', '$address')";

    if (mysqli_query($conn, $sql)) {
        echo "Profile updated successfully";
        header("Locaton:profile.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
