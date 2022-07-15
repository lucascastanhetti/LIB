<?PHP
class VO_Leiturista{

        //Atributos
	private $id;
        private $nome;
        private $agencia;
        private $banco;
        private $conta;
        private $valor;
        private $rg;
        private $cpf;
        private $telefone;
        private $celular;
        private $status;
        private $estacao_id;
        
        function getId() {
            return $this->id;
        }

        function getNome() {
            return $this->nome;
        }

        function getAgencia() {
            return $this->agencia;
        }

        function getBanco() {
            return $this->banco;
        }

        function getConta() {
            return $this->conta;
        }

        function getValor() {
            return $this->valor;
        }

        function getRg() {
            return $this->rg;
        }

        function getCpf() {
            return $this->cpf;
        }

        function getTelefone() {
            return $this->telefone;
        }

        function getCelular() {
            return $this->celular;
        }

        function getStatus() {
            return $this->status;
        }

        function getEstacao_id() {
            return $this->estacao_id;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function setAgencia($agencia) {
            $this->agencia = $agencia;
        }

        function setBanco($banco) {
            $this->banco = $banco;
        }

        function setConta($conta) {
            $this->conta = $conta;
        }

        function setValor($valor) {
            $this->valor = $valor;
        }

        function setRg($rg) {
            $this->rg = $rg;
        }

        function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        function setCelular($celular) {
            $this->celular = $celular;
        }

        function setStatus($status) {
            $this->status = $status;
        }

        function setEstacao_id($estacao_id) {
            $this->estacao_id = $estacao_id;
        }



}
?>