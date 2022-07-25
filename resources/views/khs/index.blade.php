@extends('layouts.main')

@section('style')
    {{-- <link rel="stylesheet" href="css/paketKurikulum/style.css"> --}}
    <link rel="stylesheet" href="http://{{$_SERVER['HTTP_HOST']}}/css/invoice.css">
@endsection

@section('body')
    @include('sections.cardOpen')
    <div class="row mb-4 mt-2">
        <div class="col-6">
            <h5 class="card-title">Halaman KHS</h5>
        </div>
        <div class="col-6">
            <div class="d-flex justify-content-end ">
                <a class="btn btn-primary me-3" href="/khs/create" role="button">Tambahkan Data</a>
            </div>
        </div>
    </div>
    {{-- <div style="overflow-y:auto;"> --}}
    <div class="card-text me-3">
        <table id="khs-table" class="table table-responsive table-hover">
            <thead class="thead">
                <tr>
                    <th class="th" scope="col">No.</th>
                    <th class="th" scope="col">WITEL</th>
                    <th class="th" scope="col">STO</th>
                    <th class="th" scope="col">ID Project</th>
                    {{-- <th class="th" scope="col">Program SAP</th> --}}
                    <th class="th" scope="col">Tematik</th>
                    <th class="th" scope="col">Nama LOP Feeder</th>
                    <th class="th" scope="col">Periode Pengajuan</th>
                    <th class="th" scope="col">Designator</th>
                    <th class="th" scope="col">Total Material</th>
                    <th class="th" scope="col">Total Jasa</th>
                    <th class="th" scope="col">Total</th>
                    <th class="th" scope="col">Status</th>
                    <th class="th" scope="col">Kebutuhan</th>
                    {{-- <th class="th" scope="col">Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($khs as $khs)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $khs->witel()->nama_witel }}</td>
                        <td>{{ $khs->sto()->nama_sto }}</td>
                        <td>{{ $khs['id_project'] }}</td>
                        {{-- <td>{{$khs['program_sap']}}</td> --}}
                        <td>{{ $khs['tematik'] }}</td>
                        <td>{{ $khs['nama_lop_feeder'] }}</td>
                        <td>{{ (new dateTime($khs['periode_pengajuan']))->format('F Y') }}</td>
                        <td><a style="background: transparent;border:none;" href="/khs?khs_id={{$khs->id}}"><i class='bx bx-show tableAction ms-4 me-4'></i></a>
                        </td>
                        <?php
                        $totalMaterial = 0;
                        $totalJasa = 0;
                        $total = 0;
                        foreach ($khsd->where('khs_id', '=', $khs->id) as $des) {
                            if ($khs->witel()->paket == 5) {
                                $totalMaterial += ($des->designator()->p5_material*$des->jumlah);
                                $totalJasa += ($des->designator()->p5_jasa*$des->jumlah);
                            } elseif ($khs->witel()->paket == 10) {
                                $totalMaterial += ($des->designator()->p10_material*$des->jumlah);
                                $totalJasa += ($des->designator()->p10_jasa*$des->jumlah);
                            }
                        }
                        $total = $totalMaterial + $totalJasa;
                        ?>
                        <td>Rp {{ number_format($totalMaterial, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($totalJasa, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                        <td>{{ $khs['status'] }}</td>
                        <td>{{ $khs['kebutuhan'] }}</td>
                        {{-- <td><button style="background: transparent;border:none;"><i
                                    class='bx bx-edit tableAction'></i></button></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- </div> --}}


    @if(isset($_GET['khs_id']))
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg modal-dialog-scrollable" >
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Designator</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            @foreach ($khsd->where('khs_id', '=', $_GET['khs_id']) as $item)
                                <div class="p-2 pt-3 mt-3 checkbox-form" style="background-color:#eef1fa; border-radius:10px;">
                                    <label>
                                        <strong class="px-3">
                                            {{ $item->designator()->designator }}
                                        </strong>
                                        <p class="px-3">{{ $item->designator()->deskripsi }}</p>
                                    </label>
                                </div> 
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div> --}}

                    <button type="button" class="btn-close position-absolute top-0 end-0 m-4" data-bs-dismiss="modal" aria-label="Close"></button>
                <table style="overflow: scroll; display:block; width:100%;" class="body-wrap mt-5">
                    <tbody><tr>
                        <td></td>
                        <td class="container">
                            <div class="content">
                                <table class="main" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td class="content-wrap aligncenter">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td class="text-center content-block">
                                                        <h4 class="mt-2">Invoice Designator</h4>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice">
                                                            <tbody>
                                                            <tr>
                                                                <?php
                                                                 $invoice_khs=$khs->where('id', '=', $_GET['khs_id'])->first();
                                                                //  dd($invoice_khs->witel()->nama_witel);
                                                                ?>
                                                                <td>{{$invoice_khs->witel()->nama_witel }}<br><strong>ID Project #{{ $invoice_khs['id_project'] }}</strong><br>{{ (new dateTime($invoice_khs['periode_pengajuan']))->format('F Y') }} <br><br></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                        <thead>
                                                                            <tr class="table-primary">
                                                                            <th style="width: 60%">Designator</th>
                                                                            <th class="aligncenter">Jumlah</th>
                                                                            <th class="aligncenter">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <?php
                                                                        $totalMaterial = 0;
                                                                        $totalJasa = 0;
                                                                        $total = 0;
                                                                        foreach ($khsd->where('khs_id', '=', $_GET['khs_id']) as $des) {
                                                                            if ($khs->witel()->paket == 5) {
                                                                                $totalMaterial += ($des->designator()->p5_material*$des->jumlah);
                                                                                $totalJasa += ($des->designator()->p5_jasa*$des->jumlah);
                                                                            } elseif ($khs->witel()->paket == 10) {
                                                                                $totalMaterial += ($des->designator()->p10_material*$des->jumlah);
                                                                                $totalJasa += ($des->designator()->p10_jasa*$des->jumlah);
                                                                            }
                                                                        }
                                                                        $total = $totalMaterial + $totalJasa;
                                                                        ?>
                                                                        <tbody>
                                                                        {{-- @if($request->designator) --}}
                                                                        @foreach ($khsd->where('khs_id', '=', $_GET['khs_id']) as $item)
                                                                        <tr>
                                                                            <?php    
                                                                                $totalDes = 0;
                                                                                if($item->khs()->witel()->paket == 10){
                                                                                    $totalDes = $item->designator()->p10_jasa*$item->jumlah + $item->designator()->p10_material*$item->jumlah;
                                                                                }   
                                                                                else if($item->khs()->witel()->paket == 5){
                                                                                    $totalDes = $item->designator()->p5_jasa*$item->jumlah + $item->designator()->p5_material*$item->jumlah;
                                                                                }
                                                                            ?>
                                                                            <td>
                                                                                <div class="row">
                                                                                    <b>{{ $item->designator()->designator}}</b>
                                                                                </div>
                                                                                <div class="row ms-1 me-2" style="font-size: 0.8rem">
                                                                                    {{$item->designator()->deskripsi}}
                                                                                </div>
                                                                            </td>
                                                                            <td class="aligncenter">{{$item->jumlah}}</td>
                                                                            <td class="alignright me-3"><div class="me-3">Rp. {{number_format($totalDes, 0, ',', '.')}}</div></td>
                                                                            {{-- <td>Rp. {{/*number_format(($paket == 5 ? $item->p5_jasa + $item->p5_material : $item->p10_jasa + $item->p10_material), 0, ',', '.')*/}}</td> --}}
                                                                        </tr>
                                                                        @endforeach
                                                                        {{-- @endif --}}
                                                                        <tr class="total">
                                                                            <td class="alignright">Total&nbsp;</td>
                                                                            <td>
                                                                            <td class="alignright me-3"><div class="me-3">Rp. {{ number_format($total, 0, ',', '.') }}</div></td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center content-block">
                                                        <p style="color: grey">Development & Service Telkom Regional V Surabaya</p>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                </div>
            </div>
        </div>
    @endif
    @include('sections.cardClose')
@endsection


@section('script')
    {{-- <script type="text/javascript" src="js/paketKurikulum/script.js"></script> --}}
    @if(isset($_GET['khs_id']))
        <?php
        echo '
            <script>
            $(window).on(\'load\',function(){$(\'#exampleModal\').modal(\'show\');});
            
            </script>
        ';
        ?>            
    @endif   
    <script>
        
        // $('#exampleModal').on('show.bs.modal', function () {
        //     updateValue();
        // });
        $('#exampleModal').on('hidden.bs.modal', function () {
            window.location.replace('/khs');
        });
        
        $(document).ready(function() {
            $('#khs-table').DataTable({
                "pageLength": 10,
                "scrollX": true,
                // "autoWidth": true,
                // "columnDefs": [
                //     { "width": "2000px"}
                // ],
            });
        });
    </script>
@endsection
