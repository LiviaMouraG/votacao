<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="search-bar">
    <input type="text" name="q" placeholder="Digite sua pesquisa">
    <input type="submit" value="Pesquisar">
</div>

<div class='site'>
    <section class="cabecalho">
        <div class="logo"><img src="logo_voto.webp" height="110px" weight="110px"></div>  

 <div id="menu">
        <ul>
        <li><a class='btao' href="./index.php">Cadastro</a></li>
            <li><a class='btao' href="./compralist.php">Lista de Cadastro</a></li>
            <li><a class='btao' href="./listEnquete.php">Enquetes</a></li>
            <li><a class='btao' href="./visu.php">Respostas</a></li>
        </ul>
    </div>
</section>

</section>
<div class="quadrado-arredondado2">
<div class="container">
    
<?php
$stmt = $pdo->query('SELECT * FROM login_votos');
$cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($cliente) == 0) {
    echo '<p>Não possui nenhum cadastro.</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>Telefone</th><th>Segmento</th><th>Quantidade</th><th>Nome da Org</th><th>Email</th><th>Inf. Adicionais</th><th>Data</th><th colspan="2">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($cliente as $clientes) {
        echo '<tr>';
        echo '<td>' . $clientes['nome'] . '</td>';
        echo '<td>' . $clientes['telefone']. '</td>';
        echo '<td>' . $clientes['segmento']. '</td>';
        echo '<td>' . $clientes['quantidade']. '</td>';
        echo '<td>' . $clientes['nome_da_org']. '</td>';
        echo '<td>' . $clientes['email']. '</td>';
        echo '<td>' . $clientes['inf_adicionais']. '</td>';
        echo '<td>' . $clientes['data']. '</td>';
        echo '<td><a href="compraaut.php?id=' . $clientes['id']. '">Atualizar</a></td>';
        echo '<td><a href="compradelete.php?id=' . $clientes['id']. '">Deletar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}

?>

</div>
</div>
<button class="btao3"><a href="enquete.php">Cadastrar Enquete</a></button>
</div>


</body>
</html>
