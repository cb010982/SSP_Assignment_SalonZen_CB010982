@extends('layouts.app')

@section('content')

<section class="ftco-section ftco-appointment">
    <div class="overlay"></div>
    <div class="col-md-6 appointment pl-md-5 ftco-animate">
        <h3 class="mb-3">Shopping Cart</h3>
        <form action="#" class="appointment-form">
            <div class="row form-group d-flex">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="row form-group d-flex">
                <div class="col-md-4">
                    <style>
                        select:hover option {
                            background-color: #dbdada;
                            color:black;
                        }
                     </style>
                    <label style="color: rgb(255, 255, 255); font-weight: bold;">Product</label>
                    <select id="product" class="form-control" onchange="updatePrice()">
                        <option value="" disabled selected>Select a product</option>
                        <option value="5000.00">DreamSkin Night Cream</option>
                        <option value="6000.00">Pure Radiance Vitamin C Boost Serum</option>
                        <option value="3000.00">Ageless Elegance Renewal Cream</option>
                        <option value="600.00">ColorSplash Nail Polish</option>
                        <option value="3000.00">LuxeVelvet Cream</option>
                        <option value="8000.00">JewelDew Hair Oil</option>
                        <option value="4500.00">Velvet Silk Body Serum</option>
                        <option value="7000.00">Bloom Blush Set</option>
                        <option value="5500.00">AquaMist Face Oil</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label style="color: rgb(255, 255, 255); font-weight: bold;">Quantity</label>
                    <input type="number" id="quantity" class="form-control" min="1" value="1" onchange="updatePrice()">
                </div>
                <div class="col-md-4">
                    <label style="color: rgb(255, 255, 255); font-weight: bold;">Price</label>
                    <input type="text" id="price" class="form-control" placeholder="Rs. 0.00" readonly>
                </div>
            </div> 
        </form>
<h3 class="mb-3">Payment Method</h3>
    <form action="#" class="appointment-form">
        <div class="row form-group d-flex">
            <div class="col-md-6">
                <label style="color: rgb(255, 255, 255);">Payment Method:</label><br>
                <input type="radio" id="visa" name="payment" value="visa">
                <label for="visa" style="color: black">Visa</label><br>
                <input type="radio" id="mastercard" name="payment" value="mastercard">
                <label for="mastercard" style="color: black">Mastercard</label><br>
            </div>
            
        </div>
        <div class="row form-group d-flex">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Cardholder Name">
            </div>
            <div class="col-md-6">
                <div class="col-md-6">
                    <input type="month" class="form-control" id="expirydate" name="expirydate" placeholder="Expiry Date" onfocus="(this.type='month')" onblur="(this.type='text')">
                </div> 
            </div>
        </div>
        <div class="row form-group d-flex">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Card Number" maxlength="16">
            </div>
            <div class="col-md-2">
                <input type="text" id='cvc' maxlength='3' class='form-control' placeholder='CVC'>
            </div>
        </div> 
        

        <div class="row form-group d-flex">
            <div class="form-group">
                <input type="submit" value="Order" class="btn btn-white btn-outline-white py-3 px-4">
            </div>
        </form>
        </div>
    </form>
</div>   
    <script>
    function updatePrice() {
        var productSelect = document.getElementById('product');
        var quantityInput = document.getElementById('quantity');
        var priceInput = document.getElementById('price');
        var productPrice = parseFloat(productSelect.value);
        var quantity = parseInt(quantityInput.value);
        priceInput.value = 'Rs. ' + (productPrice * quantity).toFixed(2);
    }
    </script>
    
    <script>
        function checkExpiryDate() {
            var expiryDateInput = document.getElementById('expiryDate');
            var expiryDate = new Date(expiryDateInput.value);
            var currentDate = new Date();
            if (expiryDate.getFullYear() < currentDate.getFullYear() || (expiryDate.getFullYear() == currentDate.getFullYear() && expiryDate.getMonth() < currentDate.getMonth())) {
                alert('Your card is already expired.');
                expiryDateInput.value = '';
            }
        }
        </script>

</section>


     
  </section>
   @endsection