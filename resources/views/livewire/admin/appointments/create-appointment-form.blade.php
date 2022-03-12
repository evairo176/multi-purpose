@push('styles')
<link href="{{asset('backend')}}/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
<link href="{{asset('backend')}}/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{asset('backend')}}/plugins/editors/markdown/simplemde.min.css">
@endpush
<div>
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Add New Appointment</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form wire:submit.prevent="createAppointment">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-4">
                                <label for="client">Client</label>
                                <select class="form-control" id="client_id" wire:model.defer="state.client_id">
                                    <option>Select client</option>
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <label for="date">Date</label>
                                <input wire:model.defer="state.date" id="appointmentDate" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." readonly="readonly">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <label for="time">Time</label>
                                <input wire:model.defer="state.time" id="appointmentTime" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Date.." readonly="readonly">
                            </div>

                        </div>
                    </div>
                    <div wire:ignore class="form-group mb-0">
                        <label for="note">Note</label>
                        <textarea wire:model.defer="state.note" data-note="@this" class="form-control" id="note" rows="10">
                        </textarea>
                    </div>
                    <a href="#" class="btn btn-secondary mt-3 mb-0">
                        Cancel
                    </a>
                    <button id="submit" type="submit" class="btn btn-primary mt-3 mb-0">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{asset('backend')}}/plugins/flatpickr/flatpickr.js"></script>

<script src="{{asset('backend')}}/plugins/flatpickr/custom-flatpickr.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        var f2 = flatpickr(document.getElementById('appointmentDate'), {
            dateFormat: "Y-m-d",
        });
        var f2 = flatpickr(document.getElementById('appointmentTime'), {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });

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