<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: beige;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        .logo img {
            max-height: 80px;
            width: 120px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav-links ul li {
            margin-right: 20px;
        }

        .form{
            margin-bottom: 20px;
        }
        .input{
            margin:auto;
            display: block;
            width: 90%;
            padding: 3px;
            margin-top:5px;
            font-size: 1rem;
            line-height: 2.5;
            color: #495057;
            background-color: rgb(249, 247, 247);
            background-clip: padding-box;
            border: 1px solid black;
            border-radius: 0.25rem;
        }
        label{
           
            font-size:20px;
            padding:30px;
            
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropbtn {
            background-color: #333;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        
        .show {
            display: block;
        }
        .container1{
            width:50%;
            background-color: white;
            height:auto;
            margin:auto;
            
        }
        .faculty-shape {
            padding-left: 60px; 
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div style="display:flex">
                <div class="logo">
                    <img src="logo.jpg" alt="Eagle Mentoring Logo">
                </div>
                <div>
                    <h2 style="color: rgb(231, 214, 113);margin-left:10px">EAGLE MENTORING</h2>
                </div>
            </div>
            
            <div class="nav-links">
                <ul>
                    <li>
                        <div class="dropdown">
                            <button onclick="toggleDropdown()" class="dropbtn">My Account</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="profile.html">Profile</a>
                                <a href="connection.html">Connections</a>
                                <a href="Login.html">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <br><br>
    <script>
        // Function to toggle the visibility of the dropdown menu
        function toggleDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
    <?php
    include("db_connection.php");
    
    if(isset($_GET['course_search'])) {
        $course = $_GET['course_search'];
    
        // Prepare a SQL query to fetch faculty details based on the course
        $sql = "SELECT name, course, qualification, pic FROM faculty WHERE course LIKE '%$course%'";
    
        // Execute the query
        $result = $conn->query($sql);
    
        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                // Display faculty details in a grid layout
                echo '<div class="faculty-shape">';
                echo '<div class="faculty-details">';
                echo '<img src="' . $row['pic'] . '" alt="' . $row['name'] . '" style="width: 200px; height: 200px;">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>' . $row['course'] . '</p>';
                echo '<p>' . $row['qualification'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No results found";
        }
    
        // Close the database connection
        $conn->close();
    }
    ?>    
</body>
</html>