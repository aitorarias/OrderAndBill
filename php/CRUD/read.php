<?php
// Checkeamos si existe el ID. Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena.
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Base de datos 
    require_once "config.php";
    
    // Seleccionamos la tabla 
    $sql = "SELECT * FROM employees WHERE id = ?"; // ? sentencia mysql que será reemplazada. Más segura
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Añadidir variables como parametros
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        //Establecer parametros
        $param_id = trim($_GET["id"]);
        
        // Se ejecuta la sentencia
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Traer los resultados a un array
                asociativo. No hay necesidad de bucles*/
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Campos individuales
                $name = $row["name"];
                $address = $row["address"];
                $salary = $row["salary"];
            } else{
                // Error y mandamos a error.php
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Algo ha ido mal.";
        }
    }
     
    // Cierra la sentencia
    mysqli_stmt_close($stmt);
    
    // Cerramos la conexion
    mysqli_close($link);
} else{
    // No hay parametros. Pagina de error
    header("location: error.php");
    exit(); // Finaliza ejecucion
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver plato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Ver detalles del plato</h1>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <p class="form-control-static"><?php echo $row["address"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <p class="form-control-static"><?php echo $row["salary"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Atrás</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>