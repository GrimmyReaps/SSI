<!doctype html>
<html>
    <head>
        <title>Blog</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        
        <style>
            header{
                color: #4b0076;
                background-color: #ffffff;
                background-image: url('ball.png');
                background-attachment: fixed;
                background-size: 10% 10%;
            }
            body{
                background-color: black;
            }
            div{
                float: left;
            }

            footer{
                position: fixed;
                background-color: #ffffff;
                color: #a000ff;
                bottom: 10px;
                left: 40%;
            }

            #Column1{
                background-color: #ffffff;
                /*top right bottom left*/
                margin: 0 5% 5% 5%;
                width: 65%
            }

            #Column2{
                background-color: #ffffff;
                width: 25%;
            }
            #Calendar{
                text-align: center;
                margin-block-end: 0.25em;
            }
            #Day{
                
                font-size: 55px;
                margin: 0;
                text-align: center;
            }
            #MonYear{
                margin-block-start: 0;
                text-align: center;
            }
            #Links{
                text-align: center;
                margin-block-start: 0;
            }
            #List{
                margin-inline-start: 0;
            }
        </style>
        <header>
            <h1 style="text-align: center;">Witojcie</h1>
        </header>
        <div id="Column1">
            <h4 style="text-align: center;">
                <b>Witam na tym blogu</b>
            </h4>
            <?php

                $TisButAScratch = array (
                "Why are you runnin",
                "Do you kno da wae",
                "Hello there <br> General Kenobi"
                );

                $AlwaysLookAtTheBright = array(
                "Hello Numero Uno... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ultrices nisi vel sem euismod, non faucibus tortor volutpat. Maecenas ut elit a turpis volutpat consequat. Phasellus at enim laoreet risus vestibulum gravida sit amet eu justo. Curabitur consequat pellentesque lorem vitae pellentesque. Morbi eget dictum dui, a condimentum dui. Etiam.",

                "Hello Numero Dos... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis est odio, in viverra nibh aliquet ut. Quisque vitae dignissim est, malesuada eleifend mauris. Sed porttitor placerat felis, in scelerisque metus venenatis nec. Fusce vel sagittis eros. Mauris auctor justo.",

                "I'm walking to the something Bla bla bla bla bla bla bla Collapse I'm drinking too much bla bla, Bla bla bla bla bla bla bla Fall out I'm feeling really bla bla, I want to bla bla bla, Collapse And in the end it means I bla bla bla bla bla bla bla The end I got myself together Bla bla bla bla bla bla bla. Watch out I didn't need the patience, life bla bla bla bla bla Collapse Don't you sit to close, or I'll bla bla bla bla bla Break up Stick it up your nose Bla bla bla bla bla bla The end

                Tekst pochodzi z https://www.tekstowo.pl/piosenka,gorillaz,rock_it.html"

                );

                $length = count($TisButAScratch);

                    echo "<article>";

                for($i = 0; $i<$length; $i++)
                {
                    echo "<h3>";
                    echo $TisButAScratch[$i];
                    echo "</h3>";
                    echo "<p>";
                    echo $AlwaysLookAtTheBright[$i];
                    echo "</p>";
                }
                    echo "</article>";

            ?>
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