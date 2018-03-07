<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Multiplication By Divide And Conquer</title>
</head>
<nav>
    <ul>
        <li><a href="index.php">A lA Ruse</a></li>
        <li><a href="index1.php">Divide and Conquer</a></li>        
    </ul>
</nav>
<center>
<body><br>
<h2>Multiplication By Divide And Conquer</h2><br>

<?php

    if(isset($_POST['compute'])){ 
        $a = $_POST['first'];
        $b = $_POST['second'];

        if(empty($a)){
            echo "<p style='color:red;'> First input is required.</p>";
        }elseif(empty($b)){
            echo "<p style='color:red;'> Second input is required.</p>";
        }else{
            if(strlen($a)>4 || strlen($b)>4){
                echo '<span style="color:red;">Sorry! only Four(4) digit number is accepted.</span>';
            }else{
                echo treatNumber(countAddCheck($a), countAddCheck($b));
            }
          }
            
        }
    
    
    
    
    function countAddCheck($val){
        if(strlen($val)==4){
            return $val;
        }else{
            for ($i=1; 4 >= strlen($val); $i++) { 
                $val = '0'.$val;
                if(strlen($val)==4){
                    return $val;
                }
            }
        }  
    }
  

    function getFirst($val){
        return substr($val, 0, 2); //collect first two value from left (e.g 1234. collect 12)
    }
    

    function getSecond($val){
        return substr($val, 2); //collect first two value from right (e.g 1234. collect 34)
    }

    
    function treatNumber($a, $b){
          $a1 = getFirst($a);
          $b1 = getFirst($b);
          
          $b2 = getSecond($b);

          $a2 = getSecond($a);

          $mul1 = ($a1 * $b1) * pow(10,4);
          $mul2 = ($a1 * $b2) * pow(10,2);

          $mul3 = ($a2 * $b1) * pow(10,2);
          $mul4 = ($a2 * $b2);

          

          $final = $mul1 + $mul2 + $mul3 + $mul4;
          

        ?>

        <table border="1"  cellpadding="5" width="50%">
            <tr> 
                <td><?php echo $a1.' * '. $b1; ?></td>
                <td><?php echo $a1 * $b1. ' * 10<sup>4</sup>'; ?></td>
                <td><?php echo $mul1; ?></td>
            </tr>
            <tr>
                <td><?php echo $a1.' * '. $b2; ?></td>
                <td><?php echo $a1 * $b2. ' * 10<sup>2</sup>'; ?></td>
                <td><?php echo $mul2; ?></td>
            </tr>
            <tr>
                <td><?php echo $a2.' * '. $b1; ?></td>
                <td><?php echo $a2 * $b1. ' * 10<sup>2</sup>'; ?></td>
                <td><?php echo $mul3; ?></td>
            </tr>
            <tr>
                <td><?php echo $a2.' * '. $b2; ?></td>
                <td><?php echo $a2 * $b2. ' * 10<sup>0</sup>'; ?></td>
                <td><?php echo $mul4; ?></td>
            </tr>
            <tr  style="text-align:center;font-size:19px; background-color:#2F4F4F;color:white;">
                <td colspan="2"><?php echo  countAddCheck($_POST['first']).' * '.countAddCheck($_POST['second']) .' = '; ?></td>
                <td style="text-align:left;"><?php echo $final;?></td>
            </tr>
        </table>
        <?php
    }
  
    

?>


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