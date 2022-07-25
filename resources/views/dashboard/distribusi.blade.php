@extends('layouts.main')

@section('style')
    {{-- <link rel="stylesheet" href="css/paketKurikulum/style.css">     --}}
@endsection

@section('body')
    @include('sections.cardOpen')
        <div class="row mb-4 mt-2">
            <div class="col-6">
                <h5 class="card-title">Feeder</h5>
            </div>
            {{-- <div class="col-6">
                <div class="d-flex justify-content-end ">
                    <a class="btn btn-primary me-3" href="/khs/create" role="button">Tambahkan Data</a>
                </div>
            </div> --}}
        </div>
            <div style="overflow-y:auto;">
                <div class="card-text me-3">
                    <table id="example" class="table table-striped">
                        <thead class="thead">
                            <tr>
                                <th class="th" scope="col">WITEL</th>
                                <th class="th" scope="col">LOP</th>
                                <th class="th" scope="col">48</th>
                                <th class="th" scope="col">36</th>
                                <th class="th" scope="col">24</th>
                                <th class="th" scope="col">12</th>
                                <th class="th" scope="col">6</th>
                                <th class="th" scope="col">Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($witels as $witel)
                                <?php
                                    $total48 = 0;
                                    $total36 = 0;
                                    $total24 = 0;
                                    $total12 = 0;
                                    $total6 = 0;

                                    $totalMaterial = 0;
                                    $totalJasa = 0;
                                    $totalHarga = 0;
                                    foreach($khss->where('witel_id', '=', $witel->id) as $khs){
                                        foreach($khsd->where('khs_id', '=', $khs->id) as $khsdd){
                                            if ($khs->witel()->paket == 5) {
                                                $totalMaterial += ($khsdd->designator()->p5_material*$khsdd->jumlah);
                                                $totalJasa += ($khsdd->designator()->p5_jasa*$khsdd->jumlah);
                                            } 
                                            else if ($khs->witel()->paket == 10) {
                                                $totalMaterial += ($khsdd->designator()->p10_material*$khsdd->jumlah);
                                                $totalJasa += ($khsdd->designator()->p10_jasa*$khsdd->jumlah);
                                            }

                                            if($khsdd->designator()->jenis_material == 'kabel'){
                                                if($khsdd->designator()->specs == '48') $total48 += $khsdd->jumlah;
                                                else if($khsdd->designator()->specs == '36') $total36 += $khsdd->jumlah;
                                                else if($khsdd->designator()->specs == '24') $total24 += $khsdd->jumlah;
                                                else if($khsdd->designator()->specs == '12') $total12 += $khsdd->jumlah;
                                                else if($khsdd->designator()->specs == '6') $total6 += $khsdd->jumlah;
                                            }
                                        }
                                    }
                                    $totalHarga = $totalMaterial + $totalHarga;
                                ?>
                            <tr>
                              <td>{{$witel['nama_witel']}}</td>
                              <td>{{$khss->where('witel_id', '=', $witel->id)->count()}}</td>
                              {{-- <td>{{$khsd->where('idkhs', '=', $khss->where('witel_id', '=', $witel->id))->total}} </td> --}}
                              <td>{{$total48}} </td>
                              <td>{{$total36}}</td>
                              <td>{{$total24}}</td>
                              <td>{{$total12}}</td>
                              <td>{{$total6}}</td>
                              <td>Rp {{ number_format($totalHarga, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
    @include('sections.cardClose')
@endsection


@section('script')
    {{-- <script type="text/javascript" src="js/paketKurikulum/script.js"></script> --}}
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "pageLength": 10
            });
        });
    </script>
@endsection