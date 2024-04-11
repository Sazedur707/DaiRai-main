<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Entries</title>
</head>
<body>

<style>
.button-85 {
  padding: 0.6em 2em;
  border: none;
  outline: none;
  color: rgb(255, 255, 255);
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-85:before {
  content: "";
  background: linear-gradient(
    45deg,
    #ff0000,
    #ff7300,
    #fffb00,
    #48ff00,
    #00ffd5,
    #002bff,
    #7a00ff,
    #ff00c8,
    #ff0000
  );
  position: absolute;
  top: -2px;
  left: -2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  -webkit-filter: blur(5px);
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  animation: glowing-button-85 20s linear infinite;
  transition: opacity 0.3s ease-in-out;
  border-radius: 10px;
}

@keyframes glowing-button-85 {
  0% {
    background-position: 0 0;
  }
  50% {
    background-position: 400% 0;
  }
  100% {
    background-position: 0 0;
  }
}

.button-85:after {
  z-index: -1;
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: #222;
  left: 0;
  top: 0;
  border-radius: 10px;
}
.button-88 {
  /* display: flex; */
  /* align-items: center; */
  /* font-family: inherit; */
  /* font-weight: 500; */
  font-size: 12px;
  padding: 0.7em 1.4em 0.7em 1.1em;
  color: white;
  background: #ad5389;
  background: linear-gradient(0deg, blue 0%, lightblue 100%);
  border: none;
  box-shadow: 0 0.7em 1.5em -0.5em #14a73e98;
  letter-spacing: 0.05em;
  border-radius: 20em;
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-88:hover {
  box-shadow: 0 0.5em 1.5em -0.5em #14a73e98;
  color: black;
}

.button-88:active {
  box-shadow: 0 0.3em 1em -0.5em #14a73e98;
}
    .fixed-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
        background-color: blue;
        color: white;
    }

    .top {
        padding: 3px 4px;
    }

    .toptow {
        text-align: center;
        padding: 10px 4px;
        background-color: lightblue;
    }

    .buttons a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        background-color: white;
        padding: 4px 10px;
        margin: 2px 2px;
    }

    .buttons a:hover {
        background-color: black;
        color: white;
    }
</style>

<div class="fixed-container">
    <div class="top">
        <div class="logo" style="margin: 10px;">
            <h1>
                <span style="font-family: 'Courier New', Courier, monospace !important;">DaiRai:</span>
                <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif !important;">Entries</span>
                <a href="live-chat.php" style=><button type="submit" class="button-85">Live Chat</button></a>
            </h1>
        </div>
    </div>
    <div class="toptow">
        <div class="buttons">
        <a href="index.html">Home</a>
            <a href="add-entries.php">New Entry</a>
            <a href="entries.php">Entries</a>
            <a href="About.html">About</a>
        </div>
    </div>
</div>


<div class="final-wrapper">
<div style="text-align:center; margin-bottom:14px;" class="filter-box">
<form action="filtered-entry.php" method="post">
<span style="font-size:14px;">Filter by entry numbers:</span>
<input name="idNumber" type="number">
<button type="submit" class="button-88">Filter</button>
</form>

</div>

<?php
$servername = "localhost";
$username = "id20969921_sazedur";
$password = "937943sS@";
$dbname = "id20969921_diary";

$conn = new mysqli($servername, $username, $password, $dbname);
$idNumber = $_POST['idNumber'];
$sql = "SELECT * FROM `entries`";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $contact = $row['contact'];
        $title = $row['title'];
        $entry = $row['entry'];
        $datetime = $row['dt'];
        if ($idNumber === $id){
        echo '<div id="'.$id.'" class="entry-box-wrapper">';
        echo '<div class="entry-box">';
        echo '<div class="entry-id">' . $id . '</div>';
        echo '<div class="entry-header">' . $name . '</div>';
        echo '<div class="entry-body">';
        echo '<div class="entry-title">' . $title . '</div>';
        echo '<div class="entry-content">' . $entry . '</div>';
        echo '<div class="entry-footer">' . $datetime . '<br>'. $contact . '</div>';
        echo '</div>';
        echo '<style>.entry-id {
            font-weight: bold;
            margin-bottom: 5px;
          }
        
          .entry-header {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
          }
        
          .entry-body {
            border-top: 1px solid #ccc;
            padding-top: 10px;
            margin-top: 10px;
          }
        
          .entry-title {
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 5px;
            color: blue;
          }
        
          .entry-content {
            margin-bottom: 10px;
            // border-bottom: 1px solid #ccc;
          }
        
          .entry-footer {
            color: #888;
            font-style: italic;
            // border-bottom: 1px solid #ccc;
          }
        </style>
        ';

        // Display comments
        $commentTable = "user_" . $id;
        $commentSql = "SELECT * FROM `$commentTable`";
        $commentResult = mysqli_query($conn, $commentSql);
        echo '<br><br><h4>Comments</h4><details><summary>See comments</summary>';
        if ($commentResult) {
            while ($commentRow = mysqli_fetch_assoc($commentResult)) {
                $commentName = $commentRow['name'];
                $commentText = $commentRow['comment'];
                $commentDate = $commentRow['dt'];

                echo '<div class="comment-container">';
                echo '<div class="comment-header">' . $commentName . '</div>';
                echo '<div class="comment-body">' . $commentText . '</div>';
                echo '<div class="comment-footer">' . $commentDate . '</div>';
                echo '</div>';
            }
        }
        echo '</details>';
        // Comment form
        echo '<form class="comment-form" action="add-comment.php" method="post">';
        echo '<input type="hidden" name="entry_id" value="' . $id . '">';
        echo '<input type="text" name="name" placeholder="Your Name" required>';
        echo '<textarea name="comment" placeholder="Write your comment here" required></textarea>';
        echo '<button type="submit">Add Comment</button>';
        echo '</form>';

        echo '</div>';
        echo '</div>';
        echo'<style>
        
        .container {
            width: 600px;
            margin: 0 auto;
        }
        
        
        .title {
        font-size: 19px;
        font-weight: bold;
        margin-bottom: 20px;
        }
        
        .comment-container {
        margin-bottom: 18px;
        padding: 7px;
        background-color: #f5f5f5;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        
        .comment-header {
        font-weight: bold;
        margin-bottom: 5px;
        }
        
        
        .comment-body {
        margin-bottom: 10px;
        }
        
       
        .comment-footer {
        font-size: 12px;
        color: #888;
        }
        
        
        .comment-form {
        // margin-bottom: 20px;
        margin-bottom: 10px;
        }
        
        .comment-form input[type="text"],
        .comment-form textarea {
        display: block;
        width: 570px;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        }
        
        .comment-form button {
        background-color: blue;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        //   font-family: Arial, sans-serif;
        font-size: 14px;
        }
    </style>';
    }else{}
}}
?>

    </div>
    <button onclick="goToTop()" id="goTopBtn">Go to Top</button>

</body>
</html>
<script>
    window.onscroll = function() { scrollFunction() };

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("goTopBtn").style.display = "block";
  } else {
    document.getElementById("goTopBtn").style.display = "none";
  }
}

function goToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script>

<style>
    #goTopBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 99;
  font-size: 16px;
  padding: 10px;
  border: none;
  outline: none;
  background-color: #000;
  color: #fff;
  cursor: pointer;
}

#goTopBtn:hover {
  background-color: #555;
}

    *{
        margin: 0;
    }
    .final-wrapper{
        /* border:1px solid black; */
        margin-top: 130px;

    }
    .entry-box-wrapper{
        /* text-align: center; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .entry-box{
        -webkit-box-shadow: 0px 0px 67px 0px rgba(227,223,227,1);
        -moz-box-shadow: 0px 0px 67px 0px rgba(227,223,227,1);
        box-shadow: -1px 5px 6px 0px rgb(0 0 0);
        width: 600px;
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 10px 21px;
        border:1px solid blue;
}
@media screen and (max-width: 1000px) {
    .entry-box{
        width: 85%;
    }
    .container {
            width: 310px;
            margin: 0 auto;
        }
        .comment-form input[type="text"],
        .comment-form textarea {
        display: block;
        width: 300px;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        }
}
</style>