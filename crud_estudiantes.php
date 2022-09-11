<?php
     
     if( !empty($_POST) ){
   
     //print_r( $_POST );
       // echo "<hr/>";
        $txt_id = utf8_decode($_POST["txt_id"]);
        $txt_carne = utf8_decode($_POST["txt_carne"]);
        $txt_nombres = utf8_decode($_POST["txt_nombres"]);
        $txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
        $txt_direccion = utf8_decode($_POST["txt_direccion"]);
        $txt_telefono = utf8_decode($_POST["txt_telefono"]);
        $txt_correo = utf8_decode($_POST["txt_correo"]);
        $drop_sangre = utf8_decode($_POST["drop_sangre"]);
        $txt_fn = utf8_decode($_POST["txt_fn"]);
      include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_agregar'])  ){
          $sql = "INSERT INTO estudiantes(carne,nombre,apellido,direccion,telefono,correo_electronico,fecha_nacimiento,id_tipos_sangre) VALUES ('". $txt_carne ."','". $txt_nombres ."','". $txt_apellidos ."','". $txt_direccion ."','". $txt_telefono ."','".  $txt_correo ."','" . $txt_fn ."',". $drop_sangre .");";
        }
        if( isset($_POST['btn_modificar'])  ){
          $sql = "update estudiantes set carne='". $txt_carne ."',nombre='". $txt_nombres ."',apellido='". $txt_apellidos ."',direccion='". $txt_direccion ."',telefono='". $txt_telefono ."',correo_electronico='". $txt_correo ."',fecha_nacimiento='". $txt_fn ."',id_tipos_sangre=". $drop_sangre ." where id_estudiantes = ". $txt_id.";";
        }
        if( isset($_POST['btn_eliminar'])  ){
          $sql = "delete from estudiantes  where id_estudiantes = ". $txt_id.";";
        }
         
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
           
            header('Location: /tarea_php');
            //header('Location: index.php');
           
          }else{
            $db_conexion->close();
          
          }

      }
        
      ?>