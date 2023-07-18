<table>
  <tr>
    <td>Item</td>
    <td>Amount</td>
	<td>Qty</td>
	<td>Total</td>
  </tr>
  
  <?php if($cart) { 
    foreach($cart as $key=>$row){?>
      <tr>
        <td><?= $row['item']; ?></td>
      <td><?= $row['amount']; ?></td>
      <td><?= $row['qty']; ?></td>
      <td><?= ($row['qty']*$row['amount']); ?></td>
      </tr>
      <?php 
      }
  } ?>
</table>