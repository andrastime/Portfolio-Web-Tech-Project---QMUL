<?php
    session_start();
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
    
        <title>Post a Blog - Andras' Portfolio</title>
    </head>

    <body>
        <?php
            if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true)
            {
                echo <<<MARKUP
                <script src="../js/formTools.js" defer></script>

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
                MARKUP;

                if ($_SESSION["auth"] == true)
                {
                    echo '<li id="logout"><a href="./logout.php">Logout</a></li>';
                }

                echo <<<MARKUP
                                </ul>
                            </nav>
                        </div>
                    </header>
                </div>

                <div id="article-cont">
                    <article>
                        <div id="post-head">
                            <form action="./addEntry.php" method="post" onsubmit="return preventDefault()">
                                <div>
                                    <h1>Add Blog Post</h1>
                                </div>
                                <div>
                                    <input type="text" id="blog-title" class="blog-text" placeholder="Title" name="title">
                                </div>
                                <div id="bodyGroup">
                                    <div>
                                        <textarea rows="5" id="blog-body" class="blog-text" placeholder="Enter your text here" name="body"></textarea>
                                    </div>
                                    <div>
                                        <p id="emptyFields">You must fill in both fields to make a new post.</p>
                                    </div>
                                </div>
                            
                                <div id="but-holder">
                                    <input type="button" onclick="clearForm()" class="form-but" value="Clear">
                                    <input type="submit" class="form-but" value="Post">
                                </div>
                            </form>
                        </div>
                    </article>
                </div>
                MARKUP;
            }
            else
            {
                header("Location: /");
            }
        ?>
    </body>
</html>