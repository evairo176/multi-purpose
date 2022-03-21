@push('styles')

@endpush
<div>
    <div class="content-header px-0">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kecamatan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kecamatan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <x-search-input wire:model="search" />
                <button wire:click.prevent="addNew" class="btn btn-primary ">Add New User</button>
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
                            <div>Kode Kecamatan</div>
                        </th>
                        <th>
                            <div>Nama Kecamatan</div>
                        </th>
                    </tr>
                </thead>
                <tbody wire:loading.class="text-muted">
                    @forelse($kecamatans as $kecamatan)
                    <tr>
                        <td>{{($kecamatans->currentPage() - 1) * $kecamatans->perPage() + $loop->iteration}}</td>
                        <td>{{$kecamatan->id}}</td>
                        <td>{{$kecamatan->name_kecamatan}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                <button wire:click.prevent="edit({{$kecamatan->id}})" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                <button wire:click.prevent="confirmationDeleteUser({{$kecamatan->id}})" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            <img src="{{asset('backend')}}/dist/img/noresult.png" alt="Product 1" style="max-width: 150px;" class="img-fluid">
                            <br>
                            No results found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @if($sumKecamatan > $loadMore)
                    <a href="javascript:void(0);" wire:click.prevent="addLoadMore" class="btn btn-secondary">
                        Load More {{ $loadMore }}
                    </a>
                    @endif
                </div>
                <div>
                    {{ $kecamatans->links() }}
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="{{$showEditModal ? 'updateKecamatan' : 'createKecamatan'}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if($showEditModal)
                            Edit Kecamatan
                            @else
                            Tambah Kecamatan
                            @endif
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name_kecamatan">Nama Kecamatan</label>
                            <input type="text" wire:model.defer="state.name_kecamatan" class="form-control @error('name_kecamatan') is-invalid @enderror" id="name_kecamatan" aria-describedby="kecamatanHelp" placeholder="Masukan nama kecamatan">
                            @error('name_kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            @if($showEditModal)
                            Simpan Perubahan
                            @else
                            Simpan
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
<!-- bs-custom-file-input -->
<script src="{{asset('backend')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endpush