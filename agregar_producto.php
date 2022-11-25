<?php
    
    $servidor='localhost: 33065';
    $cuenta='root';
    $password='';
    $bd='tienda';
     
    
    
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    else{
         //conexion exitosa

         /*revisar si traemos datos a insertar en la bd  dependiendo
         de que el boton de enviar del formulario se le dio clic*/

         if(isset($_POST['submit'])){
                //obtenemos datos del formulario
                $id = $_POST['id'];
                $nombre =$_POST['nombre'];
                $precio =$_POST['precio'];
                $descripcion =$_POST['descripcion'];
                $categoria = $_POST['categoria'];
                $existencia =$_POST['existencia'];
                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "INSERT INTO productos (idProd, nombre, categoria, descripcion, precio, existencia) VALUES('$id','$nombre','$categoria','$descripcion', '$precio', '$existencia')";
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    echo "<script>
                        alert('Producto agregado! :D');
                        window.location.href='mostrar_productos.php';
                    </script>";
                }//fin
             
              //continaumos con la consulta de datos a la tabla usuarios
         //vemos datos en un tabla de html
       
         }
        
         }//fin 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
        td,
        th {
            padding: 10px;

        }
        
    </style>
</head>
<body>
<form class="estiloformulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
            <ul class="wrapper">
                <li class="form-row">
                    <label for="nombre">ID</label>
                    <input type="text" id="id" name="id" value="">
                </li>
                <li class="form-row">
                    <label for="nombre">NOMBRE</label>
                    <input type="text" id="nombre" name="nombre" value="">
                </li>
                <li class="form-row">
                    <label for="cuenta">PRECIO</label>
                    <input type="text" id="precio" name="precio" value="">
                </li>
                <li class="form-row">
                    <label for="contra">DESCRIPCION</label>
                    <input type="text" id="descripcion" name="descripcion" value="">
                </li>
                <li class="form-row">
                    <label for="contra">CATEGORIA</label>
                    <input type="text" id="categoria" name="categoria" value="">
                </li>
                <li class="form-row">
                    <label for="contra">EXISTENCIA</label>
                    <input type="text" id="existencia" name="existencia" value="">
                </li>
                <li class="form-row">
                <button type="submit" name="submit">Agregar</button>
                </li>
            </ul>
            </form>
</body>
</html>
