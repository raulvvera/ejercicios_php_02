<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido Vegetariano</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }
        table {
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        input[type="number"] {
            width: 60px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background: #27ae60;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background: #219150;
        }
    </style>
</head>
<body>
    <h1>Pedido Vegetariano Online</h1>
    <form action="pedido.php" method="post">
        <table border="1">
            <tr><th>Producto</th><th>Precio (€)</th><th>Cantidad</th></tr>
            <tr><td>Hamburguesa Vegetariana</td><td>6.95</td><td><input type="number" name="hamburguesa" min="0" value="0"></td></tr>
            <tr><td>Pasta al Pesto</td><td>8.50</td><td><input type="number" name="pasta" min="0" value="0"></td></tr>
            <tr><td>Pizza Caprese</td><td>7.90</td><td><input type="number" name="pizza" min="0" value="0"></td></tr>
            <tr><td>Quinoa con Verdura</td><td>9.20</td><td><input type="number" name="quinoa" min="0" value="0"></td></tr>
            <tr><td>Agua</td><td>1.20</td><td><input type="number" name="agua" min="0" value="0"></td></tr>
            <tr><td>Cerveza</td><td>1.80</td><td><input type="number" name="cerveza" min="0" value="0"></td></tr>
            <tr><td>Refresco</td><td>1.80</td><td><input type="number" name="refresco" min="0" value="0"></td></tr>
        </table>
        <button type="submit" class="btn">Enviar Pedido</button>
    </form>
</body>
</html>
