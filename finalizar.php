<?php
    include 'config/functions.php';


    $transactionToken = $_POST["transactionToken"];
    $email = $_POST["customerEmail"];
    $amount = $_GET["amount"];
    $purchaseNumber = $_GET["purchaseNumber"];

    // $type = $_GET["type"];

// http://sacomicita.com/visanetweb/recibepago.php?type=0&precio=575&tiempo=15&destacar=false&primer_dia=2020-10-01&ultimo_dia=2020-10-14&todo_dia=true&primera_subida=00:00&ultima_subida=00:00&_id=gEmcFpYFfHWKQMewB

// http://sacomicita.com/visanetweb/recibepago.php?type=0&precio=675&tiempo=15&destacar=true&primer_dia=2020-10-02&ultimo_dia=2020-10-09&todo_dia=true&primera_subida=00:00&ultima_subida=00:00&_id=QMM5HCoqvZbx7GmYi    

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

    $token = generateToken();

    $data = generateAuthorization($amount, $purchaseNumber, $transactionToken, $token);

    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // exit();

    // header('Content-type:application/json'); 
    // echo json_encode($data);

// https://dating-morangesoft.meteorapp.com/premiun
// https://dating-morangesoft.meteorapp.com/membresia


if (isset($data->dataMap)) {
  if ($data->dataMap->ACTION_CODE == "000") {
    // $c = preg_split('//', $data->dataMap->TRANSACTION_DATE, -1, PREG_SPLIT_NO_EMPTY);


      if ($type==0) {

  // type 0 path: /membresia {
  //            "precio": 655,
  //            "tiempo": 15,
  //            "destacar": true,
  //            "primer_dia": "01-06-2020",
  //            "ultimo_dia": "05-06-2020",
  //            "todo_dia": true,
  //            "primera_subida": "09:30",
  //            "ultima_subida": "19:30",
  //             "_id":  "2uMzraoWnTwAcyXcc",
  //             "userId": "P3YMPoh6wcbfyZfA5"
  // }

       

        $url="https://dating-morangesoft.meteorapp.com/membresia";

        $postData = array(
            'precio' => $precio,
            'tiempo' => $tiempo,
            'destacar' => $destacar,
            'primer_dia' => $primer_dia,
            'ultimo_dia' => $ultimo_dia,
            'todo_dia' => $todo_dia,
            'primera_subida' => $primera_subida,
            'ultima_subida' => $ultima_subida,
            '_id' => $id
        );

      }elseif($type==1){

          $url="https://dating-morangesoft.meteorapp.com/premiun";

          $postData = array(  
            'precio' => $precio,
            'userId' => $userId
          );

      }




  }
}


json_encode($postData);



// {"precio":"675","tiempo":"15","destacar":"true","primer_dia":"2020-10-02","ultimo_dia":"2020-10-09","todo_dia":"true","primera_subida":"00:00","ultima_subida":"00:00","id":null}



/***********************************************************************************************/
            
// https://dating-morangesoft.meteorapp.com

// type 0 path: /membresia {
//            "precio": 655,
//            "tiempo": 15,
//            "destacar": true,
//            "primer_dia": "01-06-2020",
//            "ultimo_dia": "05-06-2020",
//            "todo_dia": true,
//            "primera_subida": "09:30",
//            "ultima_subida": "19:30",
//             "_id":  "2uMzraoWnTwAcyXcc",
//             "userId": "P3YMPoh6wcbfyZfA5"
// }

// type 1 /premiun {
//     "precio": "100",
//     "userId": "sPYdis53KXprLgHLu"
// }

/***************************************************/

// // Setup cURL
// $ch = curl_init($url);

// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// curl_setopt_array($ch, array(
//     CURLOPT_POST => TRUE,
//     CURLOPT_RETURNTRANSFER => TRUE,
//     CURLOPT_HTTPHEADER => array(
//       'Content-Type: application/json'
//     ),
//     CURLOPT_POSTFIELDS => json_encode($postData)
// ));

// // Send the request
// $response = curl_exec($ch);

/***************************************************/
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





// echo "<br>";
// echo "curl error : ".curl_error($ch); 
// echo "<br>";
// echo "respuesta: ".$responseData;


// Check for errors
// if($response === FALSE){
//     die(curl_error($ch));
// }

// Decode the response
// $responseData = json_decode($response, TRUE);

// echo "<br>";
// echo "curl error : ".curl_error($ch); 
// echo "<br>";
// echo "respuesta: ".$responseData;

// Print the date from the response
// echo $responseData['published'];

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
<!-- <div class="container">
  <h3>Su pago se ha realizado con éxito</h3>
</div> -->        