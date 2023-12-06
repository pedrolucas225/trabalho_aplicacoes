<?php

require_once "fornecedorService.php";
require_once "contatosService.php";
require_once "estoqueService.php";
require_once "produtoService.php";
require_once "categoriaService.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

switch ($acao) {
    case 'cadastrarProduto':
        cadastrarProduto();
        break;
    case 'cadastrarCategoria':
        cadastrarCategoria();
        break;
    case 'cadastrarFornecedor':
        cadastrarFornecedor();
        break;
    case 'atualizaEstoque':
        atualizaEstoque();
        break;
    case 'buscaProdutos':
        buscaProdutos();
        break;
    default:
        // Lógica padrão ou redirecionamento para uma página inicial
        break;
}

function cadastrarFornecedor() {

    $fornecedorService = new fornecedorService();
    $fornecedor_nome = $_POST['fornecedor_nome'];
    $fornecedor_endereco = $_POST['fornecedor_endereco'];

    $fornecedorService->criarFornecedor($fornecedor_nome, $fornecedor_endereco);

    $contatosService = new ContatosService();
    $contato_telefone = $_POST['fornecedor_contato'];
    if (isset($_POST['fornecedor_email'])) {
        $contato_email = $_POST['fornecedor_email'];
    } else {
        // Lide com o caso em que 'fornecedor_email' não está definido
        $contato_email = '-'; // Ou atribua um valor padrão, dependendo da lógica do seu aplicativo.
    }
    $fornecedor_id = $fornecedorService->selecionarFornecedor($_POST['fornecedor_nome']);
    print_r($fornecedor_id);
    $contatosService->criarContato($contato_telefone, $contato_email, $fornecedor_id["idFornecedor"]);
    header("Location: ../../index.php");
    exit();
}
function cadastrarProduto() {
    $produtoService = new produtoService(); // Certifique-se de substituir "SuaClasse" pelo nome correto da sua classe
    $produto_nome = $_POST['produto_nome'];
    $produto_descricao = $_POST['produto_descricao'];
    $produto_preco = $_POST['produto_preco'];
    $produto_categoria = $_POST['produto_categoria'];
    $produto_fornecedor = $_POST['produto_fornecedor'];
    $qtdInitProd = $_POST['qtdInitProd'];

    // Aqui você deve buscar o ID do produto antes de criar o produto
    $prodID = $produtoService->buscaIdProduto($produto_nome);
    $estoqueService = new estoqueService(); // Substitua "SuaClasse" pelo nome correto da sua classe

    // Adicionar o estoque e obter o ID do estoque recém-adicionado
    $dataAtual = date('Y-m-d'); // Corrigi o formato da data para o formato aceito pelo MySQL
    $idEstoqueAtual = $estoqueService->adicionarEstoque($qtdInitProd, $dataAtual, "-");

    // Criar o produto com o ID do estoque associado
    $produtoService->criarProduto($produto_nome, $produto_descricao, $produto_preco, $produto_categoria, $idEstoqueAtual);

    header("Location: ../../index.php");
    exit();
}

function cadastrarCategoria() {
    $categoriaService = new categoriaService();
    $categoria_nome = $_POST['categoria_nome'];
    $categoria_descricao = $_POST['categoria_description'];

    $categoriaService->criarCategoria($categoria_nome, $categoria_descricao);

    header("Location: ../../index.php");
    exit();
}



function buscaProdutos() {
    session_start();
    $produtoService = new produtoService();
    // Se o nome do produto está vazio, retorna uma mensagem adequada
    $prod_nome = $_POST['produto_name'];

    $produtos = $produtoService->selecionarProdutoTodos();

    // Armazena os produtos na session
    $_SESSION['produtos'] = $produtos;
    $_SESSION['page'] = "relatorio";

    // Redireciona para "relatorio"
    header("Location: ../../index.php");
    exit(); // Termina a execução após redirecionar
}

function atualizaEstoque(){
    $id_prod = $_POST["id_prod"];
    $qtdEstoque = $_POST["qtd_estoque"];
    $produtoService = new produtoService();
    $estoqueAtual = $produtoService->buscaEstoqueAtual($id_prod);
    $estoqueService = new estoqueService();
    $dataAtual = date('d-m-Y');
    if(!empty($estoqueAtual['Qtdf_Estoque'])){
        $id_estoque = $produtoService->buscaIdEstoque($id_prod);
        $qtdEstoque = $qtdEstoque + $estoqueAtual['Qtdf_Estoque'];
        $estoqueService->editarEstoque($id_estoque['Estoque_idEstoque'], $qtdEstoque, $dataAtual, "-");
    } else {
        $estoqueService->adicionarEstoque($qtdEstoque , $id_prod, $dataAtual, "-");
    }
    header("Location: ../../index.php");
    exit();
}
