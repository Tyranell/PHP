<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=fullstack", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
?>

<head>
</head>
<body>
  <form method="post">
    Gebruikersnaam <input type="text" name="userName" value="" />
    Wachtwoord <input type="password" name="passWord" value="" />
    <input type="submit" name="knop" value="Verstuur" />
  </form>
</body>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['userName'];
    $pass = $_POST['passWord'];
    $sqlUser = "SELECT username FROM user WHERE username = ";
    $resultUser = $conn->exec($sqlUser);
    echo $resultUser;
   }
?>
