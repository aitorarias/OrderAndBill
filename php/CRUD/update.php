<?php
// Llamo a la base de datos
require_once "config.php";
 
// Se definen variables con valor 0 de comienzo
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Procesas formulario
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Valor oculto, en este caso id que no se ve al actualizar
    $id = $_POST["id"];
    
    // Validando el nombre
    $input_name = trim($_POST["name"]); // con trim no existen espacios en blanco de principio a fin
    if(empty($input_name)){
        $name_err = "Por favor, introduce un nombre.";
    } else{
        $name = $input_name;
    }
    
    // Validar descripcion
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Por favor, introduce una descripcion.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Por favor, introduce un precio.";     
    } elseif(!ctype_digit($input_salary)){ //nos permite evaluar un nombre siempre positivo
        $salary_err = "Introduce un valor positivo.";
    } else{
        $salary = $input_salary;
    }
    
    // Se checkean los posibles errores antes de meterlos en la tabla, true true true
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Preparamos la actualizacion
        $sql = "UPDATE employees SET name=?, address=?, salary=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // BBind las variables como parametros
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_address, $param_salary, $param_id);
            
            // Establecemos los parametros
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            $param_id = $id;
            
            // Se ejecuta la sentencia
            if(mysqli_stmt_execute($stmt)){
                // Modificado con satisfacion, volvemos al index
                header("location: index.php");
                exit(); // se acaba el script
            } else{
                echo "Algo ha ido mal.";
            }
        }
         
        // Cerramos la sentencia
        mysqli_stmt_close($stmt);
    }
    
    // Cerramos la conexion
    mysqli_close($link);
} else{
    // Checkeamos si el id existe
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Conseguimos la url, y para ello trim para que elimine huecos en blanco
        $id =  trim($_GET["id"]);
        
        // Seleccionamos un id
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind de variables
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Parametro unico establecido, en este caso el id
            $param_id = $id;
            
            // Se ejecutamos la sentencia
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Nos traemos los resultados a la columna con 
                    el array establecido */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Por campos individuales
                    $name = $row["name"];
                    $address = $row["address"];
                    $salary = $row["salary"];
                } else{
                    // No existe un id valido
                    header("location: error.php");
                    exit(); // cierra el la sentenica
                }
                
            } else{
                echo "Algo ha ido mal.";
            }
        }
        
        // Cierra la sentencia
        mysqli_stmt_close($stmt);
        
        // Cierra la conexion
        mysqli_close($link);
    }  else{
        // URL no existe
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>