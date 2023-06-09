<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Locatário</title>
</head>
<body>
    <center>
        <h1>Cadastro de Locatário</h1>
    </center>
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
        <form action="configloc.php" id="formulario" method="post">
            <div id="espacamento">
                <label for="nome_locatario" id="cadastrar" >Nome Complemento:</label><br>
                <input type="text" name="nome_locatario" id="input" >
                <br>
                <label for="cpf" id="cadastrar">CPF:</label><br>
                <input type="text" name="cpf" id="cpf"  maxlength="14"  oninput="mascararCPF()" placeholder="000.000.000-00">
                <br>
                <label for="Telefone" id="cadastrar">Telefone:</label><br>
                <input type="text" name="Telefone" id="telefone" oninput="mascararTelefone()" maxlength="15" placeholder="(XX) X XXXXX-XXXX">
                <br>

                <label for="cep" id="cadastrar">CEP:</label><br>
                <input type="text" name="cep" id="cep" oninput="mascararCEP()" maxlength="9" placeholder="XXXXX-XXX">
                <br>
                <label for="Complemento" id="cadastrar">Complemento:</label><br>
                <input type="text" name="Complemento" id="input">
                <br>
                <input type="submit" value="Salvar" id="botao">
                <a href="informacaoLoc.php"><input type="Submit" value="Cancelar" id="botao"></a>
           </div>
        </form>
    </div> 
    <script src="script.js"></script>
</body>
</html>