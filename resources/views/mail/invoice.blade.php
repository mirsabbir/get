<div class="container">
  <div class="card">
<div class="card-header">
Invoice
<strong>{{$invoice->created_at}}</strong> 
  <span class="float-right"> <strong>Status:</strong> paied</span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h6 class="mb-3">To:</h6>
<div>
<strong>{{$invoice->name}}</strong>
</div>
<div>Email: {{$invoice->email}}</div>
</div>





</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>
<th>Description</th>

<th class="right">Unit Cost</th>
  <th class="center">Qty</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>

<?php 
    $tot = 0;
?>

@foreach($products as $product)
<tr>
<td class="center">1</td>
<td class="left strong">Origin License</td>
<td class="left">Extended License</td>

<td class="right">{{$product->price}}</td>
  <td class="center">1</td>
<td class="right">{{$product->price}}</td>
</tr>

<?php 
    $tot += $product->price;
?>

@endforeach

</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>

<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>{{$tot}}</strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>