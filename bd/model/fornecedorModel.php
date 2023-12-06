<?php

class Fornecedir{
	private $id;
	private $nomeFornecedor;
	private $endereco;
	private $contato;

	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo,$valor){
		$this->$atributo = $valor;
		return $this;
	}
}

?>