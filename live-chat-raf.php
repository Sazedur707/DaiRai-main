<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="live-chat-style.css">
    <title>Live Chat</title>
</head>

<body>
    <div style="text-align: center; " class="title">
        <h2 style="margin: 0; margin-top:20px; color: red; -webkit-animation: vibrate-1 0.3s linear infinite both;
        animation: vibrate-1 0.3s linear infinite both; display: inline-block;">Live Chat</h2>
    </div>
    <div id="chat-container">
        <a style="margin-left: 0px; " href="index.html"><button style=" width: 120px;
    padding: 8px;
    margin: 4px 0px;
    background-color: rgb(141, 141, 141);
    color: white;
    cursor: pointer; border-radius: 10px;">Return Home</button></a>
        <a style="margin-left: 0px; " href="entries.php"><button style=" width: 120px;
        padding: 8px;
        margin: 4px 0px;
        background-color: rgb(141, 141, 141);
        color: white;
        cursor: pointer; border-radius: 10px;">See Entries</button></a>


        <div class="content-box">

            <div id="chatbox" style="overflow-y: auto; height: 50vh;">
                <div class="pb-2 text-gray-300 text-white tracking-wide text-sm lg:text-base">
                    Please refrain from posting any sensitive and/or confidential messages.
                </div>
                <br>

                <div class="text-white pb-1 text-sm lg:text-base break-all">
                    <div style="padding: inherit;height: fit-content; background: none;" class="flex bg-gray-775 rounded-lg py-2 px-4">
                        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diary";

$conn = new mysqli($servername, $username, $password, $dbname);

$ip = $_SERVER['REMOTE_ADDR'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

// echo "Your IP address is: " . $ip;

$sql = "SELECT * FROM `message`";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['name'];
      $message = $row['message'];
      $dt = $row['dt'];

    
      echo '<div id="'.$id.'" class="chat-wrapper">';
      echo '<div class="chat-user-name">'.$name.'<span style="color: grey;">'.'   '.$ip.'</span></div>';
      echo '<div class="chat-user-message">'.$message.'</div><br>';
      echo '<div class="sent-date">'.$dt.'<br>'.$ip.'</div>';
      echo '</div>';
      echo '<style>.chat-user-name {
        margin-top: 3px;
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 7px;
        padding-bottom: 4px;
        color: blue;
        border-bottom: 0.1px solid #0080801f;
      }
    
      .sent-date {
        font-size: 10px;
        color: #888;
        text-align: right;
      }
      .chat-wrapper{
        background-color: #19191c;
        border-radius: 10px;
        margin: 10px 8px;
        padding: 20px;
      }
      </style>';
      

    }}


    ?>
                        
                    </div>
                </div>
            </div>
            <div class="text-gray-400 font-semibold h-3 text-xs"></div>
            <form class="mt-2" action="send_message.php" method="post">
            <?php echo '<input type="hidden" name="id" value="' . $id . '">'; ?>
                <input type="text" name="name" class="form-settings rounded-lg" placeholder="Enter your name..."
                    autocomplete="off" value=""><br>
                <input type="text" name="message" class="form-settings rounded-lg" placeholder="Enter a message..."
                    autocomplete="off" value="">
                <input style=" width: 80px;
            padding: 8px;
            /* padding-right: 1px; */
            margin: 4px 0px;
            background-color: grey;
            color: white;
            /* border: 1px solid white; */
            cursor: pointer;border-radius: 10px; margin-left: 3px; " type="submit" value="Send">
            </form>
        </div>
</body>

</html>