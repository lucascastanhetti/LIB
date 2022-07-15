<?PHP

class VO_Grupo {

    //Atributos
    private $id;
    private $descricao;
    private $latitude;
    private $longitude;
    private $empresa_id;
    private $grupopai_id;
    private $status_id;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
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

    public function getEmpresa_id() {
        return $this->empresa_id;
    }

    public function setEmpresa_id($empresa_id) {
        $this->empresa_id = $empresa_id;
    }

    public function getGrupopai_id() {
        return $this->grupopai_id;
    }

    public function setGrupopai_id($grupopai_id) {
        $this->grupopai_id = $grupopai_id;
    }
    
     public function getStatus_id() {
        return $this->status_id;
    }

    public function setStatus_id($status_id) {
        $this->status_id = $status_id;
    }


}
