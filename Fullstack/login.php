<?php
  session_start();
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

    if (isset($_SESSION["admin"])) {
      header("Location: homepage.php");
    }
?>

<head>
    <style>
      a {
            padding: 3px;
            margin-bottom: 10px;
        }

        form {
            margin-top: 10px;   
        }
    </style>
</head>
<body>
  <?php
        if(!isset($_SESSION["admin"])) {
            echo '<a href="homepage.php">Homepagina</a>';
        }
  ?>
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

    $stmt = $conn->prepare("SELECT * FROM user WHERE username = :user");
    $stmt->bindParam(':user', $user);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(password_verify($pass, $result['wachtwoord'])) {
      $_SESSION["username"] = $result['username'];
      $_SESSION["admin"] = $result['admin'];
      header('Location: homepage.php');
    } else {
      echo "Invalid login.";
    }
   }
?>
