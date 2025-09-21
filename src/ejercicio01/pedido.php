<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    
<div class="card">
<?php
$precios = [
    "hamburguesa" => 6.95,
    "pasta"       => 8.50,
    "pizza"       => 7.90,
    "quinoa"      => 9.20,
    "agua"        => 1.20,
    "cerveza"     => 1.80,
    "refresco"    => 1.80
];

$total = 0;
echo "<h1>🧾 Resumen de tu Pedido</h1>";
echo "<ul>";

foreach ($precios as $producto => $precio) {
    if (isset($_POST[$producto]) && $_POST[$producto] > 0) {
        $cantidad = (int) $_POST[$producto];
        $subtotal = $cantidad * $precio;
        $total += $subtotal;
        echo "<li>$cantidad x " . ucfirst($producto) . " = " . number_format($subtotal, 2) . " €</li>";
    }
}

echo "</ul>";
echo "<h2>Total a pagar: " . number_format($total, 2) . " €</h2>";
echo '<br><a href="index.php">⬅️ Volver al menú</a>';
?>
</div>
</body>
</html>
