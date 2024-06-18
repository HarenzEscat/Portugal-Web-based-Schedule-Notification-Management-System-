@extends('layouts.app')

@section('content')
    

        <!-- Schedule List -->
        <div class="container">
            <h2>Schedule List</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <a href="{{ route('schedule.create') }}" class="btn btn-primary">Add</a>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Schedule Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{ $schedule->id }}</td>
                            <td>{{ $schedule->schedulename }}</td>
                            <td>{{ $schedule->description }}</td>
                            <td>{{ $schedule->date }}</td>
                            <td>{{ $schedule->time }}</td>
                            <td>             
                                <a href="{{ route('updateSchedule', $schedule->id) }}" class="btn btn-warning">Update</a>
                                <form method="post" action="{{ route('deleteSchedule', $schedule->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this schedule?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody> 
            </table>
            
            
            <!-- pagination here -->
            @if ($schedules->lastPage() > 1)
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($schedules->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $schedules->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                        </li>
                    @endif

                    <!-- Pagination Elements -->
                    @for ($i = 1; $i <= $schedules->lastPage(); $i++)
                        @if ($i == $schedules->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $schedules->url($i) }}">{{ $i }}</a></li>
                        @endif
                    @endfor

                    <!-- Next Page Link -->
                    @if ($schedules->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $schedules->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link" aria-hidden="true">&raquo;</span>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
@endsection
