
<html>
    <head>
        <meta charset="UTF-8">
        <title>Practica M07 </title>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
        <script src="crud.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body>
        <h1 id="h1Tabla">AÑADIR</h1>
        <div id="form_id">
            <form id="fupForm" method="post" action="saveItems.php">
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
		if(modalitat!="" && nivell!="" && intents!=""){
			$.ajax({
				url: "saveItems.php",
				type: "POST",
				data: {
					modalitat: modalitat,
					nivell: nivell,
					intents: intents,
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