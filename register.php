<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <div class="form-group">
            <form action="register.php" method="POST">
                Email: <input type="email" name="email" required class="form-control"><br>
                Senha: <input type="password" name="senha" required class="form-control"><br>
                <input type="submit" value="Cadastrar">
            </form>
            
        </div>
        <div class="row"><a href="index.php">Faça login</a></div>
    </div>
    <br>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'db.php';
        
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
        try {
            $sql = "INSERT INTO usuario ( email, senha) VALUES ( :email, :senha)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            echo "Cadastro realizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro no cadastro: " . $e->getMessage();
        }
    }
    ?>
    
</body>
</html>