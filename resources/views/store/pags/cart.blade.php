@extends('store.master')
@section('content')

<div class="page-content">

    <!--start breadcrumb-->
    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <!--start product details-->
    <section class="section-padding">
        <div class="container">
            <div class="d-flex align-items-center px-3 py-2 border mb-4">
                <div class="text-start">
                    <h4 class="mb-0 h4 fw-bold" id="cart-header-title">My Bag</h4>
                </div>
                <div class="ms-auto">
                    <a type="button" class="btn btn-light btn-ecomm" href='{{ route('web.store') }}'>Continue Shopping</a>
                </div>
            </div>

            <div class="row g-4">
                <!-- Cart Items -->
                <div class="col-12 col-xl-8">
                    <div id="empty-cart-message" class="text-center py-5 d-none">
                        <h4>Your cart is empty 😢</h4>
                        <a href="{{ route('web.store') }}" class="btn btn-primary mt-3">Go Shopping</a>
                    </div>
                    <div id="cart-items-container"></div>
                </div>

                <!-- Order Summary -->
                <div class="col-12 col-xl-4">
                    <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Order Summary</h5>
                            <div class="hstack align-items-center justify-content-between">
                                <p class="mb-0">Bag Total</p>
                                <p class="mb-0" id="summary-total">$0.00</p>
                            </div>
                            <hr>
                            <div class="hstack align-items-center justify-content-between">
                                <p class="mb-0">Bag Discount</p>
                                <p class="mb-0 text-success" id="summary-discount">- $0.00</p>
                            </div>
                            <hr>
                            <div class="hstack align-items-center justify-content-between">
                                <p class="mb-0">Delivery</p>
                                <p class="mb-0" id="summary-delivery">$0.00</p>
                            </div>
                            <hr>
                            <div class="hstack align-items-center justify-content-between fw-bold text-content">
                                <p class="mb-0">Total Amount</p>
                                <p class="mb-0" id="summary-grand">$0.00</p>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="button" class="btn btn-dark btn-ecomm py-3 px-5" id='goToAddress' onClick="goToAddress()">Continue</button>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h5 class="fw-bold mb-4">Apply Coupon</h5>
                            <div class="input-group">
                                <input type="text" class="form-control rounded-0" placeholder="Enter coupon code">
                                <button class="btn btn-dark btn-ecomm rounded-0" type="button">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->
        </div>
    </section>
    <!--end product details-->
</div>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        renderCartItems();

        function renderCartItems() {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            const container = document.getElementById("cart-items-container");
            const emptyMsg = document.getElementById("empty-cart-message");
            const headerTitle = document.getElementById("cart-header-title");
            const totalEl = document.getElementById("summary-total");
            const discountEl = document.getElementById("summary-discount");
            const deliveryEl = document.getElementById("summary-delivery");
            const grandTotalEl = document.getElementById("summary-grand");

            container.innerHTML = "";

            if (cart.length === 0) {
                emptyMsg.classList.remove("d-none");
                headerTitle.textContent = "My Bag";
                totalEl.textContent = "$0.00";
                discountEl.textContent = "- $0.00";
                deliveryEl.textContent = "$0.00";
                grandTotalEl.textContent = "$0.00";
                return;
            } else {
                emptyMsg.classList.add("d-none");
                headerTitle.textContent = `My Bag (${cart.reduce((sum, item) => sum + item.quantity, 0)} items)`;
            }

            let subtotal = 0;

            cart.forEach(item => {
                subtotal += item.price * item.quantity;

                const itemHTML = `
                    <div class="card rounded-0 mb-3">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-lg-row gap-3">
                                <div class="product-img">
                                    <img src="${item.image}" width="150" alt="">
                                </div>
                                <div class="product-info flex-grow-1">
                                    <h5 class="fw-bold mb-0">${item.name}</h5>
                                    <div class="product-price d-flex align-items-center gap-2 mt-3">
                                        <div class="h6 fw-bold">$${item.price.toFixed(2)}</div>
                                    </div>
                                    <div class="mt-3 hstack gap-2">
                                        <button type="button" class="btn btn-sm btn-light border rounded-0">Qty : ${item.quantity}</button>
                                    </div>
                                </div>
                                <div class="d-none d-lg-block vr"></div>
                                <div class="d-grid gap-2 align-self-start align-self-lg-center">
                                    <button type="button" class="btn btn-ecomm remove-item" data-id="${item.id}">
                                        <i class="bi bi-x-lg me-2"></i>Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                container.insertAdjacentHTML("beforeend", itemHTML);
            });

            // Example logic for discounts/delivery
            let discount = subtotal > 100 ? subtotal * 0 : 0;
            let delivery = subtotal > 50 ? 0 : 0;
            let grandTotal = subtotal - discount + delivery;

            totalEl.textContent = `$${subtotal.toFixed(2)}`;
            discountEl.textContent = `- $${discount.toFixed(2)}`;
            deliveryEl.textContent = `$${delivery.toFixed(2)}`;
            grandTotalEl.textContent = `$${grandTotal.toFixed(2)}`;

            // Remove functionality
            document.querySelectorAll(".remove-item").forEach(btn => {
                btn.addEventListener("click", function () {
                    let cart = JSON.parse(localStorage.getItem("cart")) || [];
                    const idToRemove = this.dataset.id;
                    cart = cart.filter(item => item.id !== idToRemove);
                    localStorage.setItem("cart", JSON.stringify(cart));
                    renderCartItems();
                });
            });
        }
    });


    function goToAddress(){
        const cartChecker = JSON.parse(localStorage.getItem("cart")) || [];
        if (cartChecker.length === 0) {
               alert('pleas add products to cart first');
        }else{
            window.location.href = '{{ route('web.store.address') }}'
        }
    }
</script>