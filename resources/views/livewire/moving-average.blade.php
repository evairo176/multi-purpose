@push('styles')

@endpush
@push('loader')

@endpush
<div>
    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-heading d-flex justify-content-between align-items-center">
                <h4>Moving Average</h4>
            </div>
            <div class="widget-content widget-content-area">
                Ibu Shabrina mempunyai usaha di bidang penjualan Kue Ners, ibu Shabrina ingin memperkirakan (forecasting) berapa kue yang bisa Ibu Shabrina jual di bulan Januari 2022. Dengan data penjualan Kue Ners selama tahun 2021 sebagai berikut
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th>
                                    <div class="th-content">Index Waktu (t)</div>
                                </th>
                                <th>
                                    <div class="th-content">bulan</div>
                                </th>
                                <th>
                                    <div class="th-content">Permintaan Aktual (a)</div>
                                </th>
                                <th>
                                    <div class="th-content">Opsi</div>
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
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" wire:click.prevent="edit({{$item->id}})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg></a></li>
                                    </ul>
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
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="javascript:void(0);" wire:click.prevent="generateMovingAverage" class="btn btn-secondary">
                            Cari Data Permintaan Aktual <div class="spinner-border text-white mr-2 align-self-center loader-sm " wire:loading wire:target="generateMovingAverage">

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($generate)
    <div id="tableCheckbox" class=" col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-heading d-flex justify-content-between align-items-center">
                <h4>1). Langkah Pertama (Mengidentifikasi pola historis dari data permintaan)</h4>
            </div>
            <div class="widget-content widget-content-area">
                Sebelum melakukan perhitungan peramalan, kita harus menganalisa dan melihat terlebih dahulu pola data yang terbentuk dari permintaan aktual sebelumnya, jenis pola data yang dibentuk akan menentukan metode peramalan yang digunakan.
                <br>
                <br>

                Dari data penjualan buku latihan soal bahasa inggris di tabel di atas data tidak menunjukkan pola data seasonal (musiman) atau data trend (data yang mengalami kecenderungan naik) , data permintaan terlihat stabil dan tidak mengalami kenaikan atau penurunan secara berkelanjutan,
            </div>


        </div>
    </div>
    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-heading d-flex justify-content-between align-items-center">
                <h4>2). Langkah Kedua (Memilih model peramalan yang sesuai dengan pola data historis permintaan)</h4>
            </div>
            <div class="widget-content widget-content-area">
                Karena pola data historis yang dibentuk tidak mengalami kenaikan secara berkelanjutan, maka kita tidak menggunakan metode Analisis trendline, data terlihat cenderung stabil dan kita akan membantu menyelesaikan permasalahan Ibu Annisa dengan model Moving Averages 4 dan 5 periode.
            </div>


        </div>
    </div>
    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-heading d-flex justify-content-between align-items-center">
                <h4>3). Langkah Ketiga (Melakukan analisa data dan menghitung peramalan berdasarkan model Moving Averages.)</h4>
            </div>
            <div class="widget-content widget-content-area">
                Lakukan perhitungan untuk mencari hasil ramalan berdasarkan Moving Averages 4 periode dan periode.terhadap data aktual permintaan yang ada, begitu seterusnya sampai bulan Januari 2022
                <br>
                <br>
                Adapun tabel 1.1. dibawah ini, penulis menulis menjelaskan perhitungan moving average secara manual, di mana di dalam Model Moving Average 4 bulan maka menjumlahkan selama 4 bulan berturut-turut kemudian dibagi dengan 4. Untuk Model Moving Average 5 bulan maka menjumlahkan selama 5 bulan kemudian dibagi dengan 5.
                <br><br>
                Bulan Indeks Waktu (t) Permintaan Aktual (A) Moving Averages 4 bulan (Ft MA4) Moving Averages 5 bulan (Ft MA5)
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th>
                                    <div class="th-content">Index Waktu (t)</div>
                                </th>
                                <th>
                                    <div class="th-content">bulan</div>
                                </th>
                                <th>
                                    <div class="th-content">Permintaan Aktuan (a)</div>
                                </th>
                                <th>
                                    <div class="th-content">Moving Averages 4 bulan(Ft MA4)</div>
                                </th>
                                <th>
                                    <div class="th-content">Moving Averages 5 bulan(Ft MA5)</div>
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

                                        {{$index_12}}
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

                                        {{$index_11}}
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
                                <td>{{($index_1 + $index_2 + $index_3 + $index_4)/4}}</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Juni</td>
                                <td>
                                    <div>

                                        {{$index_6}}
                                    </div>
                                </td>
                                <td>{{($index_2 + $index_3 + $index_4 + $index_5)/4}}</td>
                                <td>{{($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5}}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Juli</td>
                                <td>
                                    <div>

                                        {{$index_7}}
                                    </div>
                                </td>
                                <td>{{( $index_3 + $index_4 + $index_5 + $index_6)/4}}</td>
                                <td>{{($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5}}</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Agustus</td>
                                <td>
                                    <div>

                                        {{$index_8}}
                                    </div>
                                </td>
                                <td>{{($index_4 + $index_5 + $index_6 + $index_7)/4}}</td>
                                <td>{{($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5}}</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>September</td>
                                <td>
                                    <div>

                                        {{$index_9}}
                                    </div>
                                </td>
                                <td>{{($index_5 + $index_6 + $index_7 + $index_8)/4}}</td>
                                <td>{{($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5}}</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Oktober</td>
                                <td>
                                    <div>

                                        {{$index_10}}
                                    </div>
                                </td>
                                <td>{{($index_6 + $index_7 + $index_8 + $index_9)/4}}</td>
                                <td>{{($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5}}</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>November</td>
                                <td>
                                    <div>

                                        {{$index_11}}
                                    </div>
                                </td>
                                <td>{{($index_7 + $index_8 + $index_9 + $index_10)/4}}</td>
                                <td>{{($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5}}</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Desember</td>
                                <td>
                                    <div>

                                        {{$index_12}}
                                    </div>
                                </td>
                                <td>{{($index_8 + $index_9 + $index_10 + $index_11)/4}}</td>
                                <td>{{($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-heading d-flex justify-content-between align-items-center">
                <h4>4). Langkah 4 (Memilih model peramalan yang tepat berdasarkan MAD (Mean Absolute Deviation) Terkecil)</h4>
            </div>
            <div class="widget-content widget-content-area">

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
                                    <div class="th-content">Index Waktu (t)</div>
                                </th>
                                <th>
                                    <div class="th-content">Permintaan Aktuan (a)</div>
                                </th>
                                <th>
                                    <div class="th-content">Ft MA4</div>
                                </th>
                                <th>
                                    <div class="th-content">Absolute Deviation untul MA4</div>
                                </th>
                                <th>
                                    <div class="th-content">Ft MA5</div>
                                </th>
                                <th>
                                    <div class="th-content">Absolute Deviation untul MA5</div>
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
                                <td>{{($index_1 + $index_2 + $index_3 + $index_4)/4}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4)/4 - 83)}}</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>
                                    <div>

                                        {{$index_6}}
                                    </div>
                                </td>
                                <td>{{($index_2 + $index_3 + $index_4 + $index_5)/4}}</td>
                                <td>{{abs(($index_2 + $index_3 + $index_4 + $index_5)/4 - $index_6)}}</td>
                                <td>{{($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6)}}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>
                                    <div>

                                        {{$index_7}}
                                    </div>
                                </td>
                                <td>{{( $index_3 + $index_4 + $index_5 + $index_6)/4}}</td>
                                <td>{{abs(( $index_3 + $index_4 + $index_5 + $index_6)/4 - $index_7)}}</td>
                                <td>{{($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5}}</td>
                                <td>{{abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7)}}</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>
                                    <div>

                                        {{$index_8}}
                                    </div>
                                </td>
                                <td>{{($index_4 + $index_5 + $index_6 + $index_7)/4}}</td>
                                <td>{{abs(($index_4 + $index_5 + $index_6 + $index_7)/4 - $index_8)}}</td>
                                <td>{{($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5}}</td>
                                <td>{{abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8)}}</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>
                                    <div>

                                        {{$index_9}}
                                    </div>
                                </td>
                                <td>{{($index_5 + $index_6 + $index_7 + $index_8)/4}}</td>
                                <td>{{abs(($index_5 + $index_6 + $index_7 + $index_8)/4 - $index_9)}}</td>
                                <td>{{($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5}}</td>
                                <td>{{abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9)}}</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>
                                    <div>

                                        {{$index_10}}
                                    </div>
                                </td>
                                <td>{{($index_6 + $index_7 + $index_8 + $index_9)/4}}</td>
                                <td>{{abs(($index_6 + $index_7 + $index_8 + $index_9)/4 - $index_10)}}</td>
                                <td>{{($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5}}</td>
                                <td>{{abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)}}</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>
                                    <div>

                                        {{$index_11}}
                                    </div>
                                </td>
                                <td>{{($index_7 + $index_8 + $index_9 + $index_10)/4}}</td>
                                <td>{{abs(($index_7 + $index_8 + $index_9 + $index_10)/4 - $index_11)}}</td>
                                <td>{{($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5}}</td>
                                <td>{{abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)}}</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>
                                    <div>

                                        {{$index_12}}
                                    </div>
                                </td>
                                <td>{{($index_8 + $index_9 + $index_10 + $index_11)/4}}</td>
                                <td>{{abs(($index_8 + $index_9 + $index_10 + $index_11)/4 - $index_12)}}</td>
                                <td>{{($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5}}</td>
                                <td>{{abs(($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5 - $index_12)}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td>MAD = {{
                                   ( (abs(($index_1 + $index_2 + $index_3 + $index_4)/4 - 83)) + 
                                    (abs(($index_2 + $index_3 + $index_4 + $index_5)/4 - $index_6)) +
                                    (abs(($index_3 + $index_4 + $index_5 + $index_6)/4 - $index_7)) +
                                    (abs(($index_4 + $index_5 + $index_6 + $index_7)/4 - $index_8)) +
                                    (abs(($index_5 + $index_6 + $index_7 + $index_8)/4 - $index_9)) +
                                    (abs(($index_6 + $index_7 + $index_8 + $index_9)/4 - $index_10)) +
                                    (abs(($index_7 + $index_8 + $index_9 + $index_10)/4 - $index_11)) +
                                    (abs(($index_8 + $index_9 + $index_10 + $index_11)/4 - $index_12)) ) / 8
                                }}</td>
                                <td></td>
                                <td>MAD = {{
                                  (  (abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6)) + 
                                    (abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7)) +
                                   (abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8)) +
                                   (abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9)) +
                                   (abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)) + 
                                   (abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)) + 
                                    (abs(($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5 - $index_12)) ) / 7
                                }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br>
                Berdasarkan Tabel 1.3, nilai perhitungan Mean Absolute Deviation untuk Moving Average 5 periode lebih disukai karena mempunyai nilai Mean Absolute Deviation lebih kecil dari Mean Absolute Deviation untuk Moving Average 4 periode.
            </div>
        </div>
    </div>
    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-heading d-flex justify-content-between align-items-center">
                <h4>5). Langkah Kelima (Memeriksa keandalan model peramalan yang dipilih berdasarkan peta kontrol tracking signal)</h4>
            </div>
            <div class="widget-content widget-content-area">

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
                                    <div class="th-content">Periode ,n(1)</div>
                                </th>
                                <th>
                                    <div class="th-content">Forecast,f(2)</div>
                                </th>
                                <th>
                                    <div class="th-content">Aktual,A(3)</div>
                                </th>
                                <th>
                                    <div class="th-content">Error,E=A-F,(4)=(3)-(2)</div>
                                </th>
                                <th>
                                    <div class="th-content">RSFE(5) - kumulatif dari (4)</div>
                                </th>
                                <th>
                                    <div class="th-content">Absolute Error (6) = Absolute dari (4)</div>
                                </th>
                                <th>
                                    <div class="th-content">kumulatif Absolute Error (7) = kumulatif dari (6)</div>
                                </th>
                                <th>
                                    <div class="th-content">MAD (8) = (7)/(1)</div>
                                </th>
                                <th>
                                    <div class="th-content">Tracking Signal (9) = (5)/(8)</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5}}</td>
                                <td>
                                    <div>

                                        {{$index_6}}
                                    </div>
                                </td>
                                <td>{{$index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5}}</td>
                                <td>{{$index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6)}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6)}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) / 1}}</td>
                                <td>{{round(($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) / (abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) / 1),2)}}</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>{{($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5}}</td>
                                <td>
                                    <div>

                                        {{$index_7}}
                                    </div>
                                </td>
                                <td>{{$index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5}}</td>
                                <td>{{($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)}}</td>
                                <td>{{abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7)}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7)}}</td>
                                <td>{{(abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7)) / 2}}</td>
                                <td>{{round((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7)) / 2),2)}}</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>{{($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5}}</td>
                                <td>
                                    <div>

                                        {{$index_8}}
                                    </div>
                                </td>
                                <td>{{$index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5}}</td>
                                <td>{{(($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5)}}</td>
                                <td>{{abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8)}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8)}}</td>
                                <td>{{(abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8)) / 3}}</td>
                                <td>{{round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8)) / 3),2)}}</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>{{($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5}}</td>
                                <td>
                                    <div>

                                        {{$index_9}}
                                    </div>
                                </td>
                                <td>{{$index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5}}</td>
                                <td>{{(($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5)}}</td>
                                <td>{{abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9)}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9)}}</td>
                                <td>{{(abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9)) / 4}}</td>
                                <td>{{round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9)) / 4),2)}}</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>{{($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5}}</td>
                                <td>
                                    <div>

                                        {{$index_10}}
                                    </div>
                                </td>
                                <td>{{$index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5}}</td>
                                <td>{{(($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5)}}</td>
                                <td>{{abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)}}</td>
                                <td>{{(abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)) / 5}}</td>
                                <td>{{round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)) / 5),2)}}</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>{{($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5}}</td>
                                <td>
                                    <div>

                                        {{$index_11}}
                                    </div>
                                </td>
                                <td>{{$index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5}}</td>
                                <td>{{(($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5) + ($index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5)}}</td>
                                <td>{{abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)+abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)}}</td>
                                <td>{{(abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)+abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)) / 6}}</td>
                                <td>{{round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5) + ($index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)+abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)) / 6),2)}}</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>{{($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5}}</td>
                                <td>
                                    <div>

                                        {{$index_12}}
                                    </div>
                                </td>
                                <td>{{$index_12 - ($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5}}</td>
                                <td>{{(($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5) + ($index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5) + ($index_12 - ($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5)}}</td>
                                <td>{{abs(($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5 - $index_12)}}</td>
                                <td>{{abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)+abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)+abs(($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5 - $index_12)}}</td>
                                <td>{{(abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)+abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)+abs(($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5 - $index_12)) / 7}}</td>
                                <td>{{round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5) + ($index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5) + ($index_12 - ($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5)/5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6)/5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7)/5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8)/5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9)/5 - $index_10)+abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10)/5 - $index_11)+abs(($index_7 + $index_8 + $index_9 + $index_10 + $index_11)/5 - $index_12)) / 7),2)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br>

            </div>
        </div>
    </div>
    <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-heading d-flex justify-content-between align-items-center">
                <!-- <h4>2). Langkah Kedua (Memilih model peramalan yang sesuai dengan pola data historis permintaan)</h4> -->
            </div>
            <div class="widget-content widget-content-area">
                <?php
                $rataData = ($index_6 + $index_7 + $index_8 + $index_9 + $index_10 + $index_11 + $index_12) / 7;
                $index1 = round(($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) / (abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) / 1), 2);
                $index2 = round((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7)) / 2), 2);
                $index3 = round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8)) / 3), 2);
                $index4 = round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5 - $index_9)) / 4), 2);
                $index5 = round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5 - $index_10)) / 5), 2);
                $index6 = round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5) + ($index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5 - $index_10) + abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10) / 5 - $index_11)) / 6), 2);
                $index7 = round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5) + ($index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10) / 5) + ($index_12 - ($index_7 + $index_8 + $index_9 + $index_10 + $index_11) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5 - $index_10) + abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10) / 5 - $index_11) + abs(($index_7 + $index_8 + $index_9 + $index_10 + $index_11) / 5 - $index_12)) / 7), 2); ?>
                dari perhitungan di atas kita akan membuat peta kontrol tracking signal, dimana dalam sebaran peta kontrol tracking signal terlihat bahwa nilai bergerak tidak melebihi dari ±4. sehingga permintaan ibu Shabrina di bulan Januari 2022 sebesar {{ round($rataData + max($index1,$index2,$index3,$index4,$index5,$index6,$index7) ,0)}} roti bisa digunakan untuk Perhitungan perencanaan produksi roti.
                <br><br>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="">
                        <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @else

    @endif
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" wire:model.defer="state.pa" class="form-control @error('pa') is-invalid @enderror" id="pa" aria-describedby="pa" placeholder="Enter Permintaan Aktuan (a)">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script>
    $(document).ready(function() {
        window.addEventListener('show-chart', event => {
            var index1 = <?= round(($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) / (abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) / 1), 2) ?>;
            var index2 = <?= round((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7)) / 2), 2) ?>;
            var index3 = <?= round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8)) / 3), 2) ?>;
            var index4 = <?= round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5 - $index_9)) / 4), 2) ?>;
            var index5 = <?= round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5 - $index_10)) / 5), 2) ?>;
            var index6 = <?= round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5) + ($index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5 - $index_10) + abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10) / 5 - $index_11)) / 6), 2) ?>;
            var index7 = <?= round(((($index_6 - ($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5) + ($index_7 - ($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5)) + ($index_8 - ($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5) + ($index_9 - ($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5) + ($index_10 - ($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5) + ($index_11 - ($index_6 + $index_7 + $index_8 + $index_9 + $index_10) / 5) + ($index_12 - ($index_7 + $index_8 + $index_9 + $index_10 + $index_11) / 5)) / ((abs(($index_1 + $index_2 + $index_3 + $index_4 + $index_5) / 5 - $index_6) + abs(($index_2 + $index_3 + $index_4 + $index_5 + $index_6) / 5 - $index_7) + abs(($index_3 + $index_4 + $index_5 + $index_6 + $index_7) / 5 - $index_8) + abs(($index_4 + $index_5 + $index_6 + $index_7 + $index_8) / 5 - $index_9) + abs(($index_5 + $index_6 + $index_7 + $index_8 + $index_9) / 5 - $index_10) + abs(($index_6 + $index_7 + $index_8 + $index_9 + $index_10) / 5 - $index_11) + abs(($index_7 + $index_8 + $index_9 + $index_10 + $index_11) / 5 - $index_12)) / 7), 2) ?>;
            // console.log(index1);
            var xValues = [1, 2, 3, 4, 5, 6, 7];
            var yValues = [index1, index2, index3, index4, index5, index6, index7];

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
        })
    });
</script>
@endpush