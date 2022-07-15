<?PHP
class VO_Aneellog{

        //Atributos
	private $retorno;
	private $horarioenvio;
	private $estacaonome;
	private $estacaocodigo;
	private $codigoplu;
	private $codigoflu;
	private $id;

	 public function getRetorno(){
	    return $this->retorno;
         }

	 public function setRetorno($retorno){
	    $this->retorno = $retorno;
         }

	 public function getHorarioenvio(){
	    return $this->horarioenvio;
         }

	 public function setHorarioenvio($horarioenvio){
	    $this->horarioenvio = $horarioenvio;
         }

	 public function getEstacaonome(){
	    return $this->estacaonome;
         }

	 public function setEstacaonome($estacaonome){
	    $this->estacaonome = $estacaonome;
         }

	 public function getEstacaocodigo(){
	    return $this->estacaocodigo;
         }

	 public function setEstacaocodigo($estacaocodigo){
	    $this->estacaocodigo = $estacaocodigo;
         }

	 public function getCodigoplu(){
	    return $this->codigoplu;
         }

	 public function setCodigoplu($codigoplu){
	    $this->codigoplu = $codigoplu;
         }

	 public function getCodigoflu(){
	    return $this->codigoflu;
         }

	 public function setCodigoflu($codigoflu){
	    $this->codigoflu = $codigoflu;
         }

	 public function getId(){
	    return $this->id;
         }

	 public function setId($id){
	    $this->id = $id;
         }

}