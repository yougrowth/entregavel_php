<?php
    include "includes/db.php";
?>

<?php
    if(isset($_POST['enviar'])){
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

            $query = "insert into cursos(cur_nome, cur_categoria, cur_privacidade,". 
            "cur_email_criador, cur_descricao, cur_preco, cur_duracao, cur_nivel)".
            "values('$nome', '$categoria', '$privacidade', '$email', '$descricao', '$preco', '$duracao', '$nivel')";

            mysqli_query($connection, $query);
            echo "<script>alert('Criado com sucesso!')</script>";

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

    //Deletar Categoria
    if(isset($_GET['excluir'])){
        $cur_id = $_GET['excluir'];
        $query = "delete from cursos where cur_id = $cur_id";
        mysqli_query($connection, $query);
        echo "<script>alert('Deletado com sucesso!')</script>";
        header("location:index.php");
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
            <form id="contact" action="" method="post">
                <a href="cadastrados.php" class="back"><h4>Ver Cursos Cadastrados</h4></a>
                <h3>Crie seu curso</h3>
                <h4>Insira as informações sobre seu curso e o veja abaixo na tabela</h4>
                <fieldset>
                    <label for="nome">Nome do Curso</label>
                    <input name="nome" placeholder="Nome do curso..." type="text" tabindex="1" required autofocus>
                </fieldset>
                <fieldset>
                    <label for="categoria">Categoria </label>
                    <select name="categoria" tabindex="2" required autofocus >
                        <option selected disabled>Selecione a categoria do curso...</option>
                         <?php
                            $query = "select * from categorias";
                            $categorias = mysqli_query($connection, $query);
                            while($cat = mysqli_fetch_assoc($categorias)){
                                $cat_nome = $cat["cat_nome"];
                                echo "<option>$cat_nome</option>";
                            }
                        ?>
                    </select>

                    <label for="nivel">Nivel </label>
                    <select name="nivel" tabindex="3" required autofocus>
                        <option selected disabled>Selecione o nivel do curso...</option>
                         <?php
                            $query = "select * from niveis";
                            $niveis = mysqli_query($connection, $query);
                            while($niv = mysqli_fetch_assoc($niveis)){
                                $niv_nome = $niv["niv_nome"];
                                echo "<option>$niv_nome</option>";
                            }
                        ?>
                    </select>

                    <label for="privacidade">Privacidade </label>
                    <select name="privacidade" tabindex="4" required autofocus>
                        <option selected disabled>Selecione o nivel de privacidade...</option>
                        <?php
                            $query = "select * from privacidades";
                            $privacidades = mysqli_query($connection, $query);
                            while($pri = mysqli_fetch_assoc($privacidades)){
                                $pri_nome = $pri["pri_nome"];
                                echo "<option>$pri_nome</option>";
                            }
                        ?>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="email_criador">Email do Criador</label>
                    <input name="email_criador" placeholder="Email do criador do curso..." type="email" tabindex="5" required>
                </fieldset>
                <fieldset class="valores">
                    <label for="preco">Valor em Reais </label>
                    <input name="preco" placeholder="Preço do curso em R$..." type="number" tabindex="6" required>
                    
                    <label for="duracao">Duração em Horas </label>
                    <input name="duracao" placeholder="Duração do curso em Horas..." type="number" tabindex="7" required>
                </fieldset>
                <fieldset>
                    <label for="descricao">Descrição do Curso</label>
                    <textarea name="descricao" placeholder="Descrição do Curso..." tabindex="8" required></textarea>
                </fieldset>
                <fieldset>
                    <button name="enviar" type="submit" id="contact-submit" data-submit="...Criando curso">Criar curso</button>
                </fieldset>
            </form>
        </div>
    </body>
</html>
