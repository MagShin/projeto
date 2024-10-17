<?php
    include 'db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD']  == 'POST') {
        include 'db.php';

        $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
        $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;


        try {
            $sql = "select * from usuario where email = ?";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                echo "Error preparing statement: " . $conn->error;
            }
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $email = $stmt->get_result()->fetch_assoc();
            
            if ($email && password_verify($senha, $email['senha'])) {
                // $_SESSION['email_id'] = $email['id'];
                // echo "Login realizado com sucesso!";
                // include 'listado.php';
                header('Location: listado.php');
                exit();
            } else {
                echo "Email ou senha incorretos.";
            }
        } catch (PDOException $e) {
            echo "Erro no login: " . $e->getMessage();
        }
    }
?>
<?php include 'layout/footer.php'; ?>