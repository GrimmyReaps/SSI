<!DOCTYPE html>
<html>
    <head>
        <title>Add Post</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            session_start();
            
            if(!isset($_SESSION["posted"]))
            $_SESSION["posted"] = false;

            if(!isset($_SESSION["title"]))
            $_SESSION["title"] = "";

            if(!isset($_SESSION["content"]))
            $_SESSION["content"] = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                if (empty($_POST["title"])) 
                {
                    echo "<script>alert('Tytuł jest wymagany!');</script>";
                } 
                else 
                {
                    $_SESSION["title"] = test_input($_POST["title"]);
                }

                if (empty($_POST["content"])) 
                {
                    echo "<script>alert('Treść posta nie może być pusta!');</script>";
                }
                else 
                {
                    $_SESSION["content"] = test_input($_POST["content"]);
                }
                if(isset($_POST["cancel"])){
                    header('Location: PostCreator.php');
                }
                if(isset($_POST["continue"])){
                    header('Location: PostConfirmation.php');
                }
                if(isset($_POST["discard"])){
                    session_destroy();
                    header('Location: TNiedziela.php');
                }
                if(isset($_POST["confirm"])){
                    $_SESSION["posted"] = true;
                    file_put_contents("Posty.txt", "Tytuł: ". $_SESSION["title"]. "\n". "Treść: ". $_SESSION["content"]);
                    session_destroy();     
                    header('Location: index.php');
                }
            }


            function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $tags = array("b", "u", "i")
        ?>
        <div id="creator">
            <p id="Title">Dodaj post<p>
            <br>
            <div>
                <form method = "POST">
                    Tytuł: <input name="title" type="text" value=<?php echo "'".$_SESSION["title"]. "'";?>><br>
                    Treść: <br>
                    <textarea name="content" rows="30" cols="120"><?php echo $_SESSION["content"];?></textarea><br>
                    <input name="continue" type="submit" value="Zapostuj">
                    <input name="discard" type="submit" value="Anuluj">
                <form>
            </div>
        </div>
    </body>
</html>