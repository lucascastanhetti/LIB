<?php
    
/**
 * Description of VO_Bacia
 *
 * @author Overtech
 * @date 14/04/2020 13:34:52
 */
class VO_Bacia{

        //Atributos
	private $id;
	private $nome;

	 public function getId(){
	    return $this->id;
         }

	 public function setId($id){
	    $this->id = $id;
         }

	 public function getNome(){
	    return $this->nome;
         }

	 public function setNome($nome){
	    $this->nome = $nome;
         }

} ?>