<?php
    include_once "Fabrica.php";

    $fabrica = new Fabrica("Ioma");
    $archivo = fopen("empleados.txt","r");
    $i = 0;
    while(!feof($archivo))
    {
        $archivoAuxiliar = fgets($archivo);
        $Empleado = explode("-",$archivoAuxiliar);
        $Empleado[0] = trim($Empleado[0]);
        
        if($Empleado[0] != "")
        {
            $fabrica->AgregarEmpleado(new Empleado($Empleado[1],$Empleado[0],$Empleado[2],$Empleado[3],$Empleado[4],$Empleado[5]));
            $fabrica->_empleados[$i]->setPathFoto($Empleado[6]."-".$Empleado[7]);
            $i++;
        }
    }
    fclose($archivo);
    echo $fabrica->ToString();
    
?>


