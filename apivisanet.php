<?php 

    include 'config/functions.php';

	  // var parametros = {
	  //       "amount" : ,
	  //       "antifraud" : val2,
	  //       "channel" : val2,
	  //       "recurrenceMaxAmount" : null
	  // };


// $data = array(
//             'antifraud' => null,
//             'captureType' => 'manual',
//             'channel' => 'web',
//             'countable' => true,
//             'order' => array(
//                 'amount' => '155.66',
//                 'currency' => 'PEN',
//                 'purchaseNumber' => '3412312287',
//                 'tokenId' => 'tokenparatransaccion'
//             ),
//             'recurrence' => null,
//             'sponsored' => null
//         );




// {
//      "antifraud" : null,
//      "captureType" : "manual",
//      "channel" : "web",
//      "countable" : true,
//      "order" : {
//          "amount" :  100.00,
//          "currency" : "PEN",
//          "purchaseNumber" : 5632897416,
//          "tokenId" : "tokenparatransaccion"
//     }
// }

$datos = json_decode(file_get_contents('php://input'), true);

$antifraud = $datos["antifraud"];
$captureType = $datos["captureType"];
$channel = $datos["channel"];
$countable = $datos["countable"];
$amount = $datos["order"]["amount"];
$currency = $datos["order"]["currency"];
$purchaseNumber = $datos["order"]["purchaseNumber"];
$tokenId = $datos["order"]["tokenId"];

// $datos = json_encode($datos1);

// $antifraud = null;
// $captureType = "manual";
// $channel = "web";
// $countable = true;
// $amount = 100.00;
// $currency = "PEN";
// $purchaseNumber = 5632899877;
// $tokenId = "tokenparatransaccion";

// echo $transactionToken = $datos["transactionToken"];
// echo $email = $datos["customerEmail"];


// $amount = $_POST["amount"];
// $currency = $_POST["currency"];
// $purchaseNumber = $_POST["purchaseNumber"];
// $tokenId = $_POST["tokenId"];



// echo $amount;


// $data = array(
//             'antifraud' => null,
//             'captureType' => 'manual',
//             'channel' => 'web',
//             'countable' => true,
//             'order' => array(
//                 'amount' => $amount,
//                 'currency' => $currency,
//                 'purchaseNumber' => $purchaseNumber,
//                 'tokenId' => $tokenId
//             ),
//             'recurrence' => null,
//             'sponsored' => null
//         );


    // echo $transactionToken = $_POST["transactionToken"];
    // echo $email = $_POST["customerEmail"];
    // echo $amount = $amount;
    // echo $purchaseNumber = $purchaseNumber;



  $token = generateToken();
  $data = generateAuthorization($amount, $purchaseNumber, $transactionToken, $token);
  echo json_encode($data);

?>