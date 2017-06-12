<?php
class Orientando{

	private $nome;
	private $matricula;
	private $curso;
	
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
  
      public function setMatricula($matricula)
  {
      $this->matricula = $matricula;
  }
 
  protected function getMatricula()
  {
      return $this->matricula . "<br />";
  }
	
	    public function setCurso($curso)
  {
      $this->curso = $curso;
  }
 
  protected function getCurso()
  {
      return $this->curso . "<br />";
  }
} ?>