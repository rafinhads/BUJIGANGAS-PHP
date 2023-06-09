<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrp Produtos</title>
</head>
<body>
    <center>
        <h1>Cadastrar Item</h1>
    </center>
    <div id="menu">
        <menu> 
            <a href="index.php" id="Cadastro">Início</a>
            <a href="Locatario.php" id="Cadastro">Cadastrar Locatário</a> 
            <a href="informacaoLoc.php" id="Cadastro" >Locatário</a> 
            <a href="Produto.php" id="Cadastro"  style="color:white;">Cadastrar Produtos</a>
            <a href="informacaoProd.php" id="Cadastro" >Produtos</a>
            <a href="Emprestimo.php" id="Cadastro"> Empréstimo</a>
            <a href="Relatorio.php" id="Cadastro">Relatório</a> 
        </menu>
    </div>
    <div id="Div">
        <form action="configprod.php" id="formulario" method="post">
            <div id="espacamento">
                <label for="nome_Produto" id="cadastrar">Nome do Produto:</label><br>
                <input type="text" name="nome_produto" id="input">
                <br>
                <label for="tipo" id="cadastrar">Tipo:</label><br>
                <input type="text" name="tipo" id="input"  >
                <br>
                <label for="quantidade" id="cadastrar">Quantidade:</label><br>
                <input type="number" name="quantidade" id="input"  >
                <br>
                <input type="submit" value="Salvar" id="botao">
                <a href="informacaoProd.php"><input type="button" value="Cancelar" id="botao"></a>
           </div>
        </form>
    </div> 
 
</body>
</html>