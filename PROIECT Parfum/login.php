<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pagină de Login</title>
</head>

<a href="cos.php"><img src="imagini/cos.png" alt="Cos" width="52" align="right"></a>
    <a href="login.php"><img src="imagini/login.png" alt="Login" width="52" align="right"></a>
    <a href="register.php"><img src="imagini/register.png" alt="Register" width="50" align="right"></a>
    <div class="navbar">
            <a href="main.html">Despre noi</a>
            <div class="dropdown" >
              <button class="dropbtn">Parfumuri pentru femei </button>
              <div class="dropdown-content">
                <a href="apa_de_parfum_femei.html">Apă de parfum</a>              
                <a href="apa_de_toaleta_femei.html">Apă de toaletă</a>
                <a href="apa_de_colonie_femei.html">Apă de colonie</a>
              </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Parfumuri pentru bărbați</button>
              <div class="dropdown-content">
                <a href="apa_de_parfum_barbati.html">Apă de parfum</a>              
                <a href="apa_de_toaleta_barbati.html">Apă de toaletă</a>
                <a href="apa_de_colonie_barbati.html">Apă de colonie</a>
              </div>
            </div>
            <a href="parfumuri_pentru_casa.html">Parfumuri pentru casă</a>
          </div>


<body>
    <div class="info1" align="center">
        <form action="login.php" method="post">
            <table cellpadding="8">
                <tr>
                    <td>
                        <h2 align="center">Login</h2>
                        <label for="email">Adresă de email:</label><br>
                        <input type="email" id="email" name="email" required><br><br>

                        <label for="password">Parolă:</label><br>
                        <input type="password" id="password" name="password" required><br><br>
            
                        <input type="submit" value="Trimite" class="register-button"><br><br>
                    </td>
                </tr>
            </table>
        </form>
        <img src="imagini/giordani.jpg" width="195"></a>
    </div>


</body>

<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $parola = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "parfumuri"; 
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id_client, nume, email, parola FROM clienti WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if ($parola === $user['parola']) {
            echo "Login successful! Welcome, " . $user['nume'];
        } else {
            $errors[] = "Parolă incorectă!";
        }
    } else {
        $errors[] = "Utilizatorul nu există!";
    }

    $stmt->close();
    $conn->close();
}
?>

</html>




