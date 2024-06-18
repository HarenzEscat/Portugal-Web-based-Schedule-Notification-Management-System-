@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1>User Profiles</h1>
        </div>
    </div>

    <div class="row">
        <!-- Profile List -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Current Profiles
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($profiles as $profile)
                        <li class="list-group-item">
                            <h5 class="card-title">{{ $profile['name'] }}</h5>
                            <p class="card-text">
                                <strong>Email:</strong> {{ $profile['email'] }}<br>
                                <strong>Phone:</strong> {{ $profile['phone'] }}<br>
                                <strong>Address:</strong> {{ $profile['address'] }}
                            </p>
                            <div class="mt-2">
                                <a href="{{ route('profiles.edit', $profile['id']) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('profiles.destroy', $profile['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Create Profile Form -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Add New Profile
                </div>
                <div class="card-body">
                    <form action="{{ route('profiles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
