<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
            <!--<a class="btn text-white float-right" style="background-color:#FF639A;" href="{{url('dashboard/postcard-create')}}">Create New</a>-->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <th>Id</th>
                                        <th>Type</th>
                                        <th>Postcard</th>
                                        <th>Contact</th>
                                        <th>Detials</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $i => $o)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>
                                                <strong>{{$o->type}}</strong> <br>
                                                <?php
                                                $user = App\Models\User::select('name')->where('id', '=', $o->order_by)->first();
                                                ?>
                                                <i>Ordered By : {{$user->name}}</i>
                                            </td>
                                            <td>
                                                <?php
                                                $postcard = App\Models\Postcard::where('id', '=', $o->postcard_id)->first();
                                                ?>
                                                <img src="{{asset('uploads/postcards/'.$postcard->image)}}" style="width: 100px;" alt="">
                                                <br> Postcard ID: {{$o->postcard_id}}
                                            </td>
                                            <td>
                                                {{$o->phone}} <br>
                                                {{$o->email}}
                                            </td>
                                            @if($o->type == 'Send to someone')
                                            <td>
                                                <strong>From :</strong> {{$o->name}} <br>
                                                <strong>To :</strong> {{$o->to_name}} <br>
                                                <strong>Add :</strong> {{$o->address}} <br>
                                                <strong>Pin :</strong> {{$o->pincode}} <br>
                                                <strong>Msg :</strong> {{$o->message}}
                                            </td>
                                            @elseif($o->type == 'Pick up')
                                            <td><strong>Name :</strong>{{$o->name}}</td>
                                            @else
                                            <td>
                                                <strong>Name :</strong> {{$o->name}} <br>
                                                <strong>Add :</strong> {{$o->address}} <br>
                                                <strong>Pin :</strong> {{$o->pincode}}
                                            </td>
                                            @endif
                                            <td>
                                                @if($o->status == 'Pending')
                                                <span class="badge badge-warning">{{$o->status}}</span>
                                                @elseif($o->status == 'Completed')
                                                <span class="badge badge-success">{{$o->status}}</span>
                                                @elseif($o->status == 'Confirmed')
                                                <span class="badge badge-secondary">{{$o->status}}</span>
                                                @elseif($o->status == 'Cancelled')
                                                <span class="badge badge-danger">{{$o->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$i}}">
                                                    More
                                                </button>


                                                <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><strong>Do you want to change status?</strong></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="{{route('order.updateStatus')}}">
                                                                    @csrf
                                                                    <input type="hidden" name="order_id" id="order_id" value="{{$o->id}}">
                                                                    <div class="row mt-3">
                                                                        <div class="col">
                                                                            <label for="status">Update Status</label>
                                                                            <select name="status" id="status" class="form-control">
                                                                                <option value="Pending" @if($o->status== 'Pending') selected @endif>Pending</option>
                                                                                <option value="Confirmed" @if($o->status== 'Confirmed') selected @endif>Confirmed</option>
                                                                                <option value="Completed" @if($o->status== 'Completed') selected @endif>Completed</option>
                                                                                <option value="Cancelled" @if($o->status== 'Cancelled') selected @endif>Cancelled</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col">
                                                                            <label for="note">Note</label>
                                                                            <input type="text" class="form-control" name="note" id="note" value="{{$o->note}}" style="border-radius: 5px;">
                                                                        </div>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
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
    </div>
</x-app-layout>