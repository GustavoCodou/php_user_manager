<php

$con =mysqli_connect("localhost","root","","login_app");

if($con){
    echo "Connected";
} else{
    echo "Not connected" . mysqli_error($con);
}

?>