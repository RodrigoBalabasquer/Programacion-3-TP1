<?php
    include_once "Persona.php";
    class Empleado extends Persona
    {
        protected $_legajo;
        protected $_sueldo;
        protected $_pathFoto;
        
        public function __construct($nombre=null,$apellido=null,$dni=null,$sexo=null,$legajo=null,$sueldo=null)
        {
            parent:: __construct($nombre,$apellido,$dni,$sexo);
            $this->_legajo = $legajo;
            $this->_sueldo = $sueldo;
        }
        public function getLegajo()
        {
            return $this->_legajo;
        }
        public function getSueldo()
        {
            return $this->_sueldo;
        }
        public function getPathFoto()
        {
            return $this->_pathFoto;
        }
        public function setPathFoto($foto)
        {
            $this->_pathFoto = $foto;
        }
        public function Hablar($idioma)
        {
            return "El empleado habla "."$idioma".".";
        }
        public function ToString()
        {
            return parent:: ToString()."-".$this->_legajo."-".$this->_sueldo."-".$this->_pathFoto."\r\n";
        }
    }

?>