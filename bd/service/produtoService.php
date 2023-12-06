<?php
require_once '../Conexao.php';
require_once 'estoqueService.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ProdutoService {
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function criarProduto($nome, $descricao, $preco, $categoria_id, $estoque_id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("INSERT INTO `mydb`.`Produto` (`nome_produto`, `desc_produto`, `preco_produto`, `categoria_idcategoria`, `Estoque_idEstoque`) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $preco, $categoria_id, $estoque_id]);
    }

    public function editarProduto($id, $nome, $descricao, $preco, $categoria_id, $estoque_id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("UPDATE `mydb`.`Produto` SET `nome_produto` = ?, `desc_produto` = ?, `preco_produto` = ?, `categoria_idcategoria` = ?, `Estoque_idEstoque` = ? WHERE `idProduto` = ?");
        $stmt->execute([$nome, $descricao, $preco, $categoria_id, $estoque_id, $id]);
    }

    public function buscaIdProduto($nome) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("SELECT `idProduto` FROM `mydb`.`Produto` WHERE `nome_produto` = ?");
        $stmt->execute([$nome]);
        return $stmt->fetchColumn();
    }
    

	public function selecionarProdutoTodos() {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("SELECT * FROM `mydb`.`Produto`");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
	public function buscaIdEstoque($id){
		$conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("SELECT Estoque_idEstoque FROM `mydb`.`Produto` WHERE `idProduto` = ?");
		$stmt->execute([$id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function buscaEstoqueAtual($id){
		$conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("SELECT Estoque_idEstoque FROM `mydb`.`Produto` WHERE `idProduto` = ?");
		$stmt->execute([$id]);
		$idEstoque = $stmt->fetch(PDO::FETCH_ASSOC);
		$stmt2 = $conexao->prepare("SELECT Qtdf_Estoque FROM `mydb`.`Estoque` WHERE `idEstoque` = ?");
		$stmt2->execute([$idEstoque['Estoque_idEstoque ']]);
        return $stmt2->fetch(PDO::FETCH_ASSOC); 
	}

    public function excluirProduto($id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("DELETE FROM `mydb`.`Produto` WHERE `idProduto` = ?");
        $stmt->execute([$id]);
    }
}
?>
