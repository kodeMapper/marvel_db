<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con) {
        die("Connection to this database failed due to ". mysqli_connect_error());
    }

    // echo "Succesfully connected to the database.. ";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $descrip = $_POST['descrip'];

    $sql = "INSERT INTO `marvel`.`marvel interview` (`Name`, `Email`, `Password`, `Contact Number`, `Ability`, `Date`, `Time`) VALUES ('$name', '$email', '$password', '$number', '$descrip', current_timestamp(), current_timestamp());";

    // echo $sql;

    if($con->query($sql) == true) {
        // echo "Successfully submitted";
        $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $con -> error";
    }

    $con->close();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join The Avengers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="/Project/marvel_bg.jpg" class="bg" alt="">
    <div class="container">
        <h1>Avengers, get assemble!!</h1>
        <p>Enter the following details to get shortlisted ---</p>              
        <?php
        
        if ($insert == true) {
            echo "<p class='submitMsg'>Thanks for applying... You will be notified when you are selected!!</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name here">
            <input type="email" name="email" id="email" placeholder="Enter your email here">
            <input type="password" name="password" id="password" placeholder="Enter your password here">
            <input type="number" name="number" id="number" placeholder="Enter your number here">
            <textarea name="descrip" id="descrip" cols="30" rows="10" placeholder="Describe your superpowers here"></textarea>
            <button class="btn">SUBMIT</button>
        </form>
    </div>


    <script src="script.js"></script>

</body>
</html>