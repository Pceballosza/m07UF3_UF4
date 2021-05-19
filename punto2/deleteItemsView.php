
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practica M07 </title>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
        <script src="crud.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body>
        <h1 id="h1Tabla">BORRAR</h1>
        <div id="form_id">
            <form id="fupForm" method="post" action="deleteItems.php">
                <label>Modalidad</label>
                    <input name="id" id="id">
                    <br>
                    <button class="button" id="enviar">Enviar</button>  
            </form>           
        </div>    
        <form action="/M07PHP_UF3/index.php" method="post">
            <button class="button btnVolver" id="volver">Volver</button>
        </form>
        
<script>
$(document).ready(function() {
	$('#enviar').on('click', function() {
		$("#enviar").attr("disabled", "disabled");
		var id = $('#id').val();
		if(id!=""){
			$.ajax({
				url: "deleteItems.php",
				type: "POST",
				data: {
					id: id,
				},
				cache: false,
				success: function(dataResult){
                                    console.log(dataResult);
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
                                            alert("SUCCESS!");
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>        
    </body>
</html>