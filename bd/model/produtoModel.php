<?php

class Produto{
	private $id;
	private $nomeProduto;
	private $descricao;
	private $preco;
    private $categoria;
    private $fornecedor;


	public function __get($atributo){
		return $this->$atributo;
	}

	public function __set($atributo,$valor){
		$this->$atributo = $valor;
		return $this;
	}
}

?>