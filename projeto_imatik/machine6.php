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

    $sql = "SELECT * FROM maquinas WHERE id_maquina = 6";

    $result = $conexao->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        while($user_data = mysqli_fetch_assoc($result))
        {
        
            if($user_data['ativo_inativo'] == 1)
            {


                echo "<div class='main'>";

                    echo "<div class='box-logo'>";
                    echo "<img class='logo' src='img/logo.png' alt=''>";
                    echo "<div  class='sair'><a href='sair.php'>Sair</a></div>";
                    echo "</div>";

                    echo "<div class='quadro'>";

                        echo "<H1> Dados da Máquina </H1>";

                        echo "<section>";
                            echo "<div class='section-1'>"; 
                                echo "<div class='section-1_icone'>";
                                    echo "<img src='img/gear-on-crop-slow.gif' alt=''>";
                                    echo "<p><b>".$user_data['nome_maquina']."</b></p>";
                                    echo "<p> Ordem de Serviço: ".$user_data['ordem_servico']."</p>";
                                echo "</div>";
                                

                                echo "<div class='section-1_descricao'>";
                                    echo "<p class='section-1_descricao-status'> <span> Status da Máquina: </span> <span class='circulo'> </span> Ativa</p>";
                                    echo "<p> <span> Descrição da OS: </span> ".$user_data['descrição_OS']."</p>";
                                    echo "<p> <span> Descrição Lote: </span>".$user_data['descrição_lote']."</p>";
                                echo "</div>";
                            echo "</div>";

                            echo "<div class='section-2'>"; 
                                echo "<p class='section-2_quantidade'> Quantide Lote </p>";
                                echo "<p class='section-2_numero'> ".$user_data['qtda_lote']." </p>";
                            echo "</div>";

                            

                            echo "<div class='section-3'>";
                                echo "<p> Status </p>";
                                echo "<div class='section-3_barra-numero'>";

                                    echo "<div class='section-3_barra'>";
                                        echo "<div class='section-3_progresso'></div>";
                                    echo "</div>";

                                    echo "<div class='section-3_numeroprogresso'>";
                                    echo "<span> 0 </span>";
                                    echo "<span> 5 </span>";
                                    echo "<span> 6 </span>";
                                    echo "</div>";

                                    echo "<div class='section-3_numero'>";
                                        echo "<p> 6 </p>";
                                    echo "</div>";

                                echo "</div>";
                            echo "</div>";

                        echo "</section>";

                        echo "<section id='section4'>";

                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Tempo de Produção </p>";
                                echo "<p class='section-4_numero'> ".$user_data['tempo_prod']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Prod (KG) </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_prod']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Resíduos (KG) </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_residuos']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Intervenções </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_intervenções']." </p>";
                            echo "</div>";
                            
                        echo "</section>";

                        echo "<section>";

                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Material a Processar </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_mat_processar']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Refugo (KG) </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_refugo']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Mat Processado (KG) </p>";
                                echo "<p class='section-4_numero'> ".$user_data['mat_processado']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Paradas  </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_paradas']." </p>";
                            echo "</div>";

                        echo "</section>";

                        

                        
                    echo "</div>";

                echo "</div>";
            }
            else
            {
                echo "<div class='main'>";

                    echo "<div class='box-logo'>";
                    echo "<img class='logo' src='img/logo.png' alt=''>";
                    echo "<div  class='sair'><a href='sair.php'>Sair</a></div>";
                    echo "</div>";

                    echo "<div class='quadro'>";

                        echo "<H1> Dados da Máquina </H1>";

                        echo "<section>";
                            echo "<div class='section-1'>"; 
                                echo "<div class='section-1_icone inativo'>";
                                    echo "<img src='img/gear-off-crop-slow.gif' alt=''>";
                                    echo "<p><b>".$user_data['nome_maquina']."</b></p>";
                                    echo "<p> Ordem de Serviço: ".$user_data['ordem_servico']."</p>";
                                echo "</div>";
                                

                                echo "<div class='section-1_descricao'>";
                                    echo "<p class='section-1_descricao-status'> <span> Status da Máquina: </span>  </span> Inativa</p>";
                                    echo "<p> <span> Descrição da OS: </span> ".$user_data['descrição_OS']."</p>";
                                    echo "<p> <span> Descrição Lote: </span>".$user_data['descrição_lote']."</p>";
                                echo "</div>";
                            echo "</div>";

                            echo "<div class='section-2'>"; 
                                echo "<p class='section-2_quantidade'> Quantide Lote </p>";
                                echo "<p class='section-2_numero'> ".$user_data['qtda_lote']." </p>";
                            echo "</div>";

                            

                            echo "<div class='section-3'>";
                                echo "<p> Status </p>";
                                echo "<div class='section-3_barra-numero'>";

                                    echo "<div class='section-3_barra'>";
                                        echo "<div class='section-3_progresso'></div>";
                                    echo "</div>";

                                    echo "<div class='section-3_numeroprogresso'>";
                                    echo "<span> 0 </span>";
                                    echo "<span> 5 </span>";
                                    echo "<span> 6 </span>";
                                    echo "</div>";

                                    echo "<div class='section-3_numero'>";
                                        echo "<p> 6 </p>";
                                    echo "</div>";

                                echo "</div>";
                            echo "</div>";

                        echo "</section>";

                        echo "<section id='section4'>";

                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Tempo de Produção </p>";
                                echo "<p class='section-4_numero'> ".$user_data['tempo_prod']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Prod (KG) </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_prod']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Resíduos (KG) </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_residuos']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Intervenções </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_intervenções']." </p>";
                            echo "</div>";
                            
                        echo "</section>";

                        echo "<section>";

                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Material a Processar </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_mat_processar']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Refugo (KG) </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_refugo']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Mat Processado (KG) </p>";
                                echo "<p class='section-4_numero'> ".$user_data['mat_processado']." </p>";
                            echo "</div>";
                
                            echo "<div class='section-4'>"; 
                                echo "<p class='section-4_titulo'> Qtda Paradas  </p>";
                                echo "<p class='section-4_numero'> ".$user_data['qtda_paradas']." </p>";
                            echo "</div>";

                        echo "</section>";

                        

                        
                    echo "</div>";

                echo "</div>";
            }
        }
        
    ?>

</body>
</html>