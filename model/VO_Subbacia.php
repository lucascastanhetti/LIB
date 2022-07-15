<?php
    
/**
 * Description of VO_Subbacia
 *
 * @author Overtech
 * @date 14/04/2020 13:34:24
 */
class VO_Subbacia{

        //Atributos
	private $id;
	private $nome;
	private $bacia_id;

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

	 public function getBacia_id(){
	    return $this->bacia_id;
         }

	 public function setBacia_id($bacia_id){
	    $this->bacia_id = $bacia_id;
         }

} ?>