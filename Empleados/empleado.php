<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("configEmpleado.php");

$datos = new Empleado();

$all = $datos ->selectEmpleadoAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Empleados</title>
    <link rel="stylesheet" href="../Css/estilos.css">
</head>
<body>
    <div class="contenedor">

        <div class="parte-izquierda">
    
          <div class="perfil">
            <h3 style="margin-bottom: 2rem;">Empleados</h3>
            <img src="#" alt="" class="imagenPerfil">
            <h3>Hola</h3>
          </div>
          <div class="menus">
          <a href="../Home/home.php" style="display: flex;gap:2px;">
              <i class="bi bi-house-door"></i>
              <h3 style="margin: 4px;">Home</h3>
            </a>
            <a href="../Constructoras/constructora.php" style="display: flex;gap:1px;">
              <i class="bi bi-calendar-plus"></i>
              <h3 style="margin: 8px;">Constructora</h3>
            </a>
            <a href="#" style="display: flex;gap:1px;">
              <i class="bi bi-people"></i>
              <h3 style="margin: 8px;font-weight: 800;">Empleado</h3>
            </a>
            <a href="../Cotizaciones/cotizacion.php" style="display: flex;gap:1px;">
              <i class="bi bi-person-circle"></i>
              <h3 style="margin: 8px;">Cotizaciones</h3>
            </a>
            <a href="../Productos/productos.php" style="display: flex;gap:1px;">
              <i class="bi bi-shop"></i>
              <h3 style="margin: 8px;">Productos</h3>
            </a>
          </div>
        </div>
    
        <div class="parte-media">
          <div style="display: flex; justify-content: space-between;">
            <h2>Empleados</h2>
            <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarEmpleado"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
          </div>
          <div class="menuTabla contenedor2">
            <table class="table table-custom ">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre Empleado</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Eliminar</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody class="" id="tabla">
    
                <!-- ///////Llenado DInamico desde la Base de Datos  -->
                <?php
    
                  foreach($all as $key => $val){
    
    
    
                ?>
                <tr>
                  <td><?php echo $val['idEmpleado']?></td>
                  <td><?php echo $val['nombreEmpleado']?></td>
                  <td><?php echo $val['telefonoEmpleado']?></td>
                  <td>
                    <a class="btn btn-danger" href="borrarEmpleado.php?idEmpleado=<?=$val['idEmpleado']?>&req=delete">Borrar</a>
                  </td>
                  <td>
                    <a class="btn btn-warning" href="editarEmpleado.php?idEmpleado=<?=$val['idEmpleado']?>">Editar</a>
                  </td>
                </tr>
                <?php
                 }
                ?> 
    
              </tbody>
              
            </table>
    
          </div>
    
    
        </div>

    
    
    
    
    
        <!-- /////////Modal de registro de nuevo estuiante //////////-->
        <div class="modal fade" id="registrarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
            <div class="modal-content" >
              <div class="modal-header" >
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="background-color: rgb(231, 253, 246);">
                <form class="col d-flex flex-wrap" action="registrarEmpleado.php" method="post">
                  <div class="mb-1 col-12">
                    <label for="nombres" class="form-label">Nombre Empleado</label>
                    <input 
                      type="text"
                      id="nombreEmpleado" 
                      name="nombreEmpleado"
                      class="form-control"  
                    />
                  </div>
    
                  <div class="mb-1 col-12">
                    <label for="direccion" class="form-label">Telefono</label>
                    <input 
                      type="text"
                      id="telefonoEmpleado"
                      name="telefonoEmpleado"
                      class="form-control"  
                    />
                  </div>
    
                  <div class=" col-12 m-2">
                    <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
                  </div>
                </form>  
             </div>       
            </div>
          </div>
        </div>
    
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
          crossorigin="anonymous"></script>
</body>
</html>