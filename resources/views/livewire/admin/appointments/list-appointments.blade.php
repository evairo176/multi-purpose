@push('styles')

@endpush
<div>
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
            <div class="text-right">
                <a href="{{ url('/admin/appointments/create') }}" class="btn btn-primary mb-2">Add New User</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover ">
                <thead>
                    <tr>
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
                        <td>{{($appointments->currentPage() - 1) * $appointments->perPage() + $loop->iteration}}</td>
                        <td>
                            <div class="d-flex">
                                <img src="http://127.0.0.1:8000/backend/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                <p class="align-self-center mb-0">{{$appointment->client->name}}</p>
                            </div>
                        </td>
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
                            <a href="" type="button" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{route('admin.appointments.edit',$appointment->id)}}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <a href="" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="{{$showEditModal ? 'updateappointment' : 'createappointment'}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if($showEditModal)
                            Edit New appointments
                            @else
                            Add New appointments
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="nameHelp" placeholder="Enter Full Name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="dateTimeFlatpickr" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" wire:model.defer="state.email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" wire:model.defer="state.password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password2">Password</label>
                            <input type="password" wire:model.defer="state.password_confirmation" class="form-control" id="password_!" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            @if($showEditModal)
                            Save Changes
                            @else
                            Save
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Delete appointment
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this appointment?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" wire:click.prevent="delete" class="btn btn-primary">
                        Delete Data
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')

@endpush