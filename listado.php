
<?php

    if(isset($_POST['busca'])){
        $busca = $_POST['busca'];
    }else{
        $busca = '';
    }

    $sql = "SELECT * FROM usuario where email like '%$busca%'  order by 'email'";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $lista = mysqli_query($conn, $sql);
    if (!$lista) {
        die("Query failed: " . mysqli_error($conn));
    }
?>

<h2>Mebros cadastrados:</h2>
<form action="listado.php" method="POST">
    <input type="text" placeholder="Pesquisar" name=busca>
    <input type="submit" value="Pesquisar">
</form>
<table class="tabela">
    <tr>
        <!-- <th>Código</th> -->
        <th>Email</th>
        <th>Senha</th>
    </tr>
    <tr>
        <?php
            while ($linha = mysqli_fetch_assoc($lista)){
                echo "<tr>";
                    foreach($linha as $key => $value){
                        $$key = $value;
                    };
                    echo "<td>$email</td>";
                    echo "<td>$email</td>";
                    // echo "<td><a class='btn btn-warning' href='...'><img src='img/note.png' class='icon'></a></td>";
                    // echo "<td><a class='btn btn-danger' href='...'><img src='img/delete-folder.png' class='icon'></a></td>";
                echo "</tr>";
            }
        ?>
    </tr>
</table>