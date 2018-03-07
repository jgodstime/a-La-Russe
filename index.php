<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Multiplication By a la Ruze</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">A lA Ruse</a></li>
        <li><a href="index1.php">Divide and Conquer</a></li>        
    </ul>
</nav>
<center>
<br>
<h2>Multiplication By A la Ruse (Russian Peasant Method of Multiplication)</h2><br>

<?php

    if(isset($_POST['compute'])){
        $a = $_POST['first'];
        $b = $_POST['second'];

        if(empty($a)){
            echo "<p style='color:red;'> First input is required.</p>";
        }elseif(empty($b)){
            echo "<p style='color:red;'> Second input is required.</p>";
        }else{

                 ?>
                 <table border="1"  cellpadding="5" width="50%">
                    <tr>
                        <th>Multiplicand</th>
                        <th>Multiplier</th>
                        <th>Odd</th>
                    </tr>
                <tr>
                 <td> <?php echo $_POST['first'];?> </td>
                 <td><?php  echo $_POST['second']; ?></td>
                 <td> <?php  echo checkEven2($_POST['first'],$_POST['second']);?>  </td>
                 </tr>
               <?php
                echo treatNumber($a, $b);
           
        }

    }
    


    
    function fractionCheck($a){
        if(strpos($a,'.')!==false){
            return strstr($a,'.', true); //return string ignoring fraction 
        }else{
            return $a; 
        }
    }
    
    // echo checkEven(1234,$b);

    function checkEven($a,$b){
        if($a % 2==0 && $b % 2==0){ //if  the first and the last number is divisible by two (even numbers) return nothing
            // return null;
        }else{ /// return all the the numbers in the right handside that is not dividible by 2 (odd numbers)
            $b = $b.',';
             return  ($b);            
        }
    }

    function checkEven2($a,$b){
        if($a % 2 == 0 && $b % 2 == 0 || $a % 2 == 0 && $b % 2 != 0){ //if  the first number is divisible by two (even numbers)  return nothing  
            
        }else{ /// return all the the numbers in the right handside that is not dividible by 2 (odd numbers)
             return  ($b);            
        }
    }

    function treatNumber($a, $b) {
        
       
        $result = 0;
        for ($i = 0; 2 <= $a; $i++) {
            $a =  fractionCheck($a) / 2; 
            $b = $b * 2;

            echo '<tr>
                    <td>'.fractionCheck($a).'</td>
                    <td>'.$b.'</td>
                    <td>'.rtrim(checkEven($a,$b),',').'</td>
                  </tr>';

            // echo fractionCheck($a).'..................................'. $b.'-----'.checkEven($a,$b). '<br>'; 

            $string = checkEven($a,$b); //this line of code will output something like this (1,2,3,4,5,6,7,8,)
             foreach (explode(',',$string) as  $val) {  //add all element of (1,2,3,4,5,6,7,8,).
                 $result += intval($val);
             }
        }
     

        $lastAdd = checkEven2($_POST['first'],$_POST['second']);

        if($lastAdd>0){
            $call = $result + rtrim($lastAdd,',');
            ?>
                <tr style="font-size:20px; background-color:#2F4F4F;color:white;">
                    <td style="text-align:center;" colspan="2"><?php  echo $_POST['first'].' * '.$_POST['second'] .' = '; ?></td>
                    <td><?php echo  $call;?></td>
                </tr>
            <?php
           
        }else{
            ?>
                <tr style="font-size:20px; background-color:#2F4F4F;color:white;">
                    <td style="text-align:center;" colspan="2"><?php  echo $_POST['first'].' * '.$_POST['second'] .' = '; ?></td>
                    <td><?php echo  $result;?></td>
                </tr>
            <?php
        }
    }
   
?>

    
    
</table>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <br>
            <label for="first">Multiplicand</label>
            <input type="number" name="first" id="first">
        

    
            <label for="second">Multiplier</label>
            <input type="number" name="second" id="second">
       

       
            <input type="submit" value="Compute" name="compute">
       
    </form>
    </center>
</body>
</html>