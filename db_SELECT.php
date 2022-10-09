<?php
    require('db.php');

        
        $countryName1="";
        $sql111 = "SELECT * FROM countries Order By country_name";
        $result111 = $conn->query($sql111);
        $ccc = 0;
        while ($row111 = $result111->fetch_assoc()) {
            $ccc++;
            $countryName1 =  $row111['country_name'];
            $c_code =  $row111['c_code'];

        }
        
?>