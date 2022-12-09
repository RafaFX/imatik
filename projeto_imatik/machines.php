<?php
    session_start();
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }
    $logado = $_SESSION['email'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM maquinas WHERE id_maquina LIKE '%$data%' or nome_maquina LIKE '%$data%' or ordem_servico LIKE '%$data%' ORDER BY id_maquina ASC";
    }
    else
    {
        $sql = "SELECT * FROM maquinas ORDER BY id_maquina ASC";
    }


    $result = $conexao->query($sql);

    //print_r($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/c5bfee7caa.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="main">


        

            <div class="box-logo">
            <img class='logo' src="img/logo.png" alt="">

            <div class="search-box"> 
                <input class="campo-pesquisar" type="text" placeholder="Pesquisar" id="pesquisar">
                
                
            </div>

            <!-- <button onclick="searchData()" class="btn btn-primary" class="botao"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                </button> -->

            

            <div  class="sair"><a href="sair.php">Sair</a></div>

    </div>

        <div class="quadro">

            <H1> Suas Máquinas </H1>


            <!-- href='machine-info.php' -->

            <?php

                $contador = 1;
                while($user_data = mysqli_fetch_assoc($result))
                {
                    if($contador == 1)
                    {
                        echo "<section id='section4'>";
                    }
                    $contador+=1;
                    //print_r($contador);
                    if($contador <=5)
                    {
                    if($user_data['ativo_inativo'] == 1)
                    {
                        echo "<div class='section-1_icone'>";

                        echo "<a class='link-info' href='machine".$user_data['id_maquina'].".php'>";
                        echo "<span class='circulo position'> </span>";
                        echo "<img src='img/gear-on-crop-slow.gif' class='gear-on'></img>";
                        echo "<p><b>".$user_data['nome_maquina']."</b></p>";
                        echo "<p> Ordem de Serviço: ".$user_data['ordem_servico']."</p>";
                        echo "</a>";
                        echo "</div>";
                    }
                    else
                    {
                        echo "<div class='section-1_icone inativo'>";
                        echo "<a class='link-info' href='machine".$user_data['id_maquina'].".php'>";
                        echo "<span class='circulo position circulo-inativo'> </span>";
                        echo "<img src='img/gear-off-crop-slow.gif' class='gear-off'></img>";
                        echo "<p><b>".$user_data['nome_maquina']."</b></p>";
                        echo "<p> Ordem de Serviço: ".$user_data['ordem_servico']."</p>";
                        echo "</a>";
                        echo "</div>";
                    }
                    }
                    if($contador == 5)
                    {
                        echo "</section>";
                        $contador = $contador / 5;
                    }
                }
            ?>

            </section>

            <!-- <p class="new"> Adiocinar Nova Máquina + </p>            -->

            
        </div>

    </div>

</body>

<script>

    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData(){
        window.location = 'machines.php?search='+search.value;
    }

</script>


</html>