<?php

$host = 'localhost';
$usuario = 'root';  
$contrasena = '';   
$base_de_datos = 'tienda_online';

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT DISTINCT * FROM productos";
$resultado = $conn->query($sql);

$productos = [];
if ($resultado->num_rows > 0) {
    while($producto = $resultado->fetch_assoc()) {
        $productos[] = $producto;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
        }
        .productos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .producto {
            border: 1px solid #ddd;
            padding: 15px;
            width: 250px;
            text-align: center;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .producto:hover {
            transform: scale(1.05);
        }
        .producto img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }
        .precio {
            font-weight: bold;
            color: #28a745;
            font-size: 1.2em;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            border-radius: 10px;
        }
        .modal input {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .modal button {
            background-color: #28a745;
            cursor: pointer;
        }
        .modal button:hover {
            background-color: #218838;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <h1>Bienvenido a nuestra tienda online</h1>
</header>
<section class="productos">
    <?php 
    $imagenes_predeterminadas = [
        'https://www.rastreator.com/wp-content/uploads/mejores-moviles.jpg',
        'https://concepto.de/wp-content/uploads/2020/06/Computadora-de-escritorio-scaled-e1724955496406-1536x781.jpg',
        'https://concepto.de/wp-content/uploads/2021/02/sentido-del-oido-e1613177299691.jpg',
        'https://m.media-amazon.com/images/I/61bJZx1v8GL.__AC_SY445_SX342_QL70_FMwebp_.jpg',
            ];
    $i = 0;
    foreach ($productos as $producto): ?>
        <div class="producto">
            <img src="<?php echo !empty($producto['ttps://www.rastreator.com/wp-content/uploads/mejores-moviles.jpg']) ? htmlspecialchars($producto['imagen_url']) : $imagenes_predeterminadas[$i % count($imagenes_predeterminadas)]; ?>" 
                 alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
            <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
            <p><?php echo htmlspecialchars($producto['descripcion']); ?></p>
            <p class="precio">$<?php echo number_format($producto['precio'], 2); ?></p>
            <button onclick="mostrarFormulario()">Añadir al carrito</button>
        </div>
    <?php $i++; endforeach; ?>
</section>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarFormulario()">&times;</span>
        <h2>Ingresa los datos de tu tarjeta de crédito</h2>
        <form id="formularioTarjeta">
            <label for="nombre">Nombre en la tarjeta</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="numero">Número de tarjeta</label>
            <input type="text" id="numero" name="numero" required>
            
            <label for="fecha">Fecha de expiración</label>
            <input type="month" id="fecha" name="fecha" required>
            
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" required>
            
            <button type="submit">Pagar</button>
        </form>
    </div>
</div>

<script>
    function mostrarFormulario() {
        document.getElementById("myModal").style.display = "block";
    }

    function cerrarFormulario() {
        document.getElementById("myModal").style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal")) {
            cerrarFormulario();
        }
    }

    document.getElementById("formularioTarjeta").addEventListener("submit", function(event) {
        event.preventDefault();
        alert("¡Pago realizado con éxito! (Solo una simulación)");
        cerrarFormulario();
    });
</script>
</body>
</html>
