<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('update-product', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" value="{{ $product->description }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="form-label">Add image</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
                            <img src="/images/{{ $product->image }}" width="150px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                    </div>
                    <div class="mb-6 ">
                        <label class="block">
                            <span class="text-gray-700">Select Category</span>
                            <select name="category_id" class="block w-full mt-1 rounded-md">
                                @foreach ($categories as $category)
                                <option @selected($category->id == $product->category_id)
                                    value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <button class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
