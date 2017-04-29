<?php

    include_once "Empleado.php";
    class Fabrica
    {
        public $_empleados;
        private $_razonSocial;
        public function __construct($razonSocial)
        {
            $this->_razonSocial = $razonSocial;
            $this->_empleados = array();
        }
        public function AgregarEmpleado($persona)
        {   
            $valor = false;
            if(!(in_array($persona,$this->_empleados)))
            {
                $valor = true;
            }
            array_push($this->_empleados,$persona);
            $this->EliminarEmpleadosRepetidos();
            return $valor;
        }
        public function CalcularSueldos()
        {   
            $total = 0;
            foreach($this->_empleados as $valor)
            {
                $total = $total + $valor->getSueldo();
            }
            return $total;
        }
        public function EliminarEmpleado($persona)
        {
            $valor = false;
            if (in_array($persona,$this->_empleados))
            {   
                $valor = true;
                $numero = array_search($persona,$this->_empleados);
                unset($this->_empleados[$numero]);
            }
            return $valor;
        }
        private function EliminarEmpleadosRepetidos()
        {   
            $this->_empleados = array_unique($this->_empleados,SORT_REGULAR);
        }
        public function ToString()
        {
            $valor1 = " ";
            //$valor2;
            /*foreach($this->_empleados as $valor3)
            {
                $valor2 = $valor3->ToString();
                $valor1 = "$valor1"."<br/>"."$valor2";
            }*/
            foreach($this->_empleados as $valor3)
            {
                /*echo "<tr>
                        <img src='archivos/".$valor3->getPathFoto()."' width='100px' height='100px'
                      </tr>";*/
                $valor1 .= "<tr>
                            <td>".$valor3->getApellido()."<br></td>
                            <td>".$valor3->getNombre()."<br></td>
                            <td>".$valor3->getDNI()."<br></td>
                            <td>".$valor3->getSexo()."<br></td>
                            <td>".$valor3->getLegajo()."<br></td>
                            <td>".$valor3->getSueldo()."<br></td>
                            <td><img src='fotos/".$valor3->getPathFoto()."' width='100px' height='100px'/><br></td>
                            </tr>";
            }
            return "Razon Social:"." ".$this->_razonSocial."<br/>Empleados: <br><br>".$valor1."<br/><br/>";
        }
    }

?>