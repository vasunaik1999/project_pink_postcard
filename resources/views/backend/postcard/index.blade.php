<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Postcards') }}
            <a class="btn text-white float-right" style="background-color:#FF639A;" href="{{url('dashboard/postcard-create')}}">Create New</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-body">
                            <h3><strong>Postcards</strong></h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Caption</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($postcards as $p)
                                    <tr>
                                        <th scope="row">{{$p->id}}</th>
                                        <td>{{$p->category}}</td>
                                        <td>{{$p->caption}}</td>
                                        <td>
                                            <img src="{{asset('uploads/postcards/'.$p->image)}}" style="width: 100px;" alt="">
                                            {{$p->photograph_by}}
                                        </td>
                                        <td>
                                            @if($p->status == 0)
                                            <span class="badge badge-danger">Hidden</span>
                                            @else
                                            <span class="badge badge-success">Visible</span>
                                            @endif
                                            <br>
                                            @if($p->is_available == 'Out of Stock')
                                            <span class="text-danger">Out of Stock</span>
                                            @elseif($p->is_available == 'In Stock')
                                            <span class="text-success">In Stock</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{url('dashboard/postcard-edit/'.$p->id)}}" class="btn text-white" style="background-color: #FF639A;">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>