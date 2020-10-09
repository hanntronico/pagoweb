<?php
    include 'config/functions.php';


    $transactionToken = $_POST["transactionToken"];
    $email = $_POST["customerEmail"];
    $amount = $_GET["amount"];
    $purchaseNumber = $_GET["purchaseNumber"];

    $reservaid = $_GET["reservaid"];

    $token = generateToken();
    $data = generateAuthorization($amount, $purchaseNumber, $transactionToken, $token);



  if (isset($data->dataMap)) {
    if ($data->dataMap->ACTION_CODE == "000") {

          $url="https://concebirapp.meteorapp.com/pago-visanet";

          $postData = array(
              'reservaId' => $reservaid
          );

    }
  }


json_encode($postData);

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $parame =array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json'),
            CURLOPT_POSTFIELDS => json_encode($postData)
            );

  curl_setopt_array($curl, $parame);      
    
  $response = curl_exec($curl); 
  $err = curl_error($curl);
  curl_close($curl);
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

  <div class="container mt-4">
 
    <div class="card border-success mb-3" style="max-width: 18rem; text-align: center; margin: 0px auto;">
      <div class="card-header">Mensaje de Pago</div>
      <div class="card-body text-success">
        <h5 class="card-title">Pago exitoso</h5>
        <p class="card-text">Su pago se ha realizado con éxito</p>
      </div>
    </div>
  
  </div>  
</body>
</html>      