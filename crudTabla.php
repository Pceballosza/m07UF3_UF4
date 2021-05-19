
<html>
<head>
    <meta charset="UTF-8">
    <title>Practica M07 </title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <script src="crud.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <h1 id="h1Tabla">CRUD</h1>
    <div id="campoFiltros">
        <form action="/M07PHP_UF3/punto2/saveItemsView.php">
            <button type="submit" class="button" id="busquedaID" value="buscarID" name="buscarID">AÑADIR
            </button>
        </form>    
        <form action="/M07PHP_UF3/punto2/deleteItemsView.php">
            <button type="submit" class="button" id="busquedaID" value="buscarID" name="buscarID">BORRAR
            </button>
        </form> 

        <form action="/M07PHP_UF3/punto2/updateItemsView.php">
            <button type="submit" class="button" id="busquedaID" value="buscarID" name="buscarID">MODIFICAR
            </button>
        </form> 
    </div>

    <form action="/M07PHP_UF3/index.php" method="post">
        <button class="button btnVolver" id="volver">Volver</button>
    </form>
</body>
</html>
