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
            <a href="informacaoLoc.php" id="Cadastro" >Locatário</a>
            <a href="Produto.php" id="Cadastro">Cadastrar Produtos</a>
            <a href="informacaoProd.php" id="Cadastro">Produtos</a>
            <a href="Emprestimo.php" id="Cadastro">Empréstimo</a>
            <a href="Relatorio.php" id="Cadastro" style="color:white;">Relatório</a>
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
                        // echo "Conexão estabelecida com sucesso!";
                    } catch (PDOException $e) {
                        // echo "Conexão não estabelecida!";
                    }

                    // Excluir empréstimo se o ID do empréstimo for fornecido
                    if (isset($_GET['delete'])) {
                        $emprestimoId = $_GET['delete'];

                        try {
                            $stmtDelete = $conn->prepare("DELETE FROM Emprestimo WHERE id = :id");
                            $stmtDelete->bindParam(":id", $emprestimoId);
                            $stmtDelete->execute();
                            echo "Empréstimo excluído com sucesso!";
                        } catch (PDOException $e) {
                            echo "Erro ao excluir o empréstimo: " . $e->getMessage();
                        }
                    }

                    // Consulta todos os empréstimos cadastrados
                    $stmt = $conn->query("SELECT Emprestimo.id, Produto.nome AS produto, Locatario.nome AS locatario, data_emprestimo FROM Emprestimo 
                                        INNER JOIN Produto ON Emprestimo.id_Produto = Produto.id 
                                        INNER JOIN Locatario ON Emprestimo.id_Locatario = Locatario.id");

                    if ($stmt->rowCount() > 0) {
                        echo "
                        <table>
                            <tr>
                                <th>Produto</th>
                                <th>Locatário</th>
                                <th>Data do Empréstimo</th>
                                <th>Devolvido</th>
                                <th>Ação</th>
                            </tr>";

                        // Exibe os empréstimos
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $emprestimoId = $row['id'];
                            $produto = $row['produto'];
                            $locatario = $row['locatario'];
                            $data_emprestimo = $row['data_emprestimo'];

                            echo "
                            <tr>
                                <td>$produto</td>
                                <td>$locatario</td>
                                <td>$data_emprestimo</td>
                                <td  id='resultado'>  
                                <input type='checkbox' id='checkbox' onchange='verificarCheckbox()'></td>
                                <td><a href='?delete=$emprestimoId'>Excluir</a></td>
                            </tr>";
                        }
                        
                        echo "</table>";
                    } else {
                        echo "<br>";
                        echo "Nenhum empréstimo cadastrado.";
                    }
                ?>
            </main>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
