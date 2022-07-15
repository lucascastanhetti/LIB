<?PHP

class VO_dadoUnitarioPrevisao {

    //Atributos
    private $estacaoId;
    private $estacaoNome;
    private $horario;
    private $vazao;
    private $prevista;
    private $realizada;
    
    function getEstacaoId() {
        return $this->estacaoId;
    }

    function getEstacaoNome() {
        return $this->estacaoNome;
    }

    function getHorario() {
        return $this->horario;
    }

    function getVazao() {
        return $this->vazao;
    }

    function getPrevista() {
        return $this->prevista;
    }

    function getRealizada() {
        return $this->realizada;
    }

    function setEstacaoId($estacaoId) {
        $this->estacaoId = $estacaoId;
    }

    function setEstacaoNome($estacaoNome) {
        $this->estacaoNome = $estacaoNome;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setVazao($vazao) {
        $this->vazao = $vazao;
    }

    function setPrevista($prevista) {
        $this->prevista = $prevista;
    }

    function setRealizada($realizada) {
        $this->realizada = $realizada;
    }


  


}

?>
