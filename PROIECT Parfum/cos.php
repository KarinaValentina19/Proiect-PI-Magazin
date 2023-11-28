<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coș de cumpărături</title>
    <link rel="stylesheet" type="text/css" href="style_cos.css">
    <link rel="stylesheet" type="text/css" href="style_femei.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>

        <a href="cos.php"><img src="imagini/cos1.png" alt="Cos" width="52" align="right"></a>
        <a href="login.php"><img src="imagini/login1.png" alt="Login" width="52" align="right"></a>
        <a href="register.php"><img src="imagini/register1.png" alt="Register" width="50" align="right"></a>
        <h1>Coșul meu de cumpărături</h1>

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
    </header>

 
<?php
session_start();

// Verifică dacă există o sesiune pentru coșul de cumpărături; dacă nu, creează una
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Verifică dacă s-au primit informațiile despre produs prin metoda GET
if (isset($_GET['idProdus']) && isset($_GET['numeProdus']) && isset($_GET['pretProdus'])  && isset($_GET['imagineProdus'])) {
    // Preia informațiile din parametrii GET
    $idProdus = $_GET['idProdus'];
    $numeProdus = $_GET['numeProdus'];
    $pretProdus = $_GET['pretProdus'];
    $imagineProdus = isset($_GET['imagineProdus']) ? $_GET['imagineProdus'] : '';

$produsExistent = false;
foreach ($_SESSION['cart'] as &$produs) {
    if ($produs['idProdus'] === $idProdus) {
        $produs['cantitate'] += 1; // sau altă logică de actualizare a cantității
        $produsExistent = true;
        break;
    }
}

if (!$produsExistent) {
    // Adaugă un nou produs în coșul de cumpărături
    $produs = array(
        'idProdus' => $idProdus,
        'numeProdus' => $numeProdus,
        'pretProdus' => $pretProdus,
        'imagineProdus' => $imagineProdus,
        'cantitate' => 1
    );

    array_push($_SESSION['cart'], $produs);
}
}

// Poți calcula totalul prin parcurgerea elementelor din coș și adunând prețurile
$total = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $produs) {
        $total += $produs['pretProdus'] * $produs['cantitate'];
    }
}

// Afișează produsele din coș și totalul
foreach ($_SESSION['cart'] as $produs) {
    echo "ID: " . $produs['idProdus'] . "<br>";
    echo "Nume: " . $produs['numeProdus'] . "<br>";
    echo "Preț: " . $produs['pretProdus'] . "<br>";
    // Poți afișa imaginea folosind tag-ul img cu calea către imagine: <img src='".$produs['imagineProdus']."' alt='Imagine produs'>
    echo "<hr>";
}

echo "Total: " . $total;
?>

</body>
</html>





