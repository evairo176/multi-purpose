<div>
    <div class="content-header px-0">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center" x-data="{ imagePreview: '{{ auth()->user()->avatar_url}}' }">
                        <input wire:model="image" class="d-none" type="file" x-ref="image" x-on:change="
                        const reader = new FileReader();
                        reader.onload = (event) => {
                            imagePreview = event.target.result;
                            document.getElementById('profileImagex').src = imagePreview;
                        }
                            reader.readAsDataURL($refs.image.files[0]);
                        ">
                        <img x-on:click="$refs.image.click()" class="profile-user-img img-fluid img-circle" x-bind:src="imagePreview ? imagePreview : '/backend/dist/img/user4-128x128.jpg'" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
                    <p class="text-muted text-center">{{auth()->user()->role}}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="fas fa-user"></i> Edit Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab"> Change Password</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">
                            <form wire:submit.prevent="updateProfile" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input wire:model.defer="state.name" type="text" class="form-control" id="inputName" placeholder="Name">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input wire:model.defer="state.email" type="text" class="form-control" id="inputEmail" placeholder="Email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <x-datepicker wire:model.defer="state.tgl_lahir" id="tgl_lahir" :error="'tgl_lahir'">

                                            </x-datepicker>
                                            @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" wire:model.defer="state.pendidikan">
                                            <option>Select pendidikan</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D1">D1</option>
                                            <option value="D2">D2</option>
                                            <option value="D3">D3</option>
                                            <option value="D4">D4</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                        </select>
                                        @error('pendidikan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tahun_kader" class="col-sm-3 col-form-label">Tahun Kader</label>
                                    <div class="col-sm-9">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <x-yearpicker wire:model.defer="state.tahun_kader" id="tahun_kader" :error="'tahun_kader'">

                                            </x-yearpicker>
                                            @error('tahun_kader')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tahun_pelatihan" class="col-sm-3 col-form-label">Tahun Pelatihan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <x-yearpicker wire:model.defer="state.tahun_pelatihan" id="tahun_pelatihan" :error="'tahun_pelatihan'">

                                            </x-yearpicker>
                                            @error('tahun_pelatihan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_hp" class="col-sm-3 col-form-label">No Telepon</label>
                                    <div class="col-sm-9">
                                        <input wire:model.defer="state.no_hp" type="number" class="form-control" id="no_hp" placeholder="No hp">
                                        @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-9">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</div>
@push('styles')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<style>
    .profile-user-img:hover {
        background: blue;
        cursor: pointer;
    }
</style>
@endpush
@push('scripts')
<!-- InputMask -->
<script src="{{asset('backend')}}/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script>
    $(document).ready(function() {
        Livewire.on('nameChanged', (changedName) => {
            $('#changedName').text(changedName);
        });
    });
</script>
@endpush