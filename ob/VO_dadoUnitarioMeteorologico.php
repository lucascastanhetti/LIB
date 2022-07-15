<?PHP

class VO_dadoUnitarioMeteorologico {

    //Atributos
    private $estacao;
    private $estacaoNome;
    private $qualidade;
    private $horario;
    private $chuvaIntevalo;
    private $temperatura;
    private $umidade;
    private $velocidadeVento;
    private $direcaoVento;
    private $pressao;
    private $radiacaoSolar;

    function getEstacao() {
        return $this->estacao;
    }

    function getEstacaoNome() {
        return $this->estacaoNome;
    }

    function getQualidade() {
        return $this->qualidade;
    }

    function getHorario() {
        return $this->horario;
    }

    function getChuvaIntevalo() {
        return $this->chuvaIntevalo;
    }

    function getTemperatura() {
        return $this->temperatura;
    }

    function getUmidade() {
        return $this->umidade;
    }

    function getVelocidadeVento() {
        return $this->velocidadeVento;
    }

    function getDirecaoVento() {
        return $this->direcaoVento;
    }

    function getPressao() {
        return $this->pressao;
    }

    function getRadiacaoSolar() {
        return $this->radiacaoSolar;
    }

    function setEstacao($estacao) {
        $this->estacao = $estacao;
    }

    function setEstacaoNome($estacaoNome) {
        $this->estacaoNome = $estacaoNome;
    }

    function setQualidade($qualidade) {
        $this->qualidade = $qualidade;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setChuvaIntevalo($chuvaIntevalo) {
        $this->chuvaIntevalo = $chuvaIntevalo;
    }

    function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
    }

    function setUmidade($umidade) {
        $this->umidade = $umidade;
    }

    function setVelocidadeVento($velocidadeVento) {
        $this->velocidadeVento = $velocidadeVento;
    }

    function setDirecaoVento($direcaoVento) {
        $this->direcaoVento = $direcaoVento;
    }

    function setPressao($pressao) {
        $this->pressao = $pressao;
    }

    function setRadiacaoSolar($radiacaoSolar) {
        $this->radiacaoSolar = $radiacaoSolar;
    }



}

?>
