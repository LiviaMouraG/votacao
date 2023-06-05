<?php
require_once 'db.php';

$stmt = $pdo->prepare('SELECT * FROM enquete');
    $stmt->execute([]);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    $pergunta = $_POST['pergunta'];
    $resposta_enquete = $_POST['opcao'];

        $stmt2 = $pdo->prepare('INSERT INTO respostas (pergunta_realizada, resposta_selecionada) 
        VALUES (:pergunta_realizada, :resposta_selecionada)');

        $stmt2->execute([
            'pergunta_realizada' => $pergunta,
            'resposta_selecionada' =>  $resposta_enquete,
        ]);

        if($stmt2->rowCount()){
            echo '<span>Votação realizada com sucesso!</span>';
        }else{
            echo '<span>Erro ao votar. Tente novamente mais tarde.</span>';
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




        
<?php
if(count($resultados) == 0){
    echo "<p>Não existe enquete disponivel</p>";
}
?>



      
<?php
    if(count($resultados)>0){ 
?>
 <div class="quadrado-arredondado">
 <section class="tt">
        <div class="container-formulario">
    <?php 
    foreach ($resultados as $resultado) ?>
    <br />
    <section class="tt">
        <div class="container-formulario">
            <div class="letrinha">Enquete</div>
            <form method="post">
                <label for="pergunta">Pergunta:</label>
                <input type="text" name="pergunta" value="<?php echo $resultado['pergunta']; ?>" required /></br>
                
                <label for="opcao">Opção:</label>
                <select name="opcao" id="opcao">
                        <option value="<?php echo $resultado['resposta1']; ?>"><?php echo $resultado['resposta1']; ?></option>
                        <option value="<?php echo $resultado['resposta1_op']; ?>"><?php echo $resultado['resposta1_op']; ?></option>
                        <option value="<?php echo $resultado['resposta2']; ?>"><?php echo $resultado['resposta2']; ?></option>
                        <option value="<?php echo $resultado['resposta2_op']; ?>"><?php echo $resultado['resposta2_op']; ?></option>
                </select>

                <div>
                    <button type="submit" name="submit" value="Agendar">Salvar</button>
                    <button><a href="listEnquete.php">Listar</a></button>
                    <button><a href="deletar.php?id=<?php echo $resultado['id']; ?>">deletar</a></button>
                    <button><a href="visu.php">Resultados</a></button>
                    
                </div>
            </form>
        </div>
    </section>
    
</div>
</div>
</div>
</div>
<?php } ?>





</body>
</html>