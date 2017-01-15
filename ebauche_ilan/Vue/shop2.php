<?php include 'entete.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Dosmoz form</title>
	<link rel="stylesheet" type="text/css" href="../stylesheet/shop.css">
</head>
<body>

<h1>Panier</h1>

<div class="shopping-cart">

<div class="column-labels">
<label class="product-image">Image</label>
<label class="product-details">Produit</label>
<label class="product-price">Prix</label>
<label class="product-quantity-dispo">Quantit&#233 disponible</label>
<label class="product-quantity">Quantit&#233</label>
<label class="product-removal">Supprimer</label>
<label class="product-line-price">Total</label>
</div>
<?php
		include_once ('../modele/Connexion_Base.class.php');
		$connexion_base= new Connexion_Base();
		// lecture dans la table catalogue
		$reponse= $connexion_base->getDb()->query('SELECT nom_produit, prix, stock FROM catalogue');?>
<?php while($donnes = $reponse->fetch()){?>
  <div class="product">
    <div class="product-image"> <!-- mettre en place un genre de tableau appellant les img correspondante -->
      <img src="http://s.cdpn.io/3/dingo-dog-bones.jpg">
    </div>
    <div class="product-details">
      <div class="product-title"><?php echo ''.$donnes['nom_produit'].'<br />';?></div>
      <p class="product-description"><!-- a mettre en place echo ''.$donnes['description'].'<br />';?>-->Description a mettre en place</p>
    </div>
    <div class="product-price"><?php echo ''.$donnes['prix'];?> &#8364 TTC<br /></div>
    <div class="product-quantity-dispo"><?php echo ''.$donnes['stock'].'<br />';?></div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Supprimer
      </button>
    </div>
    <div class="product-line-price"><?php echo ''.$donnes['prix'];?> &#8364 TTC<br /></div>
  </div>
  <?php }
		$reponse->closeCursor(); // Termine le traitement de la requÃªte
?>
<!-- fin premiere boucle -->
  <div class="product">
    <div class="product-image">
      <img src="http://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png">
    </div>
    <div class="product-details">
      <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
      <p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
    </div>
    <div class="product-price">45.99</div>
    <div class="product-quantity">
      <input type="number" value="1" min="1">
    </div>
    <div class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </div>
    <div class="product-line-price">45.99</div>
  </div>

  <div class="totals">
    <div class="totals-item">
      <label>Subtotal</label>
      <div class="totals-value" id="cart-subtotal">71.97</div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)</label>
      <div class="totals-value" id="cart-tax">3.60</div>
    </div>
    <div class="totals-item">
      <label>Shipping</label>
      <div class="totals-value" id="cart-shipping">15.00</div>
    </div>
    <div class="totals-item totals-item-total">
      <label>Grand Total</label>
      <div class="totals-value" id="cart-total">90.57</div>
    </div>
  </div>
      
      <button class="checkout">Checkout</button>

</div>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="../stylesheet/shop.js"></script>
</body>

</html>