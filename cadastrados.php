<?php
    include "includes/db.php";
?>

<?php
    if(isset($_POST['salvar'])){
        $cur_id = $_GET['editar'];
        $nome = $_POST['nome'];
        $categoria = $_POST['categoria'];
        $nivel = $_POST['nivel'];
        $privacidade = $_POST['privacidade'];
        $email = $_POST['email_criador'];
        $preco = $_POST['preco'];
        $duracao = $_POST['duracao'];
        $descricao = $_POST['descricao'];

        if( (!empty($nome) or $nome != "") and 
            (!empty($categoria) or $categoria != "") and 
            (!empty($nivel) or $nivel != "") and 
            (!empty($privacidade) or $privacidade != "") and 
            (!empty($email) or $email != "") and 
            (!empty($preco) or $preco != "") and 
            (!empty($duracao) or $duracao != "") and 
            (!empty($descricao) or $descricao != "") ){

            $query = "update cursos set cur_nome = '$nome', cur_categoria = '$categoria', cur_privacidade = '$privacidade',". 
            "cur_email_criador = '$email', cur_descricao = '$descricao', cur_preco = '$preco', cur_duracao = '$duracao',".
            "cur_nivel = '$nivel' where cur_id = $cur_id";
            mysqli_query($connection, $query);
            header("location:index.php");

        }else if((empty($nome) or $nome != "") and 
                (empty($categoria) or $categoria != "") and 
                (empty($nivel) or $nivel != "") and 
                (empty($privacidade) or $privacidade != "") and 
                (empty($email) or $email != "") and 
                (empty($preco) or $preco != "") and 
                (empty($duracao) or $duracao != "") and 
                (empty($descricao) or $descricao != "")){

            echo "<script>alert('O campo não pode ser vazio.')</script>";

        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Entregavel PHP</title>
        <script src="js/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fileinput.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <a href="index.php">
                <img src="img/logo-branco.png" class="logo">  
            </a> 
            <form id="contact">
                <a href="index.php" class="back"><h4>Voltar ao Cadastro</h4></a>
                <h3>Cursos Cadastrados</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Curso</th>
                        <th>Categoria</th>
                        <th>Privacidade</th>
                        <th>Excluir</th>
                        <th>Editar</th>
                    </tr>
                    
                    
                    <?php
                        $query = "select * from cursos";
                        $cursos = mysqli_query($connection, $query);
                        while($cur = mysqli_fetch_assoc($cursos)){
                            $cur_id = $cur["cur_id"];
                            $cur_nome = $cur["cur_nome"];
                            $cur_categoria = $cur["cur_categoria"];
                            $cur_privacidade = $cur["cur_privacidade"];
                    ?>
                        <tr>
                            <td><?php echo $cur_nome;?></td>
                            <td><?php echo $cur_categoria;?></td>
                            <td><?php echo $cur_privacidade;?></td>
                            <td><a href="index.php?excluir=<?php echo $cur_id ?>">Excluir</a></td>
                            <td><a href="editar.php?editar=<?php echo $cur_id ?>">Editar</a></td>
                        </tr>
                    <?php
                        }
                    ?>

                </table>
            <form>
        </div>
    </body>
</html>