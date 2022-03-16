<!doctype html>
<html>
<head>
  
    

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Foodo</title>
	<link rel="stylesheet" href="style.css" type="text/css">



	<div class="topnav">
		<a class="active" href="index.php"><img alt=Foodo src="foodo.jpeg" width=180"></a>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
</head>
<body>
      <b> These fields help you find whether the tuple you are looking for is part of the database. They do not present any functionality other than showing how our auto-complete works. </b><br>
      <b> For functional searches, refer to our "Search" page. </b>
<br>
    <table>
        <tr>
            <td>Search an ingredient</td>
            <td><input type='text' id='autocomplete1' ></td>
        </tr>

	<tr>
            <td>Search a cuisine</td>
            <td><input type='text' id='autocomplete2' ></td>
        </tr>

<tr>
            <td>Search an user </td>
            <td><input type='text' id='autocomplete3' ></td>
        </tr>



       
    </table>

  
    <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "auto_recipes.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#autocomplete').val(ui.item.label); // display the selected text
                            },
            focus: function(event, ui){
                $( "#autocomplete" ).val( ui.item.label );
                            },
        });

            });

  

    </script>
    
</body>
</html>
