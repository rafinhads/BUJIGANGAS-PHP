
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
            <a href="Produto.php" id="Cadastro" style="color:white;">Cadastrar Produtos</a>
            <a href="informacaoProd.php" id="Cadastro" >Produtos</a>
            <a href="Emprestimo.php" id="Cadastro"> Empréstimo</a>
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
                                //echo "Conexão não estabelecida: " . $e->getMessage();
                            }

                            // Verifica se os dados do formulário foram enviados
                            
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Obtém os valores do formulário
                                $nome = $_POST["nome_produto"] ?? "";
                                $tipo = $_POST["tipo"] ?? "";
                                $quantidade = $_POST["quantidade"] ?? "";


                                // Prepara a instrução SQL de inserção
                                $stmt = $conn->prepare("INSERT INTO Produto (nome, tipo, Quantidade) VALUES (:nome, :tipo, :quantidade)");
                                $stmt->bindParam(":nome", $nome);
                                $stmt->bindParam(":tipo", $tipo);
                                $stmt->bindParam(":quantidade", $quantidade);


                                echo "<br>";

                                if ($stmt->execute()) {
                                    echo "Dados inseridos com sucesso!";
                                } else {
                                    echo "Erro ao inserir os dados no banco de dados.";
                                }
                            }
                        ?>


                    </div>
                </div>        
</body>
</html>