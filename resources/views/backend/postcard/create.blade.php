<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span><a href="{{url('dashboard/postcards-view')}}">Postcards</a> / Add Postcard</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card">
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <form action="{{route('postcard.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="category">Category</label>
                                        <input required type="text" class="form-control rounded" id="category" placeholder="Enter category..." name="category">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="photograph_by">Photograph_by</label>
                                        <input required type="text" class="form-control rounded" id="photograph_by" placeholder="Enter photographer name..." name="photograph_by">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="image">Image</label>
                                        <input required type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 form-group">
                                        <label for="caption">Caption</label>
                                        <textarea required name="caption" id="caption" rows="3" class="form-control" placeholder="Enter Caption..."></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4 form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Display</option>
                                            <option value="0">Hide</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="is_available">In Stock</label>
                                        <select name="is_available" class="form-control">
                                            <option value="In Stock">In Stock</option>
                                            <option value="Out of Stock">Out of Stock</option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn mt-2 text-white" type="submit" style="background-color: #FF639A;">Add Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>