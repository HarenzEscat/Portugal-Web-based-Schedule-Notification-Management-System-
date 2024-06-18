@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1>Notification Management</h1>
        </div>
    </div>

    <div class="row">
        <!-- Notification Form -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Add New Notification
                </div>
                <div class="card-body">
                    <form action="{{ route('notifications.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="info">Info</option>
                                <option value="warning">Warning</option>
                                <option value="danger">Danger</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Notification</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Notification List -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Current Notifications
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($notifications as $notification)
                        <li class="list-group-item">
                            <h5 class="card-title">{{ $notification['title'] }}</h5>
                            <p class="card-text">{{ $notification['content'] }}</p>
                            <span class="badge bg-{{ $notification['type'] }}">{{ ucfirst($notification['type']) }}</span>
                            <div class="mt-2">
                                <a href="{{ route('notifications.edit', $notification['id']) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('notifications.destroy', $notification['id']) }}" method="POST" class="d-inline">
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
    </div>
@endsection
