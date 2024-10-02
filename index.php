<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Registrar questoes</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Login administrador</h2>

                <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="password" class="form-control" name="senha">
                </div>
                
                <button type="submit" name="entrar" class="btn btn-secondary">Entrar</button>
                </form>

            </div>
        </div>
        <div class="row">
            <a href="register.php"><u>Cadastre-se</u></a>
        </div>
    </div>
</body>
</html>