<?php

class Categoria{
	private $id;
	private $nomeCategoria;
	private $descricao;

	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo,$valor){
		$this->$atributo = $valor;
		return $this;
	}
}

?>