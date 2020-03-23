<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="styles.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/fontello.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="scripts.js"></script>

</head>

<body>
    <div id="container">
        <div>
                
        <?php
        session_start();

        if (!isset($_SESSION['zalogowany']))
        {
            echo '<a class="login" href="registration.php">Rejestracja</a>';
            echo '<a class="login" href="p-login.php">Logowanie</a>';
        }

        else{
        echo 'Zalogowany: '.$_SESSION['user'].'<a class="login" href="logout.php">Wyloguj się!</a></p>';
        }
        ?>
        <a class="login"></a>
        </div>
        
        <header>LIST TO DO</header>
        <div id="tasks">
            <section>
                TO DO:
                <div id="todo" class="holder">
                    <p id="p0" class="box" draggable="true" >Zadanie 1 <i class="icon-trash" id="i0"onclick="delet(this.id)"></i></p>
                </div>
            </section>
     
            <section>DONE:
                <div id="done" class="holder">
                    <p id="p9" draggable="true" >Zadanie 1 <i class="icon-trash" id="i9"onclick="delet(this.id)"></i></p>                        
                   </div>
            </section>
        </div>
        <div>
        <textarea id="add_todo" rows="2" cols="20" placeholder="Add task"></textarea>
        <div id="button" type="button" onclick="addTask()">Submit</div>
        <?php

        
        if (isset($_SESSION['zalogowany']))
        {
            echo '<div id="button" type="button" onclick="save()">Save</div>';
        }
        ?>

        </div>
        <footer>
            <br></br>
            <br></br>
            <pre><b>autor: Krzysztof Kordecki</b></pre>
        </footer>    
    </div>
</body>

</html>