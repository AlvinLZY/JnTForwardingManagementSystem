<html>
	<head>
		<meta charset="utf-8">
		<title>Payment</title>
		<link rel="stylesheet" href="{{asset('css/app.css')}}">
	</head>
	<body>
		<h2>Create New Payment</h2><br/>
		<form method="post" action="{{url('payments')}}">
			@csrf
                        <p>
                            <label for="paymentID">Payment ID:</label>
                            <input type="text" name="paymentID">
                        </p>
                         <p>
                            <label for="deliveryOrderID">Delivery Order ID:</label>
                            <input type="text" name="deliveryOrderID">
                        </p>
                        <p>
				<label for="totalAmount">Total Amount:</label>
				<input type="text" name="totalAmount">
			</p>
			<p>
				<label for="paymentType">Payment Type:</label>
				<select name="paymentType" id="paymentType">
                                    <option value="eWallet">E-Wallet</option>
                                    <option value="Cash">Cash</option>
                                    <option value="card">Card</option>
                                </select>
			</p>
                        <p>
				<label for="status">Status:</label>
				<input type="text" name="status">
			</p>
			<p>
				<button type="submit">Submit</button>
			</p>
		</form>
	</body>
</html>