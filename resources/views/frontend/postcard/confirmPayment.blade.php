@extends('welcome')

@section('title')
Order Now | Pink Postcards
@endsection

@section('content')
<div class="card" style="top: 40px;">
    <div class="card-body">
        <h1 class="text-center my-2">Order Summary</h1>
        <hr>
        <div class="row mt-4">
            <div class="col-md-5">
                <?php
                $postcard = App\Models\Postcard::where('id', '=', $order->postcard_id)->first();
                ?>
                <img src="{{asset('uploads/postcards/'.$postcard->image)}}" style="width: 100%;" alt="">
            </div>
            <div class="offset-1 col-md-6">
                <h5>Order Detials</h5>
                @if($order->type == "Send to someone")
                <p><strong>Phone No.:</strong> {{$order->phone}}</p>
                <p><strong>Email:</strong> {{$order->email}} </p>
                <p><strong>From Name:</strong> {{$order->name}} </p>
                <p><strong>To Name:</strong> {{$order->to_name}} </p>
                <p><strong>Address :</strong> {{$order->address}} </p>
                <p><strong>Pincode :</strong> {{$order->pincode}} </p>
                <p><strong>Message :</strong> {{$order->message}}</p>
                @elseif($order->type == "Pick up")
                <p><strong>Phone No.:</strong> {{$order->phone}} </p>
                <p><strong>Email:</strong> {{$order->email}} </p>
                <p><strong>Name:</strong> {{$order->name}}</p>
                @else
                <p><strong>Phone No.:</strong> {{$order->phone}}</p>
                <p><strong>Email:</strong> {{$order->email}}</p>
                <p><strong>From Name:</strong> {{$order->name}}</p>
                <p><strong>Address :</strong> {{$order->address}}</p>
                <p><strong>Pincode :</strong> {{$order->pincode}}</p>
                @endif
            </div>

        </div>
        <hr>
        <div class="row mt-4">
            <div class="col">
                <h4>Scan this QR code to pay.</h4>

                <p><strong>Note: After Successfull payment, order status will be marked as "Confirmed". This may take upto 24hours. If any query then please contact us.</strong></p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection