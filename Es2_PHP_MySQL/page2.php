<?php
    session_start();

    if (!isset($_SESSION['selectedUser']))  //se l'utente non è loggato
    {
        header('Location: ./login.php');    //torna alla pagina di login
    }

    if (isset($_POST['logout']))    //se viene cliccato il tasto di logout ("Effetua il logout")
    {
        session_destroy();
        header('Location: ./login.php');    //torna alla pagina di login
        exit;
    }

    if (isset($_POST['GoToP1']))    //se viene cliccato il tasto della pagina 1 ("Vai a Pagina 1")
    {
        header('Location: ./page1.php');  //va alla pagina 1
    }
    
    if (isset($_POST['GoToP3']))
    {
        if($_SESSION['selectedUser']['Livello'] >= 1 and $_SESSION['selectedUser']['Livello'] != 9)   //controlla se l'utente ha il livello necessario per accedere alla pagina
        {
            header('Location: ./page3.php');  //va alla pagina 3
        }
        else
        {
            header('Location: ./acc_neg.php');  //va alla pagina di accesso negato
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Pagina 2 </title>
        <link rel = 'stylesheet' type = 'text/css' href = 'style.css'>
        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel = "stylesheet">
    </head>
    <body>
        <div align = "center" class = "box" id = "sfondo">
            <h2> Benvenuto nella pagina 2 </h2>
            <?php
                echo "Nome: ".$_SESSION['selectedUser']['Nome']."<br>";
                echo "Cognome: ".$_SESSION['selectedUser']['Cognome']."<br>";
                echo "Livello: ".$_SESSION['selectedUser']['Livello']."<br>";
                if ($_SESSION['selectedUser']['Livello'] == 9) 
                {    
                    //se l'utente non è stato ancora verificato
                    echo "La tua utenza è in fase di verifica, in questo momento sei al pari di un utente ospite. <br><br>";
                }
            ?>
            <br>
            <form action="page2.php" method="post">
                <input type = "submit" name = "logout" value = "Esci" class = "btn btn-dark">
                <input type = "submit" name = "GoToP1" value = "Pagina 1" class = "btn btn-dark">
                <input type = "submit" name = "GoToP3" value = "Pagina 3" class = "btn btn-dark">
            </form>
            <br><br>
        </div>
    </body>
</html>