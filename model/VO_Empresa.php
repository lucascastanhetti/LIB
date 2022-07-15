<?PHP
class VO_Empresa{

        //Atributos
	private $id;
	private $abreviatura;
	private $cnpj;
	private $contato;
	private $logo;
	private $nome;
	private $tel;
	private $pathaneel;
        private $hasBalancoHidrico;
        private $hasPrevisaoGeracao;
        private $hasKirpich;
        private $hasCurvaPermanencia;

	 public function getId(){
	    return $this->id;
         }

	 public function setId($id){
	    $this->id = $id;
         }

	 public function getAbreviatura(){
	    return $this->abreviatura;
         }

	 public function setAbreviatura($abreviatura){
	    $this->abreviatura = $abreviatura;
         }

	 public function getCnpj(){
	    return $this->cnpj;
         }

	 public function setCnpj($cnpj){
	    $this->cnpj = $cnpj;
         }

	 public function getContato(){
	    return $this->contato;
         }

	 public function setContato($contato){
	    $this->contato = $contato;
         }

	 public function getLogo(){
	    return $this->logo;
         }

	 public function setLogo($logo){
	    $this->logo = $logo;
         }

	 public function getNome(){
	    return $this->nome;
         }

	 public function setNome($nome){
	    $this->nome = $nome;
         }

	 public function getTel(){
	    return $this->tel;
         }

	 public function setTel($tel){
	    $this->tel = $tel;
         }

	 public function getPathaneel(){
	    return $this->pathaneel;
         }

	 public function setPathaneel($pathaneel){
	    $this->pathaneel = $pathaneel;
         }
         public function gethasBalancoHidrico(){
	    return $this->hasBalancoHidrico;
         }

	 public function sethasBalancoHidrico($hasBalancoHidrico){
	    $this->hasBalancoHidrico = $hasBalancoHidrico;
         }
         public function gethasPrevisaoGeracao(){
	    return $this->hasPrevisaoGeracao;
         }

	 public function sethasPrevisaoGeracao($hasPrevisaoGeracao){
	    $this->hasPrevisaoGeracao = $hasPrevisaoGeracao;
         }

         function getHasKirpich() {
             return $this->hasKirpich;
         }

         function setHasKirpich($hasKirpich) {
             $this->hasKirpich = $hasKirpich;
         }
         function getHasCurvaPermanencia() {
             return $this->hasCurvaPermanencia;
         }

         function setHasCurvaPermanencia($hasCurvaPermanencia) {
             $this->hasCurvaPermanencia = $hasCurvaPermanencia;
         }


}
