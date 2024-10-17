<?php
include 'layout/header.php';
include 'layout./navbar.php';
?>
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
            <div class="col">
                <a href="register.php"><u>Cadastre-se</u></a>
                <br>
                <a href="loginUsuario.php"><U>Faça login</U></a>

            </div>
        </div>
<?php
include 'layout/footer.php';
?>
