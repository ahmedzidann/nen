@extends('store.master')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="page-content">


    <!--start breadcrumb-->
    <div class="py-4 border-bottom">
     <div class="container">
       <nav aria-label="breadcrumb">
         <ol class="breadcrumb mb-0">
           <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
           <li class="breadcrumb-item"><a href="javascript:;">checkout</a></li>
           <li class="breadcrumb-item active" aria-current="page">Address</li>
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
           <h4 class="mb-0 h4 fw-bold">Select Delivery Address</h4>
        </div>
       </div>
        <div class="row g-4">
          <div class="col-12 col-lg-8 col-xl-8">

         <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Default Address</h6>
            <div class="card rounded-0 mb-3">
                <div class="card-body">
                    <div class="d-flex flex-column flex-xl-row gap-3">
                <div class="address-info form-check flex-grow-1">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <span class="fw-bold mb-0 h5" id="displayName">Jhon Maxwell</span><br>
                    <span id="displayAddress">47-A, US Road, New York</span><br>
                    <span id="displayCity">United Kingdom, 201001</span><br>
                    Mobile: <span class="text-dark fw-bold" id="displayMobile">+91-xxxxxxxxxx</span>
                </div>
                <div class="d-none d-xl-block vr"></div>
                <div class="d-grid gap-2 align-self-start align-self-xl-center">
                <button type="button" class="btn btn-outline-dark px-5 btn-ecomm" disabled>Remove</button>
                <button type="button" class="btn btn-outline-dark px-5 btn-ecomm" data-bs-toggle="modal" data-bs-target="#EditAddress">Edit</button>
                </div>
                    </div>
                </div>
            </div>

       {{-- <h6 class="fw-bold mb-3 py-2 px-3 bg-light">Other Address</h6>
             <div class="card rounded-0 mb-3">
               <div class="card-body">
                 <div class="d-flex flex-column flex-xl-row gap-3">
             <div class="address-info form-check flex-grow-1">
               <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
               <label class="form-check-label" for="flexRadioDefault2">
                 <span class="fw-bold mb-0 h5">Andrew Clark</span><br>
                 85-B, UAE Road, Dubai <br>
                 Saudi Arabia, 201001<br>
                 Mobile: <span class="text-dark fw-bold">+99-xxxxxxxxxx</span>
              </label>
             </div>
            <div class="d-none d-xl-block vr"></div>
            <div class="d-grid gap-2 align-self-start align-self-xl-center">
               <button type="button" class="btn btn-outline-dark px-5 btn-ecomm">Remove</button>
               <button type="button" class="btn btn-outline-dark px-5 btn-ecomm" data-bs-toggle="modal" data-bs-target="#EditAddress">Edit</button>
            </div>
                   </div>
               </div>
             </div> --}}
{{--
       <div class="card rounded-0">
               <div class="card-body">
           <button type="button" class="btn btn-outline-dark btn-ecomm" data-bs-toggle="modal" data-bs-target="#NewAddress">Add New Address</button>
               </div>
             </div> --}}

          </div>
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
                        <button type="button" class="btn btn-dark btn-ecomm py-3 px-5" id="placeOrderBtn">Place Order</button>
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

          </div>
      </div><!--end row-->

     </div>
   </section>
    <!--start product details-->




  </div>
  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg-section-2">
      <h5 class="mb-0 fw-bold" id="offcanvasRightLabel">8 items in the cart</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="cart-list">

          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/01.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/02.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/03.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/04.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/05.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/06.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/07.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/08.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/09.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
          <hr>
          <div class="d-flex align-items-center gap-3">
            <div class="bottom-product-img">
              <a href="product-details.html">
                <img src="assets/images/new-arrival/10.webp" width="60" alt="">
              </a>
            </div>
            <div class="">
              <h6 class="mb-0 fw-light mb-1">Product Name</h6>
              <p class="mb-0"><strong>1 X $59.00</strong>
              </p>
            </div>
            <div class="ms-auto fs-5">
              <a href="javascript:" class="link-dark"><i class="bi bi-trash"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="offcanvas-footer p-3 border-top">
        <div class="d-grid">
          <button type="button" class="btn btn-lg btn-dark btn-ecomm px-5 py-3">Checkout</button>
        </div>
      </div>

  </div>
  <!--end cat-->


  <!-- New Address Modal -->
  <div class="modal" id="NewAddress" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title fw-bold">Add New Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div class="">
             <h6 class="fw-bold mb-3">Contact Details</h6>
             <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-0" id="floatingName" placeholder="Name">
              <label for="floatingName">Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-0" id="floatingMobileNo" placeholder="Mobile No">
              <label for="floatingMobileNo">Mobile No</label>
            </div>
           </div>

           <div class="mt-4">
            <h6 class="fw-bold mb-3">Address</h6>
            <div class="form-floating mb-3">
             <input type="text" class="form-control rounded-0" id="floatingPinCode" placeholder="Pin Code">
             <label for="floatingPinCode">Pin Code</label>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control rounded-0" id="floatingAddress" placeholder="Address (House No, Building, Street, Area)">
             <label for="floatingAddress">Address</label>
           </div>
           <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-0" id="floatingLocalityTown" placeholder="Locality/Town">
            <label for="floatingLocalityTown">Locality / Town</label>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-floating">
                <input type="text" class="form-control rounded-0" id="floatingCity" placeholder="City / District">
                <label for="floatingAddress">City / District</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating">
                <input type="text" class="form-control rounded-0" id="floatingState" placeholder="State">
                <label for="floatingState">State</label>
              </div>
            </div>
           </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="d-grid w-100">
            <button type="button" class="btn btn-dark py-3 px-5 btn-ecomm">Add Address</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="EditAddress" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title fw-bold">Edit Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div class="">
             <h6 class="fw-bold mb-3">Contact Details</h6>
             <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-0" id="floatingName2" placeholder="Name" value="Jhon Deo">
              <label for="floatingName2">Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control rounded-0" id="floatingMobileNo2" placeholder="Mobile No" value="99-xxxxxxxxxx">
              <label for="floatingMobileNo2">Mobile No</label>
            </div>
           </div>

           <div class="mt-4">
            <h6 class="fw-bold mb-3">Address</h6>
            <div class="form-floating mb-3">
             <input type="text" class="form-control rounded-0" id="floatingPinCode2" placeholder="Pin Code" value="201001">
             <label for="floatingPinCode2">Pin Code</label>
           </div>
           <div class="form-floating mb-3">
             <input type="text" class="form-control rounded-0" id="floatingAddress2" placeholder="Address (House No, Building, Street, Area)" value="85-B, UAE Road">
             <label for="floatingAddress2">Address</label>
           </div>
           <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-0" id="floatingLocalityTown2" placeholder="Locality/Town" value="Street Name">
            <label for="floatingLocalityTown2">Locality / Town</label>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-floating">
                <input type="text" class="form-control rounded-0" id="floatingCity2" placeholder="City / District" value="Dubai">
                <label for="floatingAddress2">City / District</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating">
                <input type="text" class="form-control rounded-0" id="floatingState2" placeholder="State" value="United Arabia">
                <label for="floatingState2">State</label>
              </div>
            </div>
           </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="d-grid w-100">
            <button type="button" class="btn btn-dark py-3 px-5 btn-ecomm">Save Address</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function () {
        renderCartItems();

        function renderCartItems() {
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (cart.length === 0) {
                window.location.href = '{{ route('web.store') }}'; // Laravel route for the homepage
            }
            const container = document.getElementById("cart-items-container");
            const emptyMsg = document.getElementById("empty-cart-message");
            const headerTitle = document.getElementById("cart-header-title");
            const totalEl = document.getElementById("summary-total");
            const discountEl = document.getElementById("summary-discount");
            const deliveryEl = document.getElementById("summary-delivery");
            const grandTotalEl = document.getElementById("summary-grand");
            // container.innerHTML = "";
            if (cart.length === 0) {
                // emptyMsg.classList.remove("d-none");
                // headerTitle.textContent = "My Bag";
                totalEl.textContent = "$0.00";
                discountEl.textContent = "- $0.00";
                deliveryEl.textContent = "$0.00";
                grandTotalEl.textContent = "$0.00";
                return;
            } else {
                // emptyMsg.classList.add("d-none");
                // headerTitle.textContent = `My Bag (${cart.reduce((sum, item) => sum + item.quantity, 0)} items)`;
            }

            let subtotal = 0;

            cart.forEach(item => {
                subtotal += item.price * item.quantity;

                // const itemHTML = `
                //     <div class="card rounded-0 mb-3">
                //         <div class="card-body">
                //             <div class="d-flex flex-column flex-lg-row gap-3">
                //                 <div class="product-img">
                //                     <img src="${item.image}" width="150" alt="">
                //                 </div>
                //                 <div class="product-info flex-grow-1">
                //                     <h5 class="fw-bold mb-0">${item.name}</h5>
                //                     <div class="product-price d-flex align-items-center gap-2 mt-3">
                //                         <div class="h6 fw-bold">$${item.price.toFixed(2)}</div>
                //                     </div>
                //                     <div class="mt-3 hstack gap-2">
                //                         <button type="button" class="btn btn-sm btn-light border rounded-0">Qty : ${item.quantity}</button>
                //                     </div>
                //                 </div>
                //                 <div class="d-none d-lg-block vr"></div>
                //                 <div class="d-grid gap-2 align-self-start align-self-lg-center">
                //                     <button type="button" class="btn btn-ecomm remove-item" data-id="${item.id}">
                //                         <i class="bi bi-x-lg me-2"></i>Remove
                //                     </button>
                //                 </div>
                //             </div>
                //         </div>
                //     </div>
                // `;
                // container.insertAdjacentHTML("beforeend", itemHTML);
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
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Load address from localStorage on page load
        const savedAddress = JSON.parse(localStorage.getItem('userAddress'));
        if (savedAddress) {
            document.getElementById('displayName').innerText = savedAddress.name;
            document.getElementById('displayAddress').innerText = savedAddress.address;
            document.getElementById('displayCity').innerText = `${savedAddress.city}, ${savedAddress.pincode}`;
            document.getElementById('displayMobile').innerText = savedAddress.mobile;
        }

        document.querySelector('#EditAddress .btn-ecomm').addEventListener('click', function () {
            // Get updated values from inputs
            const name = document.getElementById('floatingName2').value;
            const mobile = document.getElementById('floatingMobileNo2').value;
            const pincode = document.getElementById('floatingPinCode2').value;
            const address = document.getElementById('floatingAddress2').value;
            const locality = document.getElementById('floatingLocalityTown2').value;
            const city = document.getElementById('floatingCity2').value;
            const state = document.getElementById('floatingState2').value;

            // Combine address for display
            const fullAddress = `${address}, ${locality}`;
            const fullCityState = `${city}, ${state} ${pincode}`;

            // Update DOM
            document.getElementById('displayName').innerText = name;
            document.getElementById('displayAddress').innerText = fullAddress;
            document.getElementById('displayCity').innerText = fullCityState;
            document.getElementById('displayMobile').innerText = mobile;

            // Save to localStorage
            const addressData = {
                name,
                mobile,
                pincode,
                address: fullAddress,
                city: fullCityState
            };
            localStorage.setItem('userAddress', JSON.stringify(addressData));

            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('EditAddress'));
            modal.hide();
        });
    });
    </script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Default address data
        const defaultAddress = {
            name: "Jhon Maxwell",
            mobile: "+91-xxxxxxxxxx",
            pincode: "201001",
            address: "47-A, US Road, New York",
            locality: "Main Street",
            city: "New York",
            state: "United Kingdom"
        };

        // Get address from localStorage or set default
        let addressData = JSON.parse(localStorage.getItem('userAddress'));
        if (!addressData) {
            addressData = defaultAddress;
            localStorage.setItem('userAddress', JSON.stringify(addressData));
        }

        // === Update Display Area ===
        document.getElementById('displayName').innerText = addressData.name;
        document.getElementById('displayAddress').innerText = `${addressData.address}, ${addressData.locality}`;
        document.getElementById('displayCity').innerText = `${addressData.state}, ${addressData.pincode}`;
        document.getElementById('displayMobile').innerText = addressData.mobile;

        // === Pre-fill Modal Fields ===
        document.getElementById('floatingName2').value = addressData.name;
        document.getElementById('floatingMobileNo2').value = addressData.mobile;
        document.getElementById('floatingPinCode2').value = addressData.pincode;
        document.getElementById('floatingAddress2').value = addressData.address;
        document.getElementById('floatingLocalityTown2').value = addressData.locality;
        document.getElementById('floatingCity2').value = addressData.city;
        document.getElementById('floatingState2').value = addressData.state;

        // === Save Changes on Save Button ===
        document.querySelector('#EditAddress .btn-ecomm').addEventListener('click', function () {
            const updatedData = {
                name: document.getElementById('floatingName2').value,
                mobile: document.getElementById('floatingMobileNo2').value,
                pincode: document.getElementById('floatingPinCode2').value,
                address: document.getElementById('floatingAddress2').value,
                locality: document.getElementById('floatingLocalityTown2').value,
                city: document.getElementById('floatingCity2').value,
                state: document.getElementById('floatingState2').value
            };

            // Update display
            document.getElementById('displayName').innerText = updatedData.name;
            document.getElementById('displayAddress').innerText = `${updatedData.address}, ${updatedData.locality}`;
            document.getElementById('displayCity').innerText = `${updatedData.state}, ${updatedData.pincode}`;
            document.getElementById('displayMobile').innerText = updatedData.mobile;

            // Save to localStorage
            localStorage.setItem('userAddress', JSON.stringify(updatedData));

            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('EditAddress'));
            modal.hide();
        });
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('placeOrderBtn').addEventListener('click', function () {
            // Fetch the address data from localStorage
            const addressData = JSON.parse(localStorage.getItem('userAddress'));
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // If address is not found, use default
            if (!addressData) {
                alert('Please provide an address before placing the order.');
                return;
            }

            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let products=[];
            // Check if the cart has products
            if (cart.length === 0) {
                alert("An error occurred. Please try again.");
                return ;
            } else {

            products = cart.map(product => ({
                id: product.id,         // Product ID
                quantity: product.quantity  // Product Quantity
            }));
            }


            // Prepare data to send in AJAX request
            const orderData = {
                name: addressData.name,
                mobile: addressData.mobile,
                address: `${addressData.address}, ${addressData.locality}`,
                city: addressData.city,
                state: addressData.state,
                pincode: addressData.pincode,
                products: products // List of product IDs and quantities
            };

            // Send AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "/place-order", true);  // Replace "/place-order" with your server endpoint
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
            // Handle success response
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert("Order placed successfully!");
                        localStorage.removeItem("cart");


                        window.location.href = '{{ route('web.store') }}';
                        // Optionally, redirect the user or reset the cart
                    } else {
                        alert("There was an error placing the order. Please try again.");
                    }
                } else {
                    alert("An error occurred. Please try again.");
                }
            };

            // Handle error response
            xhr.onerror = function () {
                alert("An error occurred while sending your order. Please try again.");
            };

            // Send the request with order data
            xhr.send(JSON.stringify(orderData));
        });
    });
    </script>
