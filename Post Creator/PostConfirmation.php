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
                    header('Location: postCreator.php');
                }
                if(isset($_POST["confirm"])){
                    $_SESSION["posted"] = true;
                    file_put_contents("Posty.txt", "Tytuł: ". $_SESSION["title"]. "\n". "Treść: ". $_SESSION["content"]);       
                    header('Location: TNiedziela.php');
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

    <div id="created" style="max-width: 30%;">
            <p id="Title">Dodaj post<p>
            <br>
            <div>
                <b style="font-size: 25px;">Tytuł:</b>
                <p id="articleTitle"><?php echo $_SESSION["title"]?></p>

                <b style="font-size: 25px;">Treść:</b>
                <p><?php
                    $postContent = $_SESSION["content"];
                    for($i = 0; $i<count($tags); $i++){
                        $postContent = str_replace("[".$tags[$i]."]", "<". $tags[$i]. ">", $postContent);
                        $postContent = str_replace("[/".$tags[$i]."]", "</". $tags[$i]. ">", $postContent);
                    }
                    echo $postContent;
                ?></p>

                <form method="POST">
                    <input name = "cancel" type="submit" value="Cofnij">
                    <input name = "confirm" type="submit" value="Zatwierdź">
                </form>
            </div>
        </div>
    </body>
</html>