<!-- promotion.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pages Promotions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .promotion {
            display: flex;
            align-items: center;
            margin: 20px;
        }
        .image {
            width: 150px;
            height: 150px;
            margin-right: 20px;
        }
        .promotion-details {
            flex: 1;
        }
        /* Style pour le panier */
        .cart {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #f5f5f5;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .cart-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .cart-content {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .cart-item {
            margin-bottom: 5px;
        }
        .promotion-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .promotion-code {
            flex: 1;
        }
        .add-to-cart {
            margin-left: 20px;
        }
        .checkout-button {
            margin-top: 10px;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Bienvenue sur la page des promotions sur les carburants</h1>

<?php
// Tableau associatif des promotions avec les informations d'image et de code
$promotions = array(
    array("image" => "promo1.jpg", "code" => "PROMO123"),
    array("image" => "promo2.jpg", "code" => "SUMMER2023"),
    array("image" => "promo3.jpg", "code" => "PROMO2023"),
    // Ajoutez d'autres promotions ici
);

// Parcours du tableau des promotions et affichage
foreach ($promotions as $promotion) {
    $imagePath = "../images/" . $promotion["image"]; // Chemin de l'image
    $code = $promotion["code"]; // Code de promotion

    echo '<div class="promotion">';
    echo '<img src="' . $imagePath . '" class="image" alt="Promotion">';
    echo '<div class="promotion-details">';
    echo '<div class="promotion-code">';
    echo '<p>Utilisez le code de promotion: <strong>' . $code . '</strong></p>';
    echo '</div>';
    // Bouton d'ajout au panier en bas de la promotion
    echo '<button class="add-to-cart" data-code="' . $code . '">Ajouter au panier</button>';
    echo '</div>';
    echo '</div>';
}
?>
<div class="cart">
    <h2 class="cart-title">Panier</h2>
    <ul class="cart-content">
        <!-- Les articles ajoutés au panier seront affichés ici -->
    </ul>
    <button class="checkout-button" id="checkout">Checkout</button>
</div>

<!-- Ajoutez d'autres contenus ou éléments ici -->

<script>
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartContent = document.querySelector('.cart-content');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const code = this.getAttribute('data-code');
            const cartItem = document.createElement('li');
            cartItem.className = 'cart-item';
            cartItem.textContent = `Promotion: ${code}`;
            cartContent.appendChild(cartItem);
        });
    });
    const checkoutButton = document.getElementById('checkout');
    checkoutButton.addEventListener('click', function() {
        alert('Merci pour votre commande !');
        // Réinitialiser le contenu du panier après la validation
        cartContent.innerHTML = '';
    });
</script>

<!-- Ajoutez d'autres contenus ou éléments ici -->

</body>
</html>
