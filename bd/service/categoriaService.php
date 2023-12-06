<?php
require_once '../Conexao.php';

class CategoriaService {
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function criarCategoria($nome, $descricao) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("INSERT INTO `mydb`.`categoria` (`nome_cat`, `desc_cat`) VALUES (?, ?)");
        $stmt->execute([$nome, $descricao]);
    }

    public function editarCategoria($id, $nome, $descricao) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("UPDATE `mydb`.`categoria` SET `nome_cat` = ?, `desc_cat` = ? WHERE `idcategoria` = ?");
        $stmt->execute([$nome, $descricao, $id]);
    }

    public function selecionarCategoria($id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("SELECT * FROM `mydb`.`categoria` WHERE `idcategoria` = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluirCategoria($id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("DELETE FROM `mydb`.`categoria` WHERE `idcategoria` = ?");
        $stmt->execute([$id]);
    }
}
?>
