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
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/mobile.css" media="screen and (max-width: 768px)">
    <title>Andras Portfolio</title>
</head>
<body>
    <article>
        <div id="header">
            <header>
                <div>
                    <a id="logo" href="./index.php">
                        <p style="color: #E57200">&gt</p> 
                        <p>AC</p>
                        <p id="cursor"> _</p>
                    </a>
                </div>

                <div id="nav-div">
                    <nav>
                        <ul>
                            <li><a href="#about">About Me</a></li>
                            <li><a href="#experience">Experience</a></li>
                            <li><a href="#education">Education</a></li>
                            <li><a href="#content">Contact</a></li>
                            <li><a href="./pages/viewBlog.php">Blog</a></li>
                            <?php
                                if ($_SESSION["auth"] == true)
                                {
                                    echo '<li id="logout"><a href="./pages/logout.php">Logout</a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </header>
        </div>

        <section id="about">
            <div id="article-flex">
                <div>
                    <h1>About Me</h1>
                    <p>My name is Andras Csaki and I am a Computer Science student at the Queen Mary's University of London. I am a cyber security enthusiast and aspiring ethical hacker. </p>
                    <p>By the humble age of 15, I have already excelled at cyber security competitions such as Cyber Discovery where I achieved "elite" status and with this I was privileged enough to be sponsored by them to aquire a full cyber security certification in ethical hacking.</p>
                </div>
                <figure>
                    <img id="portfolio-image" src="./images/andras.jpg" alt="Photo of Andras">
                </figure>
            </div>
        </section>

        <section id="experience">
            <h1>Experience</h1>
            <div id="experience-flex">
                <div>
                    <div class="exp-cont">
                        <div class="exp-head">
                            <h2>Cyber Discovery</h2>
                            <img src="./images/cd.png" alt="Cyber Discovery Logo">
                        </div>
                        <p>I participated and finised at the top 5% of CyberDiscovery conducted by the GCHQ</p>
                    </div>
                </div>
                <div>
                    <div class="exp-cont">
                        <div class="exp-head">
                            <h2>Freelancer</h2>
                            <img src="./images/freelancer.png" alt="Freelancer Logo">
                        </div>
                        <p>I have also worked as a freelancer on the Freelancer platform where completed 2 jobs</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="skills">
            <h1>Skills</h1>
            <p>I am fluent in Python and Java, however I can adapt to most languages as I have learned to be multi-lingual beacuse of the multitute of languages I have been exposed to. Assembly language and machine code do not pose a challenge to me either because of my extensive practice in cybersecurity as well as doing MIPS assembly on my Computer Science course at QMUL.</p>
        </section>

        <section id="education">
            <h1>Education</h1>
            <p>2015-2020 GCSEs at Kemnal Technology College</p>
            <p>2020-2022 A-Levels at Coopers School</p>
            <p>2022-present Computer Science at Queen Mary's University of London</p>
        </section>
        
        <aside>
            <div>
                <form id="login-flex" action="./pages/login.php" method="post">
                    <?php
                        if ($_SESSION["auth"] == true and isset($_SESSION["username"]))
                        {
                            echo "<h3>Welcome " . $_SESSION["username"] . "</h3>";
                        }
                        else
                        {
                            echo <<<MARKUP
                            <div>
                                <h2>Login</h2>
                            </div>
                            <div>
                                <input name="email" type="email" required class="login-text" placeholder="Email" pattern="[a-z0-9.]*@[a-z0-9.]*">
                            </div>
                            <div>
                                <input name="password" type="password" required class="login-text" placeholder="Password" min-length=8>
                            </div>
                            <div>
                                <input type="submit" value="Login">
                            </div>
                            MARKUP;
                        }
                    ?>
                </form>
            </div>
        </aside>

        <section id="contact">
            <h1>Contact and Portfolio</h1>
            <div id="contact-flex">
                <div id="contact-details">
                    <h2>Contact Details</h2>
                    <p>Email: <a href="mailto:rendrus.csaki@hotmail.com">rendrus.csaki@hotmail.com</a></p>
                    <p>LinkedIn: <a href="https://www.linkedin.com/in/andras-csaki-b3903b103/">Andras Csaki</a></p>
                </div>
                <div id="portfolio">
                    <h2>Portfolio</h2>
                    <p>Github: <a href="https://github.com/andrastime">Andras Csaki</a></p>
                    <p>Freelancer: <a href="https://www.freelancer.com/u/andrastime">Andras Csaki</a></p>
                </div>
            </div>
        </section>
    </article>

    <footer>
        <p>Andras Csaki 2023 ©</p>
    </footer>
</body>
</html>