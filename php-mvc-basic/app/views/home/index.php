<?php
include __DIR__ . '/../header.php';
?>
<html>
<div id="body">

<!-- grid with 3 columns for items -->
<!-- see if i wanna do this -->
<h2> Popular right now: </h2>
<hr class="hr hr-blurry" />
<div class="container text-center">
  <div class="row row-cols-3">
  <?php if (!empty($items)) { ?>
    <?php foreach ($items as $item) { ?>
        <div class="col">
            <div id="item-card" class="card" style="width: 18rem;">
                <img src="../img/<?php echo $item->getImg(); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item->getDescription(); ?></h5>
                    <p class="card-text"><?php echo number_format($item->getPrice(), 2, ',', '.').' €'; ?></p>
                    <form action="/home/item" method="post">
                      <input type="hidden" name="id" value="<?php echo $item->getId(); ?>">
                      <button type="submit" class="btn btn-primary">See Item</button>
                  </form>
                </div>
            </div>
        </div>
    <?php } ?>
  <?php } else { ?>
    <p>cannot display items.</p>
  <?php } ?>
  </div>
</div>
</div>

</html>
<?php
include __DIR__ . '/../footer.php';
?>

