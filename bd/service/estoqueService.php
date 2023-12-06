<?php
require_once '../Conexao.php';

class EstoqueService {
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function adicionarEstoque($qtd, $dataEntrada, $dataSaida) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("INSERT INTO `mydb`.`Estoque` (`Qtdf_Estoque`, `data_entrada_estoque`, `data_saida_estoque`) VALUES (?, ?, ?)");
        $stmt->execute([$qtd, $dataEntrada, $dataSaida]);
        // Obtém o ID do último registro inserido
        $idEstoque = $conexao->lastInsertId();

        return $idEstoque;
    }

    public function editarEstoque($id, $qtd, $dataEntrada, $dataSaida) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("UPDATE `mydb`.`Estoque` SET `Qtdf_Estoque` = ?, `data_entrada_estoque` = ?, `data_saida_estoque` = ? WHERE `idEstoque` = ?");
        $stmt->execute([$qtd, $dataEntrada, $dataSaida, $id]);
    }

    public function selecionarEstoque($id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("SELECT * FROM `mydb`.`Estoque` WHERE `idEstoque` = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluirEstoque($id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("DELETE FROM `mydb`.`Estoque` WHERE `idEstoque` = ?");
        $stmt->execute([$id]);
    }
}
?>
