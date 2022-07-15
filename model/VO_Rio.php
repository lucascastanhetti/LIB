<?php
    
/**
 * Description of VO_Rio
 *
 * @author Overtech
 * @date 14/04/2020 13:33:40
 */
class VO_Rio{

        //Atributos
	private $id;
	private $nome;
	private $subbacia_id;
	private $codigo;

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

	 public function getSubbacia_id(){
	    return $this->subbacia_id;
         }

	 public function setSubbacia_id($subbacia_id){
	    $this->subbacia_id = $subbacia_id;
         }

	 public function getCodigo(){
	    return $this->codigo;
         }

	 public function setCodigo($codigo){
	    $this->codigo = $codigo;
         }

} ?>