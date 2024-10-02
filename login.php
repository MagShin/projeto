<?php
    include 'index.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'db.php';

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $sql = "SELECT * FROM usuario WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $email = $stmt->get_result()->fetch_assoc();
            
            if ($email && password_verify($senha, $email['senha'])) {
                $_SESSION['email_id'] = $email['id'];
                echo "Login realizado com sucesso!";
                include 'listado.php';
            } else {
                echo "Email ou senha incorretos.";
            }
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    }
?>