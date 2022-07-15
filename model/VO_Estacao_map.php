<?PHP

class VO_Estacao_map {

    //Atributos
    private $codigoaneelflu;    //estação
    private $codigoaneelplu;    //estação
    private $nome;              //estação
    private $estacaotipo_id;    //estação
    private $grupo_id;          //estação
    private $status_id;         //estação
    private $imagemurl;         //estação detalhe
    private $latitude;          //estação detalhe
    private $longitude;         //estação detalhe
    private $rio;               //estação detalhe
    private $municipio_id;      //estação detalhe
    private $operadora_id;      //estação detalhe
    private $protocolo_id;      //estação detalhe
    private $regiao_id;         //estação detalhe

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

    public function getOperadora_id() {
        return $this->operadora_id;
    }

    public function setOperadora_id($operadora_id) {
        $this->operadora_id = $operadora_id;
    }

    public function getProtocolo_id() {
        return $this->protocolo_id;
    }

    public function setProtocolo_id($protocolo_id) {
        $this->protocolo_id = $protocolo_id;
    }

    public function getRegiao_id() {
        return $this->regiao_id;
    }

    public function setRegiao_id($regiao_id) {
        $this->regiao_id = $regiao_id;
    }

}

?>