<?PHP

class VO_EstacaoFicha {

    //Atributos
    private $id;    //estação
    private $estacao_id;    //estação
    private $codigo;
    private $codigoaneelflu;         //estação
    private $codigoaneelplu;         //estação
    private $nome;                   //estação
    private $sigla;
    private $coletaIntervalo;        //estação
    private $codigoAdicional;        //estação
    private $estacaotipo;            //estação
    private $grupo_id;               //estação
    private $grupo_nome;               //estação
    private $status_id;              //estação    
    private $empreendimento_id;      //estação  
    private $empreendimento_nome;
    private $empreendimento_usuario;
    private $empreendimento_senha;
    private $imagemurl;         //estação detalhe
    private $latitude;          //estação detalhe
    private $longitude;         //estação detalhe
    private $rio;               //estação detalhe
    private $municipio_id;      //estação detalhe
    private $municipio_nome;
    private $estado_sigla;
    private $operadora;         //estação detalhe
    private $protocolo;         //estação detalhe
    private $regiao_id;         //estação detalhe
    private $regiao_nome;         //estação detalhe
    private $empresa_id;         //estação detalhe
    private $empresa_nome;
    private $empresa_logo;
    private $banco;         //estação detalhe
    private $altitude;        //estacao detalhe
    private $cotaVertimento;        //estacao detalhe
    private $rio_id;            //estacao detalhe

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSigla() {
        return $this->sigla;
    }

    public function setSigla($sigla) {
        $this->sigla = $sigla;
    }

    public function getRegiaoNome() {
        return $this->regiao_nome;
    }

    public function setRegiaoNome($regiao_nome) {
        $this->regiao_nome = $regiao_nome;
    }

    public function getGrupoNome() {
        return $this->grupo_nome;
    }

    public function setGrupoNome($grupo_nome) {
        $this->grupo_nome = $grupo_nome;
    }

    public function getEstacaoId() {
        return $this->estacao_id;
    }

    public function setEstacaoId($estacao_id) {
        $this->estacao_id = $estacao_id;
    }

    public function getEmpresa_nome() {
        return $this->empresa_nome;
    }

    public function setEmpresa_nome($empresa_nome) {
        $this->empresa_nome = $empresa_nome;
    }

    public function getEmpresa_logo() {
        return $this->empresa_logo;
    }

    public function setEmpresa_logo($empresa_logo) {
        $this->empresa_logo = $empresa_logo;
    }

    public function getMunicipio_nome() {
        return $this->municipio_nome;
    }

    public function setMunicipio_nome($municipio_nome) {
        $this->municipio_nome = $municipio_nome;
    }

    public function getEstado_sigla() {
        return $this->estado_sigla;
    }

    public function setEstado_sigla($estado_sigla) {
        $this->estado_sigla = $estado_sigla;
    }

    public function getEmpreendimento_usuario() {
        return $this->empreendimento_usuario;
    }

    public function setEmpreendimento_usuario($empreendimento_usuario) {
        $this->empreendimento_usuario = $empreendimento_usuario;
    }

    public function getEmpreendimento_senha() {
        return $this->empreendimento_senha;
    }

    public function setEmpreendimento_senha($empreendimento_senha) {
        $this->empreendimento_nome = $empreendimento_senha;
    }

    public function getEmpreendimento_nome() {
        return $this->empreendimento_nome;
    }

    public function setEmpreendimento_nome($empreendimento_nome) {
        $this->empreendimento_nome = $empreendimento_nome;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
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