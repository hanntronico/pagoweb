<?php
    include 'config/functions.php';
    $amount = $_GET["amount"];

    $detallePago = "Detalle de pago";

// amount, reservaId

    $reservaid = $_GET["reservaId"];

    $token = generateToken();
    $sesion = generateSesion($amount, $token);
    $purchaseNumber = generatePurchaseNumber();

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
              <label for="ckbTerms">
                Acepto los <a href="#" target="_blank">Términos y condiciones</a>
              </label>

              <form id="frmVisaNet" action="http://sacomicita.com/visanetweb/endpoint.php?amount=<?php echo $amount;?>&purchaseNumber=<?php echo $purchaseNumber;?>&reservaid=<?php echo $reservaid;?>">

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


        </div>
      </div>
    </div>
    
</body>
<script src="assets/js/script.js"></script>
</html>