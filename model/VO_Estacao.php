<?PHP

class VO_Estacao {

    //Atributos
    private $id;
    private $codigo;
    private $codigoadicional;
    private $codigoaneelflu;
    private $codigoaneelplu;
    private $intervalotransmissao;
    private $nome;
    private $sigla;
    private $coletaintervalo_id;
    private $coletatipo_id;
    private $empreendimento_id;
    private $empresa_id;
    private $estacaodetalhe_id;
    private $estacaotipo_id;
    private $grupo_id;
    private $status_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getCodigoadicional() {
        return $this->codigoadicional;
    }

    public function setCodigoadicional($codigoadicional) {
        $this->codigoadicional = $codigoadicional;
    }

    public function getCodigoaneelflu() {
        return $this->codigoaneelflu;
    }

    public function setCodigoaneelflu($codigoaneelflu) {
        $this->codigoaneelflu = $codigoaneelflu;
    }

    public function getCodigoaneelplu() {
        return $this->codigoaneelplu;
    }

    public function setCodigoaneelplu($codigoaneelplu) {
        $this->codigoaneelplu = $codigoaneelplu;
    }

    public function getIntervalotransmissao() {
        return $this->intervalotransmissao;
    }

    public function setIntervalotransmissao($intervalotransmissao) {
        $this->intervalotransmissao = $intervalotransmissao;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    public function getColetaintervalo_id() {
        return $this->coletaintervalo_id;
    }

    public function setColetaintervalo_id($coletaintervalo_id) {
        $this->coletaintervalo_id = $coletaintervalo_id;
    }

    public function getColetatipo_id() {
        return $this->coletatipo_id;
    }

    public function setColetatipo_id($coletatipo_id) {
        $this->coletatipo_id = $coletatipo_id;
    }

    public function getEmpreendimento_id() {
        return $this->empreendimento_id;
    }

    public function setEmpreendimento_id($empreendimento_id) {
        $this->empreendimento_id = $empreendimento_id;
    }

    public function getEmpresa_id() {
        return $this->empresa_id;
    }

    public function setEmpresa_id($empresa_id) {
        $this->empresa_id = $empresa_id;
    }

    public function getEstacaodetalhe_id() {
        return $this->estacaodetalhe_id;
    }

    public function setEstacaodetalhe_id($estacaodetalhe_id) {
        $this->estacaodetalhe_id = $estacaodetalhe_id;
    }

    public function getEstacaotipo_id() {
        return $this->estacaotipo_id;
    }

    public function setEstacaotipo_id($estacaotipo_id) {
        $this->estacaotipo_id = $estacaotipo_id;
    }

    public function getGrupo_id() {
        return $this->grupo_id;
    }

    public function setGrupo_id($grupo_id) {
        $this->grupo_id = $grupo_id;
    }

    public function getStatus_id() {
        return $this->status_id;
    }

    public function setStatus_id($status_id) {
        $this->status_id = $status_id;
    }

}

?>