<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imatik</title>
    <script src="https://kit.fontawesome.com/c5bfee7caa.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="main-cadastro">

        <img class='logo-cadastro' src="img/logo.png" alt="">

        <form class="board" action= "testLogin.php" method="POST"> 

            <div class="board-input">
                <input class="input" type="text" placeholder="Usuario" name="email">
                <div class="icones-input"> <i class="fa-solid fa-user fa-colors"></i> </div>
            </div>

            <div class="board-input">
                <input class="input" type="password" placeholder="Senha" name="senha">
                <div class="icones-input"> <i class="fa-solid fa-lock fa-colors"></i> </div>
            </div>

            <!-- <a href="/"> Esqueceu a Senha? </a> -->
            <input class="acessar" type="submit" name="submit" value="Entrar">

        </form>

    </div>

</body>
</html>