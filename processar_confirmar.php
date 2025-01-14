<?php 
session_start();


function cadastrarSemLogin() {
    include("conexao.php");
    $nome = trim($_POST['nome']);
    $sobrenome = trim($_POST['sobrenome']);
    $email = trim($_POST['email']);
    $bi = trim($_POST['bi']);
    $nome_empresa = trim($_POST['nome_empresa']);
    $nif_empresa = trim($_POST['nif_empresa']);
    $provincia = trim($_POST['provincia']);
    $municipio = trim($_POST['municipio']);
    $endereco = trim($_POST['endereco']);
    $passe = trim(md5($_POST['passe']));
    $arquivo = $_FILES['arquivo_bi_nif'];
    $metodo_pagamento = trim($_POST['metodo_pagamento']);

    $diretorioDestino = 'uploads/'; // Pasta para salvar os arquivos
    if (!is_dir($diretorioDestino)) {
        mkdir($diretorioDestino, 0777, true); // Cria o diretório se não existir
    }

    $nomeArquivo = uniqid() . "_" . basename($arquivo['name']);
    $caminhoCompleto = $diretorioDestino . $nomeArquivo;

    if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {

        $sqlCliente = "INSERT INTO tb_cliente(nome, sobrenome, email, bi, nome_empresa, nif_empresa, provincia, municipio, endereco, arquivo_bi_nif, passe) VALUES('$nome', '$sobrenome', '$email', '$bi', '$nome_empresa', '$nif_empresa', '$provincia', '$municipio', '$endereco', '$nomeArquivo', '$passe')";
        $resultUser = $conexao->query($sqlCliente);

        if ($resultUser===true) {
            
            //Pegar o id do cliente
            $id_cliente = $conexao->insert_id;

            //Cadastrar o pedido
            $valor_total = array_sum(array_column($_SESSION['carrinho'], 'preco'));
            $queryPedido = "INSERT INTO tb_pedido (id_cliente, data_pedido, valor_total, metodo_pagamento) VALUES ($id_cliente, NOW(), $valor_total, '$metodo_pagamento')";
            if($conexao->query($queryPedido)){

                //pegar o id do pedido
                $id_pedido = $conexao->insert_id;


                foreach ($_SESSION['carrinho'] as $item) {
                    $tipo_servico = $conexao->real_escape_string($item['tipo']);
                    $descricao = $conexao->real_escape_string($item['descricao']);
                    $preco = $item['preco'];
                    $ciclo = $conexao->real_escape_string($item['ciclo']);


                    $queryItem = "INSERT INTO tb_item_pedido (id_pedido, tipo_servico, descricao, preco, ciclo) 
                                  VALUES ($id_pedido, '$tipo_servico', '$descricao', $preco, '$ciclo')";
                    if ($conexao->query($queryItem) !== true) {
                        die("Erro ao inserir item do pedido: " . $conexao->error);
                    }
                    else{

                        unset($_SESSION['carrinho']);
                        echo "<script>alert('Compra finalizada obrigado por escolher a itecma!')</script>";
                        if ($tipo_servico == "Dominio") {
                            
                            /////

                        }
                    }
                }
            }
        }
        else{
            echo "Erro ao cadastrar o cliente";
        }
    }

}

cadastrarSemLogin();
?>
