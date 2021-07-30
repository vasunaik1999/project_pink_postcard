@extends('welcome')

@section('title')
Postcards | Pink Postcard
@endsection

@section('content')

<div class="card" style="top: 40px;">
    <div class="card-body">
        <div class="row">
            @foreach($postcards as $p)
            <div class="col-md-4">
                <div class="card" style="height: 100%;">
                    <div class="card-body">
                        <img src="{{asset('uploads/postcards/'.$p->image)}}" alt="" style="width:100%;">
                        <p class="mt-2">{{$p->category}}</p>
                        @if($p->is_available == 'Out of Stock')
                        <p class="text-success">Out of Stock</p>
                        @else
                        <a href="{{url('postcard-preview/'.$p->id)}}" class="btn btn-sm" style="background-color: #FF639A; color:white;"><i class="fas fa-shopping-cart mr-1"></i> Order Now</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection