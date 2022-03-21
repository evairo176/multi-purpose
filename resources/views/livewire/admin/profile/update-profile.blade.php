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
                    <h3 class="profile-username text-center">Nina Mcintire</h3>
                    <p class="text-muted text-center">Software Engineer</p>
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
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                        <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">Change Password</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
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
<style>
    .profile-user-img:hover {
        background: blue;
        cursor: pointer;
    }
</style>
@endpush
@push('scripts')

@endpush