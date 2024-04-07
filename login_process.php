<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "moon";
$conn = mysqli_connect($servername, $username, $password, $database_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['Login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

   
    $check_query = "SELECT * FROM students WHERE email='$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) == 1) {
        $row = mysqli_fetch_assoc($check_result);
        if (password_verify($password, $row['password'])) {
            header("Location: mainpage.html");
            exit();
        } else {
            echo "<script>alert('Incorrect password. Please try again.');window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('User not found. Check Once.');window.location.href='login.html';</script>";
    }
}
mysqli_close($conn);
?>
