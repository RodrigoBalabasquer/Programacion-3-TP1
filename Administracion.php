<?php
    include_once "Fabrica.php";
    if(isset($_POST["btnEnviar"]))
    {   
        //INDICO CUAL SERA EL DESTINO DEL ARCHIVO SUBIDO
        $destino = "fotos/" . $_FILES["archivo"]["name"];
        $uploadOk = TRUE;

        $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);
        $destino = "fotos/".$_POST["txtDni"]."-".$_POST["txtApellido"].".".$tipoArchivo;
        
        //VERIFICO QUE EL ARCHIVO NO EXISTA
        if (file_exists($destino)) 
        {
            echo "El archivo ya existe. Verifique!!!";
            $uploadOk = FALSE;
        }
        //VERIFICO EL TAMAÑO MAXIMO QUE PERMITO SUBIR
        if ($_FILES["archivo"]["size"] > 1024000) {
            $uploadOk = FALSE;
            $mensaje = "El archivo es demasiado grande. Verifique!!!";
            echo $mensaje;
        }

        //OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
        //IMAGEN, RETORNA FALSE
        $esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);

        if($esImagen === FALSE) 
        {//NO ES UNA IMAGEN
            $uploadOk = FALSE;
            $mensaje = "S&oacute;lo son permitidas IMAGENES.";
            echo $mensaje;
        }
        else {// ES UNA IMAGEN

            //SOLO PERMITO CIERTAS EXTENSIONES
            if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
                && $tipoArchivo != "png") 
            {
                $uploadOk = FALSE;
                $mensaje = "S&oacute;lo son permitidas imagenes con extensi&oacute;n JPG, JPEG, PNG o GIF.";
                echo $mensaje;
            }
        }

        //VERIFICO SI HUBO ALGUN ERROR, CHEQUEANDO $uploadOk
        if ($uploadOk === FALSE) 
        {
            echo "<br/><br/>NO SE PUDO SUBIR EL ARCHIVO.";
        }
        else 
        {
            //MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
            if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) 
            {
                $empleado = new Empleado($_POST["txtNombre"],$_POST["txtApellido"],$_POST["txtDni"],$_POST["txtSexo"],$_POST["txtLegajo"],$_POST["txtSueldo"]);
                //$empleado->setPathFoto(basename($_FILES["archivo"]["name"]));
                $imagen = $_POST["txtDni"]."-".$_POST["txtApellido"].".".$tipoArchivo;
                $empleado->setPathFoto($imagen);
                
            //GUARDAR EL PRODUCTO	
                $archivo = fopen("empleados.txt","a");
                if(fwrite($archivo,$empleado->ToString()."\r\n")!= false)
                {
                    fclose($archivo);
                    echo '<a href="Mostrar.php"> Mostrar empleados </a>';
                }
                else
                {
                    fclose($archivo);
                    echo '<a href="Index.php"> Volver </a>';
                }		
            } 
            else 
            {
                $mensaje = "Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
                echo $mensaje;
            }
        }

        
    }

?>