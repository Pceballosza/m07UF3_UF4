
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practica M07 </title>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
        <script src="crud.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body>
        <h1 id="h1Tabla">UPDATE</h1>
        <div id="form_id">
            <form id="fupForm" method="post" action="updateItems.php">
                <label>ID</label>
                    <input name="id" id="id">
               <label>Modalidad</label>
                    <input name="modalidad" id="modalidad">
                    <br>
                <label>Nivell</label>
                    <input name="nivell" id="nivell">    
                    <br>
                <label>Intents</label>
                    <input name="intents" id="intents">
                   
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
		var modalitat = $('#modalidad').val();
		var nivell = $('#nivell').val();
		var intents = $('#intents').val();
                var id = $('#id').val();
		if(modalitat!="" && nivell!="" && intents!="" && id!=""){
			$.ajax({
				url: "updateItems.php",
				type: "POST",
				data: {
                                        id: id,
					modalidad: modalitat,
					nivell: nivell,
					intents: intents
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