<?php
include __DIR__ . '/../adminheader.php';
?>
<div id="body">
<table id="admintable" class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User ID</th>
      <th scope="col">Item ID</th>
      <th scope="col">Date of Purchase</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php if ($orders != null){
    foreach ($orders as $order) { ?>
      <tr>
        <th scope="row"><?php echo $order->getId(); ?></th>
        <td><?php echo $order->getUserId(); ?></td>
        <td><?php echo $order->getItemId(); ?></td>
        <td><?php echo $order->getDateOfOrder()->format('Y-m-d H:i:s'); ?></td>
        <td><?php echo $order->getStatus(); ?></td>
      </tr>
    <?php }
  } else{
      echo "SOMETHING WENT WRONG LOADING ORDERS";
  } ?>

  </tbody>
</table>

</div>

<?php
include __DIR__ . '/../footer.php';
?>