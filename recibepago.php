<?php
    include 'config/functions.php';
    $amount = $_GET["precio"];
    // $user = $_GET["user"];
    // $type = $_GET["type"];
    $detallePago = "Detalle de pago";


    $type = $_GET["type"];  
    $precio = $_GET["precio"];
    $tiempo = $_GET["tiempo"];
    $destacar = $_GET["destacar"];
    $primer_dia = $_GET["primer_dia"];
    $ultimo_dia = $_GET["ultimo_dia"];
    $todo_dia = $_GET["todo_dia"];
    $primera_subida = $_GET["primera_subida"];
    $ultima_subida = $_GET["ultima_subida"];
    $id = $_GET["_id"];
    $userId = $_GET["userId"];


    // echo "<pre>";
    // echo "token: ".
    $token = generateToken();
    // echo "</pre>";

    // echo "<br>";
    // echo "sesion: ".
    $sesion = generateSesion($amount, $token);

    // echo "<br>";
    // echo "purchaseNumber: ".
    $purchaseNumber = generatePurchaseNumber();
    // echo "<br>";




// echo "MERCHANT_ID: ".VISA_MERCHANT_ID."<br>";
// echo "USER: ".VISA_USER."<br>";
// echo "PWD: ".VISA_PWD."<br>";
// echo "URL_SECURITY: ".VISA_URL_SECURITY."<br>";
// echo "URL_SESSION: ".VISA_URL_SESSION."<br>";
// echo "URL_JS: ".VISA_URL_JS."<br>";
// echo "URL_AUTHORIZATION: ".VISA_URL_AUTHORIZATION."<br>";



    // exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $detallePago ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

    <br>



    <div class="container">

<div class="card text-center p-2 bg-primary" style="width: 60%; text-align: center; margin: 0px auto;">
  <div class="card-header" style="color: #fff;">
    <h2 class="text-center">Pago con Visa</h2>
  </div>
  <div class="card-body bg-light">
        <h3>Información del pago</h3>
        <b style="padding-left:20px;">Importe a pagar: </b> S/. <?php echo $amount; ?> <br>
        <b style="padding-left:20px;">Número de pedido: </b> <?php echo $purchaseNumber; ?> <br>
        <b style="padding-left:20px;">Concepto: </b> <?php echo $detallePago; ?> <br>
        <b style="padding-left:20px;">Fecha: </b> <?php echo date("d/m/Y"); ?> <br>

        <hr>
        <h3>Realiza el pago</h3>
        Debe aceptar los término y condiciones <br>
        
        <input type="checkbox" name="ckbTerms" id="ckbTerms" onclick="visaNetEc3()"> 
        <label for="ckbTerms">Acepto los <a href="#" target="_blank">Términos y condiciones</a></label>


<form id="frmVisaNet" action="http://sacomicita.com/visanetweb/finalizar.php?amount=<?php echo $amount;?>&purchaseNumber=<?php echo $purchaseNumber;?>&type=<?php echo $type;?>&precio=<?php echo $precio;?>&tiempo=<?php echo $tiempo;?>&destacar=<?php echo $destacar;?>&primer_dia=<?php echo $primer_dia;?>&ultimo_dia=<?php echo $ultimo_dia;?>&todo_dia=<?php echo $todo_dia;?>&primera_subida=<?php echo $primera_subida;?>&ultima_subida=<?php echo $ultima_subida;?>&_id=<?php echo $id;?>&userId=<?php echo $userId;?>">
<!--             <script src="<?php //echo VISA_URL_JS?>" 
                data-sessiontoken="<?php //echo $sesion;?>"
                data-channel="web"
                data-merchantid="<?php //echo "522591303"; ?>"
                data-merchantlogo="http://localhost:8082/pagoweb/assets/img/logo.png"
                data-purchasenumber="<?php //echo $purchaseNumber;?>"
                data-amount="<?php //echo $amount; ?>"
                data-expirationminutes="5"
                data-timeouturl="http://localhost:8082/pagoweb/"
            ></script> -->
            <!-- http://sacomicita.com/visanetweb/recibepago.php -->
            <script src="<?php echo VISA_URL_JS?>" 
                data-sessiontoken="<?php echo $sesion;?>"
                data-channel="web"
                data-merchantid="<?php echo "522591303"; ?>"
                data-merchantlogo="http://sacomicita.com/visanetweb/assets/img/logo.png"
                data-purchasenumber="<?php echo $purchaseNumber;?>"
                data-amount="<?php echo $amount; ?>"
                data-expirationminutes="5"
                data-timeouturl="http://sacomicita.com/visanetweb/pagoweb/"
            ></script>            
        </form>         

<!--     <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
<!--   <div class="card-footer bg-primary" >

  </div> -->
</div>

       

<!--         <h1 class="text-center">Pago con Visa</h1>
        <hr>
        <h3>Información del pago</h3>
        <b style="padding-left:20px;">Importe a pagar: </b> S/. <?php //echo $amount; ?> <br>
        <b style="padding-left:20px;">Número de pedido: </b> <?php //echo $purchaseNumber; ?> <br>
        <b style="padding-left:20px;">Concepto: </b> <?php //echo $detallePago; ?> <br>
        <b style="padding-left:20px;">Fecha: </b> <?php //echo date("d/m/Y"); ?> <br>
        <hr>
        <h3>Realiza el pago</h3>
        Debe aceptar los término y condiciones <br>
        
        <input type="checkbox" name="ckbTerms" id="ckbTerms" onclick="visaNetEc3()"> 
        <label for="ckbTerms">Acepto los <a href="#" target="_blank">Términos y condiciones</a></label> -->

<!--         <form id="frmVisaNet" action="http://sacomicita.com/visanetweb/finalizar.php?amount=<?php echo $amount;?>&purchaseNumber=<?php echo $purchaseNumber;?>&type=<?php echo $type;?>&precio=<?php echo $precio;?>&tiempo=<?php echo $tiempo;?>&destacar=<?php echo $destacar;?>&primer_dia=<?php echo $primer_dia;?>&ultimo_dia=<?php echo $ultimo_dia;?>&todo_dia=<?php echo $todo_dia;?>&primera_subida=<?php echo $primera_subida;?>&ultima_subida=<?php echo $ultima_subida;?>&_id=<?php echo $id;?>&userId=<?php echo $userId;?>"> -->

<!--             <script src="<?php //echo VISA_URL_JS?>" 
                data-sessiontoken="<?php //echo $sesion;?>"
                data-channel="web"
                data-merchantid="<?php //echo "522591303"; ?>"
                data-merchantlogo="http://localhost:8082/pagoweb/assets/img/logo.png"
                data-purchasenumber="<?php //echo $purchaseNumber;?>"
                data-amount="<?php //echo $amount; ?>"
                data-expirationminutes="5"
                data-timeouturl="http://localhost:8082/pagoweb/"
            ></script> -->
            <!-- http://sacomicita.com/visanetweb/recibepago.php -->

<!--             <script src="<?php echo VISA_URL_JS?>" 
                data-sessiontoken="<?php echo $sesion;?>"
                data-channel="web"
                data-merchantid="<?php echo "522591303"; ?>"
                data-merchantlogo="http://sacomicita.com/visanetweb/assets/img/logo.png"
                data-purchasenumber="<?php echo $purchaseNumber;?>"
                data-amount="<?php echo $amount; ?>"
                data-expirationminutes="5"
                data-timeouturl="http://sacomicita.com/visanetweb/pagoweb/"
            ></script>            
        </form> -->
    </div>
    
</body>
<script src="assets/js/script.js"></script>
</html>