<?php
//llamos a la conexiñon
require_once "config.php";
 
// Configuramos variables con valor = 0
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Procesando el formulario "form"
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validamos el nombre
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Por favor introduce un nombre.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Introduce una descripción.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Introduce el precio.";     
    } elseif(!ctype_digit($input_salary)){ // Verifica si todos los caracteres en la string entregada, text, son numéricos y POSITIVOS
        $salary_err = "Introduce un precio positivo.";
    } else{
        $salary = $input_salary;
    }
    
    // Todos los valores tienen que devolver TRUE para ser aceptados 
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Llamos a la base de datos 
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Método bind para añadir parámetros, agregando variables
            
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            
            // Establecemos los parámetros
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            
            // Se ejecuta
            if(mysqli_stmt_execute($stmt)){
                // Si todo está OK, volvemos a la página principal
                header("location: index.php");
                exit();
            } else{ //sino, mensaje de error
                echo "Algo ha ido mal.";
            }
        }
         
        // Se acaba la sentencia
        mysqli_stmt_close($stmt);
    }
    
    // Se cierra conexión
    mysqli_close($link); //Cierra una conexión previamente abierta a una base de datos
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear plato</title>
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
                        <h2>Añade un nuevo plato</h2>
                    </div>
                    <p>Cubre los campros para registrar un nuevo plato en la base de datos</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Descripción</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Precio</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>