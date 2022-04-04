<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Payment Details</title>
    <link rel="stylesheet" href="{{asset ('css/app.css')}}">
  </head>
  <body>
    <h2>Edit Payment Details</h2><br />
    <form method="post" action="{{action ('PaymentController@update', $paymentID) }}">
      @csrf
      <input name="_method" type="hidden" value="PATCH">
      <p>
        <label for="paymentID">Payment ID: </label>
        <input type="text" name="paymentID" value="{{$payment->paymentID}}" readonly>
      </p>
      <p>
        <label for="deliveryOrderID">Delivery Order ID: </label>
        <input type="text" name="deliveryOrderID" value=" {{$payment->deliveryOrderID}} ">
      </p>
      <p>
        <label for="totalAmount">Total Amount: </label>
        <input type="text" name="totalAmount" value=" {{$payment->totalAmount}} ">
      </p>
      <p>
        <label for="paymentType">Payment Type: </label>
        <select name="paymentType" value=" {{$payment->paymentType}} ">
            <option value="eWallet">E-Wallet</option>
            <option value="Cash">Cash</option>
            <option value="card">Card</option>
        </select>
      </p>
      <p>
        <label for="status">Status: </label>
        <input type="text" name="status" value=" {{$payment->status}} ">
      </p>
      <p>
        <button type="submit" style="margin-left:38px">Update</button>
      </p>
    </form>
  </body>
</html>