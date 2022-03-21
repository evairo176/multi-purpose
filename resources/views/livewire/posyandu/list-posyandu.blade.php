@push('styles')

@endpush
<div>
    <div class="content-header px-0">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Posyandu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Posyandu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Map Posyandu</h5>
                    </div>
                </div>
                <div class="card-body">
                    <x-map-location />
                </div>
            </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <x-search-input wire:model="search" />
                <a href="{{ url('/posyandu/create') }}" class="btn btn-primary">Tambah Posyandu</a>
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
                            <div>Kecamatan</div>
                        </th>
                        <th>
                            <div>Desa</div>
                        </th>
                        <th>
                            <div>Nama Posyandu</div>
                        </th>
                        <th>
                            <div>Aksi</div>
                        </th>
                    </tr>
                </thead>
                <tbody wire:loading.class="text-muted">
                @forelse($posyandus as $posyandu)
                    <tr>
                        <td>{{($posyandus->currentPage() - 1) * $posyandus->perPage() + $loop->iteration}}</td>
                        <td>{{$posyandu->name_kecamatan}}</td>
                        <td>{{$posyandu->name_desa}}</td>
                        <td>{{$posyandu->name_posyandu}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                <a href="{{route('posyandu.edit',$posyandu->id_posyandu)}}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <button wire:click.prevent="confirmationDeletePosyandu({{$posyandu->id_posyandu}})" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
                    @if($sumPosyandu > $loadMore)
                    <a href="javascript:void(0);" wire:click.prevent="addLoadMore" class="btn btn-secondary">
                        Load More {{ $loadMore }}
                    </a>
                    @endif
                </div>
                <div>
                    {{ $posyandus->links() }}
                </div>
            </div>
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
<script>
    document.addEventListener('livewire:load', () => {
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
                // console.log(markerElement);
                markerElement.className = 'marker' + locationId;
                markerElement.id = locationId;
                markerElement.style.backgroundImage = 'url(https://cdn.icon-icons.com/icons2/2699/PNG/512/mapbox_logo_icon_169974.png)';
                markerElement.style.backgroundSize = 'cover';
                markerElement.style.width = '50px';
                markerElement.style.height = '50px';

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
        const style = "streets-v11";
        // light-v10,streets-v11,outdoors-v11,dark-v10
        map.setStyle("mapbox://styles/mapbox/" + style);
        map.addControl(new mapboxgl.NavigationControl());
    });
</script>
@endpush