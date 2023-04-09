<?php
include __DIR__ . '/../header.php';
?>
<!-- get item based on id and then use it here -->
<div id="body">
    <div class="itemimage">
    <img  class="itempic" src="../img/<?php echo $item->getImg(); ?>" alt="product image">
    </div>
    <div class="itemdescription">
    <h2 class="description"><?php echo $item->getDescription(); ?></h2>
    <p class="colour"><?php echo $item->getColour(); ?></p>
    <p class="card-text"><?php echo number_format($item->getPrice(), 2, ',', '.').' €'; ?></p>

    <?php if(isset($_SESSION['user'])) { ?>
        <form method="POST" action="/item/addOrder">
            <input type="hidden" name="itemid" value="<?php echo $item->getId(); ?>">
            <button type="submit" class="btn-primary" name="addOrder">Add to cart</button>
        </form>
    <?php } else { ?>
        <p style="color: #696969">Log in to add to cart</p>
    <?php } ?>
</div>


    <div id="cart-message-container"></div> <!-- Container for the cart message -->

</div>
<?php
include __DIR__ . '/../footer.php';
?>
