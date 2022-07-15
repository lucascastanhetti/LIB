<?PHP

class VO_DadoSuspeito {

    //Atributos
    private $horario;
    private $estacao;
    private $sensor;
    private $valor;
    private $diferenca;
    
    
    function getHorario() {
        return $this->horario;
    }

    function getEstacao() {
        return $this->estacao;
    }

    function getSensor() {
        return $this->sensor;
    }

    function getValor() {
        return $this->valor;
    }

    function getDiferenca() {
        return $this->diferenca;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setEstacao($estacao) {
        $this->estacao = $estacao;
    }

    function setSensor($sensor) {
        $this->sensor = $sensor;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setDiferenca($diferenca) {
        $this->diferenca = $diferenca;
    }


    
}
?>
