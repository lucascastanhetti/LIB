<?PHP
class VO_Curvachave{

        //Atributos
        private $id;
        private $datainicial;
        private $datacadastro;
	private $estacao_id;
        private $urlcurva;
        private $usuario;	

        function getId() {
            return $this->id;
        }

        function getDatainicial() {
            return $this->datainicial;
        }

        function getDatacadastro() {
            return $this->datacadastro;
        }

        function getEstacao_id() {
            return $this->estacao_id;
        }

        function getUrlcurva() {
            return $this->urlcurva;
        }

        function getUsuario() {
            return $this->usuario;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setDatainicial($datainicial) {
            $this->datainicial = $datainicial;
        }

        function setDatacadastro($datacadastro) {
            $this->datacadastro = $datacadastro;
        }

        function setEstacao_id($estacao_id) {
            $this->estacao_id = $estacao_id;
        }

        function setUrlcurva($urlcurva) {
            $this->urlcurva = $urlcurva;
        }

        function setUsuario($usuario) {
            $this->usuario = $usuario;
        }




}
?>