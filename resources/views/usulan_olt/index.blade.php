@extends('layouts.main')

@section('style')
    {{-- <link rel="stylesheet" href="css/paketKurikulum/style.css">     --}}

@endsection

@section('body')
    @include('sections.cardOpen')
        <div class="row mb-4 mt-2">
            <div class="col-6">
                <h5 class="card-title">Halaman Usulan OLT</h5>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end ">
                    <button class="btn btn-primary me-3" href="/usulan_olt/create" role="button" disabled>Tambahkan Usulan OLT</button>
                </div>
            </div>
        </div>
            {{-- <div style="overflow-y:auto;"> --}}
                <div class="card-text me-3">
                    <table id="example" class="table table-responsive table-hover">
                        <thead class="thead">
                            <tr>
                                <th class="th" scope="col">No.</th>
                                <th class="th" scope="col">Witel</th>
                                <th class="th" scope="col">STO</th>
                                <th class="th" scope="col">Kode STO</th>
                                <th class="th" scope="col">Alamat</th>
                                <th class="th" scope="col">Latitude</th>
                                <th class="th" scope="col">Longitude</th>
                                <th class="th" scope="col">Merk</th>
                                {{-- <th class="th" scope="col">Tipe</th> --}}
                                <th class="th" scope="col">Ready PLN</th>
                                <th class="th" scope="col">Ready Uplink</th>
                                <th class="th" scope="col">Metro</th>
                                <th class="th" scope="col">Jarak STO Terdekat</th>
                                <th class="th" scope="col">Ready SITAC</th>
                                <th class="th" scope="col">Plan Jumlah ODP</th>
                                <th class="th" scope="col">Kebutuhan</th>
                                <th class="th" scope="col">Prioritas</th>
                                {{-- <th class="th" scope="col">Propose Box</th> --}}
                                <th class="th" scope="col">Jadwal Order</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($usulan_olts as $item)
                            <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{$item->witel()->nama_witel}}</td>
                              <td>{{$item->sto()->nama_sto}}</td>
                              <td>{{$item['kode_sto']}}</td>
                              <td>{{$item['alamat']}}</td>
                              <td>{{$item['lat']}}</td>
                              <td>{{$item['long']}}</td>
                              <td>{{$item['merk']}}</td>
                              <td>{{$item['pln']}}</td>
                              <td>{{$item['uplink']}}</td>
                              <td>{{$item['metro']}}</td>
                              <td>{{$item['jarak_sto']}}</td>                              
                              <td>{{$item['sitac']}}</td>
                              <td>{{$item['jml_odp']}}</td>
                              <td>{{$item['kebutuhan']}}</td>
                              <td>{{$item['prioritas']}}</td>
                              <td>{{$item['jadwal_order']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
            {{-- </div> --}}
    @include('sections.cardClose')
@endsection


@section('script')
    {{-- <script type="text/javascript" src="js/paketKurikulum/script.js"></script> --}}
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "pageLength": 5,
                "scrollX" : true,
                fixedHeader: true
            });
        });
    </script>
@endsection