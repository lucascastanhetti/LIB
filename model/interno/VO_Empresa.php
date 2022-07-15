<?PHP
class VO_Empresa{

        //Atributos
	private $id;
	private $nome;
	private $bd;
	
	 public function getId(){
	    return $this->id;
         }

	 public function setId($id){
	    $this->id = $id;
         }

         function getNome() {
             return $this->nome;
         }

         function getBd() {
             return $this->bd;
         }

         function setNome($nome) {
             $this->nome = $nome;
         }

         function setBd($bd) {
             $this->bd = $bd;
         }


}
