<?php
include 'db.php';
if (!isset($_GET['id'])) {
    header('location: compralist.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM login_votos WHERE id * ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('location: compralist.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $stmt = $pdo->prepare('DELETE FROM login_votos WHERE id = ?');
    $stmt->execute([$id]);

    header('location: compralist.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Deletar Compromisso</title>
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

    <div class="letrinha">Deletar Cadastro</div>
    <p>Tem certeza que deseja deletar o Cadastro de <?php echo $appointment['nome']; ?> em <?php echo $appointment['quantidade']; ?>?</p>
    <form method="post">


    <button class="btao1"><a type="submit">Sim</a></button>

    <button class="btao1"><a href="listar.php">Não</a></button>

</form>
<button class="btao1"><a href="index.php">Início</a></button>
</body>
</html>