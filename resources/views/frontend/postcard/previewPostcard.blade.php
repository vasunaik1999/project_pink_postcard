@extends('welcome')

@section('title')
Postcards | Pink Postcard
@endsection

@section('content')

<style>
    @media (max-width: 767.98px) {
        .preview-image {
            width: 100%;
        }
    }

    @media (min-width: 768px) {
        .preview-image {
            width: 50%;
        }
    }
</style>

<div class="card" style="top: 40px;">
    <div class="card-body">

        <!-- Preview Image -->
        <div class="row">
            <div class="col mx-auto d-flex justify-content-center">
                <img src="{{asset('uploads/postcards/'.$postcard->image)}}" alt="" class="preview-image" id="preview-image">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col mt-2">
                <p class="my-1"><strong>Price : </strong><span>Rs. 80/-</span></p>
                <p class="my-1"><strong>Category : </strong><span>{{$postcard->category}}</span></p>
                <p class="my-1"><strong>Caption : </strong><span>{{$postcard->caption}}</span></p>
                <p class="my-1"><strong>Photograph By : </strong><span>{{$postcard->photograph_by}}</span></p>
            </div>
        </div>
    </div>
</div>

<!-- Buy Now -->
<div class="card mt-5">
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{route('order.store')}}">
            @csrf
            <input type="hidden" name="postcard_id" value="{{$postcard->id}}">
            <div class="row">
                <div class="col">
                    <h6 for="order_type"><strong>Delivery Type</strong></h6>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="order_type" value="shipping_type_1" checked>Send to someone
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="order_type" value="shipping_type_2">Receive Yourself
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="order_type" value="shipping_type_3">Pick-Up
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Send to someone -->
            <div class="shipping_type_1 shipping_box">
                <h6 class="my-2"><strong>Send to Someone</strong></h6>
                <div class="row mt-4">
                    <div class="col-md-4 form-group">
                        <label for="card_from">From</label>
                        <input type="text" class="form-control rounded" id="card_from" placeholder="Enter your name..." name="card_from">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="card_to">To</label>
                        <input type="text" class="form-control rounded" id="card_to" placeholder="Enter receiver name..." name="card_to">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="pincode1">Receiver's Pincode</label>
                        <input type="number" class="form-control rounded" id="pincode1" placeholder="Enter Receiver's Pincode..." name="pincode1">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="address1">Full Address</label>
                        <textarea name="address1" id="address1" rows="2" class="form-control" placeholder="Full Address"></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="message1">Message (If any)</label>
                        <textarea name="message1" id="message1" rows="3" class="form-control" placeholder="Message to send"></textarea>
                    </div>
                </div>
            </div>

            <!-- Receive Yourself -->
            <div class="shipping_type_2 shipping_box">
                <h6 class="my-2"><strong>Receive Yourself</strong></h6>
                <div class="row mt-4">
                    <div class="col-md-4 form-group">
                        <label for="name2">Name</label>
                        <input type="text" class="form-control rounded" id="name2" placeholder="Enter Full Name..." name="name2">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="pincode2">Pincode</label>
                        <input type="number" class="form-control rounded" id="pincode2" placeholder="Enter Pincode..." name="pincode2">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="address2">Full Address</label>
                        <textarea name="address2" id="address2" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <!-- Pickup -->
            <div class="shipping_type_3 shipping_box">
                <h6 class="my-2"><strong>Pick up from</strong></h6>
                <p class="mt-2">Pick up from XYZ Place, Kindly contact xxxx99xx99 or xxx@gmail.com</p>
                <div class="col-md-4 form-group">
                    <label for="name3">Name</label>
                    <input type="text" class="form-control rounded" id="name3" placeholder="Enter Full Name..." name="name3">
                </div>
            </div>

            <hr>
            <!-- Personal Details -->
            <div class="row mt-4">
                <!-- <div class="col-md-4 form-group">
                    <label for="name">Full Name</label>
                    <input required type="text" class="form-control rounded" id="name" placeholder="Enter Full Name..." name="name">
                </div> -->
                <input type="hidden" name="postcard_id" id="postcard_id" value="{{$postcard->id}}">
                <div class="col-md-4 form-group">
                    <label for="phone">Phone Number</label>
                    <input required type="number" class="form-control rounded" id="phone" placeholder="Enter Phone No..." name="phone">
                </div>
                <div class="col-md-4 form-group">
                    <label for="email">Email Id</label>
                    <input required type="email" class="form-control rounded" id="email" placeholder="Enter email address..." name="email">
                </div>
            </div>

            <button class="btn mt-2" style="color: white; background-color:#FF639A">Place Order</button>
        </form>
    </div>
</div>

@endsection

@section('script')

<script>
    $(".shipping_type_3").hide();
    $(".shipping_type_2").hide();

    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".shipping_box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>

@endsection