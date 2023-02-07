<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if ($message = Session::get('status'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container mt-6">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('add-product') }}" type="button" class="btn btn-outline-primary mb-4">Add new role</a>
                @foreach ($roles as $role)
                    <div class="card">
                        <h5 class="card-header">{{ $role->name }}</h5>
                        <div class="card-body">
                            <a href="{{ route('products.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $role->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
