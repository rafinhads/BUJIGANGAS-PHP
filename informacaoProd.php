<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório dos Produtos</title>
</head>
<body>
    <header>
        <center>
            <h1>Relatório dos Produtos</h1>
        </center>
    </header>
    <div id="menu">
        <menu>
            <a href="index.php" id="Cadastro">Início</a>
            <a href="Locatario.php" id="Cadastro">Cadastrar Locatário</a>
            <a href="informacaoLoc.php" id="Cadastro">Locatário</a>
            <a href="Produto.php" id="Cadastro" >Cadastrar Produtos</a>
            <a href="informacaoProd.php" id="Cadastro" style="color:white;">Produtos</a>
            <a href="Emprestimo.php" id="Cadastro">Empréstimo</a>
            <a href="Relatorio.php" id="Cadastro">Relatório</a>
        </menu>
    </div>
    <div id="Div">
        <div id="espacamento">
            <main>
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

                    // Excluir produto se o ID do produto for fornecido
                    if (isset($_GET['delete'])) {
                        $productId = $_GET['delete'];

                        try {
                            $stmtDelete = $conn->prepare("DELETE FROM Produto WHERE id = :id");
                            $stmtDelete->bindParam(":id", $productId);
                            $stmtDelete->execute();
                            echo "Produto excluído com sucesso!";
                        } catch (PDOException $e) {
                            echo "Erro ao excluir o produto: " . $e->getMessage();
                        }
                    }

                    // Consulta todos os produtos cadastrados
                    $stmt = $conn->query("SELECT * FROM Produto");

                    if ($stmt->rowCount() > 0) {
                        echo "
                        <table>
                            <tr>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Quantidade</th>
                                <th>Ação</th>
                            </tr>";

                        // Exibe os produtos
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $productId = $row['id'];
                            $nome_produto = $row['nome'];
                            $tipo = $row['tipo'];
                            $quantidade = $row['quantidade'];

                            echo "
                            <tr>
                                <td>$nome_produto</td>
                                <td>$tipo</td>
                                <td>$quantidade</td>
                                <td><a href='?delete=$productId'>Excluir</a></td>
                            </tr>";
                        }
                        
                        echo "</table>";
                    } else {
                        echo "<br>";
                        echo "Nenhum produto cadastrado.";
                    }
                ?>
            </main>
        </div>
    </div>
</body>
</html>
