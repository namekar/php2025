<?php

$servername = "localhost";
$username = "root";
$password = "ichigovastelord";


$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
 <?php
$servername = "localhost";
$username = "root";
$password = "ichigovastelord";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE Personnel (
Nom VARCHAR(30) NOT NULL,
email VARCHAR(50),
mot_de_passe VARCHAR(50),
droit VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Personnel created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 



<?php
 $servername = "localhost";
 $username = "root";
 $password = "ichigovastelord";
 $dbname = "myDB";
 
 
 $conn = new mysqli($servername, $username, $password, $dbname);
 
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
 
 $sql = "INSERT INTO Personnel (Nom, email, mot_de_passe, droit)
 VALUES ('John', 'john@example.com', 'ichigo','admin')";
 
 if ($conn->query($sql) === TRUE) {
   echo "New record created successfully";
 } else {
   echo "Error: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();

?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "ichigovastelord";
    $dbname = "myDB";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    $nom = mysqli_real_escape_string($conn = new mysqli($servername, $username, $password, $dbname),$_GET['nom']);
    $email = mysqli_real_escape_string($conn = new mysqli($servername, $username, $password, $dbname),$GET['email']);
    $password = mysqli_real_escape_string($conn = new mysqli($servername, $username, $password, $dbname),$GET['pword']);
    $droit = mysqli_real_escape_string($conn = new mysqli($servername, $username, $password, $dbname),$GET['droit']);

    $sql = "INSERT INTO Personnel(nom,email,pword,droit) VALUES('$nom','$email','$password','$droit')";
    if(mysqli_query($conn,$sql)){
        echo "successfuly added";
    }
    else{
        echo "error" . mysqli_error($conn);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/TP1/connection.php" method="get">
        <label for="fname">nom:</label><br>
        <input type="text" id="fname" name="fname" ><br>
        <label for="email">email:</label><br>
        <input type="text" id="email" name="email" ><br><br>
        <label for="pword">mot de passe:</label><br>
        <input type="password" id="password" name="password" ><br>
        <label for="droit">droit</label><br>
        <label for="admin">admin</label>
        <input type="radio" value="admin" name="droit" >
        <label for="utilisateur">utilisateur</label>
        <input type="radio" value="utilisateur" name="droit" ><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>