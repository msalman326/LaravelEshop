@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            @csrf
            <div class="row">
                @if ($cartitems->count() > 0)
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h6>Basic Details</h6>
                                <hr>
                                <div class="row  checkout-form ">
                                    <div class="col-md-6">
                                        <label for="">First name</label>

                                        <span class="text-danger" id="fname_error">
                                        </span>
                                        <input type="text" class="form-control firstname"
                                            value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First name">
                                        <span class="text-danger">
                                            @error('fname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Last name</label>
                                        <span class="text-danger" id="lname_error"></span>
                                        <input type="text" class="form-control lastname"
                                            value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter lirst name">
                                        <span class="text-danger">
                                            @error('lname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Email</label>

                                        <span class="text-danger" id="email_error"></span>
                                        <input type="text" class="form-control email" value="{{ Auth::user()->email }}"
                                            name="email" placeholder="Enter email">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Phone</label>
                                        <span class="text-danger" id="phone_error"></span>
                                        <input type="number" class="form-control phone" value="{{ Auth::user()->phone }}"
                                            name="phone" placeholder="Enter your phone">
                                        <span class="text-danger">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Address 1</label>
                                        <span class="text-danger" id="address1_error"></span>
                                        <input type="text" class="form-control address1"
                                            value="{{ Auth::user()->address1 }}" name="address1" placeholder="Address">
                                        <span class="text-danger">
                                            @error('address1')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Address 2</label>

                                        <span class="text-danger"></span>
                                        <input type="text" class="form-control address2"
                                            value="{{ Auth::user()->address2 }}" name="address2" placeholder="Address">

                                    </div>
                                    <div class="col-md-6">
                                        <label for="">City</label>
                                        <span class="text-danger"id="city_error"></span>
                                        <input type="text" class="form-control city" value="{{ Auth::user()->city }}"
                                            name="city" placeholder="Enter City">
                                        <span class="text-danger">
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">State</label>
                                        <span class="text-danger" id="state_error"></span>
                                        <input type="text" class="form-control state" value="{{ Auth::user()->state }}"
                                            name="state" placeholder="Enter State">
                                        <span class="text-danger">
                                            @error('state')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Country</label>

                                        <span class="text-danger"id="country_error"></span>
                                        <input type="text" class="form-control country"
                                            value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                        <span class="text-danger">
                                            @error('country')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Pincode</label>

                                        <span class="text-danger" id="pincode_error"></span>
                                        <input type="text" class="form-control pincode"
                                            value="{{ Auth::user()->pincode }}" name="pincode"
                                            placeholder="Enter pincode">
                                        <span class="text-danger">
                                            @error('pincode')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <h6> Order detail </h6>
                                <hr>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>

                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cartitems as $item)
                                            <tr>
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->prod_qty }}</td>
                                                <td>{{ $item->products->selling_price }}</td>

                                            </tr>
                                            @php
                                                
                                                $total += $item->products->selling_price * $item->prod_qty;
                                            @endphp
                                        @endforeach
                                    </tbody>

                                </table>
                                <hr>
                                <div>
                                    <h3>
                                        Total:<span class="float-end">{{ $total }}</span>
                                    </h3>
                                </div>
                                <hr>
                                <input type="hidden" name="payment_mode" value="COD">

                                <button type="submit" class="btn btn-primary col-md-12">Place Order || COD</button>
                                <button type="button" class="btn btn-success razorpay-btn col-md-12 mt-2"> Pay with
                                    Razorpay <img style=" ; height: 30px ; width: 100px"
                                        src="{{ asset('frontend/img/razorpay.png') }}" alt="">
                                </button>
                                <div class="mt-3" id="paypal-button-container"></div>

                            </div>
                        </div>
                    </div>
                @else
                    @php
                        $total = 0;
                    @endphp

                    <h4 class="btn btn-outline-danger col-md-12">Noting to Checkout</h4>
                    <a class="btn btn-outline-success float-end" href="{{ url('/') }}">Continue Shoping</a>
                @endif
            </div>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AWC6mLDPdM_LsoQ2Vw64sW6hKzfXXGWZPhzEkVY1G83VYUgccot17COmeKm40DDHSB13EjciANZ99kud">
    </script>

    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $total }}' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    // alert(
                    //     `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                    //     );
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                    var fname = $('.firstname').val();
                    var lname = $('.lastname').val();
                    var email = $('.email').val();
                    var phone = $('.phone').val();
                    var address1 = $('.address1').val();
                    var address2 = $('.address2').val();
                    var city = $('.city').val();
                    var state = $('.state').val();
                    var country = $('.country').val();
                    var pincode = $('.pincode').val();
                    $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            'fname': fname,
                            'lname': lname,
                            'email': email,
                            'phone': phone,
                            'address1': address1,
                            'address2': address2,
                            'city': city,
                            'state': state,
                            'country': country,
                            'pincode': pincode,
                            'payment_mode': "Paid by Paypal",
                            'payment_id': transaction.id,
                        },
                        success: function(response) {
                            var id = response.id;
                            swal("Order Placed successfully")
                            .then((value) => {
                            window.location = '/view-order/' + id;
                               
                            });
                            
                            // window.location.href = "/my-orders/";

                        }
                    });


                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
