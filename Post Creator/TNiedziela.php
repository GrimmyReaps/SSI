<!doctype html>
<html>
    <head>
        <title>Blog</title>
        <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8"/>
    </head>
    <body>
        <header>
            <h1 style="text-align: center;">Witojcie</h1>
        </header>
        <div id="Column1">
            <h4 style="text-align: center;">
                <b>Witam na tym blogu</b>
            </h4>
                <?php
                    //Tytuły
                    $TisButAScratch = array (
                    "Why are you runnin",
                    "Do you kno da wae",
                    "Hello there <br> General Kenobi"
                    );
                    //Paragraf
                    $AlwaysLookAtTheBright = array(
                    "Hello Numero Uno... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nisi vel sem euismod, non faucibus tortor volutpat. Maecenas ut elit a turpis volutpat consequat. Phasellus at enim laoreet risus vestibulum gravida sit amet eu justo. Curabitur consequat pellentesque lorem vitae pellentesque. Morbi eget dictum dui, a condimentum dui. Etiam.",

                    "Hello Numero Dos... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis est odio, in viverra nibh aliquet ut. Quisque vitae dignissim est, malesuada eleifend mauris. Sed porttitor placerat felis, in scelerisque metus venenatis nec. Fusce vel sagittis eros. Mauris auctor justo.",

                    "I'm walking to the something Bla bla bla bla bla bla bla Collapse I'm drinking too much bla bla, Bla bla bla bla bla bla bla Fall out I'm feeling really bla bla, I want to bla bla bla, Collapse And in the end it means I bla bla bla bla bla bla bla The end I got myself together Bla bla bla bla bla bla bla. Watch out I didn't need the patience, life bla bla bla bla bla Collapse Don't you sit to close, or I'll bla bla bla bla bla Break up Stick it up your nose Bla bla bla bla bla bla The end

                    Tekst pochodzi z https://www.tekstowo.pl/piosenka,gorillaz,rock_it.html"

                    );
                    $page = isset($_GET["str"]) ? $_GET["str"] : 1;
                    
                    $length = count($TisButAScratch);

                    echo "<article>";
                        echo "<h3>";
                        echo $TisButAScratch[$page-1];
                        echo "</h3>";
                        echo "<p>";
                        echo $AlwaysLookAtTheBright[$page-1];
                        echo "</p>";
                        // for($i = 0; $i<$length; $i++)
                        // {
                        //     echo "<h3>";
                        //     echo $TisButAScratch[$i];
                        //     echo "</h3>";
                        //     echo "<p>";
                        //     echo $AlwaysLookAtTheBright[$i];
                        //     echo "</p>";
                        // }
                    echo "</article>";

                    
                    for ($i = 0; $i < $length; $i++) {
                        echo '<span class="page-item"><a class="page-link" href="TNiedziela.php?str='.(($i) + 1).'">'.(($i) + 1).'</a></span> ';
                    }
                    
                ?>
            <div>
                <?php
                    session_start();
                    $nameErr = $emailErr ="";
                    $name = $email = $comment= $captchaErr ="";
                    $Digits = array("zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine");
                    $operationSign = array("plus", "minus", "times", "divide by");

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["name"])) {
                            $nameErr = "Name is required";
                        } else {
                            $name = test_input($_POST["name"]);
                            if(!preg_match("/^[a-zA-Z- ]*$/",$name)){
                                $nameErr = "Only letters and white space allowed";
                            }
                        }
                        if (empty($_POST["email"])) {
                            $emailErr = "Email is required";
                        } else {
                            $email = test_input($_POST["email"]);
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $emailErr = "Invalid email format";
                            }
                        }
                        if (empty($_POST["comment"])) {
                            $comment = "";
                        } else {
                            $comment = test_input($_POST["comment"]);
                        }
                        $captcha = test_input($_POST["captcha"]);
                        $captcha = (int)$captcha;  
                        if($captcha == "")
                            $captchaErr = "Captcha jest wymagana";
                        else
                        {          
                            if ($captcha != $_SESSION["result"])
                            {
                                $captchaErr = "Zły wynik";
                            }
                        }
                    }
                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    $captchaContent = "";
                    $firstDigit = rand(0, 9);
                    $sign = rand(0, 3);
                    $check = true;
                    $_SESSION["result"] = -1;
                    while($check)
                    {
                        $secondDigit = rand(0, 9);
                        if($sign == 0 && ($firstDigit+$secondDigit) >= 0 && ($firstDigit+$secondDigit) <= 10)
                        {
                            $check = false;
                            $_SESSION["result"] = $firstDigit+$secondDigit;
                            $captchaContent = $Digits[$firstDigit]. " ". $operationSign[$sign]. " ". $Digits[$secondDigit];
                        }
                        if($sign == 1 && ($firstDigit-$secondDigit) >= 0 && ($firstDigit-$secondDigit) <= 10)
                        {
                            $check = false;
                            $_SESSION["result"] = $firstDigit-$secondDigit;
                            $captchaContent = $Digits[$firstDigit]. " ". $operationSign[$sign]. " ". $Digits[$secondDigit];
                        }
                        if($sign == 2 && ($firstDigit*$secondDigit) >= 0 && ($firstDigit*$secondDigit) <= 10)
                        {
                            $check = false;
                            $_SESSION["result"] = $firstDigit*$secondDigit;
                            $captchaContent = $Digits[$firstDigit]. " ". $operationSign[$sign]. " ". $Digits[$secondDigit];
                        }
                        if($sign == 3 && $secondDigit != 0 && ($firstDigit/$secondDigit) >= 0 && ($firstDigit/$secondDigit) <= 10 && ($firstDigit%$secondDigit) == 0)
                        {
                            $check = false;
                            $_SESSION["result"] = ($firstDigit/$secondDigit);
                            $captchaContent = $Digits[$firstDigit]. " ". $operationSign[$sign]. " ". $Digits[$secondDigit];
                        }
                    }
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <p style="color: red;">* requaired field</p>
                    Name: <input type="text" name="name" value="<?php echo $name;?>"><span class="error">* <?php echo $nameErr;?></span><br>
                    E-mail: <input type="text" name="email" value="<?php echo $email;?>"><span class="error">* <?php echo $emailErr;?></span><br>
                    Comment: <br>
                    <textarea name="comment" rows="10" cols="50"><?php echo $comment;?></textarea><br>
                    <input type="submit" name="submit" value="Submit">
                    <span class="commentSectionText">Captcha: <?php echo $captchaContent ?></span> <input type="text" name="captcha">
                    <span class="error">* <?php echo $captchaErr;?></span>
                </form>
            </div>
            <div id="CommentBox">
                <?php
                    echo "<h2>Komentator:</h2>";
                    echo $name;
                    echo "<br>";
                    echo $email;
                    echo "<br>";
                    echo $comment;
                ?>
            </div>
        </div>
        <div id="Column2">
            <h5 id="Calendar">
                Kalendarz
            </h5>
            <p id="Day">
            </p>
            <p id="MonYear">
            </p>
            <h5 style="text-align: center; margin-block-end: 0;">
                Linki
            </h5>
            <p id="Links">
                <a href="https://9gag.com/" target="_blank">
                    Rozrywka
                </a>
                <br>
                <a href="https://www.w3schools.com/html/html_links.asp" target="_blank">
                    Nauka
                </a>
                <br>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" target="_blank">
                    Best Hits
                </a>
                <br>
                <a href="PostCreator.php">
                    Stwórz posta
                </a>
            </p>

            <h5 style="text-align: center;">
                Lista
            </h5>
            <ul id="List">
                <li>
                    Punkt 1
                </li>
                <li>
                    Punkt 2
                </li>
                <li>
                    Punkt 3
                </li>
            </dl>
        </div>
        <footer>
            Autor: Tomasz Niedziela
        </footer>
    </body>
    <script>
        let date = new Date();
        let year = date.getFullYear();
        let month = date.getMonth() + 1;
        let day = date.getDate();
        document.getElementById("Day").innerHTML = day;
        document.getElementById("MonYear").innerHTML = month + "/" + year;
    </script>
</html>