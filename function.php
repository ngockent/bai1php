<?php
    include 'connect.php';

    // function layThongTinTaiKhoan($stk){
    //     global $con; 
    //     $userInfoQuery = "select * from diadiem "; 
    //     $execUserInfo = mysqli_query($con, $userInfoQuery); 
    //     $num = mysqli_fetch_array($execUserInfo); 
    //     return $num; 
    // }

    // function vanTin($stk){
    //     $num = layThongTinTaiKhoan($stk); 
    //     return $num['DiemDi'];
    // }

    function abc($con){
        $sql = "SELECT * FROM `diadiem` WHERE id";
        $exe = mysqli_query($con,$sql);
        $a = [];
        while($num = mysqli_fetch_array($exe, MYSQLI_ASSOC))
        {
            array_push($a,$num);
        }
        return $a;
    }
?>