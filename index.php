<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Estoque</title>
    <?php
// Inicia a session (se já não estiver iniciada)
session_start();

?>
</head>

<body>
    <div class="sidebar">
        <ul>
            <li>
                <button>
                    <a href="javascript:void(0);" onclick="showPage('inicio')">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="text">Ínicio</span>
                    </a>
                </button>
            </li>
            <li>
                <button>
                    <a href="javascript:void(0);" onclick="showPage('cadastrarProduto')">
                        <span class="icon"><ion-icon name="barcode-outline"></ion-icon></span>
                        <span class="text">Cadastrar Produto</span>
                </button>
            </li>
            <li>
                <button>
                    <a href="javascript:void(0);" onclick="showPage('cadastrarFornecedor')">
                        <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                        <span class="text">Cadastrar Fornecedor</span>
                    </a>
                </button>
            </li>
            <li>
                <button>
                    <a href="javascript:void(0);" onclick="showPage('cadastrarCategoria')">
                        <span class="icon"><ion-icon name="duplicate-outline"></ion-icon></span>
                        <span class="text">Cadastrar Categoria</span>
                    </a>
                </button>
            </li>
            <li>
                <button>
                    <a href="javascript:void(0);" onclick="showPage('conferenciaProduto')">
                        <span class="icon"><ion-icon name="clipboard-outline"></ion-icon></span>
                        <span class="text">Conferência de Produto</span>
                    </a>
                </button>
            </li>
            <li>
                <button>
                    <a href="javascript:void(0);" onclick="showPage('relatorio')">
                        <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                        <span class="text">Relatório</span>
                    </a>
                </button>
            </li>
        </ul>
    </div>
    <div class="main">
        <div id="inicio" class="page">
            <div class="main-login">
                <div class="mensage-inicio-img">
                    <img src="inicio.svg" class="login-img" alt="batata">
                </div> 
                <div class="mensage-inicio">
                    <h1>Bem-vindo ao nosso<br> sistema de gerenciamento de estoque!<br> Sua solução completa para gerenciar estoque<br> começa aqui.</h1>
                </div> 
            </div>
            
        </div>
        <div id="cadastrarProduto" class="page">
            <div class="main-produto">
                <div class="card-produto">
                    <h1>Cadastro de Produtos</h1>
        
                    <form action="./bd/service/controller.php?acao=cadastrarProduto" method="post">
                            <div class="textfield">
                                <label for="produto_nome">Nome do Produto:</label>
                                <input type="text" id="produto_nome" name="produto_nome">
                            </div>
                            <div class="textfield">
                                <label for="produto_descricao">Descrição do Produto:</label>
                                <input type="text" id="produto_descricao" name="produto_descricao">
                            </div>
                            <div class="textfield">
                                <label for="produto_preco">Preço do Produto:</label>
                                <input type="number" id="produto_preco" name="produto_preco">
                            </div>
                            <div class="textfield">
                                <label for="produto_categoria">Categoria do Produto:</label>
                                <input type="text" id="produto_categoria" name="produto_categoria">
                            </div>
                            <div class="textfield">
                                <label for="produto_fornecedor">Quantidade inicial do produto</label>
                                <input type="text" id="qtdInitProd" name="qtdInitProd">
                            </div>
                            <div class="textfield">
                                <label for="produto_fornecedor">Fornecedor do Produto:</label>
                                <input type="text" id="produto_fornecedor" name="produto_fornecedor">
                            </div>
            
                            <button class="btn">Cadastrar Produto</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="cadastrarFornecedor" class="page">
            <div class="main-fornecedor">
                <div class="card-produto">
                    <h1>Cadastro de Fornecedores</h1>
            
                    <form action="./bd/service/controller.php?acao=cadastrarFornecedor" method="post">
                        <div class="textfield">
                            <label for="fornecedor_nome">Nome do Fornecedor:</label>
                            <input type="text" id="fornecedor_nome" name="fornecedor_nome">
                        </div>
                        <div class="textfield">
                            <label for="fornecedor_endereco">Endereço do Fornecedor:</label>
                            <input type="text" id="fornecedor_endereco" name="fornecedor_endereco">
                        </div>
                        <div class="textfield">
                            <label for="fornecedor_contato">Contato do Fornecedor:</label>
                            <input type="text" id="fornecedor_contato" name="fornecedor_contato">
                        </div>
                        <div class="textfield">
                            <label for="fornecedor_contato">E-mail do Fornecedor:</label>
                            <input type="text" id="fornecedor_email" name="fornecedor_contato">
                        </div>
                
                        <button class="btn">Cadastrar Fornecedor</button>
                    </form>
                </div>
                
                
            </div>
        </div>
        <div id="cadastrarCategoria" class="page">
            <div class="main-categoria">
                <div class="card-produto">
                    <div class="flex">
                        <h1>Cadastro de Categoria</h1>
                        <form action="./bd/service/controller.php?acao=cadastrarCategoria" method="post">
                            <div class="textfield">
                                <label for="categoria_nome">Nome da categoria:</label>
                                <input type="text" id="categoria_nome" name="categoria_nome">
                            </div>
                            <div class="textfield">
                                <br>
                                <label>Descreva sobre essa categoria:</label>
                                <input type="text" id="categoria_description" name="categoria_description">
                            </div>
                            <button class="btn">Cadastrar Categoria</button>
                        </form>
                    </div>
                </div>
                
                
            </div>
        </div>
        <div id="conferenciaProduto" class="page">
            <div class="main-categoria">
                <div class="card-produto">
                    <div class="flex">
                        <h1>Inserir estoque</h1>
                        <form action="./bd/service/controller.php?acao=atualizaEstoque" method="post">
                            <div class="textfield">
                                <label for="categoria_nome">Id do produto:</label>
                                <input type="text" id="id_prod" name="id_prod">
                            </div>
                            <div class="textfield">
                                <br>
                                <label>Quantidade de estoque a ser lançado:</label>
                                <input type="text" id="qtd_estoque" name="qtd_estoque">
                            </div>
                            <button class="btn">Lançar estoque</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="relatorio" class="page">
            <div class="main-relatorio">
                <div class="card-produto">
                    <div class="flex">
                        <h1>Relatório</h1>
                        <form action="./bd/service/controller.php?acao=buscaProdutos" method="post">
                            <div class="textfield">
                                <label for="produto_name">Clique abaixo para gerar o relatorio de produtos cadastrados.</label>
                            </div>
                            <button class="btn">Gerar</button>
                        </form>
                    </div>
                </div>
                <div id="resultadoRelatorio">
                    <!-- Aqui os produtos serão exibidos dinamicamente -->
                </div>
                
            </div>
        </div>
    </div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="script.js"></script>
<?php if (isset($_SESSION['produtos']) && isset($_SESSION['page']) && $_SESSION['page'] == "relatorio"): ?>
    <!-- Se a sessão 'produtos' está definida e não vazia -->
    <div class="table-container">
    <form>
        <h2>Lista de Produtos:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria ID</th>
                    <th>Estoque ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['produtos'] as $produto): ?>
                    <tr>
                        <td><?= htmlspecialchars($produto['idProduto']) ?></td>
                        <td><?= htmlspecialchars($produto['nome_produto']) ?></td>
                        <td><?= htmlspecialchars($produto['desc_produto']) ?></td>
                        <td><?= htmlspecialchars($produto['preco_produto']) ?></td>
                        <td><?= htmlspecialchars($produto['categoria_idcategoria']) ?></td>
                        <td><?= htmlspecialchars($produto['Estoque_idEstoque']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    </div>
    <!-- Script JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var page = 'relatorio';

            function showPage(pageId){
                var pages = document.querySelectorAll('.page');
                for (var i = 0; i < pages.length; i++) {
                    pages[i].style.display = 'none';
                }

                var page = document.getElementById(pageId);
                if (page) {
                    page.style.display = 'block';
                } 
            }

            showPage(page);
        });
    </script>
    <?php 
    session_destroy();
    ?>
<?php endif; ?>
</body>
</html>