<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedido Vegetariano</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <h1>🍃 Menú Vegetariano Online 🍃</h1>
    <form action="pedido.php" method="post">
        <div class="menu">
            <div class="card">
                <img src="img/hamburguesa.jpg" alt="Hamburguesa Vegetariana">
                <h3>Hamburguesa Vegetariana</h3>
                <p class="price">6.95 €</p>
                <input class="cantidad" type="number" name="hamburguesa" min="0" value="0">
            </div>
            <div class="card">
                <img src="img/pasta.jpg" alt="Pasta al Pesto">
                <h3>Pasta al Pesto</h3>
                <p class="price">8.50 €</p>
                <input class="cantidad" type="number" name="pasta" min="0" value="0">
            </div>
            <div class="card">
                <img src="img/pizza.jpg" alt="Pizza Caprese">
                <h3>Pizza Caprese</h3>
                <p class="price">7.90 €</p>
                <input class="cantidad" type="number" name="pizza" min="0" value="0">
            </div>
            <div class="card">
                <img src="img/quinoa.jpeg" alt="Quinoa con Verdura">
                <h3>Quinoa con Verdura</h3>
                <p class="price">9.20 €</p>
                <input class="cantidad" type="number" name="quinoa" min="0" value="0">
            </div>
            <div class="card">
                <img src="img/agua.jpeg" alt="Agua">
                <h3>Agua</h3>
                <p class="price">1.20 €</p>
                <input class="cantidad" type="number" name="agua" min="0" value="0">
            </div>
            <div class="card">
                <img src="img/cerveza.jpeg" alt="Cerveza">
                <h3>Cerveza</h3>
                <p class="price">1.80 €</p>
                <input class="cantidad" type="number" name="cerveza" min="0" value="0">
            </div>
            <div class="card">
                <img src="img/refresco.jpeg" alt="Refresco">
                <h3>Coca-Cola</h3>
                <p class="price">1.80 €</p>
                <input class="cantidad" type="number" name="refresco" min="0" value="0">
            </div>
        </div>
        <br>
        <button type="submit" class="btn">🛒 Realizar Pedido</button>
    </form>
</body>

</html>