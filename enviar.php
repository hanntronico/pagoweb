
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" type="text/javascript" charset="utf-8" ></script>

<!-- <script src="//code.jquery.com/jquery-1.11.2.min.js"></script> -->


<script type="text/javascript" charset="utf-8">
	
	function enviar() {


    // var data = {
    //   "amount": importe,
    //   "antifraud": null,
    //   "channel": "web",
    //   "recurrenceMaxAmount": null
    // };


		// var val1=document.getElementById("val1").value;
		// var val2=document.getElementById("val2").value;

	  // var parametros = {
	  //       "amount" : '155.66',
	  //       "antifraud" : null,
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

        // var parametros = {
        //         "antifraud" : null,
        //         "captureType" : 'manual',
        //         "channel" : 'web',
        //         "contable" : true,
        //         // "order" : array(
	       //         //  'amount' => '155.66',
	       //         //  'currency' => 'PEN',
	       //         //  'purchaseNumber' => '3412312287',
	       //         //  'tokenId' => 'tokenparatransaccion'
        //         // ),
        //         "recurrence" : null,
								// "sponsored" : null
        // };

        var paramertro2 = {
        		"amount" : '155.66',
        		"currency" : 'PEN',
        		"purchaseNumber" : '3412312287',
        		"tokenId" : 'tokenparatransaccion'
      	};


        $.ajax({
                data:  paramertro2, //datos que se envian a traves de ajax
                url:   'apivisanet.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#resultado").html(response);
                }
        });


	}

</script>




<!-- <input type="text" name="val1" id="val1" placeholder=""><br><br>
<input type="text" name="val2" id="val2" placeholder=""> -->


<button type="button" class="btn btn-primary btn-lg" onclick="enviar()">Enviar</button>

<br><br>
<span id="resultado">0</span>

