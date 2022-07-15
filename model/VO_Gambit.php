<?PHP

class VO_Gambit {

//Atributos
    private $id;
    private $estacaoorigem_id;
    private $estacaodestino_id;
    private $tipo;
    private $status;
    private $datainicial;
    private $datafinal;
    private $b;
    private $a;    
    private $usuario;

    public function getEstacaoorigem_id() {
        return $this->estacaoorigem_id;
    }

    public function setEstacaoorigem_id($estacaoorigem_id) {
        $this->estacaoorigem_id = $estacaoorigem_id;
    }

    public function getEstacaodestino_id() {
        return $this->estacaodestino_id;
    }

    public function setEstacaodestino_id($estacaodestino_id) {
        $this->estacaodestino_id = $estacaodestino_id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getDatainicial() {
        return $this->datainicial;
    }

    public function setDatainicial($datainicial) {
        $this->datainicial = $datainicial;
    }

    public function getDatafinal() {
        return $this->datafinal;
    }

    public function setDatafinal($datafinal) {
        $this->datafinal = $datafinal;
    }

    public function getB() {
        return $this->b;
    }

    public function setB($b) {
        $this->b = $b;
    }

    public function getA() {
        return $this->a;
    }

    public function setA($a) {
        $this->a = $a;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

}
