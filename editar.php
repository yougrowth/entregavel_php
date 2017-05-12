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
            <?php
            if(isset($_GET['editar'])){
                $cur_id = $_GET['editar'];
                $query = "select * from cursos where cur_id = $cur_id";
                $cursos = mysqli_query($connection, $query);
                while($cur = mysqli_fetch_assoc($cursos)){
                    $cur_id = $cur["cur_id"];
                    $cur_nome = $cur["cur_nome"];
                    $cur_categoria = $cur["cur_categoria"];
                    $cur_privacidade = $cur["cur_privacidade"];
                    $cur_nivel = $cur["cur_nivel"];
                    $cur_email_criador = $cur["cur_email_criador"];
                    $cur_duracao = $cur["cur_duracao"];
                    $cur_descricao = $cur["cur_descricao"];
                    $cur_preco = $cur["cur_preco"];
             ?>
                    <form id="contact" action="" method="post">
                        <a href="cadastrados.php" class="back"><h4>Voltar aos Cursos Cadastro</h4></a>
                        <h3>Editar curso</h3>
                        <h4>Curso de ID: <?php echo $cur_id ?></h4>
                        <fieldset>
                            <label for="nome">Nome do Curso</label>
                            <input name="nome" placeholder="Nome do curso..." type="text" tabindex="2" required autofocus value="<?php echo $cur_nome ?>">
                        </fieldset>
                        <fieldset>
                            <label for="categoria">Categoria </label>
                            <select name="categoria" tabindex="3" required autofocus >
                                <option disabled>Selecione a categoria do curso...</option>
                                <?php
                                    $query = "select * from categorias";
                                    $categorias = mysqli_query($connection, $query);
                                    while($cat = mysqli_fetch_assoc($categorias)){
                                        $cat_nome = $cat["cat_nome"];
                                        if($cat_nome == $cur_categoria){
                                            echo "<option selected>$cat_nome</option>";
                                        }else{
                                            echo "<option>$cat_nome</option>";
                                        }
                                    }
                                ?>
                            </select>

                            <label for="nivel">Nivel </label>
                            <select name="nivel" tabindex="4" required autofocus>
                                <option disabled>Selecione o nivel do curso...</option>
                                <?php
                                    $query = "select * from niveis";
                                    $niveis = mysqli_query($connection, $query);
                                    while($niv = mysqli_fetch_assoc($niveis)){
                                        $niv_nome = $niv["niv_nome"];
                                        if($niv_nome == $cur_nivel){
                                            echo "<option selected>$niv_nome</option>";
                                        }else{
                                            echo "<option>$niv_nome</option>";
                                        }
                                    }
                                ?>
                            </select>

                            <label for="privacidade">Privacidade </label>
                            <select name="privacidade" tabindex="5" required autofocus>
                                <option disabled>Selecione o nivel de privacidade...</option>
                                <?php
                                    $query = "select * from privacidades";
                                    $privacidades = mysqli_query($connection, $query);
                                    while($pri = mysqli_fetch_assoc($privacidades)){
                                        $pri_nome = $pri["pri_nome"];
                                        if($pri_nome == $cur_privacidade){
                                            echo "<option selected>$pri_nome</option>";
                                        }else{
                                            echo "<option>$pri_nome</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </fieldset>
                        <fieldset>
                            <label for="email_criador">Email do Criador</label>
                            <input name="email_criador" placeholder="Email do criador do curso..." type="email" tabindex="6" required value="<?php echo $cur_email_criador ?>">
                        </fieldset>
                        <fieldset class="valores">
                            <label for="preco">Valor em Reais </label>
                            <input name="preco" placeholder="Preço do curso em R$..." type="number" tabindex="7" required value="<?php echo $cur_preco ?>">

                            <label for="duracao">Duração em Horas </label>
                            <input name="duracao" placeholder="Duração do curso em Horas..." type="number" tabindex="8" required value="<?php echo $cur_duracao ?>">
                        </fieldset>
                        <fieldset>
                            <label for="descricao">Descrição do Curso</label>
                            <textarea name="descricao" placeholder="Descrição do Curso..." tabindex="9" required><?php echo $cur_descricao ?></textarea>
                        </fieldset>
                        <fieldset>
                            <button name="salvar" type="submit" id="contact-submit" data-submit="...Salvando">Salvar alterações</button>
                        </fieldset>
                    </form>
            <?php
                }
            }else{
                header("location:index.php");
            }
            ?>
        </div>
    </body>
</html>