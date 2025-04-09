@extends('store.master')
@section('content')

<div class="page-content">

    <!--start breadcrumb-->
    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <!--start checkout section-->
    <section class="section-padding">
        <div class="container">
            <h4 class="fw-bold mb-4">Checkout</h4>
            <div class="row g-4">
                <!-- Address Form -->
                <div class="col-12 col-xl-8">
                    <div class="card rounded-0 mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Shipping Address</h5>
                            <form id="address-form">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">ZIP / Postal Code</label>
                                        <input type="text" class="form-control" name="zip" required>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-dark btn-ecomm mt-3">Save Address</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Display saved address -->
                            <div id="saved-address" class="mt-4 d-none">
                                <h6 class="fw-bold">Saved Address</h6>
                                <p id="address-preview" class="mb-0"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Items Review -->
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Your Items</h5>
                            <div id="checkout-cart-items"></div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-12 col-xl-4">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Order Summary</h5>
                            <div class="hstack justify-content-between">
                                <p class="mb-0">Subtotal</p>
                                <p class="mb-0" id="summary-subtotal">$0.00</p>
                            </div>
                            <hr>
                            <div class="hstack justify-content-between">
                                <p class="mb-0">Discount</p>
                                <p class="mb-0 text-success" id="summary-discount">- $0.00</p>
                            </div>
                            <hr>
                            <div class="hstack justify-content-between">
                                <p class="mb-0">Delivery</p>
                                <p class="mb-0" id="summary-delivery">$0.00</p>
                            </div>
                            <hr>
                            <div class="hstack justify-content-between fw-bold">
                                <p class="mb-0">Total</p>
                                <p class="mb-0" id="summary-grand">$0.00</p>
                            </div>
                            <div class="d-grid mt-4">
                                <button class="btn btn-dark btn-ecomm py-3 px-5">Confirm Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </section>
    <!--end checkout section-->

</div>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Load and display cart items
        renderCheckoutCart();

        // Load saved address
        const savedAddress = JSON.parse(localStorage.getItem("address"));
        if (savedAddress) {
            showSavedAddress(savedAddress);
        }

        // Save address form
        document.getElementById("address-form").addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const addressData = {};
            formData.forEach((val, key) => addressData[key] = val);

            localStorage.setItem("address", JSON.stringify(addressData));
            showSavedAddress(addressData);
        });

        function showSavedAddress(address) {
            const preview = document.getElementById("address-preview");
            preview.innerHTML = `
                ${address.name}<br>
                ${address.phone}<br>
                ${address.address}<br>
                ${address.city}, ${address.zip}
            `;
            document.getElementById("saved-address").classList.remove("d-none");
        }

        function renderCheckoutCart() {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            const container = document.getElementById("checkout-cart-items");
            const subtotalEl = document.getElementById("summary-subtotal");
            const discountEl = document.getElementById("summary-discount");
            const deliveryEl = document.getElementById("summary-delivery");
            const grandTotalEl = document.getElementById("summary-grand");

            container.innerHTML = "";
            let subtotal = 0;

            if (cart.length === 0) {
                container.innerHTML = "<p>Your cart is empty.</p>";
                subtotalEl.textContent = "$0.00";
                discountEl.textContent = "- $0.00";
                deliveryEl.textContent = "$0.00";
                grandTotalEl.textContent = "$0.00";
                return;
            }

            cart.forEach(item => {
                subtotal += item.price * item.quantity;

                const itemHTML = `
                    <div class="d-flex mb-3 align-items-center">
                        <img src="${item.image}" width="80" class="me-3">
                        <div>
                            <div class="fw-bold">${item.name}</div>
                            <div>Qty: ${item.quantity}</div>
                            <div>$${item.price.toFixed(2)}</div>
                        </div>
                    </div>
                `;
                container.insertAdjacentHTML("beforeend", itemHTML);
            });

            let discount = subtotal > 100 ? subtotal * 0.1 : 0;
            let delivery = subtotal > 50 ? 0 : 5;
            let grandTotal = subtotal - discount + delivery;

            subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
            discountEl.textContent = `- $${discount.toFixed(2)}`;
            deliveryEl.textContent = `$${delivery.toFixed(2)}`;
            grandTotalEl.textContent = `$${grandTotal.toFixed(2)}`;
        }
    });
</script>
