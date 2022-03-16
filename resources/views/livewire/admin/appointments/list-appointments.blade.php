@push('styles')
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endpush
<div>
    <!-- <x-loading-indicator wire:loading.delay /> -->
    <div class="content-header px-0">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Appointments</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @if($selectedRows)
                    <span class="mr-2">selected {{ count($selectedRows) }} {{Str::plural('appointment',count($selectedRows))}}</span>
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-default">Bulk Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Deleted Selected</a>
                            <a wire:click.prevent="markAsScheduled" class="dropdown-item" href="#">Mark as Scheduled</a>
                            <a wire:click.prevent="markAsClosed" class="dropdown-item" href="#">Mark as Closed</a>
                        </div>
                    </div>
                    @endif
                    <div class="btn-group">
                        <button wire:click="filterByStatus" type="button" class="btn {{($status == null) ? 'btn-secondary' : 'btn-default'}}">
                            <span class="mr-1">All</span>
                            <span class="badge badge-pill badge-info">{{ $appointmentsCount }}</span>
                        </button>
                        <button wire:click="filterByStatus('scheduled')" type="button" class="btn {{($status == 'scheduled') ? 'btn-secondary' : 'btn-default'}}">
                            <span class="mr-1">Scheduled</span>
                            <span class="badge badge-pill badge-primary">{{ $scheduledAppointmentCount }}</span>
                        </button>
                        <button wire:click="filterByStatus('closed')" type="button" class="btn {{($status == 'closed') ? 'btn-secondary' : 'btn-default'}}">
                            <span class="mr-1">Closed</span>
                            <span class="badge badge-pill badge-success">{{ $closedAppointmentCount }}</span>
                        </button>
                    </div>

                </div>
                <div>

                    <a href="{{ url('/admin/appointments/create') }}" class="btn btn-primary">Add New User</a>

                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>
                            <div>
                                <div class="icheck-primary d-inline ml-2">
                                    <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                                    <label for="todoCheck2"></label>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div>No</div>
                        </th>
                        <th>
                            <div>Client Name</div>
                        </th>
                        <th>
                            <div>Date</div>
                        </th>
                        <th>
                            <div>Time</div>
                        </th>
                        <th>
                            <div>Status</div>
                        </th>
                        <th>
                            <div>Options</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                    <tr>
                        <td>
                            <div class="icheck-primary d-inline  ml-2">
                                <input wire:model="selectedRows" type="checkbox" value="{{ $appointment->id }}" name="todo2" id="{{ $appointment->id }}">
                                <label for="{{ $appointment->id }}"></label>
                            </div>

                        </td>
                        <th>{{($appointments->currentPage() - 1) * $appointments->perPage() + $loop->iteration}}</th>
                        <th>
                            <div class="d-flex">
                                <img src="http://127.0.0.1:8000/backend/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                <p class="align-self-center mb-0">{{$appointment->client->name}}</p>
                            </div>
                        </th>
                        <td>{{$appointment->date}}</td>
                        <td>{{$appointment->time}}</td>
                        <td>
                            @if($appointment->status == 'SCHEDULED')
                            <span class="badge badge-primary">SCHEDULED</span>
                            @elseif($appointment->status == 'CLOSED')
                            <span class="badge badge-success">CLOSED</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="btn-group">
                                <a href="" type="button" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.appointments.edit',$appointment->id)}}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <button wire:click.prevent="confirmAppointmentRemoval({{$appointment->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @if($sumAppointment > $loadMore)
                    <a href="javascript:void(0);" wire:click.prevent="addLoadMore" class="btn btn-secondary">
                        Load More {{ $loadMore }}
                    </a>
                    @endif
                </div>
                <div>
                    {{ $appointments->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-confirmation-alert />
</div>
@push('scripts')

@endpush