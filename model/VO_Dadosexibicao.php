<?PHP

class VO_Dadosexibicao {

    //Atributos
    private $id;
    private $coletahorario;
    private $estacaocodigo;
    private $estacaoid;
    private $estacaonome;
    private $estacaosigla;
    private $parametro;
    private $qualidade;
    private $sensorid;
    private $sensornome;
    private $valor;
    private $coletasensor_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getColetahorario() {
        return $this->coletahorario;
    }

    public function setColetahorario($coletahorario) {
        $this->coletahorario = $coletahorario;
    }

    public function getEstacaocodigo() {
        return $this->estacaocodigo;
    }

    public function setEstacaocodigo($estacaocodigo) {
        $this->estacaocodigo = $estacaocodigo;
    }

    public function getEstacaoid() {
        return $this->estacaoid;
    }

    public function setEstacaoid($estacaoid) {
        $this->estacaoid = $estacaoid;
    }

    public function getEstacaonome() {
        return $this->estacaonome;
    }

    public function setEstacaonome($estacaonome) {
        $this->estacaonome = $estacaonome;
    }

    public function getEstacaosigla() {
        return $this->estacaosigla;
    }

    public function setEstacaosigla($estacaosigla) {
        $this->estacaosigla = $estacaosigla;
    }

    public function getParametro() {
        return $this->parametro;
    }

    public function setParametro($parametro) {
        $this->parametro = $parametro;
    }

    public function getQualidade() {
        return $this->qualidade;
    }

    public function setQualidade($qualidade) {
        $this->qualidade = $qualidade;
    }

    public function getSensorid() {
        return $this->sensorid;
    }

    public function setSensorid($sensorid) {
        $this->sensorid = $sensorid;
    }

    public function getSensornome() {
        return $this->sensornome;
    }

    public function setSensornome($sensornome) {
        $this->sensornome = $sensornome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getColetasensor_id() {
        return $this->coletasensor_id;
    }

    public function setColetasensor_id($coletasensor_id) {
        $this->coletasensor_id = $coletasensor_id;
    }

}
