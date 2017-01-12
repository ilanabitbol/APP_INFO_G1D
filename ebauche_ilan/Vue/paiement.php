<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>dosmoz</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" type ="text/css" href="../stylesheet/paiement.css">
   
 </head>

<body>


<div class="container">
	<div id="Checkout" class="inline">
		<h1>Payment</h1>
			<div class="card-row">
				<span ><img class = "carte" alt="vise" src="../images/visa.png"></span>
				<span ><img class = "carte" alt="masterCard" src="../images/masterCard.png"></span>
			</div>
		<form>
		<div class="form-group">
				<label for="PaymentAmount">Montant</label>
			<div class="amount-placeholder">
				
				<span>500.00</span>
			</div>
		</div>
		<div class="form-group">
			<label or="NameOnCard">NOM</label>
			<input id="NameOnCard" class="form-control" type="text" maxlength="255"></input>
		</div>
		<div class="form-group">
			<label for="CreditCardNumber">numero de carte</label>
			<input id="CreditCardNumber" class="null card-image form-control" type="text"></input>
		</div>
		<div class="expiry-date-group form-group">
			<label for="ExpiryDate">date d'expiration</label>
			<input id="ExpiryDate" class="form-control" type="text" placeholder="jj/mm/aaaa" maxlength="7"></input>
		</div>
		<div class="security-code-group form-group">
			<label for="SecurityCode">Cryptogramme visuel</label>
			<div class="input-container" >
				<input id="SecurityCode" class="form-control" type="text" ></input>
				<i id="cvc" class="fa fa-question-circle"></i>
			</div>
		<div class="cvc-preview-container two-card hide">

			<div class="visa-mc-dis-cvc-preview"><img alt="cryto visuel" src="../images/cryptoVisuel.png"></div>
		</div>
		</div>
		<div class="zip-code-group form-group">
			
			<div class="input-container">
				
				<a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the ZIP/Postal code for your credit card billing address."><i class="fa fa-question-circle"></i></a>
			</div>
		</div>
		<button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
			<span class="submit-button-lock"></span>
			<span class="align-middle">payer</span>
		</button>
		</form>
	</div>
</div>

  		
</body>
</html>
