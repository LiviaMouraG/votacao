<?php
require_once 'db.php';

if(isset($_POST['submit'])){
    $pergunta = $_POST['pergunta'];
    $resposta1 = $_POST['resposta1'];
    $resposta1_op = $_POST['resposta1_op'];
    $resposta2 = $_POST['resposta2'];
    $resposta2_op = $_POST['resposta2_op'];

    
        $stmt = $pdo->prepare('INSERT INTO enquete (pergunta, resposta1, resposta1_op, resposta2, resposta2_op) 
        VALUES (:pergunta, :resposta1, :resposta1_op, :resposta2, :resposta2_op)');

        $stmt->execute([
            'pergunta' => $pergunta,
            'resposta1' => $resposta1,
            'resposta1_op' => $resposta1_op,
            'resposta2' => $resposta2,
            'resposta2_op' => $resposta2_op,
        ]);

        if($stmt->rowCount()){
            echo '<span>Cadastro realizado com sucesso!</span>';
        }else{
            echo '<span>Erro ao cadastrar. Tente novamente mais tarde.</span>';
        }
    }

    if(isset($error)){
        echo '<span>'.$error.'</span>';
    }

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
   <br />
<div class="quadrado-arredondado3">
   
    <section class="tt">
        <div class="container-formulario">
            <div class="letrinha">Cadastro da Enquete</div>
            <form method="post">
                <label for="pergunta"></label>
                <input type="text" name="pergunta" placeholder="pergunta" required /><br />

                <label for="resposta1"></label>
                <input type="text" name="resposta1" placeholder="resposta1" required /><br />

                <label for="resposta1_op"></label>
                <input type="text" name="resposta1_op" placeholder="Nome da resposta1_op:" required /><br />

                <label for="resposta2"></label>
                <input type="text" name="resposta2" placeholder="resposta2:" required /><br />

                <label for="resposta2_op"></label>
                <input type="text" name="resposta2_op" placeholder="resposta2_op" required /><br />

                <div>
                    <button type="submit" name="submit" value="Agendar">Salvar</button>
                    <button><a href="votacao.php">Listar</a></button>
                    <button><a href="visu.php">Visualizar respostas</a></button>
                    
                </div>
            </form>
        </div>
    </section>
</div>
</div>

<div class="canto"><img src="64552aa66a7dd9d621ed619afbb0b2cb.png" height="100%" weight="100%"></div>  
<div class="canto2"><img src="64552aa66a7dd9d621ed619afbb0b2cb (3).png" height="100%" weight="100%"></div>

</body>
</html>
