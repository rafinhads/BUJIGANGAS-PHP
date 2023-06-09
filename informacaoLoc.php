<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório dos Locatários</title>
</head>
<body>
    <header>
        <center>
            <h1>Relatório dos Locatários</h1>
        </center>
    </header>
    <div id="menu">
        <menu>
            <a href="index.php" id="Cadastro">Início</a>
            <a href="Locatario.php" id="Cadastro">Cadastrar Locatário</a>
            <a href="informacaoLoc.php" id="Cadastro" style="color:white;">Locatário</a>
            <a href="Produto.php" id="Cadastro">Cadastrar Produtos</a>
            <a href="informacaoProd.php" id="Cadastro">Produtos</a>
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

                    // Excluir locatário se o ID do locatário for fornecido
                    if (isset($_GET['delete'])) {
                        $locatarioId = $_GET['delete'];

                        try {
                            $stmtDelete = $conn->prepare("DELETE FROM Locatario WHERE id = :id");
                            $stmtDelete->bindParam(":id", $locatarioId);
                            $stmtDelete->execute();
                            echo "Locatário excluído com sucesso!";
                        } catch (PDOException $e) {
                            echo "Erro ao excluir o locatário: " . $e->getMessage();
                        }
                    }

                    // Consulta todos os locatários cadastrados
                    $stmt = $conn->query("SELECT * FROM Locatario");

                    if ($stmt->rowCount() > 0) {
                        echo "
                        <table>
                            <tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Telefone</th>
                                <th>CEP</th>
                                <th>Complemento</th>
                                <th>Ação</th>
                            </tr>";

                        // Exibe os locatários
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $locatarioId = $row['id'];
                            $nome_locatario = $row['nome'];
                            $cpf = $row['cpf'];
                            $telefone = $row['telefone'];
                            $cep = $row['cep'];
                            $complemento = $row['complemento'];

                            echo "
                            <tr>
                                <td>$nome_locatario</td>
                                <td>$cpf</td>
                                <td>$telefone</td>
                                <td>$cep</td>
                                <td>$complemento</td>
                                <td><a href='?delete=$locatarioId'>Excluir</a></td>
                            </tr>";
                        }
                        
                        echo "</table>";
                    } else {
                        echo "<br>";
                        echo "Nenhum locatário cadastrado.";
                    }
                ?>
            </main>
        </div>
    </div>
</body>
</html>
