<?PHP

class VO_Usuario {

    //Atributos
    private $id;
    private $nome;
    private $cargo;
    private $senha;
    private $usuario;
    private $nivel;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getSenha() {
        return $this->senha;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getNivel() {
        return $this->nivel;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

}
?>