<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('add-new-product') }}" class="btn btn-success mb-4">Add product</a>
                @foreach ($products as $product)
                <div class="card">
                    <h5 class="card-header">{{ $product->name }}</h5>
                    <div class="card-body">
                        <a href="{{ route('edit-product', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('delete-product', $product->id)}}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
