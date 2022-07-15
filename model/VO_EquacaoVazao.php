<?PHP

class VO_Equacaovazao {

    //Atributos
    private $curvachave_id;
    private $usuario;
    private $min;
    private $max;
    private $h0;
    private $datacadastro;
    private $b;
    private $a;
    private $id;

    public function getCurvachave_id() {
        return $this->curvachave_id;
    }

    public function setCurvachave_id($curvachave_id) {
        $this->curvachave_id = $curvachave_id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getMin() {
        return $this->min;
    }

    public function setMin($min) {
        $this->min = $min;
    }

    public function getMax() {
        return $this->max;
    }

    public function setMax($max) {
        $this->max = $max;
    }

    public function getH0() {
        return $this->h0;
    }

    public function setH0($h0) {
        $this->h0 = $h0;
    }

    public function getDatacadastro() {
        return $this->datacadastro;
    }

    public function setDatacadastro($datacadastro) {
        $this->datacadastro = $datacadastro;
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

}
?>