<?PHP
class VO_EstacaoDetalhe{

        //Atributos
	private $id;
	private $acessibilidade;
	private $dataimplantacao;
	private $datavisita;
	private $descricao;
	private $imagemurl;
	private $latitude;
	private $localizacao;
	private $longitude;
	private $offsettransmissao;
	private $rio;
	private $municipio_id;
	private $operadora_id;
	private $protocolo_id;
	private $regiao_id;
        private $altitude;
        private $areadrenagem;
        private $NA;
        private $cotaVertimento;

	 public function getId(){
	    return $this->id;
         }

	 public function setId($id){
	    $this->id = $id;
         }

	 public function getAcessibilidade(){
	    return $this->acessibilidade;
         }

	 public function setAcessibilidade($acessibilidade){
	    $this->acessibilidade = $acessibilidade;
         }

	 public function getDataimplantacao(){
	    return $this->dataimplantacao;
         }

	 public function setDataimplantacao($dataimplantacao){
	    $this->dataimplantacao = $dataimplantacao;
         }

	 public function getDatavisita(){
	    return $this->datavisita;
         }

	 public function setDatavisita($datavisita){
	    $this->datavisita = $datavisita;
         }

	 public function getDescricao(){
	    return $this->descricao;
         }

	 public function setDescricao($descricao){
	    $this->descricao = $descricao;
         }

	 public function getImagemurl(){
	    return $this->imagemurl;
         }

	 public function setImagemurl($imagemurl){
	    $this->imagemurl = $imagemurl;
         }

	 public function getLatitude(){
	    return $this->latitude;
         }

	 public function setLatitude($latitude){
	    $this->latitude = $latitude;
         }

	 public function getLocalizacao(){
	    return $this->localizacao;
         }

	 public function setLocalizacao($localizacao){
	    $this->localizacao = $localizacao;
         }

	 public function getLongitude(){
	    return $this->longitude;
         }

	 public function setLongitude($longitude){
	    $this->longitude = $longitude;
         }

	 public function getOffsettransmissao(){
	    return $this->offsettransmissao;
         }

	 public function setOffsettransmissao($offsettransmissao){
	    $this->offsettransmissao = $offsettransmissao;
         }

	 public function getRio(){
	    return $this->rio;
         }

	 public function setRio($rio){
	    $this->rio = $rio;
         }

	 public function getMunicipio_id(){
	    return $this->municipio_id;
         }

	 public function setMunicipio_id($municipio_id){
	    $this->municipio_id = $municipio_id;
         }

	 public function getOperadora_id(){
	    return $this->operadora_id;
         }

	 public function setOperadora_id($operadora_id){
	    $this->operadora_id = $operadora_id;
         }

	 public function getProtocolo_id(){
	    return $this->protocolo_id;
         }

	 public function setProtocolo_id($protocolo_id){
	    $this->protocolo_id = $protocolo_id;
         }

	 public function getRegiao_id(){
	    return $this->regiao_id;
         }

	 public function setRegiao_id($regiao_id){
	    $this->regiao_id = $regiao_id;
         }
         function getAltitude() {
             return $this->altitude;
         }

         function setAltitude($altitude) {
             $this->altitude = $altitude;
         }
         
         function getAreadrenagem() {
             return $this->areadrenagem;
         }

         function setAreadrenagem($areadrenagem) {
             $this->areadrenagem = $areadrenagem;
         }

         function getNA() {
             return $this->NA;
         }

         function getCotaVertimento() {
             return $this->cotaVertimento;
         }

         function setNA($NA) {
             $this->NA = $NA;
         }

         function setCotaVertimento($cotaVertimento) {
             $this->cotaVertimento = $cotaVertimento;
         }



}