<?php 
    session_start();

    if (!isset($_SESSION["auth"]))
    {
        $_SESSION["auth"] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/blog.css">
    <link rel="stylesheet" href="../css/mobile-blog.css" media="screen and (max-width: 768px)">

    <title>Blog - Andras' Portfolio</title>
</head>
<body>
    <div id="header">
        <header>
            <a id="logo" href="../index.php">
                <p style="color: #E57200">&gt</p> 
                <p>AC</p>
                <p id="cursor"> _</p>
            </a>

            <div id="nav-div">
                <nav>
                    <ul>
                        <li><a href="../index.php#about">About Me</a></li>
                        <li><a href="../index.php#experience">Experience</a></li>
                        <li><a href="../index.php#education">Education</a></li>
                        <li><a href="../index.php#contact">Contact</a></li>
                        <li><a href="./viewBlog.php">Blog</a></li>
                        <?php
                            if ($_SESSION["auth"] == true)
                            {
                                echo '<li id="logout"><a href="./logout.php">Logout</a></li>';
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <div id="article-cont">
        <article>
            <div id="addPostBut">
                <a href="./addPost.php"><button>Add Post</button></a>
            </div>

            <?php
                $entriesArray = array();

                $sqlConn = new mysqli("127.0.0.1", "root", "");

                if ($sqlConn -> connect_errno)
                {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
                }

                mysqli_select_db($sqlConn, "portfolio");
                $sqlResult = mysqli_query($sqlConn, "SELECT title, body, date_time FROM posts WHERE username = 'ec22581@qmul.ac.uk';");

                while ($row = mysqli_fetch_assoc($sqlResult))
                {
                    // Set up modified associative array
                    $epoch = strtotime($row["date_time"]);
                    $date = strftime("%eth %B %G, %R UTC", $epoch); // Transform epoch to required datetime format

                    $subArray = array("title" => $row["title"], "body" => $row["body"], "date" => $date, "epoch" => $epoch);
                    
                    // Sorting algorithm
                    if (count($entriesArray) == 0)
                    {
                        array_push($entriesArray, $subArray);
                    }
                    else
                    {
                        if ($subArray["epoch"] < $entriesArray[(count($entriesArray) - 1)]["epoch"])
                        {
                            array_push($entriesArray, $subArray);
                        }
                        else if ($subArray["epoch"] > $entriesArray[0]["epoch"])
                        {
                            array_splice($entriesArray, 0, 0, array($subArray));
                        }
                        else
                        {
                            for ($i = 1; $i < (count($entriesArray) - 1); $i++)
                            {
                                if ($entriesArray[$i - 1]["epoch"] < $subArray["epoch"] && $entriesArray[$i]["epoch"] > $subArray["epoch"])
                                {
                                    array_splice($entriesArray, $i, 0, array($subArray));
                                    break;
                                }
                            }
                        }
                    }
                }

                for ($i = 0; $i < count($entriesArray); $i++)
                {
                    echo '<div class="post">';
                    echo '   <div class="title">';
                    echo sprintf("       <h1>%s</h1>", $entriesArray[$i]["title"]);
                    echo "   </div>";
                    echo '   <div class="body">';
                    echo sprintf("       <p>%s</p>", $entriesArray[$i]["body"]);
                    echo "   </div>";
                    echo '   <div class="time">';
                    echo "       <figure>";
                    echo '           <img src="../images/clock.png" alt="Clock icon">';
                    echo "       </figure>";
                    echo sprintf('       <p class="datetime">%s</p>', $entriesArray[$i]["date"]);
                    echo "    </div>";
                    echo "</div>";
                }
            ?>

            <!--The most recent entry should appear at the top of the web page, followed by the next most (will need to develop a sorting algorithm)-->
        </article>
    </div>

    <footer>
        <p>Andras Csaki 2023 ©</p>
    </footer>
</body>
</html>