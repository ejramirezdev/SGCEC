<?php require_once 'views/partials/header.php'; ?>



<div class="container">

<h1>Aun no has realizado el pago, porfavor cancele mediante Paypal</h1>



<div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=AdK1FyqG6P6lSVTdmxEPISDwTZxfo7j2vKy-LOitOq1V7ZzpeaTc2eI73XqMZhXadQVxu9f1CllnI_zK&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"<?php echo $resultado->nombre ?>","amount":{"currency_code":"USD","value":<?php echo $resultado->costo ?>}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';
            const status = orderData.purchase_units[0].payments.captures[0].status;
            const paymentID = orderData.purchase_units[0].payments.captures[0].id;
            const payerID = orderData.payer.payer_id;
            // index.php?c=Auth&a=registrarPagoView&id=$id_curso
            window.location = "index.php?c=Auth&a=registrarPago&userID=<?php echo $userID; ?>&cursoID=<?php echo $cursoID; ?>&status="+status+"&paymentID="+paymentID+"&payerID="+payerID;
	
            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>



</div>

<?php
include_once("views/partials/footer.php");
?>