<!doctype html>
<html lang="en">
  <head>
    <title>Empleados</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Brandon Herrera</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Contacto</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Juegos
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Call of Duty</a></li>
                  <li><a class="dropdown-item" href="#">Ned For Speed</li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">otros</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active">Log in</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <h1>Formulario Estudiantes</h1>

      <!-- NUEVO BOTON-->
      <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nuevo</button>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Datos del Estudiante</h5>
          </div>
          <div class="modal-body">
            <form class="needs-validation" action="crud_estudiantes.php" method="post">
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2">Id:</label>
                  <div class="col-10">
                    <input type="text" name="txt_id" id="txt_id" class="form-control" value="0" readonly>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2">Carne:</label>
                  <div class="col-10">
                    <input type="text" name="txt_carne" id="txt_carne" placeholder="E000" required class="form-control">
                  </div>
              </div>
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2">Nombre:</label>
                  <div class="col-10">
                    <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2">Apellido:</label>
                  <div class="col-10">
                    <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" required>
                  </div>
              </div>
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2">Direccion:</label>
                  <div class="col-10">
                    <input type="text" name="txt_direccion" id="txt_direccion" class="form-control"  required>
                  </div>
              </div>
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2">Telefono:</label>
                  <div class="col-10">
                    <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" required>
                  </div>
              </div>
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2">Gmail:</label>
                  <div class="col-10">
                    <input type="text" id="txt_correo" name="txt_correo" class="form-control">
                  </div>
              </div>
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2"><b>Tipo Sangre</b></label>
                <div class="col-10">
                <select class="form-select" name="drop_sangre" id="drop_sangre">
                  <option value=0> --- Tipo sangre --- </option>
                  <?php 
                      include("datos_conexion.php");
                      $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                      $db_conexion -> real_query ("SELECT id_tipos_sangre as id,sangre FROM tipos_sangre;");
                      $resultado = $db_conexion -> use_result();
                      while ($fila = $resultado ->fetch_assoc()){
                        echo "<option value=". $fila['id'].">". $fila['sangre'];

                      }
                      $db_conexion ->close();

                  ?>
                </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="recipient-name" class="col-form-label col-2">F. Nac:</label>
                  <div class="col-10">
                    <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required>
                  </div>
              </div>
              <div class="modal-footer">
                <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value = "Agregar">
                <button type="submit" id="btn_modificar" name="btn_modificar" value="Modificar" class="btn btn-success">Actualizar</button>
                <button type="submit" id="btn_eliminar" name="btn_eliminar" class="btn btn-danger" onclick="javascript:if(!confirm('¿Desea Eliminar?'))return false" value = "Eliminar">Borrar</button>
                <input type="submit" name="btn_nuevo" id="btn_nuevo" class="btn btn-secondary" onclick="limpiar()" value = "Nuevo">
            
              </div>
            </form>
          </div>
        
        </div>
    </div>
    </div>
    <!--FIN BOTON-->
      
    <table class="table table-striped table-striped-columns mt-3">
      <thead class="thead-inverse">
        <tr>
          <th>Carne</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>G-mail</th>
          <th>Tipo Sangre</th>
          <th>Nacimiento</th>
        </tr>
        </thead>
        <tbody id="tablaEstudiantes">
        <?php 
            include("datos_conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $db_conexion -> real_query ("SELECT e.id_estudiantes as id,e.carne,e.nombre,e.apellido,e.direccion,e.telefono,e.correo_electronico,p.sangre,e.fecha_nacimiento,p.id_tipos_sangre 
            FROM estudiantes as e inner join tipos_sangre as p on e.id_tipos_sangre = p.id_tipos_sangre;");
            $resultado = $db_conexion -> use_result();
            while ($fila = $resultado ->fetch_assoc()){
              echo "<tr data-id=". $fila['id']." data-idp=". $fila['id_tipos_sangre'].">";
              echo "<td>". $fila['carne']."</td>";
              echo "<td>". $fila['nombre']."</td>";
              echo "<td>". $fila['apellido']."</td>";
              echo "<td>". $fila['direccion']."</td>";
              echo "<td>". $fila['telefono']."</td>";
              echo "<td>". $fila['correo_electronico']."</td>";
              echo "<td>". $fila['sangre']."</td>";
              echo "<td>". $fila['fecha_nacimiento']."</td>";
              echo "</tr>";

            }
            $db_conexion ->close();
            ?>
        </tbody>
    </table>
          
      </div>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function limpiar(){
        $("#txt_id").val(0);
        $("#txt_carne").val('');
        $("#txt_nombres").val('');
        $("#txt_apellidos").val('');
        $("#txt_direccion").val('');
        $("#txt_telefono").val('');
        $("#txt_correo").val('');
        $("#txt_fn").val('');
        $("#drop_sangre").val(1);
        
    }
    $('#tablaEstudiantes').on('click','tr td',function(evt){
        var target,id,idp,carne,nombre,apellido,direccion,telefono,nacimiento,correo;
        target = $(event.target);
        id = target.parent().data('id');
        idp = target.parent().data('idp');
        carne = target.parent("tr").find("td").eq(0).html();
        nombre = target.parent("tr").find("td").eq(1).html();
        apellido =  target.parent("tr").find("td").eq(2).html();
        direccion = target.parent("tr").find("td").eq(3).html();
        telefono = target.parent("tr").find("td").eq(4).html();
        correo = target.parent("tr").find("td").eq(5).html();
        nacimiento  = target.parent("tr").find("td").eq(7).html();
        $("#txt_id").val(id);
        $("#txt_carne").val(carne);
        $("#txt_nombres").val(nombre);
        $("#txt_apellidos").val(apellido);
        $("#txt_direccion").val(direccion);
        $("#txt_telefono").val(telefono);
        $("#txt_correo").val(correo);
        $("#txt_fn").val(nacimiento);
        $("#drop_sangre").val(idp);
        $("#modal_empleados").modal('show');
        
    });
</script>
  </body>
</html>