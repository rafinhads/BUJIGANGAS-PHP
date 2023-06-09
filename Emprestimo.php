<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo</title>
</head>
<body>
    <center>    
        <h1>Empréstimo</h1>
    </center>
    <div id="menu">
        <menu> 
            <a href="index.php" id="Cadastro">Início</a>
            <a href="Locatario.php" id="Cadastro">Cadastrar Locatário</a> 
            <a href="informacaoLoc.php" id="Cadastro" >Locatário</a> 
            <a href="Produto.php" id="Cadastro">Cadastrar Produtos</a>
            <a href="informacaoProd.php" id="Cadastro" >Produtos</a>
            <a href="Emprestimo.php" id="Cadastro" style="color:white;"> Empréstimo</a>
            <a href="Relatorio.php" id="Cadastro">Relatório</a> 
        </menu>
    </div>    
    <div id="Div">
        <form action="configemp.php" method="POST" id="formulario">
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

                    // Consulta todos os produtos cadastrados
                    $stmt = $conn->query("SELECT nome FROM Produto");

                    if ($stmt->rowCount() > 0) {
                        echo '
                        <label for="produto" id="cadastrar">Produto:</label><br>
                        <select id="select" name="produto">
                            <option value="-">-</option>';

                        // Exibe os produtos
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $nome = $row['nome'];
                            echo "<option value=\"$nome\">$nome</option>";
                        }
                        
                        echo '</select>';
                    } else {
                        echo "<br>";
                        echo "Nenhum produto cadastrado.";
                    }
               
                    echo "<br>";      
                    // Consulta todos os locatários cadastrados
                    $stmt = $conn->query("SELECT nome FROM Locatario");

                    if ($stmt->rowCount() > 0) {
                        echo '
                        <label for="locatario" id="cadastrar">Locatario:</label><br>
                        <select id="select" name="locatario">
                            <option value="opcao1">-</option>';

                        // Exibe os locatários
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $nome_locatario = $row['nome'];
                            echo "<option value=\"$nome_locatario\">$nome_locatario</option>";
                        }
                        
                        echo '</select>';
                    } else {
                        echo "<br>";
                        echo "Nenhum locatário cadastrado.";
                    }
                ?>
                <br>
                <label for="data_emprestimo" id="cadastrar">Data do Empréstimo:</label><br>
                <input type="date" name="data_emprestimo" id="select">
                <br><br>
                <input type="submit" value="Salvar" id="botao">
                <a href="index.php"><input type="button" value="Cancelar" id="botao"></a>
            </div>
        </form>
    </div>
</body>
</html>
