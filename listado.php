<?php
include 'layout/header.php';
include 'layout/navbar.php';
?>
<div class="row">
    <div class="col">
        
        <?php
            include 'db.php';
            if(isset($_POST['busca'])){
                $busca = $_POST['busca'];
            }else{
                $busca = '';
            }
            $sql = "SELECT * FROM usuario where email like '%$busca%'  order by email";
            $lista = mysqli_query($conn, $sql);
        ?>
        
        <h2>Membros da equipe cadastrados:</h2>
        <form action="listado.php" method="POST">
            <input type="text" placeholder="Pesquisar" name="busca">
            <input type="submit" value="Pesquisar">
        </form>
        <table class="tabela">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>CPF</th>
                <th>Função</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>
            <tr>
                <?php
                    while ($linha = mysqli_fetch_assoc($lista)){
                        echo "<tr>";
                            foreach($linha as $key => $value){
                                $$key = $value;
                            };
                            echo "<td>$id_user</td>";
                            echo "<td>$nome</td>";
                            echo "<td>$email</td>";
                            echo "<td>***********</td>";
                            echo "<td>$cpf</td>";
                            echo "<td>$cargo</td>";
                            
                            echo "<td><a href='listado.php?del=$cpf' onclick=\"return confirm('Tem certeza que deseja excluir?')\"><img src='media/delete-folder.png' class='icon'></a></td>";
                            echo "<td><a href='edit.php?id=$id_user'><img src='media/edit-icon.png' class='icon'></a></td>";
                        echo "</tr>";
                    }
                ?>
            </tr>
        </table>
    </div>
</div>
    <div class="row">
        <div class="col">
            <?php
                include 'db.php';
                if(isset($_POST['busca'])){
                    $busca = $_POST['busca'];
                }else{
                    $busca = '';
                }
                $sql = "SELECT * FROM user2 where email like '%$busca%'  order by email";
                $lista = mysqli_query($conn, $sql);
            ?>
            <?php
                // Função de exclusão
                if(isset($_GET['del'])){
                    $id = $_GET['del']; // O CPF é passado como parâmetro
                    $sql = "DELETE FROM usuario WHERE cpf = '$id'"; // Exclui pelo CPF
                    if (mysqli_query($conn, $sql)) {
                        echo "Usuário excluído com sucesso!";
                        header('Location: listado.php'); // Redireciona após a exclusão
                        exit();
                    } else {
                        echo "Erro ao excluir o usuário: " . mysqli_error($conn);
                    }
                }
            ?>


            <h2>Lista Clientes Cadastrados</h2>
            <form action="listado.php" method="POST">
            <input type="text" placeholder="Pesquisar" name="busca">
            <input type="submit" value="Pesquisar">
            </form>

            <table class="tabela">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>CPF</th>
                    <th>Escola</th>
                    <th>Serie</th>
                    <th>Cidade</th>
                    <th>Data do Cadastro</th>
                    <th>Deletar</th>
                    <th>Editar</th>
                </tr>
                <tr>
                    <?php
                        while ($linha = mysqli_fetch_assoc($lista)){
                            echo "<tr>";
                                foreach($linha as $key => $value){
                                    $$key = $value;
                                };
                                echo "<td>$nome</td>";
                                echo "<td>$email</td>";
                                echo "<td>***********</td>";
                                echo "<td>$cpf</td>";
                                echo "<td>$escola</td>";
                                echo "<td>$serie</td>";
                                echo "<td>$cidade</td>";
                                echo "<td>$criado_em</td>";
                        
                                
                                echo "<td><a href='listado.php?del=$cpf' onclick=\"return confirm('Tem certeza que deseja excluir?')\"><img src='media/delete-folder.png' class='icon'></a></td>";
                                echo "<td><a href='edit.php?id=$id_user'><img src='media/edit-icon.png' class='icon'></a></td>";
                            echo "</tr>";
                        }
                    ?>
                </tr>
            </table>
        </div>
    </div>
    <?php
    include 'layout/footer.php';
    ?>
</div>
