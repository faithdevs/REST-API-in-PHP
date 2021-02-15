# REST-API-in-PHP
A Simple RESTFUL API for processing requests and generating JSON responses using PHP and MYSQL.

# Config
- Set your database server configurations.
```
<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','posty');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>

```

# API Request 
- Get Users Information
```
<?php
$db = mysqli_connect("localhost","root","","posty");
$response = array();
if($db){
    $sql ='select * from users';
    $result = mysqli_query($db,$sql);
    if($result){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row ['id'];
            $response[$i]['name'] = $row ['name'];
            $response[$i]['username'] = $row ['username'];
            $response[$i]['email'] = $row ['email'];
            $response[$i]['email_verified_at'] = $row ['email_verified_at'];
            $response[$i]['password'] = $row ['password'];
            $response[$i]['remember_token'] = $row ['remember_token'];
            $response[$i]['created_at'] = $row ['created_at'];
            $response[$i]['updated_at'] = $row ['updated_at'];
            $i++;
        }
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
}
else{
    echo "Database connection failed";
}
?>
```
