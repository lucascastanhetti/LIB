<?PHP
class VO_Vazao{

        //Atributos
	private $curvachave_id;
	private $vazao;
	private $nivel;
	private $id;

	 public function getCurvachave_id(){
	    return $this->curvachave_id;
         }

	 public function setCurvachave_id($curvachave_id){
	    $this->curvachave_id = $curvachave_id;
         }

	 public function getVazao(){
	    return $this->vazao;
         }

	 public function setVazao($vazao){
	    $this->vazao = $vazao;
         }

	 public function getNivel(){
	    return $this->nivel;
         }

	 public function setNivel($nivel){
	    $this->nivel = $nivel;
         }

	 public function getId(){
	    return $this->id;
         }

	 public function setId($id){
	    $this->id = $id;
         }

}
?>