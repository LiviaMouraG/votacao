<?php include 'db.php'; ?>

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

<div class="quadrado-arredondado2">

<br> <section class="tt">
    <div class="container-formulario">

    <div class="container">
    <?php
    $stmt=$pdo->query('SELECT * FROM login_votos ORDER BY data');
    $cliente=$stmt->fetchALL(PDO::FETCH_ASSOC);

    if(count($cliente)==0){
        echo '<p>Nenhum cadastro encontrado.</p>';
    }else{
        echo'<table border="1">';
        echo'<thead><tr><th>Nome</th><th>telefone</th><th>segmento</th><th>quantidade</th><th>nome_da_org</th>
        <th>email</th><th>inf_adicionais</th><th colspan="2">Opções</th></tr></thead>';
        echo '<tbody>';

        foreach ($cliente as $clientes){
            echo '<tr>';
            echo '<td>' . $clientes['nome'] . '</td>';
            echo '<td>' . $clientes['telefone']. '</td>';
            echo '<td>' . $clientes['segmento']. '</td>';
            echo '<td>' . $clientes['quantidade']. '</td>';
            echo '<td>' . $clientes['nome_da_org']. '</td>';
            echo '<td>' . $clientes['email']. '</td>';
            echo '<td>' . $clientes['inf_adicionais']. '</td>';
            echo '<td>' . date('d/m/Y', strtotime($clientes['data'])).'</td>';
            echo '<td><a href="atualizar.php?id=' . $clientes['id']. '">Atualizar</a></td>';
            echo '<td><a href="deletar.php?id=' . $clientes['id']. '">Deletar</a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }

?>
</div>
</div>

</body>
</html>