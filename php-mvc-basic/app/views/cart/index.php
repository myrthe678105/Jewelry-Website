<?php
include __DIR__ . '/../header.php';
?>
<div id="body">
<h1>Your Cart</h1>
<?php
$totalPrice = 0;
if (!empty($cart)) {
    foreach ($cart as $order) {
        if ($order->getStatus() == "cart") {
            echo '<div class="cart-item">';
            echo '<img class="cart-img" src="../img/' . $order->getItem()->getImg() . '" alt="' . $order->getItem()->getDescription() . '">';
            echo '<div class="cart-info">';
            echo '<p class = "item-title"><b>' . $order->getItem()->getDescription() . '</b></p>';
            echo '<p>Colour: ' . $order->getItem()->getColour() . '</p>';
            echo '<p>Price: $' . number_format($order->getItem()->getPrice(), 2) . '</p>';
            $totalPrice += $order->getItem()->getPrice();
            echo '</div>';
            echo '<form action="/item/updateOrders" method="post">';
            echo '<input type="hidden" name="orderid" value="' . $order->getId() . '">';
            echo '<button type="submit" class="btn btn-primary" name="order" style="padding: 7px;">Order Now!</button>';
            echo '</form>';
            echo '</div>';
        }
    }
    
} else {
    echo '<h3 class="errormsg"> No Orders in Cart</h3>';
}
?>
<div class="cart-bottom">
    <h3 class="displayprice">
        Total Price = $<?php echo $totalPrice; ?></h3>

</div>
</div>


<?php
include __DIR__ . '/../footer.php';
?>
