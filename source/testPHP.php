<?php
  session_start();
  if (isset($_SESSION['username'])&&($_SESSION['type'])) {  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> 
    <?php 
        $texto = $_GET['texto'];
        $str_oculto1 = $_GET['oculto1'];
        $str_oculto2 = $_GET['oculto2'];
        $str_oculto3 = $_GET['oculto3'];
        $str_oculto4 = $_GET['oculto4'];
        $oculto1 = explode(',', $str_oculto1);
        $oculto2 = explode(',', $str_oculto2);
        $oculto3 = explode(',', $str_oculto3);
        $oculto4 = explode(',', $str_oculto4);
        // echo $str_oculto1;
        $oculto1 = split(' ', $oculto1, -1);
    ?>
    <h1>Titulo</h1>
    <h3><?php echo $str_oculto1;?></h3>
    <table>
        <tbody>
            <tr>
                <td> <?php echo $oculto1[0]; ?> </td>
                <td> <?php echo $oculto1[1]; ?> </td>
                <td> <?php echo $oculto1[2]; ?> </td>
                <td> <?php echo $oculto1[3]; ?> </td>
            </tr>
            <tr>
                <td> <?php echo $oculto2[0]; ?> </td>
                <td> <?php echo $oculto2[1]; ?> </td>
                <td> <?php echo $oculto2[2]; ?> </td>
                <td> <?php echo $oculto2[3]; ?> </td>
            </tr>
            <tr>
                <td> <?php echo $oculto3[0]; ?> </td>
                <td> <?php echo $oculto3[1]; ?> </td>
                <td> <?php echo $oculto3[2]; ?> </td>
                <td> <?php echo $oculto3[3]; ?> </td>
            </tr>
            <tr>
                <td> <?php echo $oculto4[0]; ?> </td>
                <td> <?php echo $oculto4[1]; ?> </td>
                <td> <?php echo $oculto4[2]; ?> </td>
                <td> <?php echo $oculto4[3]; ?> </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
<?php
  }else {
    header('location: page-error.php');
  }
?>