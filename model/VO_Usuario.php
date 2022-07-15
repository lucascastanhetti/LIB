<?PHP

class VO_Usuario {

    //Atributos
    private $id;
    private $estacao;
    private $nivel;
    private $nome;
    private $senha;
    private $usuario;
    private $empresa_id;
    private $status;
    private $ip;
    private $banco;
    private $empresas;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEstacao() {
        return $this->estacao;
    }

    public function setEstacao($estacao) {
        $this->estacao = $estacao;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getEmpresa_id() {
        return $this->empresa_id;
    }

    public function setEmpresa_id($empresa_id) {
        $this->empresa_id = $empresa_id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    public function getEmpresas() {
        return $this->empresas;
    }

    public function setEmpresas($empresas) {
        $this->empresas = $empresas;
    }

}

?>