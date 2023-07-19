<table class="table">
  <tr>
    <td>Item</td>
    <td>Amount</td>
	<td>Qty</td>
	<td>Total</td>
  </tr>
  
  <?php if($cart) {
    $total=0; 
    foreach($cart as $key=>$row){ 
      $subtotal = ($row['qty']*$row['amount']);
      $total += $subtotal;
       ?>
      
      <tr>
        <td><?= $row['item']; ?></td>
      <td><?= $row['amount']; ?></td>
      <td><?= $row['qty']; ?></td>
      <td><?= ($row['qty']*$row['amount']); ?></td>
      </tr>
      <?php 
      
      }
  } ?>
  <tr>
        <td></td>
        <td></td>
        <td>Total:</td>
        <td><?= $total ?></td>
      </tr>
</table>