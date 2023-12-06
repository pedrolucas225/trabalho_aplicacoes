<?php
require_once '../Conexao.php';

class ContatosService {
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function criarContato($telefone, $email, $fornecedor_id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("INSERT INTO `mydb`.`contatos` (`telefone`, `email`, `Fornecedor_idFornecedor`) VALUES (?, ?, ?)");
        $stmt->execute([$telefone, $email, $fornecedor_id]);
    }

    public function editarContato($id, $telefone, $email, $fornecedor_id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("UPDATE `mydb`.`contatos` SET `telefone` = ?, `email` = ?, `Fornecedor_idFornecedor` = ? WHERE `idcontatos` = ?");
        $stmt->execute([$telefone, $email, $fornecedor_id, $id]);
    }

    public function selecionarContato($id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("SELECT * FROM `mydb`.`contatos` WHERE `idcontatos` = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function excluirContato($id) {
        $conexao = $this->conexao->conectar();
        $stmt = $conexao->prepare("DELETE FROM `mydb`.`contatos` WHERE `idcontatos` = ?");
        $stmt->execute([$id]);
    }
}
?>
