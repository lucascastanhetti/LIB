<?PHP

class VO_Kirpich {

    //Atributos
    private $estacaoinicial_id;
    private $estacaofinal_id;
    private $distancia;
    private $caminho;
    private $id;

    public function getEstacaoinicial_id() {
        return $this->estacaoinicial_id;
    }

    public function setEstacaoinicial_id($estacaoinicial_id) {
        $this->estacaoinicial_id = $estacaoinicial_id;
    }

    public function getEstacaofinal_id() {
        return $this->estacaofinal_id;
    }

    public function setEstacaofinal_id($estacaofinal_id) {
        $this->estacaofinal_id = $estacaofinal_id;
    }

    public function getDistancia() {
        return $this->distancia;
    }

    public function setDistancia($distancia) {
        $this->distancia = $distancia;
    }

    public function getCaminho() {
        return $this->caminho;
    }

    public function setCaminho($caminho) {
        $this->caminho = $caminho;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

}

?>