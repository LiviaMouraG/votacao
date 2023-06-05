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

<div class="quadrado-arredondado">    
<br> <section class="tt">
    <div class="container-formulario">

    <div class="container">
    <?php
    $stmt=$pdo->query('SELECT * FROM respostas');
    $resultados=$stmt->fetchALL(PDO::FETCH_ASSOC);

    if(count($resultados)==0){
        echo '<p>Nenhuma resposta encontrada.</p>';
    }else{
        echo'<table border="1">';
        echo'<thead><tr><th>id</th><th>pergunta</th><th>resposta</th></tr></thead>';
        echo '<tbody>';

        foreach ($resultados as $resultado){
            echo '<tr>';
            echo '<td>' . $resultado['id_resposta'] . '</td>';
            echo '<td>' . $resultado['pergunta_realizada']. '</td>';
            echo '<td>' . $resultado['resposta_selecionada']. '</td>';
            echo '<td><a href="deletar3.php?id=' . $resultado['id_resposta']. '">Deletar</a></td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }

    

    

?>
</div>
</div>
</div>



</body>
</html>