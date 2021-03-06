@extends('layouts.app')

@section('content')

<script src="https://js.stripe.com/v3/"></script>
<div class="container" style="">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="list-style-type: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   <form action="/charge" method="post" id="payment-form" class="ml-auto mr-auto">
      <h3 class="text-center">Order Summary</h3>
    <table class="table text-center table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col"></th>
          <th scope="col">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">subtotal</th>
          <td></td>
          <td>{{session('tot')}}</td>
        </tr>
        <tr>
          <th scope="row">Service tax</th>
          <td></td>
          <td>7.50</td>
        </tr>
        <tr>
          <th scope="row">Total</th>
          <td></td>
          <td>{{session('tot')+7.50}}</td>
        </tr>
      </tbody>
    </table>
      <!-- /pay {{session('taka')}} for {{session('no')}} seats -->
      <div class="form-group">
         @csrf
         <label for="card-element">
         Credit or debit card
         </label>
         <div id="card-element"class="form-control" >
            <!-- A Stripe Element will be inserted here. -->
         </div>
         <!-- Used to display form errors. -->
         <div id="card-errors" role="alert"></div>
      </div>
      <button class="btn btn-primary">Submit Payment</button>
   </form>
</div>
<script>
   // Create a Stripe client.
   var stripe = Stripe('pk_test_qv2n2IddPi3QrSDUuUocKJwK');
   
   // Create an instance of Elements.
   var elements = stripe.elements();
   
   // Custom styling can be passed to options when creating an Element.
   // (Note that this demo uses a wider set of styles than the guide below.)
   var style = {
   base: {
   color: '#32325d',
   lineHeight: '18px',
   fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
   fontSmoothing: 'antialiased',
   fontSize: '16px',
   '::placeholder': {
     color: '#aab7c4'
   }
   },
   invalid: {
   color: '#fa755a',
   iconColor: '#fa755a'
   }
   };
   
   // Create an instance of the card Element.
   var card = elements.create('card', {style: style});
   
   // Add an instance of the card Element into the `card-element` <div>.
   card.mount('#card-element');
   
   // Handle real-time validation errors from the card Element.
   card.addEventListener('change', function(event) {
   var displayError = document.getElementById('card-errors');
   if (event.error) {
   displayError.textContent = event.error.message;
   } else {
   displayError.textContent = '';
   }
   });
   
   // Handle form submission.
   var form = document.getElementById('payment-form');
   form.addEventListener('submit', function(event) {
   event.preventDefault();
   
   stripe.createToken(card).then(function(result) {
   if (result.error) {
     // Inform the user if there was an error.
     var errorElement = document.getElementById('card-errors');
     errorElement.textContent = result.error.message;
   } else {
     // Send the token to your server.
     stripeTokenHandler(result.token);
   }
   });
   });
   
   function stripeTokenHandler(token) {
   // Insert the token ID into the form so it gets submitted to the server
   var form = document.getElementById('payment-form');
   var hiddenInput = document.createElement('input');
   hiddenInput.setAttribute('type', 'hidden');
   hiddenInput.setAttribute('name', 'stripeToken');
   hiddenInput.setAttribute('value', token.id);
   form.appendChild(hiddenInput);
   
   // Submit the form
   form.submit();
   }
   
   
</script>
<style media="screen">
   body, html {
   height: 100%;
   background-color: #f7f8f9;
   color: #6b7c93;
   }
   *, label {
   font-family: "Helvetica Neue", Helvetica, sans-serif;
   font-size: 16px;
   font-variant: normal;
   padding: 0;
   margin: 0;
   -webkit-font-smoothing: antialiased;
   }
   button {
   border: none;
   border-radius: 4px;
   outline: none;
   text-decoration: none;
   color: #fff;
   background: #32325d;
   white-space: nowrap;
   display: inline-block;
   height: 40px;
   line-height: 40px;
   padding: 0 14px;
   box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
   border-radius: 4px;
   font-size: 15px;
   font-weight: 600;
   letter-spacing: 0.025em;
   text-decoration: none;
   -webkit-transition: all 150ms ease;
   transition: all 150ms ease;
   float: left;
   margin-left: 12px;
   margin-top: 28px;
   }
   button:hover {
   transform: translateY(-1px);
   box-shadow: 0 7px 14px rgba(50, 50, 93, .10), 0 3px 6px rgba(0, 0, 0, .08);
   background-color: #43458b;
   }
   form {
   padding: 30px;
   height: 120px;
   width: 60%;
   }
   label {
   font-weight: 500;
   font-size: 14px;
   display: block;
   margin-bottom: 8px;
   }
   #card-errors {
   height: 20px;
   padding: 4px 0;
   color: #fa755a;
   }
   .form-row {
   width: 70%;
   float: left;
   }
   .token {
   color: #32325d;
   font-family: 'Source Code Pro', monospace;
   font-weight: 500;
   }
   .wrapper {
   width: 670px;
   margin: 0 auto;
   height: 100%;
   }
   #stripe-token-handler {
   position: absolute;
   top: 0;
   left: 25%;
   right: 25%;
   padding: 20px 30px;
   border-radius: 0 0 4px 4px;
   box-sizing: border-box;
   box-shadow: 0 50px 100px rgba(50, 50, 93, 0.1),
   0 15px 35px rgba(50, 50, 93, 0.15),
   0 5px 15px rgba(0, 0, 0, 0.1);
   -webkit-transition: all 500ms ease-in-out;
   transition: all 500ms ease-in-out;
   transform: translateY(0);
   opacity: 1;
   background-color: white;
   }
   #stripe-token-handler.is-hidden {
   opacity: 0;
   transform: translateY(-80px);
   }
   /**
   * The CSS shown here will not be introduced in the Quickstart guide, but shows
   * how you can use CSS to style your Element's container.
   */
   .StripeElement {
   background-color: white;
   height: 40px;
   padding: 10px 12px;
   border-radius: 4px;
   border: 1px solid transparent;
   box-shadow: 0 1px 3px 0 #e6ebf1;
   -webkit-transition: box-shadow 150ms ease;
   transition: box-shadow 150ms ease;
   }
   .StripeElement--focus {
   box-shadow: 0 1px 3px 0 #cfd7df;
   }
   .StripeElement--invalid {
   border-color: #fa755a;
   }
   .StripeElement--webkit-autofill {
   background-color: #fefde5 !important;
   }
</style>

@endsection
