<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login">
    <div class="heading">
    <h2>Rede Encontristas</h2>
    <h3>Bem vindo! Insere as credenciais para entrares</h2>
        <form action="index.php" method="post">
        <!-- Password Field -->
        <div class="input-group input-group-lg">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Email">
        </div>
        <!-- Password Field -->
        <div class="input-group input-group-lg">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" placeholder="Password">
        </div>

        <button type="submit" class="float">Login</button>
        </form>
        <a href="recover.php">Recuperar Password</a>
    </div>
    </div>
</body>
</html>