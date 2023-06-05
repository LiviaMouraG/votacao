<?php include 'db.php'; 
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


<br> <section class="tt">
<div align="center" class="quadrado-arredondado3">
    <div class="container">
    <?php
    $stmt=$pdo->query('SELECT * FROM enquete');
    $enquete=$stmt->fetchALL(PDO::FETCH_ASSOC);

    if(count($enquete)==0){
        echo '<p>Nenhuma enquete encontrada.</p>';
    }else{
        echo'<table border="1">';
        echo'<thead><tr><th>pergunta</th><th>resposta1</th><th>resposta1_op</th><th>resposta2</th><th>resposta2_op</th>
        <th colspan="2">Opções</th></tr></thead>';
        echo '<tbody>';

        foreach ($enquete as $enquetes){
            echo '<tr>';
            echo '<td>' . $enquetes['pergunta'] . '</td>';
            echo '<td>' . $enquetes['resposta1']. '</td>';
            echo '<td>' . $enquetes['resposta1_op']. '</td>';
            echo '<td>' . $enquetes['resposta2']. '</td>';
            echo '<td>' . $enquetes['resposta2_op']. '</td>';
            echo '<td><a href="deletar.php?id=' . $enquetes['id']. '">Deletar</a></td>';
            echo '<td><a href="votacao.php?id=' . $enquetes['id']. '">voltar</a></td>';
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