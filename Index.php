<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Trabajo Practico </title>
    </head>
    <body>
        <form action="Administracion.php" method="POST"
        enctype="multipart/form-data" >
            Nombre: <input type="text" name="txtNombre">
            <br/>
            Apellido: <input type="text" name="txtApellido">
            <br/>
            Sexo: <input type="text" name="txtSexo">
            <br/>
            Dni: <input type="text" name="txtDni">
            <br/>
            Legajo: <input type="text" name="txtLegajo">
            <br/>
            Sueldo: <input type="text" name="txtSueldo">
            <br/>
            foto:<input type="file" name="archivo"/>
            <br/>
            <input type="submit" value="Enviar" name="btnEnviar">
            <br/>
        </form>
    </body>
</html>