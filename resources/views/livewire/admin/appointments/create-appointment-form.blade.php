@push('styles')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

@endpush
<div>
    <div class="content-header px-0">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add New Appointment</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add New Appointment</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="text-right">
                <a href="{{ url('admin/appointments') }}" class="btn btn-danger mb-2">Cancel</a>
            </div>
        </div>
        <form wire:submit.prevent="createAppointment">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="client">Client</label>
                            <select class="form-control" id="client_id" wire:model.defer="state.client_id">
                                <option>Select client</option>
                                @foreach($clients as $client)
                                <option value="{{$client->id}}">{{$client->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="appointmentDate">Appointment Date</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <x-datepicker wire:model.defer="state.date" id="appointmentDate">

                                </x-datepicker>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="appointmentTime">Appointment Time</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <x-timepicker wire:model.defer="state.time" id="appointmentTime">

                                </x-timepicker>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="appointmentStartTime">Appointment Start Time</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <x-timepicker wire:model.defer="state.appointment_start_time" id="appointmentStartTime">

                                </x-timepicker>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="appointmentEndTime">Appointment End Time</label>
                            <div class="input-group ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <x-timepicker wire:model.defer="state.appointment_end_time" id="appointmentEndTime">

                                </x-timepicker>
                            </div>
                        </div>
                    </div>


                </div>
                <div wire:ignore class="form-group">
                    <label for="note">Note</label>
                    <textarea wire:model.defer="state.note" data-note="@this" class="form-control" id="note" rows="10">
                        </textarea>
                </div>


            </div>
            <div class="card-footer">
                <button id="submit" type="submit" class="btn btn-primary mt-3 mb-0">
                    Save add appointment
                </button>
            </div>
        </form>
    </div>
</div>
@push('scripts')
<!-- InputMask -->
<script src="{{asset('backend')}}/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- <script src="{{asset('backend')}}/plugins/flatpickr/custom-flatpickr.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        ClassicEditor
            .create(document.querySelector('#note'))
            .then(editor => {
                document.querySelector('#submit').addEventListener('click', () => {
                    let note = $('#note').data('note');
                    eval(note).set('state.note', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
    })
</script>
@endpush