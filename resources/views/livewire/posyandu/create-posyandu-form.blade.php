@push('styles')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
@endpush
<div>
    <div class="content-header px-0">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Posyandu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Posyandu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Map Posyandu</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div wire:ignore id='map' style='width: 100%; height: 500px;'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Form Posyandu</h5>
                        </div>
                        <div>
                            <a wire:click="cancelForm" type="button" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
                <form wire:submit.prevent="{{$idEdit ? 'updatePosyandu' : 'createPosyandu'}}">
                    @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="longtitude">Longtitude</label>
                                <input type="text" wire:model="longtitude" class="form-control @error('longtitude') is-invalid @enderror" aria-describedby="DesaHelp" placeholder="Masukan longtitude">
                                @error('longtitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="lattitude">Lattitude</label>
                                <input type="text" wire:model="lattitude" class="form-control @error('lattitude') is-invalid @enderror" aria-describedby="DesaHelp" placeholder="Masukan lattitude">
                                @error('lattitude')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="client">Kecamatan</label>
                                <select class="form-control @error('id_kecamatan') is-invalid @enderror" id="id_kecamatan" wire:model.defer="id_kecamatan">
                                    <option>Select kecamatan</option>
                                    @foreach($kecamatans as $kecamatan)
                                    <option value="{{$kecamatan->id}}">{{$kecamatan->name_kecamatan}}</option>
                                    @endforeach
                                </select>
                                @error('id_kecamatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="client">Desa</label>
                                <select class="form-control @error('id_desa') is-invalid @enderror" id="id_desa" wire:model.defer="id_desa">
                                    <option>Select desa</option>
                                    @foreach($desas as $desa)
                                    <option value="{{$desa->id}}">{{$desa->name_desa}}</option>
                                    @endforeach
                                </select>
                                @error('id_desa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="name_posyandu">Nama Posyandu</label>
                                <input type="text" wire:model="name_posyandu" class="form-control @error('name_posyandu') is-invalid @enderror" id="name_posyandu" aria-describedby="DesaHelp" placeholder="Masukan nama Desa">
                                @error('name_posyandu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control" c>
                        @if($idEdit)
                        Simpan Perubahan
                        @else
                        Simpan
                        @endif                             
                        </button>  
                    </form>
                        @if($idEdit)
                        <button wire:click="deletePosyandu" type="button" class="btn mt-2 btn-danger form-control">Delete</button>
                        @endif                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<!-- bs-custom-file-input -->
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>

<script>
    document.addEventListener('livewire:load',() => {
        const defaultLocation = [108.31590389515185, -6.328942356993991];
        mapboxgl.accessToken = '{{env("MAPBOX_KEY")}}';
        var map = new mapboxgl.Map({
            container: 'map',
            center: defaultLocation,
            zoom: 9.50,
        });


        const loadLocation = (geoJson) => {
            geoJson.features.forEach((location) => {
                const {
                    geometry,
                    properties
                } = location;
                const {
                    locationId,
                    title,
                    name_kecamatan,
                    name_desa,
                } = properties;

                let markerElement = document.createElement('div');
                // console.log(locationId);
                markerElement.className = 'marker' + locationId;
                markerElement.id = locationId;
                markerElement.style.backgroundImage = 'url(https://cdn.icon-icons.com/icons2/2699/PNG/512/mapbox_logo_icon_169974.png)';
                markerElement.style.backgroundSize = 'cover';
                markerElement.style.width = '50px';
                markerElement.style.height = '50px';

                markerElement.addEventListener('click', function() {
                    const locationId = $(this).attr('id');
                    @this.findLocationById(locationId);
                });

                const content = '<div style="overflow-y:auto;max-height:400px;width:100%;">' +
                    '<table class="table table-sm mt-2">' +
                    '<tbody>' +
                    '<tr>' +
                    '<td>Title</td>' +
                    '<td>' + title + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Kecamatan</td>' +
                    '<td>' + name_kecamatan + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Desa</td>' +
                    '<td>' + name_desa + '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    ' </table>' +
                    '</div>';



                const popUp = new mapboxgl.Popup({
                    offset: 25
                }).setHTML(content).setMaxWidth("400px")

                new mapboxgl.Marker(markerElement)
                    .setLngLat(geometry.coordinates)
                    .setPopup(popUp)
                    .addTo(map);
            });
        }

        // console.log(@this.geoJson);
        loadLocation({!! $geoJson !!});

        window.addEventListener('locationAdded',(e) => {
            loadLocation(JSON.parse(e.detail));
        });
        window.addEventListener('updatedLocation',(e) => {
            $('.mapboxgl-popup').remove();
            $('div').remove('.mapboxgl-marker');
            loadLocation(JSON.parse(e.detail));
        });
        window.addEventListener('locationDeleted',(e) => {
            $('.mapboxgl-popup').remove();
            $('.marker'+ e.detail).remove();
            loadLocation(JSON.parse(e.detail));
        });
        const style = 'dark-v10';
        // light-v10,streets-v11,outdoors-v11,dark-v10,streets-v11
        map.setStyle("mapbox://styles/mapbox/" + style);
        map.addControl(new mapboxgl.NavigationControl());

        map.on('click', (e) => {
            const longtitude = e.lngLat.lng;
            const lattitude = e.lngLat.lat;

            @this.longtitude = longtitude;
            @this.lattitude = lattitude;
        });
    });
</script>
@endpush