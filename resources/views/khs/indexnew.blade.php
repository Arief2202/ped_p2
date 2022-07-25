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
        <table id="khs-table" class="table table-responsive table-hover" style="width: 100%">
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
                    <th class="th" scope="col">Aksi</th>
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
                        <td><button style="background: transparent;border:none;" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class='bx bx-show tableAction ms-4 me-4'></i></button>
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
                        <td><button style="background: transparent;border:none;"><i
                                    class='bx bx-edit tableAction'></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- </div> --}}


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Designator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        @foreach ($khsd->where('khs_id', '=', $khs->id) as $item)
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
                <table class="body-wrap mt-5">
                    <tbody><tr>
                        <td></td>
                        <td class="container">
                            <div class="content">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td class="content-wrap aligncenter">
                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                <tbody><tr>
                                                    <td class="text-center content-block">
                                                        <h3 class="mt-2">Invoice Designator</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice">
                                                            <tbody><tr>
                                                                <td>{{ $khs->witel()->nama_witel }}<br>ID Project<i>#{{ $khs['id_project'] }}</i><br>{{ (new dateTime($khs['periode_pengajuan']))->format('F Y') }} <br><br></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                        @foreach ($khsd->where('khs_id', '=', $khs->id) as $item)
                                                                        <tr>
                                                                            <td>{{ $item->designator()->designator }}</td>
                                                                            <td class="alignright">$ 20.00</td>
                                                                        </tr>
                                                                        @endforeach
                                                                        <tr class="total">
                                                                            <td class="alignright" width="80%">Total</td>
                                                                            <td class="alignright">$ 36.00</td>
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
                                {{-- <div class="footer">
                                    <table width="100%">
                                        <tbody><tr>
                                            <td class="aligncenter content-block">Report problem? Email <a href="mailto:">telkom@telkom-ped.co.id</a></td>
                                        </tr>
                                    </tbody></table>
                                </div> --}}
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </tbody></table>
            </div>
        </div>
    </div>
    @include('sections.cardClose')
@endsection


@section('script')
    {{-- <script type="text/javascript" src="js/paketKurikulum/script.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#khs-table').DataTable({
                "pageLength": 10,
                "scrollX": true
            });
        });
    </script>
@endsection
