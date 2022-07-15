<?PHP

class VO_dadoUnitario {

    //Atributos
    private $estacao;
    private $estacaoNome;
    private $nivel;
    private $nivelLeiturista;
    private $nivel2;
    private $vazao;
    private $qualidade;
    private $horario;
    private $chuvaIntevalo;
    private $chuvaHoraria;
    private $chuvaDiaria;
    private $chuvaColetada;
    private $chuvaLeiturista;
    private $temperatura;
    private $umidade;
    private $pressao;
    private $radiacao;
    private $velocidadeVento;
    private $direcaoVento;
    private $vazaoVertida;
    private $vazaoTurbinada;
    private $vazaoRemanescente;
    private $VazaoDefluente;
    private $CMP1;
    private $CMP2;
    private $CMP3;

    function getEstacaoNome() {
        return $this->estacaoNome;
    }

    function setEstacaoNome($estacaoNome) {
        $this->estacaoNome = $estacaoNome;
    }

    function getEstacao() {
        return $this->estacao;
    }

    function setEstacao($estacao) {
        $this->estacao = $estacao;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function getVazao() {
        return $this->vazao;
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

    function getChuvaHoraria() {
        return $this->chuvaHoraria;
    }

    function getChuvaDiaria() {
        return $this->chuvaDiaria;
    }

    function getChuvaColetada() {
        return $this->chuvaColetada;
    }

    function setVazao($vazao) {
        $this->vazao = $vazao;
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

    function setChuvaHoraria($chuvaHoraria) {
        $this->chuvaHoraria = $chuvaHoraria;
    }

    function setChuvaDiaria($chuvaDiaria) {
        $this->chuvaDiaria = $chuvaDiaria;
    }

    function setChuvaColetada($chuvaColetada) {
        $this->chuvaColetada = $chuvaColetada;
    }

    function getTemperatura() {
        return $this->temperatura;
    }

    function getUmidade() {
        return $this->umidade;
    }

    function getPressao() {
        return $this->pressao;
    }

    function getRadiacao() {
        return $this->radiacao;
    }

    function getVelocidadeVento() {
        return $this->velocidadeVento;
    }

    function getDirecaoVento() {
        return $this->direcaoVento;
    }

    function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;
    }

    function setUmidade($umidade) {
        $this->umidade = $umidade;
    }

    function setPressao($pressao) {
        $this->pressao = $pressao;
    }

    function setRadiacao($radiacao) {
        $this->radiacao = $radiacao;
    }

    function setVelocidadeVento($velocidadeVento) {
        $this->velocidadeVento = $velocidadeVento;
    }

    function setDirecaoVento($direcaoVento) {
        $this->direcaoVento = $direcaoVento;
    }

    function getVazaoVertida() {
        return $this->vazaoVertida;
    }

    function getVazaoTurbinada() {
        return $this->vazaoTurbinada;
    }

    function getVazaoRemanescente() {
        return $this->vazaoRemanescente;
    }

    function setVazaoVertida($vazaoVertida) {
        $this->vazaoVertida = $vazaoVertida;
    }

    function setVazaoTurbinada($vazaoTurbinada) {
        $this->vazaoTurbinada = $vazaoTurbinada;
    }

    function setVazaoRemanescente($vazaoRemanescente) {
        $this->vazaoRemanescente = $vazaoRemanescente;
    }

    function getNivelLeiturista() {
        return $this->nivelLeiturista;
    }

    function getChuvaLeiturista() {
        return $this->chuvaLeiturista;
    }

    function setNivelLeiturista($nivelLeiturista) {
        $this->nivelLeiturista = $nivelLeiturista;
    }
    public function getNivel2() {
        return $this->nivel2;
    }

    public function setNivel2($nivel2) {
        $this->nivel2 = $nivel2;
    }

    function setChuvaLeiturista($chuvaLeiturista) {
        $this->chuvaLeiturista = $chuvaLeiturista;
    }
    
    function getVazaoDefluente() {
        return $this->VazaoDefluente;
    }

    function setVazaoDefluente($VazaoDefluente) {
        $this->VazaoDefluente = $VazaoDefluente;
    }

    function getCMP1() {
        return $this->CMP1;
    }

    function setCMP1($CMP1) {
        $this->CMP1 = $CMP1;
    }

    function getCMP2() {
        return $this->CMP2;
    }

    function setCMP2($CMP2) {
        $this->CMP2 = $CMP2;
    }

    function getCMP3() {
        return $this->CMP3;
    }

    function setCMP3($CMP3) {
        $this->CMP3 = $CMP3;
    }

}

?>
