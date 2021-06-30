@extends('welcome')

@section('title')
Postcards | Pink Postcard
@endsection

@section('content')

<div class="card" style="top: 40px;">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <img src="{{asset('img/pc1.jpeg')}}" alt="" style="width:100%;">
                        <p class="mt-2">Birds</p>
                        <a href="" class="btn btn-sm" style="background-color: #FF639A; color:white;"><i class="fas fa-shopping-cart mr-1"></i> Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <img src="{{asset('img/pc2.jpeg')}}" alt="" style="width:100%;">
                        <p class="mt-2">Birds</p>
                        <a href="" class="btn btn-sm" style="background-color: #FF639A; color:white;"><i class="fas fa-shopping-cart mr-1"></i> Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <img src="{{asset('img/pc3.jpeg')}}" alt="" style="width:100%;">
                        <p class="mt-2">Sunset</p>
                        <a href="" class="btn btn-sm" style="background-color: #FF639A; color:white;"><i class="fas fa-shopping-cart mr-1"></i> Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection