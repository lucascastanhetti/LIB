<?PHP

class VO_Estacaoimagem {
    //Atributos
    private $estacao_id;
    private $url;
    private $descricao;
    private $datacadastro;
    private $id;

    public function getEstacao_id() {
        return $this->estacao_id;
    }

    public function setEstacao_id($estacao_id) {
        $this->estacao_id = $estacao_id;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDatacadastro() {
        return $this->datacadastro;
    }

    public function setDatacadastro($datacadastro) {
        $this->datacadastro = $datacadastro;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

}

?>