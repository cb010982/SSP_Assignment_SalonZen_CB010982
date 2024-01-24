@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">CART</h2>
                <p>Indulge in Luxury – Our Products are the Epitome of Elegance and Efficacy.</p>
            </div>
        </div>
        <div class="row d-flex">
            @foreach($products as $product)
            @if($product->stocks > 0)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('{{ asset($product->image) }}');"></a>
                   
                    <div class="text py-4 d-block">
                    <h3>{{ $product->name }} <span><button class="btn btn-primary" id="addtocart">Add to Cart</button></span></h3>
                        <h4>Rs {{ $product->price }}</h4>
                        <p>{{ $product->description }}</p>
                        <p>Stocks available: {{ $product->stocks }}</p>
                    </div>
                </div>
            </div>
               @endif
            @endforeach
        </div>
    </div>
    <div class="container">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
</table>
</div>
</section>
<section class="ftco-section ftco-appointment">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="appointment-info text-center p-5">
                    <div class="mb-4">
                        <h3 class="mb-3">Address</h3>
                        <p>No 12. High-level Road, Nugegoda, Sri Lanka</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="mb-3">Phone</h3>
                        <p class="day"><strong>+94 112 807 979</strong> or <strong>+94 777 605 000</strong></p>
                    </div>
                    <div>
                        <h3 class="mb-3">Opening Hours</h3>
                        <p class="day"><strong>Monday - Friday</strong></p>
                        <span>08:00am - 08:00pm</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 appointment pl-md-5 ftco-animate">
                
                   <div class="appointment-form">
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                        <select class="form-control" id="payment_method" name="payment_method" >
                                <option value="" disabled selected>Payment Method</option>
                                <option value="Master Card">Master Card</option>
                                <option value="Visa">Visa</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="cardholder_name" placeholder="Cardholder Name">
                        </div>
                    </div>
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="card_number" placeholder="Card Number">
                        </div>
                    </div>
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="cvc" placeholder="Security Code">
                        </div>
                    </div>
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="expiry_month" placeholder="Expiry Month">
                        </div>
                    </div>
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="expiry_date" placeholder="Expiry Year">
                        </div>
                    </div>
                    </div>
                    <form action="{{ route('carts.store') }}" method="POST" class="appointment-form">
                    @csrf
                    <input type="hidden" name="cart_data" value="">
                    <div class="row form-group d-flex">
                        <div class="col-md-6">
                        <strong><input class="color" type="text" id="grand-total" name="price" value="0.00" readonly /></strong>
                        </div>
                    </div>
                    <div class="row form-group d-flex">
                        <div class="form-group">
                            <input type="submit" value="Confirm Payment" id="myButton"class="btn btn-white btn-outline-white py-3 px-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var addToCartButtons = document.querySelectorAll('[id^="addtocart"]');
        var addedProducts = [];

        addToCartButtons.forEach(function (button, index) {
            button.addEventListener('click', function () {
                // Get the product details from the clicked button's parent element
                var productContainer = button.closest('.blog-entry');
                var productName = productContainer.querySelector('h3').innerText;
                productName = productName.replace(/Add to Cart$/, '').trim();
                // Check if the product is already in the cart
                if (addedProducts.includes(productName)) {
                    alert('This product is already in the cart.');
                    return;
                }

                // Add the product name to the array of added products
                addedProducts.push(productName);

                var productQuantity = 1;  // You can adjust this based on your requirements
                var productTotalPrice = parseFloat(productContainer.querySelector('h4').innerText.replace('Rs ', ''));

                // Create a new row in the table
                var tableBody = document.querySelector('.table tbody');
                var newRow = tableBody.insertRow(tableBody.rows.length);

                // Insert cells with product details
                var productNameCell = newRow.insertCell(0);
                productNameCell.textContent = productName;

                var productQuantityCell = newRow.insertCell(1);
                var quantityInput = document.createElement('input');
                quantityInput.type = 'number';
                quantityInput.value = productQuantity;
                quantityInput.min = 0;
                quantityInput.addEventListener('input', function () {
                    updateTotalPrice(newRow, productTotalPrice, quantityInput.value);
                    updateGrandTotal();
                });
                productQuantityCell.appendChild(quantityInput);

                var productTotalPriceCell = newRow.insertCell(2);
                productTotalPriceCell.textContent = 'Rs ' + productTotalPrice.toFixed(2);

                var removeButtonCell = newRow.insertCell(3);
                var removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.className = 'btn btn-danger btn-remove';
                removeButton.addEventListener('click', function () {
                    removeProduct(newRow, productName);
                    updateGrandTotal();
                });
                removeButtonCell.appendChild(removeButton);

                // Update the grand total when a new product is added
                updateGrandTotal();
            });
        });

        function updateTotalPrice(row, unitPrice, quantity) {
            var total = unitPrice * quantity;
            row.cells[2].textContent = 'Rs ' + total.toFixed(2);
        }

        function removeProduct(row, productName) {
            row.parentNode.removeChild(row); // Remove the row from the table
            addedProducts = addedProducts.filter(function (product) {
                return product !== productName; // Remove the product from the array
            });
        }

        function updateGrandTotal() {
            var grandTotal = 0;
            var tableBody = document.querySelector('.table tbody');
            var cartData = [];
            for (var i = 0; i < tableBody.rows.length; i++) {
                var quantityInput = tableBody.rows[i].cells[1].querySelector('input');
        var quantity = parseInt(quantityInput.value, 10);
                var productNameCell = tableBody.rows[i].cells[0];
                var productName = productNameCell.textContent;
                var totalCell = tableBody.rows[i].cells[2];
                var total = parseFloat(totalCell.textContent.replace('Rs ', ''));
                grandTotal += total;

                // Add cart data to the array
                cartData.push({
                name: productName,
                quantity: quantity,
                price: total,
                // Add other fields as needed
            });

            }
            console.log(cartData);

            // Update the grand total field
            var grandTotalField = document.querySelector('#grand-total');
            grandTotalField.value = grandTotal.toFixed(2);

             // Set the value of a hidden input field to send the cart data to the backend
            document.querySelector('input[name="cart_data"]').value = JSON.stringify(cartData);
        }
    });
    document.getElementById('myButton').addEventListener('click', function() {
    alert('Cart sent!');
    connectify('success', 'Connection Found', 'Success Message Here')
});
</script>
<style>
    .color{
        background-color: #ff59e9;
        color:white;
    }
</style>

@endsection
