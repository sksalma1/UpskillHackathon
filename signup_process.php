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
    $username = $_POST['email'];
    $password = $_POST['password'];

    $check_query = "SELECT * FROM students WHERE email='$username'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('User Already Exsists.');window.location.href='signup.html';</script>";

    } else {
        $sql_query = "INSERT INTO students (email, password)
                      VALUES ('$username', '$password')";
        $sql_progress="INSERT INTO profile (email) VALUES ('$username')";
        if (mysqli_query($conn, $sql_query)) {
            echo "New details inserted successfully";
       
            header("Location: mainpage.html");
            exit(); 
        } else {
            echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>