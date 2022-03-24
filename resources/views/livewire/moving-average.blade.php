@push('styles')

@endpush
@push('loader')

@endpush
<div>
    <div class="content-header px-0">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Moving Average</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Moving Average</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            Perhitungan perencanaan produksi roti dengan metode moving average
        </div>
        <div class="card-body table-responsive p-0">
            <div class="p-3">
                Nama Anggota Kelompok:
                <ul>
                    <li>Dicki Prasetya</li>
                    <li>Anisa Khusnul</li>
                    <li>Iqbal Rasetio</li>
                </ul>
                Dari : D3TI3C
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <!-- <button wire:click="changeDefaultData" class="btn btn-primary">Ubah data semula</button> -->
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                <thead>
                    <tr>
                        <th>
                            <div>State Waktu (t)</div>
                        </th>
                        <th>
                            <div>bulan</div>
                        </th>
                        <th>
                            <div>Permintaan Aktual (a)</div>
                        </th>
                        <th>
                            <div>Opsi</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->bulan}}</td>
                        <td>
                            <div>

                                {{$item->pa}}
                            </div>
                        </td>
                        <td>
                            <button wire:click.prevent="edit({{$item->id}})" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>

                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>13</td>
                        <td>January (2022)</td>
                        <td>???</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="javascript:void(0);" wire:click.prevent="generateMovingAverage" class="btn btn-secondary">
                        <div wire:loading>
                            <i class="fas fa-sync-alt fa-spin mr-2"></i>
                        </div> Cari Data Permintaan Aktual
                    </a>
                </div>

            </div>
        </div>
    </div>
    @if($generate)
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>1). Langkah Pertama (Mengidentifikasi pola historis dari data permintaan)</h4>
        </div>
        <div class="card-body">
            Sebelum melakukan perhitungan peramalan, kita harus menganalisa dan melihat terlebih dahulu pola data yang terbentuk dari permintaan aktual sebelumnya, jenis pola data yang dibentuk akan menentukan metode peramalan yang digunakan.
            <br>
            <br>

            Dari data penjualan buku latihan soal bahasa inggris di tabel di atas data tidak menunjukkan pola data seasonal (musiman) atau data trend (data yang mengalami kecenderungan naik) , data permintaan terlihat stabil dan tidak mengalami kenaikan atau penurunan secara berkelanjutan,
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>2). Langkah Kedua (Memilih model peramalan yang sesuai dengan pola data historis permintaan)</h4>
        </div>
        <div class="card-body">
            Karena pola data historis yang dibentuk tidak mengalami kenaikan secara berkelanjutan, maka kita tidak menggunakan metode Analisis trendline, data terlihat cenderung stabil dan kita akan membantu menyelesaikan permasalahan Ibu Annisa dengan model Moving Averages 4 dan 5 periode.
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>3). Langkah Ketiga (Melakukan analisa data dan menghitung peramalan berdasarkan model Moving Averages.)</h4>
        </div>
        <div class="card-body">
            Lakukan perhitungan untuk mencari hasil ramalan berdasarkan Moving Averages 4 periode dan periode.terhadap data aktual permintaan yang ada, begitu seterusnya sampai bulan Januari 2022
            <br>
            <br>
            Adapun tabel 1.1. dibawah ini, penulis menulis menjelaskan perhitungan moving average secara manual, di mana di dalam Model Moving Average 4 bulan maka menjumlahkan selama 4 bulan berturut-turut kemudian dibagi dengan 4. Untuk Model Moving Average 5 bulan maka menjumlahkan selama 5 bulan kemudian dibagi dengan 5.
            <br><br>
            Bulan Indeks Waktu (t) Permintaan Aktual (A) Moving Averages 4 bulan (Ft MA4) Moving Averages 5 bulan (Ft MA5)
            <br><br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div>State Waktu (t)</div>
                            </th>
                            <th>
                                <div>bulan</div>
                            </th>
                            <th>
                                <div>Permintaan Aktuan (a)</div>
                            </th>
                            <th>
                                <div>Moving Averages 4 bulan(Ft MA4)</div>
                            </th>
                            <th>
                                <div>Moving Averages 5 bulan(Ft MA5)</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>January</td>
                            <td>
                                <div>

                                    81
                                </div>
                            </td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>February</td>
                            <td>
                                <div>

                                    {{$state[11]}}
                                </div>
                            </td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Maret</td>
                            <td>
                                <div>

                                    {{$state[10]}}
                                </div>
                            </td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>April</td>
                            <td>
                                <div>

                                    82
                                </div>
                            </td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Mei</td>
                            <td>
                                <div>

                                    83
                                </div>
                            </td>
                            <td>{{($state[0] + $state[1] + $state[2] + $state[3])/4}}</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Juni</td>
                            <td>
                                <div>

                                    {{$state[5]}}
                                </div>
                            </td>
                            <td>{{($state[1] + $state[2] + $state[3] + $state[4])/4}}</td>
                            <td>{{($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5}}</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Juli</td>
                            <td>
                                <div>

                                    {{$state[6]}}
                                </div>
                            </td>
                            <td>{{( $state[2] + $state[3] + $state[4] + $state[5])/4}}</td>
                            <td>{{($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5}}</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Agustus</td>
                            <td>
                                <div>

                                    {{$state[7]}}
                                </div>
                            </td>
                            <td>{{($state[3] + $state[4] + $state[5] + $state[6])/4}}</td>
                            <td>{{($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5}}</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>September</td>
                            <td>
                                <div>

                                    {{$state[8]}}
                                </div>
                            </td>
                            <td>{{($state[4] + $state[5] + $state[6] + $state[7])/4}}</td>
                            <td>{{($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5}}</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Oktober</td>
                            <td>
                                <div>

                                    {{$state[9]}}
                                </div>
                            </td>
                            <td>{{($state[5] + $state[6] + $state[7] + $state[8])/4}}</td>
                            <td>{{($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5}}</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>November</td>
                            <td>
                                <div>

                                    {{$state[10]}}
                                </div>
                            </td>
                            <td>{{($state[6] + $state[7] + $state[8] + $state[9])/4}}</td>
                            <td>{{($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5}}</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Desember</td>
                            <td>
                                <div>

                                    {{$state[11]}}
                                </div>
                            </td>
                            <td>{{($state[7] + $state[8] + $state[9] + $state[10])/4}}</td>
                            <td>{{($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>ak menggunakan metode Analisis trendline, data terlihat cenderung stabil dan kita akan membantu menyelesaikan permasalahan Ibu Annisa dengan model Moving Averages 4 dan 5 periode.
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>4). Langkah 4 (Memilih model peramalan yang tepat berdasarkan MAD (Mean Absolute Deviation) Terkecil)</h4>
        </div>
        <div class="card-body">

            Dari tabel diatas langkah selanjutnya didalam menghitung Mean Absolute Deviation (MAD) dengan menambahkan kolom disebalah kanan Kolom hasil ramalan Moving Average 4 bulan dengan kolom absolut deviation 4 bulan, di sebelah kanan kolom Moving Average 5 bulan dengan kolom absolut deviation 5 bulan.
            <br><br>
            Sebagaimana tabel di bawah, untuk cara menghitung Mean absolute deviation bisa saudara(i) pelajari di artikel Pengertian dan Cara Menghitung Mean Absolute Deviation
            <br><br>
            Keterangan :
            <br><br>
            <ul>
                <li>Untuk mencari nilai Absolute Deviation dengan cara melakukan perhitungan permintaan Aktual dikurangi dengan Ft MA (hasil peramalan). namun dengan menjadikan nilainya menjadi absolut (mutalk positif).</li>
                <li>Di dalam mencari nilai MAD yang terkecil dengan metode moving Average, yaitu dengan melakukan pengurangan antara nilai permintaan aktual dengan peramalan aktual, kemudian menjumlahkan semuanya dan dibagi dengan banyaknya periode yang ada.untuk lebih jelasnya saudara bisa melihat pada tabel dibawah ini.</li>
            </ul>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th>
                                <div>State Waktu (t)</div>
                            </th>
                            <th>
                                <div>Permintaan Aktuan (a)</div>
                            </th>
                            <th>
                                <div>Ft MA4</div>
                            </th>
                            <th>
                                <div>Absolute Deviation untul MA4</div>
                            </th>
                            <th>
                                <div>Ft MA5</div>
                            </th>
                            <th>
                                <div>Absolute Deviation untul MA5</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5</td>
                            <td>
                                <div>

                                    83
                                </div>
                            </td>
                            <td>{{($state[0] + $state[1] + $state[2] + $state[3])/4}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3])/4 - 83)}}</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>
                                <div>

                                    {{$state[5]}}
                                </div>
                            </td>
                            <td>{{($state[1] + $state[2] + $state[3] + $state[4])/4}}</td>
                            <td>{{abs(($state[1] + $state[2] + $state[3] + $state[4])/4 - $state[5])}}</td>
                            <td>{{($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5])}}</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>
                                <div>

                                    {{$state[6]}}
                                </div>
                            </td>
                            <td>{{( $state[2] + $state[3] + $state[4] + $state[5])/4}}</td>
                            <td>{{abs(( $state[2] + $state[3] + $state[4] + $state[5])/4 - $state[6])}}</td>
                            <td>{{($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5}}</td>
                            <td>{{abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6])}}</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>
                                <div>

                                    {{$state[7]}}
                                </div>
                            </td>
                            <td>{{($state[3] + $state[4] + $state[5] + $state[6])/4}}</td>
                            <td>{{abs(($state[3] + $state[4] + $state[5] + $state[6])/4 - $state[7])}}</td>
                            <td>{{($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5}}</td>
                            <td>{{abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7])}}</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>
                                <div>

                                    {{$state[8]}}
                                </div>
                            </td>
                            <td>{{($state[4] + $state[5] + $state[6] + $state[7])/4}}</td>
                            <td>{{abs(($state[4] + $state[5] + $state[6] + $state[7])/4 - $state[8])}}</td>
                            <td>{{($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5}}</td>
                            <td>{{abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8])}}</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>
                                <div>

                                    {{$state[9]}}
                                </div>
                            </td>
                            <td>{{($state[5] + $state[6] + $state[7] + $state[8])/4}}</td>
                            <td>{{abs(($state[5] + $state[6] + $state[7] + $state[8])/4 - $state[9])}}</td>
                            <td>{{($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5}}</td>
                            <td>{{abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])}}</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>
                                <div>

                                    {{$state[10]}}
                                </div>
                            </td>
                            <td>{{($state[6] + $state[7] + $state[8] + $state[9])/4}}</td>
                            <td>{{abs(($state[6] + $state[7] + $state[8] + $state[9])/4 - $state[10])}}</td>
                            <td>{{($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5}}</td>
                            <td>{{abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])}}</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>
                                <div>

                                    {{$state[11]}}
                                </div>
                            </td>
                            <td>{{($state[7] + $state[8] + $state[9] + $state[10])/4}}</td>
                            <td>{{abs(($state[7] + $state[8] + $state[9] + $state[10])/4 - $state[11])}}</td>
                            <td>{{($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5}}</td>
                            <td>{{abs(($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5 - $state[11])}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td>MAD = {{
                                   ( (abs(($state[0] + $state[1] + $state[2] + $state[3])/4 - 83)) + 
                                    (abs(($state[1] + $state[2] + $state[3] + $state[4])/4 - $state[5])) +
                                    (abs(($state[2] + $state[3] + $state[4] + $state[5])/4 - $state[6])) +
                                    (abs(($state[3] + $state[4] + $state[5] + $state[6])/4 - $state[7])) +
                                    (abs(($state[4] + $state[5] + $state[6] + $state[7])/4 - $state[8])) +
                                    (abs(($state[5] + $state[6] + $state[7] + $state[8])/4 - $state[9])) +
                                    (abs(($state[6] + $state[7] + $state[8] + $state[9])/4 - $state[10])) +
                                    (abs(($state[7] + $state[8] + $state[9] + $state[10])/4 - $state[11])) ) / 8
                                }}</td>
                            <td></td>
                            <td>MAD = {{
                                  (  (abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5])) + 
                                    (abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6])) +
                                   (abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7])) +
                                   (abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8])) +
                                   (abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])) + 
                                   (abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])) + 
                                    (abs(($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5 - $state[11])) ) / 7
                                }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br>
            Berdasarkan Tabel 1.3, nilai perhitungan Mean Absolute Deviation untuk Moving Average 5 periode lebih disukai karena mempunyai nilai Mean Absolute Deviation lebih kecil dari Mean Absolute Deviation untuk Moving Average 4 periode.
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>5). Langkah Kelima (Memeriksa keandalan model peramalan yang dipilih berdasarkan peta kontrol tracking signal)</h4>
        </div>
        <div class="card-body">
            Untuk mengetahui sejauh mana kehandalan dari model peramalan yang dipilih maka menggunakan metode peta kontrol tracking signal.
            <br><br>
            Langkah-langkah didalam menghitung tracking signal moving Average 5 bulan sebagai berikut :
            <br><br>
            <ul>
                <li>Masukkan data di kolom periode, berurutan mulai dari periode pertama sampai periode ke delapan</li>
                <li>Kolom forecast berasal dari perhitungan Moving Average 5 bulan pada tabel sebelumnya. </li>
                <li>Kolom Aktual (A3) berasal dari permintaan aktual yang ada, mulai dari bulan ke enam (Juni) sampai bulan ke dua belas (Desember).</li>
                <li>Kolom error berisi dari pengurangan kolom aktual dengan kolom forecast.</li>
                <li>Kolom RSFE diperoleh dari kumulatif (penjumlahan) kolom error. Di bawah tabel terlihat nilai -2 diperoleh dari menjumlahkan 4,2+ -6,2 = -2.</li>
                <li>Kolom absolut error diperoleh dengan meng absolut kan nilai pada kolom error. Yang dimaksud dengan mengabsolutkan adalah nilai negatif berubah menjadi nilai positif. </li>
                <li>Kolom kumulatif absolut error berisi dari kumulatif (penjumlahan) nilai kolom absolut error.</li>
                <li>Kolom MAD berasal dari pembagian kolom kumulatif absolut error dengan kolom periode.</li>
                <li>Nilai di kolom tracking signal diperoleh dari pembagian kolom RSFE dengan kolom MAD</li>
            </ul>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th>
                                <div>Periode ,n(1)</div>
                            </th>
                            <th>
                                <div>Forecast,f(2)</div>
                            </th>
                            <th>
                                <div>Aktual,A(3)</div>
                            </th>
                            <th>
                                <div>Error,E=A-F,(4)=(3)-(2)</div>
                            </th>
                            <th>
                                <div>RSFE(5) - kumulatif dari (4)</div>
                            </th>
                            <th>
                                <div>Absolute Error (6) = Absolute dari (4)</div>
                            </th>
                            <th>
                                <div>kumulatif Absolute Error (7) = kumulatif dari (6)</div>
                            </th>
                            <th>
                                <div>MAD (8) = (7)/(1)</div>
                            </th>
                            <th>
                                <div>Tracking Signal (9) = (5)/(8)</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5}}</td>
                            <td>
                                <div>

                                    {{$state[5]}}
                                </div>
                            </td>
                            <td>{{$state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5}}</td>
                            <td>{{$state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5])}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5])}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) / 1}}</td>
                            <td>{{round(($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) / (abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) / 1),2)}}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>{{($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5}}</td>
                            <td>
                                <div>

                                    {{$state[6]}}
                                </div>
                            </td>
                            <td>{{$state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5}}</td>
                            <td>{{($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)}}</td>
                            <td>{{abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6])}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6])}}</td>
                            <td>{{(abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6])) / 2}}</td>
                            <td>{{round((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6])) / 2),2)}}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>{{($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5}}</td>
                            <td>
                                <div>

                                    {{$state[7]}}
                                </div>
                            </td>
                            <td>{{$state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5}}</td>
                            <td>{{(($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5)}}</td>
                            <td>{{abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7])}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7])}}</td>
                            <td>{{(abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7])) / 3}}</td>
                            <td>{{round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7])) / 3),2)}}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>{{($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5}}</td>
                            <td>
                                <div>

                                    {{$state[8]}}
                                </div>
                            </td>
                            <td>{{$state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5}}</td>
                            <td>{{(($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5)}}</td>
                            <td>{{abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8])}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8])}}</td>
                            <td>{{(abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8])) / 4}}</td>
                            <td>{{round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8])) / 4),2)}}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>{{($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5}}</td>
                            <td>
                                <div>

                                    {{$state[9]}}
                                </div>
                            </td>
                            <td>{{$state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5}}</td>
                            <td>{{(($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5)}}</td>
                            <td>{{abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])}}</td>
                            <td>{{(abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])) / 5}}</td>
                            <td>{{round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])) / 5),2)}}</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>{{($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5}}</td>
                            <td>
                                <div>

                                    {{$state[10]}}
                                </div>
                            </td>
                            <td>{{$state[10] - ($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5}}</td>
                            <td>{{(($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5) + ($state[10] - ($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5)}}</td>
                            <td>{{abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])+abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])}}</td>
                            <td>{{(abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])+abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])) / 6}}</td>
                            <td>{{round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5) + ($state[10] - ($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])+abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])) / 6),2)}}</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>{{($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5}}</td>
                            <td>
                                <div>

                                    {{$state[11]}}
                                </div>
                            </td>
                            <td>{{$state[11] - ($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5}}</td>
                            <td>{{(($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5) + ($state[10] - ($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5) + ($state[11] - ($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5)}}</td>
                            <td>{{abs(($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5 - $state[11])}}</td>
                            <td>{{abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])+abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])+abs(($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5 - $state[11])}}</td>
                            <td>{{(abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])+abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])+abs(($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5 - $state[11])) / 7}}</td>
                            <td>{{round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5) + ($state[10] - ($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5) + ($state[11] - ($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4])/5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5])/5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6])/5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7])/5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8])/5 - $state[9])+abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9])/5 - $state[10])+abs(($state[6] + $state[7] + $state[8] + $state[9] + $state[10])/5 - $state[11])) / 7),2)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br>

        </div>
    </div>

    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-heading d-flex justify-content-between align-items-center">

            </div>
            <div class="widget-content widget-content-area">

            </div>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>Chart</h4>
        </div>
        <div class="card-body">
            <?php
            $rataData = ($state[5] + $state[6] + $state[7] + $state[8] + $state[9] + $state[10] + $state[11]) / 7;
            $state1 = round(($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5) / (abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5 - $state[5]) / 1), 2);
            $state2 = round((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5 - $state[6])) / 2), 2);
            $state3 = round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5 - $state[7])) / 3), 2);
            $state4 = round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7]) / 5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7]) / 5 - $state[8])) / 4), 2);
            $state5 = round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7]) / 5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8]) / 5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7]) / 5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8]) / 5 - $state[9])) / 5), 2);
            $state6 = round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7]) / 5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8]) / 5) + ($state[10] - ($state[5] + $state[6] + $state[7] + $state[8] + $state[9]) / 5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7]) / 5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8]) / 5 - $state[9]) + abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9]) / 5 - $state[10])) / 6), 2);
            $state7 = round(((($state[5] - ($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5) + ($state[6] - ($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5)) + ($state[7] - ($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5) + ($state[8] - ($state[3] + $state[4] + $state[5] + $state[6] + $state[7]) / 5) + ($state[9] - ($state[4] + $state[5] + $state[6] + $state[7] + $state[8]) / 5) + ($state[10] - ($state[5] + $state[6] + $state[7] + $state[8] + $state[9]) / 5) + ($state[11] - ($state[6] + $state[7] + $state[8] + $state[9] + $state[10]) / 5)) / ((abs(($state[0] + $state[1] + $state[2] + $state[3] + $state[4]) / 5 - $state[5]) + abs(($state[1] + $state[2] + $state[3] + $state[4] + $state[5]) / 5 - $state[6]) + abs(($state[2] + $state[3] + $state[4] + $state[5] + $state[6]) / 5 - $state[7]) + abs(($state[3] + $state[4] + $state[5] + $state[6] + $state[7]) / 5 - $state[8]) + abs(($state[4] + $state[5] + $state[6] + $state[7] + $state[8]) / 5 - $state[9]) + abs(($state[5] + $state[6] + $state[7] + $state[8] + $state[9]) / 5 - $state[10]) + abs(($state[6] + $state[7] + $state[8] + $state[9] + $state[10]) / 5 - $state[11])) / 7), 2); ?>
            dari perhitungan di atas kita akan membuat peta kontrol tracking signal, dimana dalam sebaran peta kontrol tracking signal terlihat bahwa nilai bergerak tidak melebihi dari ±4. sehingga permintaan ibu Shabrina di bulan Januari 2022 sebesar {{ round($rataData + max($state1,$state2,$state3,$state4,$state5,$state6,$state7) ,0)}} roti bisa digunakan untuk Perhitungan perencanaan produksi roti.
            <br><br>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="">
                    <canvas id="myChart" style="width:100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    @else

    @endif


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="form" tabstate="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="UpdateData">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Edit Data
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pa">Permintaan Aktuan (a)</label>
                            <input type="text" wire:model.defer="edit.pa" class="form-control @error('pa') is-invalid @enderror" id="pa" aria-describedby="pa" placeholder="Enter Permintaan Aktuan (a)">
                            @error('pa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    $(document).ready(function() {

        document.addEventListener('show-chart', (e) => {

            // var dataParse = e.detail;
            var data = e.detail;

            var state1 =  Math.round((data[5] - (data[0] + data[1] + data[2] + data[3] + data[4]) / 5) / (Math.abs((data[0] + data[1] + data[2] + data[3] + data[4]) / 5 - data[5]) / 1))
            var state2 =  Math.round(((data[5] - (data[0] + data[1] + data[2] + data[3] + data[4]) / 5) + (data[6] - (data[1] + data[2] + data[3] + data[4] + data[5]) / 5)) / ((Math.abs((data[0] + data[1] + data[2] + data[3] + data[4]) / 5 - data[5]) + Math.abs((data[1] + data[2] + data[3] + data[4] + data[5]) / 5 - data[6])) / 2))
            var state3 =  Math.round((((data[5] - (data[0] + data[1] + data[2] + data[3] + data[4]) / 5) + (data[6] - (data[1] + data[2] + data[3] + data[4] + data[5]) / 5)) + (data[7] - (data[2] + data[3] + data[4] + data[5] + data[6]) / 5)) / ((Math.abs((data[0] + data[1] + data[2] + data[3] + data[4]) / 5 - data[5]) + Math.abs((data[1] + data[2] + data[3] + data[4] + data[5]) / 5 - data[6]) + Math.abs((data[2] + data[3] + data[4] + data[5] + data[6]) / 5 - data[7])) / 3))
            var state4 =  Math.round((((data[5] - (data[0] + data[1] + data[2] + data[3] + data[4]) / 5) + (data[6] - (data[1] + data[2] + data[3] + data[4] + data[5]) / 5)) + (data[7] - (data[2] + data[3] + data[4] + data[5] + data[6]) / 5) + (data[8] - (data[3] + data[4] + data[5] + data[6] + data[7]) / 5)) / ((Math.abs((data[0] + data[1] + data[2] + data[3] + data[4]) / 5 - data[5]) + Math.abs((data[1] + data[2] + data[3] + data[4] + data[5]) / 5 - data[6]) + Math.abs((data[2] + data[3] + data[4] + data[5] + data[6]) / 5 - data[7]) + Math.abs((data[3] + data[4] + data[5] + data[6] + data[7]) / 5 - data[8])) / 4))
            var state5 =  Math.round((((data[5] - (data[0] + data[1] + data[2] + data[3] + data[4]) / 5) + (data[6] - (data[1] + data[2] + data[3] + data[4] + data[5]) / 5)) + (data[7] - (data[2] + data[3] + data[4] + data[5] + data[6]) / 5) + (data[8] - (data[3] + data[4] + data[5] + data[6] + data[7]) / 5) + (data[9] - (data[4] + data[5] + data[6] + data[7] + data[8]) / 5)) / ((Math.abs((data[0] + data[1] + data[2] + data[3] + data[4]) / 5 - data[5]) + Math.abs((data[1] + data[2] + data[3] + data[4] + data[5]) / 5 - data[6]) + Math.abs((data[2] + data[3] + data[4] + data[5] + data[6]) / 5 - data[7]) + Math.abs((data[3] + data[4] + data[5] + data[6] + data[7]) / 5 - data[8]) + Math.abs((data[4] + data[5] + data[6] + data[7] + data[8]) / 5 - data[9])) / 5) )
            var state6 =  Math.round((((data[5] - (data[0] + data[1] + data[2] + data[3] + data[4]) / 5) + (data[6] - (data[1] + data[2] + data[3] + data[4] + data[5]) / 5)) + (data[7] - (data[2] + data[3] + data[4] + data[5] + data[6]) / 5) + (data[8] - (data[3] + data[4] + data[5] + data[6] + data[7]) / 5) + (data[9] - (data[4] + data[5] + data[6] + data[7] + data[8]) / 5) + (data[10] - (data[5] + data[6] + data[7] + data[8] + data[9]) / 5)) / ((Math.abs((data[0] + data[1] + data[2] + data[3] + data[4]) / 5 - data[5]) + Math.abs((data[1] + data[2] + data[3] + data[4] + data[5]) / 5 - data[6]) + Math.abs((data[2] + data[3] + data[4] + data[5] + data[6]) / 5 - data[7]) + Math.abs((data[3] + data[4] + data[5] + data[6] + data[7]) / 5 - data[8]) + Math.abs((data[4] + data[5] + data[6] + data[7] + data[8]) / 5 - data[9]) + Math.abs((data[5] + data[6] + data[7] + data[8] + data[9]) / 5 - data[10])) / 6))
            var state7 =  Math.round((((data[5] - (data[0] + data[1] + data[2] + data[3] + data[4]) / 5) + (data[6] - (data[1] + data[2] + data[3] + data[4] + data[5]) / 5)) + (data[7] - (data[2] + data[3] + data[4] + data[5] + data[6]) / 5) + (data[8] - (data[3] + data[4] + data[5] + data[6] + data[7]) / 5) + (data[9] - (data[4] + data[5] + data[6] + data[7] + data[8]) / 5) + (data[10] - (data[5] + data[6] + data[7] + data[8] + data[9]) / 5) + (data[11] - (data[6] + data[7] + data[8] + data[9] + data[10]) / 5)) / ((Math.abs((data[0] + data[1] + data[2] + data[3] + data[4]) / 5 - data[5]) + Math.abs((data[1] + data[2] + data[3] + data[4] + data[5]) / 5 - data[6]) + Math.abs((data[2] + data[3] + data[4] + data[5] + data[6]) / 5 - data[7]) + Math.abs((data[3] + data[4] + data[5] + data[6] + data[7]) / 5 - data[8]) + Math.abs((data[4] + data[5] + data[6] + data[7] + data[8]) / 5 - data[9]) + Math.abs((data[5] + data[6] + data[7] + data[8] + data[9]) / 5 - data[10]) + Math.abs((data[6] + data[7] + data[8] + data[9] + data[10]) / 5 - data[11])) / 7))
            // console.log(state1);
            var xValues = [1, 2, 3, 4, 5, 6, 7];
            var yValues = [state1, state2, state3, state4, state5, state6, state7];
            console.log(yValues);
            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,

                    datasets: [{
                        label: 'My First Dataset',
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                        data: yValues
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                }
            });
        });
    });
</script>
@endpush