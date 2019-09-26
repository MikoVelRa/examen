<?php
class Fibonacci
{
    private $_tope;
    private $_conexion;
    private $_db;
    private $_set;

    public function __construct($tope)
    {
        $this->_tope = $tope;
        $this->_conexion = new Conectar();
        $this->_db = $this->_conexion->conecta();
        $this->_set=array();
    }

    public function generateFibonacci()
    {
        $fibonacci = [0, 1];
        $primer = $fibonacci[0];
        $segundo = $fibonacci[1];
        $resultado = $primer + $segundo;
        $acumulador = 0;


        for ($resultado = 1; $resultado <= $this->_tope; $resultado = $primer + $segundo) {
            $fibonacci[] = $resultado;
            $primer = $fibonacci[count($fibonacci) - 1];
            $segundo = $fibonacci[count($fibonacci) - 2];
        }

        for ($i = 0; $i < count($fibonacci); $i++) {
            $consulta = $this->_db->query("insert into tabla_1 (termino) VALUES ('$fibonacci[$i]')");
            //echo $fibonacci[$i] . " "; Dejé la línea comentada por si gusta corroborar la serie generada.
            if ($fibonacci[$i] % 2 == 0) {
                $acumulador = $acumulador + $fibonacci[$i];
            }
        }
        $consulta2 = $this->_db->query("insert into resultado (suma_terminos) VALUES ('$acumulador')");
    }

    public function getResult(){
        $consulta3=$this->_db->query("select * from resultado");
        while($filas=$consulta3->fetch_assoc()){
            $this->_set[]=$filas;
        }
        return $this->_set;
    }
}
?>