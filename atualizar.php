<?php
include 'db.php';
if(!isset($_GET['id'])){
    header('Location: listar.php');
    exit;
}
$id=$_GET['id'];

$stmt=$pdo->prepare('SELECT * FROM login_votos WHERE id = ?');
$stmt->execute([$id]);
$appointment=$stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location: listar.php');
    exit;
}
    $nome= $appointment['nome'];
    $telefone = $appointment['telefone'];
    $segmento = $appointment['segmento'];
    $quantidade = $appointment['quantidade'];
    $nome_da_org = $appointment['nome_da_org'];
    $email = $appointment['email'];
    $inf_adicionais = $appointment['inf_adicionais'];
    $data = $appointment['data'];
?>

<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
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

<title>Atualizar Compromisso</title>
    <h1>Atualizar Compromisso</h1>

     <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome;?>" required><br>

        <label for="tamanho">telefone:</label>
        <input type="text" name="telefone" value="<?php echo $telefone;?>" required><br>

        <label for="peso">segmento:</label>
        <input type="text" name="segmento" value="<?php echo $segmento;?>"><br>

        <label for="quantidade">Quantidade:</label>
        <input type="text" name="quantidade" value="<?php echo $quantidade;?>" required><br>

        <label for="preco">nome_da_org:</label>
        <input type="text" name="nome_da_org" value="<?php echo $nome_da_org;?>" required><br>

        <label for="preco">email:</label>
        <input type="text" name="email" value="<?php echo $email;?>" required><br>

        <label for="preco">inf_adicionais:</label>
        <input type="text" name="inf_adicionais" value="<?php echo $inf_adicionais;?>" required><br>

        <label for="preco">data:</label>
        <input type="text" name="data" value="<?php echo $data;?>" required><br>

        <button type="submit">Atualizar</button>

</form>


</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $segmento = $_POST['segmento'];
    $quantidade = $_POST['quantidade'];
    $nome_da_org = $_POST['nome_da_org'];
    $email = $_POST['email'];
    $inf_adicionais = $_POST['inf_adicionais'];
    $data = $_POST['data'];


    //validação dos dados do formulario aqui
    $stmt=$pdo->prepare('UPDATE login_votos SET nome = ?, telefone = ?, segmento = ?, quantidade = ?, nome_da_org = ?,email = ?,inf_adicionais = ?,data = ?  WHERE id = ?');
    $stmt->execute([$nome,$telefone,$segmento,$quantidade,$nome_da_org,$email,$inf_adicionais,$data,$id]);
    header('Location: compralist.php');
    exit;
}
?>