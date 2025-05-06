<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<button id="pay-btn">Pay Now</button>

<script>
    var options = {
        "key": "{{ env('RAZORPAY_KEY') }}",
        "amount": "{{ $order['amount'] ?? 0 }}",
        "currency": "{{ $order['currency'] ?? 'INR' }}",
        "name": "Your Company Name",
        "description": "Test Transaction",
        "order_id": "{{ $order['id'] ?? 99}}",
        "handler": function (response){
            // You can send AJAX request to your server here
            alert('Payment Successful: ' + response.razorpay_payment_id);
        },
        "prefill": {
            "name": "Test User",
            "email": "test@example.com",
            "contact": "9999999999"
        },
        "theme": {
            "color": "#3399cc"
        }
    };

    var rzp1 = new Razorpay(options);
    document.getElementById('pay-btn').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
</script>
