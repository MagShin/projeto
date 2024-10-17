<?php
include 'layout/header.php';
include 'layout/navbar.php';
?>
        <div class="row">

            <h2>Cadastro Membro</h2>
            <hr>
            <div class="container">
                <div class="form-group">
                    <form action="register_user.php" method="POST">
                        Nome: <input type="text" name="nome" required class="form-control"><br>
                        Email: <input type="email" name="email" required class="form-control"><br>
                        Senha: <input type="password" name="senha" required class="form-control"><br>
                        Cpf: <input type="text" name="cpf" class="form-control"><br>
                        Escola: <input type="text" name="escola" class="form-control"><br>
                        Série: <input type="text" name="serie" class="form-control"><br>
                        Cidade: <input type="text" name="cidade" class="form-control"><br>
                        <input type="submit" value="Cadastrar">
                    </form>
                    
                </div>
                <div class="row"><a href="index.php">Faça login</a></div>
            </div>
            <br>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    include 'db.php'; // Certifique-se de que `db.php` está configurado para MySQLi e não PDO.

                    $nome = $_POST['nome'];
                    $email = $_POST['email'];
                    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                    $cpf = $_POST['cpf'];
                    $escola = $_POST['escola'];
                    $serie = $_POST['serie'];
                    $cidade = $_POST['cidade'];

                    // Verifica se a conexão foi estabelecida
                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }

                    // Prepara a consulta SQL
                    $sql = "INSERT INTO user2 (nome, email, senha, cpf, escola, serie, cidade) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);

                    // Verifica se a preparação da consulta foi bem-sucedida
                    if ($stmt === false) {
                        die("Erro ao preparar a consulta SQL: " . $conn->error);
                    }

                    // Vincula os parâmetros (tipos: 's' para string)
                    $stmt->bind_param('sssssss', $nome, $email, $senha, $cpf, $escola, $serie, $cidade);

                    // Executa a consulta
                    if ($stmt->execute()) {
                        echo "Cadastro realizado com sucesso!";
                    } else {
                        echo "Erro no cadastro: " . $stmt->error;
                    }

                    // Fecha a declaração e a conexão
                    $stmt->close();
                    $conn->close();
                }
            ?>

<?php
include 'layout/footer.php';
?>