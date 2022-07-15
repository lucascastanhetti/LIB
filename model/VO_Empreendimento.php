<?PHP

class VO_Empreendimento {

    //Atributos
    private $id;
    private $cnpj;
    private $nome;
    private $fantasia;
    private $senhaaneel;
    private $usuarioaneel;
    private $tosend;
    private $areadrenagem;
    private $geracaomedia;
    private $vazaosanitaria;
    private $hasBalancoHidrico;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    function getFantasia() {
        return $this->fantasia;
    }

    function setFantasia($fantasia) {
        $this->fantasia = $fantasia;
    }

    public function getSenhaaneel() {
        return $this->senhaaneel;
    }

    public function setSenhaaneel($senhaaneel) {
        $this->senhaaneel = $senhaaneel;
    }

    public function getUsuarioaneel() {
        return $this->usuarioaneel;
    }

    public function setUsuarioaneel($usuarioaneel) {
        $this->usuarioaneel = $usuarioaneel;
    }

    public function getTosend() {
        return $this->tosend;
    }

    public function setTosend($tosend) {
        $this->tosend = $tosend;
    }

    public function getAreadrenagem() {
        return $this->areadrenagem;
    }

    public function setAreadrenagem($areadrenagem) {
        $this->areadrenagem = $areadrenagem;
    }

    public function getGeracaomedia() {
        return $this->geracaomedia;
    }

    public function setGeracaomedia($geracaomedia) {
        $this->geracaomedia = $geracaomedia;
    }

    public function getVazaosanitaria() {
        return $this->vazaosanitaria;
    }

    public function setVazaosanitaria($vazaosanitaria) {
        $this->vazaosanitaria = $vazaosanitaria;
    }

    function getHasBalancoHidrico() {
        return $this->hasBalancoHidrico;
    }

    function setHasBalancoHidrico($hasBalancoHidrico) {
        $this->hasBalancoHidrico = $hasBalancoHidrico;
    }

}

?>