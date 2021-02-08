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