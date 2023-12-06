<?php
require_once '../Conexao.php';

class FornecedorService {
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function criarFornecedor($nome, $endereco) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("INSERT INTO `mydb`.`Fornecedor` (`nome_fornecedor`, `endereco_fornecedor`) VALUES (?, ?)");
        $stmt->execute([$nome, $endereco]);
        echo "fornecedor criado com sucesso";
    }

    public function editarFornecedor($id, $nome) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("UPDATE `mydb`.`Fornecedor` SET `nome_fornecedor` = ? WHERE `idFornecedor` = ?");
        $stmt->execute([$nome, $id]);
    }

    public function selecionarFornecedor($nome) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("SELECT * FROM `mydb`.`Fornecedor` WHERE `nome_fornecedor` = ?");
        $stmt->execute([$nome]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluirFornecedor($id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("DELETE FROM `mydb`.`Fornecedor` WHERE `idFornecedor` = ?");
        $stmt->execute([$id]);
    }
}
?>
