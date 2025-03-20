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
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f0f2f5;
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
            max-width: 100%;
            height: auto;
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
    </style>
</head>
<body>

<header>
    <h1>Bienvenido a nuestra tienda online</h1>
    <p>Encuentra los mejores productos al mejor precio.</p>
</header>

<section class="productos">
    <div class="producto">
        <img src="A_modern_smartphone_placed_on_a_stylish_desk_with_.png" alt="Teléfono moderno">
        <h2>Producto A - Teléfono</h2>
        <p>Un smartphone de última generación con tecnología avanzada.</p>
        <p class="precio">$29.99</p>
        <button>Añadir al carrito</button>
    </div>

    <div class="producto">
        <img src="A_sleek_laptop_on_a_modern_wooden_desk,_with_a_sty.png" alt="Laptop elegante">
        <h2>Producto B - Laptop</h2>
        <p>Una laptop potente y moderna, ideal para el trabajo y entretenimiento.</p>
        <p class="precio">$49.99</p>
        <button>Añadir al carrito</button>
    </div>
</section>

</body>
</html>