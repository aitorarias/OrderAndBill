<?php
// Se borra plato después de mensaje de confirmación
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Llamamos a la conexión
    require_once "config.php";
    
    // Sentencia de borrado MySQL
    $sql = "DELETE FROM employees WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Agregamos variables como parámetros con el método bind
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Se establece sólo la variable id
        $param_id = trim($_POST["id"]);
        
        //Se ejecuta la sentencia con el método stmt_execute
        if(mysqli_stmt_execute($stmt)){
            // Si se ha borrado, nos devuelve al index
            header("location: index.php");
            exit();
        } else{
            echo "Algo ha ido mal.";
        }
    }
     
    // Se cierra la sentencia
    mysqli_stmt_close($stmt);
    
    // Se cierra la sesión
    mysqli_close($link);
} else{
    // Checkea si el ID es cierto
    if(empty(trim($_GET["id"]))){
        // Si va mal, vamos a la página de error
        header("location: error.php");
        exit();
    }
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
                        <h1>Borra un plato</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>¿Estás seguro de querer borrar este campo?</p><br>
                            <p>
                                <input type="submit" value="Si" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>