<?php
class Orientador{

	private $nome;
	
	
	//construtor da classe
	public function __construct($nome) {
        $this->nome = $nome;
    }

    public function setNome($nome)
  {
      $this->nome = $nome;
  }
 
  protected function getNome()
  {
      return $this->nome . "<br />";
  }

} ?>