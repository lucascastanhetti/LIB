<?PHP

class VO_EstacaoView {

    //Atributos
    private $id;    //estação
    private $codigoaneelflu;         //estação
    private $codigoaneelplu;         //estação
    private $nome;                   //estação
    private $coletaIntervalo;        //estação
    private $codigoAdicional;        //estação
    private $estacaotipo;            //estação
    private $grupo_id;               //estação
    private $status_id;              //estação    
    private $empreendimento_id;      //estação        
    private $imagemurl;         //estação detalhe
    private $latitude;          //estação detalhe
    private $longitude;         //estação detalhe
    private $rio;               //estação detalhe
    private $municipio_id;      //estação detalhe
    private $operadora;         //estação detalhe
    private $protocolo;         //estação detalhe
    private $regiao_id;         //estação detalhe
    private $empresa_id;         //estação detalhe
    private $banco;         //estação detalhe
    private $altitude;        //estacao detalhe
    private $cotaVertimento;        //estacao detalhe

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
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

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEstacaotipo() {
        return $this->estacaotipo;
    }

    public function setEstacaotipo($estacaotipo) {
        $this->estacaotipo = $estacaotipo;
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

    public function getImagemurl() {
        return $this->imagemurl;
    }

    public function setImagemurl($imagemurl) {
        $this->imagemurl = $imagemurl;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    public function getLongitude() {
        return $this->longitude;
    }

    public function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    public function getRio() {
        return $this->rio;
    }

    public function setRio($rio) {
        $this->rio = $rio;
    }

    public function getMunicipio_id() {
        return $this->municipio_id;
    }

    public function setMunicipio_id($municipio_id) {
        $this->municipio_id = $municipio_id;
    }

    public function getOperadora() {
        return $this->operadora;
    }

    public function setOperadora($operadora_id) {
        $this->operadora = $operadora_id;
    }

    public function getProtocolo() {
        return $this->protocolo;
    }

    public function setProtocolo($protocolo) {
        $this->protocolo = $protocolo;
    }

    public function getRegiao_id() {
        return $this->regiao_id;
    }

    public function setRegiao_id($regiao_id) {
        $this->regiao_id = $regiao_id;
    }

    function getCodigoAdicional() {
        return $this->codigoAdicional;
    }

    function setCodigoAdicional($codigoAdicional) {
        $this->codigoAdicional = $codigoAdicional;
    }

    function getColetaIntervalo() {
        return $this->coletaIntervalo;
    }

    function setColetaIntervalo($coletaIntervalo) {
        $this->coletaIntervalo = $coletaIntervalo;
    }

    function getEmpresa_id() {
        return $this->empresa_id;
    }

    function setEmpresa_id($empresa_id) {
        $this->empresa_id = $empresa_id;
    }
    function getBanco() {
        return $this->banco;
    }

    function setBanco($banco) {
        $this->banco = $banco;
    }

    function getAltitude() {
        return $this->altitude;
    }

    function setAltitude($altitude) {
        $this->altitude = $altitude;
    }

    function getCotaVertimento() {
        return $this->cotaVertimento;
    }

    function setCotaVertimento($cotaVertimento) {
        $this->cotaVertimento = $cotaVertimento;
    }

    function getEmpreendimento_id() {
        return $this->empreendimento_id;
    }

    function setEmpreendimento_id($empreendimento_id) {
        $this->empreendimento_id = $empreendimento_id;
    }




}

?>