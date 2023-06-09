
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
            <a href="Locatario.php" id="Cadastro" style="color:white;">Cadastrar Locatário</a> 
            <a href="informacaoLoc.php" id="Cadastro" >Locatário</a> 
            <a href="Produto.php" id="Cadastro">Cadastrar Produtos</a>
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
                            echo "<br> <br>";
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                               // echo "Conexão estabelecida com sucesso!";
                            } catch (PDOException $e) {
                                //echo "Conexão não estabelecida!";
                            } 
                            //Verifica se os dados do formulário foram enviados
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Obtém os valores do formulário
                                $nome_locatario = $_POST["nome_locatario"];
                                $cpf = $_POST["cpf"];
                                $telefone = $_POST["Telefone"];
                                $cep = $_POST["cep"];
                                $complemento = $_POST["Complemento"];

                                // Prepara a instrução SQL de inserção
                                $stmt = $conn->prepare("INSERT INTO Locatario (nome, cpf, telefone, cep, complemento) VALUES (:nome, :cpf, :telefone, :cep, :complemento)");
                                $stmt->bindParam(":nome", $nome_locatario);
                                $stmt->bindParam(":cpf", $cpf);
                                $stmt->bindParam(":telefone", $telefone);
                                $stmt->bindParam(":cep", $cep);
                                $stmt->bindParam(":complemento", $complemento);
                                echo "<br>";
                                if ($stmt->execute()) {
                                    echo "Dados inseridos com sucesso!";
                                } else {
                                    echo " Erro ao inserir os dados no banco de dados.";
                                }
                            }

                        ?>
                    </div>
                </div>        
</body>
</html>