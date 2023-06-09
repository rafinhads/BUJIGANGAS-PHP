
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="style.css"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="menu">
        <menu> 
            <a href="index.php" id="Cadastro" >Início</a>
            <a href="Locatario.php" id="Cadastro" >Cadastrar Locatário</a> 
            <a href="informacaoLoc.php" id="Cadastro" >Locatário</a> 
            <a href="Produto.php" id="Cadastro" >Cadastrar Produtos</a>
            <a href="informacaoProd.php" id="Cadastro" >Produtos</a>
            <a href="Emprestimo.php" id="Cadastro" style="color:white;"> Empréstimo</a>
            <a href="Relatorio.php" id="Cadastro">Relatório</a> 
        </menu>
    </div>
                <div id="Div">
                    <div id="espacamento">  
                    <?php
                        // Parâmetros de conexão com o banco de dados
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "Bujigangas";

                        // Criação da conexão PDO
                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            //echo "Conexão estabelecida com sucesso!";
                        } catch (PDOException $e) {
                            //echo "Conexão não estabelecida!";
                        }

                        // Verifica se os dados do formulário foram enviados
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Obtém os valores do formulário
                            $nomeProduto = $_POST["produto"] ?? "";
                            $nomeLocatario = $_POST["locatario"] ?? "";
                            $dataEmprestimo = $_POST["data_emprestimo"] ?? "";

                            // Verifica se o nome do produto foi selecionado corretamente
                            if ($nomeProduto == "-") {
                                echo "Selecione um produto válido.";
                                exit;
                            }

                            // Verifica se o nome do locatário foi selecionado corretamente
                            if ($nomeLocatario == "opcao1") {
                                echo "Selecione um locatário válido.";
                                exit;
                            }

                            try {
                                // Obtém o id do produto com base no nome selecionado
                                $stmtProduto = $conn->prepare("SELECT id FROM Produto WHERE nome = :nome");
                                $stmtProduto->bindParam(":nome", $nomeProduto);
                                $stmtProduto->execute();

                                if ($stmtProduto->rowCount() > 0) {
                                    $rowProduto = $stmtProduto->fetch(PDO::FETCH_ASSOC);
                                    $idProduto = $rowProduto['id'];

                                    // Obtém o id do locatário com base no nome selecionado
                                    $stmtLocatario = $conn->prepare("SELECT id FROM Locatario WHERE nome = :nome");
                                    $stmtLocatario->bindParam(":nome", $nomeLocatario);
                                    $stmtLocatario->execute();

                                    if ($stmtLocatario->rowCount() > 0) {
                                        $rowLocatario = $stmtLocatario->fetch(PDO::FETCH_ASSOC);
                                        $idLocatario = $rowLocatario['id'];

                                        // Prepara a instrução SQL de inserção
                                        $stmt = $conn->prepare("INSERT INTO Emprestimo (id_Produto, id_Locatario, data_emprestimo) VALUES (:idProduto, :idLocatario, :dataEmprestimo)");
                                        $stmt->bindParam(":idProduto", $idProduto);
                                        $stmt->bindParam(":idLocatario", $idLocatario);
                                        $stmt->bindParam(":dataEmprestimo", $dataEmprestimo);

                                        if ($stmt->execute()) {
                                            echo "Dados inseridos com sucesso!";
                                        } else {
                                            echo "Erro ao inserir os dados no banco de dados.";
                                        }
                                    } else {
                                        echo "Locatário não encontrado.";
                                    }
                                } else {
                                    echo "Produto não encontrado.";
                                }
                            } catch (PDOException $e) {
                                echo "Erro ao executar a consulta: " . $e->getMessage();
                            }
                        }
                    ?>



                </div>
            </div>        
</body>
</html>