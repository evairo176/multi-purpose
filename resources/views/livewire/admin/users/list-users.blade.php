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
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="text-right">
                <a href="javascript:void(0);" wire:click.prevent="addNew" class="btn btn-primary mb-2" id="addNewdesa" data-toggle="modal" data-target="#modaldesa">Add New User</a>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                <thead>
                    <tr>
                        <th>
                            <div>No</div>
                        </th>
                        <th>
                            <div>Name</div>
                        </th>
                        <th>
                            <div>Email</div>
                        </th>
                        <th>
                            <div>Options</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td> {{($users->currentPage() - 1) * $users->perPage() + $loop->iteration}}</td>
                        <td>
                            <div class="d-flex">
                                <img src="{{asset('backend')}}/dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                {{$user->name}}
                            </div>
                        </td>
                        <td>{{$user->email}}</td>

                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                <button wire:click.prevent="edit({{$user->id}})" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                <button wire:click.prevent="confirmationDeleteUser({{$user->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
                    @if($sumUser > $loadMore)
                    <a href="javascript:void(0);" wire:click.prevent="addLoadMore" class="btn btn-secondary">
                        Load More {{ $loadMore }}
                    </a>
                    @endif
                </div>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="{{$showEditModal ? 'updateUser' : 'createUser'}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if($showEditModal)
                            Edit New Users
                            @else
                            Add New Users
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
                        Delete User
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to delete this user?</h5>
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