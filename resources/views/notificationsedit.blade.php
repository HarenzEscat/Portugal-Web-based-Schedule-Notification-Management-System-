@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1>Edit Notification</h1>
        </div>
    </div>

    <div class="row">
        <!-- Edit Notification Form -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Edit Notification
                </div>
                <div class="card-body">
                    <form action="{{ route('notifications.update', $notification['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $notification['title'] }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3" required>{{ $notification['content'] }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="info" {{ $notification['type'] === 'info' ? 'selected' : '' }}>Info</option>
                                <option value="warning" {{ $notification['type'] === 'warning' ? 'selected' : '' }}>Warning</option>
                                <option value="danger" {{ $notification['type'] === 'danger' ? 'selected' : '' }}>Danger</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Notification</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
