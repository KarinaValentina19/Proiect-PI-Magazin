<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pagină de Înregistrare</title>
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
    <div class="info" align="center">
        <form action="register.php" method="post">
            <table cellpadding="8">
                <tr>
                    <td>
                        <h2 align="center">Înregistrare</h2>
                        <label for="fullname">Nume și prenume:</label><br>
                        <input type="text" id="fullname" name="fullname" required><br><br>
            
                        <label for="email">Adresă de email:</label><br>
                        <input type="email" id="email" name="email" required><br><br>
            
                        <label for="phone">Număr de telefon:</label><br>
                        <input type="text" id="phone" name="phone" required><br><br>
            
                        <label for="location">Adresă livrare:</label><br>
                        <textarea name="location" rows="4" cols="20" required></textarea><br><br>
            
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

</html>

<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Adresa de email nu este validă!";
    }

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "parfumuri"; 
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO clienti (nume, email, nr_telefon, parola) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $phone, $password);


    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


