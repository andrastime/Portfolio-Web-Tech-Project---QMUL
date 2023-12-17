<?php
    session_start();

    if ($_SESSION["auth"] == true)
    {
        $sqlCon = mysqli_connect("127.0.0.1", "root", "");

        if ($sqlCon->mysql_errno)
        {
            exit();
        }

        mysqli_select_db($sqlCon, "portfolio");

        $body = $_POST["body"];
        $title = $_POST["title"];
        $username = $_SESSION["username"];

        $date = date("Y-m-d H:i:s");

        $sqlPostQuery = "INSERT INTO posts (username, title, body, date_time) VALUES ('" . $username . "', '" . $title . "', '" . $body . "', '" . $date . "');";
        $sqlUsrQuery = mysqli_query($sqlCon, $sqlPostQuery);
    }
    

    header("Location: /pages/viewBlog.php");
?>