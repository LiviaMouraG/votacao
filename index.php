<?php
require_once 'db.php';

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $segmento = $_POST['segmento'];
    $quantidade = $_POST['quantidade'];
    $nome_da_org = $_POST['nome_da_org'];
    $email = $_POST['email'];
    $inf_adicionais = $_POST['inf_adicionais'];
    $data = $_POST['data'];

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM login_votos WHERE data = ?');
    $stmt->execute([$data]);
    $count = $stmt->fetchColumn();

    if($count > 0){
        $error = 'Já existe um registro com essas informações.';
    }else{
        $stmt = $pdo->prepare('INSERT INTO login_votos (nome, telefone, segmento, quantidade, nome_da_org, email, inf_adicionais, data) 
        VALUES (:nome, :telefone, :segmento, :quantidade, :nome_da_org, :email, :inf_adicionais, :data)');

        $stmt->execute([
            'nome' => $nome,
            'telefone' => $telefone,
            'segmento' => $segmento,
            'quantidade' => $quantidade,
            'nome_da_org' => $nome_da_org,
            'email' => $email,
            'inf_adicionais' => $inf_adicionais,
            'data' => $data
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

<div class="quadrado-arredondado">
    <br />
    <section class="tt">
        <div class="container-formulario">
            <div class="letrinha">Cadastro</div>
            <form method="post">
                <label for="nome"></label>
                <input type="text" name="nome" placeholder="Nome" required /><br />

                <label for="telefone"></label>
                <input type="text" name="telefone" placeholder="Telefone" required /><br />

                <select name="segmento" id="segmento">
                    <option value="Selecione">Segmentos</option>
                    <option value="Segmento">Segmento</option>
                    <option value="Sindicato">Sindicato</option>
                    <option value="Associação, Fundação, Órgão do Governo, Igreja e Outros">Associação, Fundação, Órgão do Governo, Igreja e Outros</option>
                    <option value="Empresa">Empresa</option>
                    <option value="Condomínio residencial">Condomínio residencial</option>
                    <option value="Condomínio empresarial">Condomínio empresarial</option>
                    <option value="Administradora de condomínio">Administradora de condomínio</option>
                    <option value="Outros">Outros</option>
                </select>

                <select name="quantidade" id="quantidade">
                    <option value="0 a 50 leitores">0 a 50 leitores</option>
                    <option value="50 a 100 leitores">50 a 100 leitores</option>
                    <option value="100 a 250 leitores">100 a 250 leitores</option>
                    <option value="250 a 400 leitores">250 a 400 leitores</option>
                    <option value="400 a 500 leitores">400 a 500 leitores</option>
                    <option value="500 a 650 leitores">500 a 650 leitores</option>
                    <option value="650 a 800 leitores">650 a 800 leitores</option>
                    <option value="800 a 1000 leitores">800 a 1000 leitores</option>
                    <option value="1000+ leitores">1000+ leitores</option>
                </select>

                <label for="nome_da_org"></label>
                <input type="text" name="nome_da_org" placeholder="Nome da organização:" required /><br />

                <label for="email"></label>
                <input type="email" name="email" placeholder="E-mail:" required /><br />

                <label for="inf_adicionais"></label>
                <input type="text" name="inf_adicionais" placeholder="Informações adicionais" required /><br />

                <label for="data"></label>
                <input type="date" name="data" placeholder="Data" required /><br />

                <div>
                    <button type="submit" name="submit" value="Agendar">Concluir</button>
                    <button><a href="compralist.php">Listar</a></button>
                    <button><a href="enquete.php">Cadastrar Enquete</a></button>
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
