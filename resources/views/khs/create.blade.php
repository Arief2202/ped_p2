@extends('layouts.main')
@if(!isset($_GET['witel']) || $_GET['witel'] == "")
    <?php $_GET['witel'] = "0"; ?>
@endif

@section('style')
    {{-- <link rel="stylesheet" href="css/paketKurikulum/style.css"> --}}
@endsection

@section('body')
    @include('sections.cardOpen')
    <div class="row mb-4 mt-2">
        <div class="col-6">
            <h5 class="card-title">Halaman Create KHS</h5>
        </div>
    </div>
    <div style="max-height: 70vh; overflow-y:auto;">
        <div class="card-text me-3">
            <form action="create" method="POST">@csrf
                @if( $_GET['witel'] == "0" || $_GET['witel'] == "")
                    <?php $foundWitel = false; ?>
                    <div class="alert alert-danger ms-1 me-2" role="alert">
                        Silahkan Pilih Witel Terlebih Dahulu!!!
                    </div>
                @else
                <?php $foundWitel = true; ?>
                @endif

                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <strong><label for="witel" class="form-label">Witel</label></strong>
                        <select class="form-select @if(!$foundWitel) is-invalid @endif"  name="witel_id" id="witelDropDown" required>
                            <option hidden selected disabled value>Pilih Witel</option>
                            @foreach ($witel as $item)
                                <option @if($_GET['witel'] == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nama_witel }}</option>
                            @endforeach
                            {{-- <option value="">Surabaya Timur</option> --}}
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong><label for="sto" class="form-label">STO</label></strong>
                        <select class="form-select"  name="sto_id" id="sto" @if(!$foundWitel) disabled @endif required>
                            <option hidden selected disabled value>Pilih STO</option>
                            @if($foundWitel)
                                @foreach ($sto as $item)
                                    <option @if($_GET['witel'] == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nama_sto }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <strong><label for="inputAddress" class="form-label">ID Project</label></strong>
                    <input type="text" class="form-control" id="inputAddress" name="id_project" placeholder="Ketik disini" required>
                </div>
                <div class="col-12 mb-3">
                    <strong><label for="inputAddress" class="form-label">Program SAP</label></strong>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Ketik disini" name="program_sap" value="OSP" required>
                </div>

                <div class="col-md-12 mb-3">
                    <strong><label class="form-label">Tematik</label></strong>
                        <select class="form-select"  name="tematik" id="" required>
                            <option hidden selected disabled value>Pilih Tematik</option>
                            <option value="Feeder untuk STTF">Feeder untuk STTF</option>
                            <option value="Feeder Kritis (Kapasitas ODP diatas 80%)">Feeder Kritis (Kapasitas ODP diatas 80%)</option>
                            <option value="Pensisteman dan Uplink Mini OLT">Pensisteman dan Uplink Mini OLT</option>
                        </select>
                </div>
                <div class="col-12 mb-3">
                    <strong><label for="inputAddress" class="form-label">Nama LOP FEEDER</label></strong>
                    <input type="text" class="form-control" id="inputAddress" name="nama_lop_feeder" placeholder="Ketik disini" required>
                </div>
                <div class="col-md-12 mb-3">
                    <strong><label class="form-label">Tahun</label></strong>
                        <select class="form-select"  name="tahun" id="" required>
                            <option hidden selected disabled value
                            >Pilih Tahun</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                </div>
                {{-- <div class="col-md-3 mb-3">
                    <strong><label for="inputMonth" class="form-label">Waktu Periode Pengajuan</label></strong>
                    <input type="month" class="form-control" required>
                </div> --}}
                <div class="col-md-3 mb-3">
                    <strong><label class="form-label">Status</label></strong>
                        <select class="form-select"  name="status" id="" required>
                            <option hidden selected disabled value>Pilih Status</option>
                            <option value="Design">Design</option>
                            <option value="Survey">Survey</option>
                            <option value="Installasi">Installasi</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                </div>
                <div class="col-12 mb-3">
                    <strong><label for="inputAddress" class="form-label">Kebutuhan</label></strong>
                    <input type="text" class="form-control" id="inputAddress" name="kebutuhan" placeholder="Ketik disini" required>
                </div>
                <br>
                <hr>
                <br>
                <div class="row mb-3">
                    <div class="col">
                        <h5 class="card-title">Plan RAB</h5>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a class="btn btn-primary me-3" href="/khs/create" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Data</a>
                    </div>
                </div>
                <table id="create-designator" class="table table-responsive table-hover">
                    <thead class="thead">
                        <tr>
                            <th class="th" scope="col">No.</th>
                            <th class="th" scope="col">Designator</th>
                            <th class="th" scope="col">Deskripsi</th>
                            <th class="th" scope="col">Satuan</th>
                            <th class="th" scope="col">Paket 5 Material</th>
                            <th class="th" scope="col">Paket 5 Jasa</th>
                            <th class="th" scope="col">Paket 10 Material</th>
                            <th class="th" scope="col">Paket 10 Jasa</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($designator as $designator)
                        <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{$designator['designator']}}</td>
                          <td>{{$designator['deskripsi']}}</td>
                          <td>{{$designator['satuan']}}</td>
                          <td>Rp. {{number_format($designator['p5_material'], 0, ',', '.')}},-</td>
                          <td>Rp. {{number_format($designator['p5_jasa'], 0, ',', '.')}},-</td>
                          <td>Rp. {{number_format($designator['p10_material'], 0, ',', '.')}},-</td>
                          <td>Rp. {{number_format($designator['p10_jasa'], 0, ',', '.')}},-</td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>  

                {{-- Modal Input Designator --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Designator</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col col-md-9">
                                @foreach($designator as $item)
                                  <div class="form-check">
                                    <div style="" class="checkbox">
                                    <label for="checkbox" class="form-check-label ">
                                      <div class="inputGroup">
                                        <strong><input type="checkbox" name="designator[]" value="{{ $item->designatorid }}">  {{ $item->designator }}
                                        </strong><br> <p style="font-size: 0.85rem">{{ $item->deskripsi }}</p>
                                        <label for="numberInput">Jumlah Item</label>
                                        <input style="width: 5vw;" class="px-2" type="number">
                                    </div>  
                                    </label>
                                    </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                    </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <input type="submit" class="btn btn-primary" value="submit">
                        </div>
                      </div>
                    </div>
                  </div>


                <input id="btn-sa" class="btn btn-success" type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#witel').on('change', function() {
                var witelID = $(this).val();
                if (witelID) {
                    $.ajax({
                        url: '/getSTO/' + witelID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                $('#sto').empty();
                                $('#sto').append('<option hidden>Pilih STO</option>');
                                $.each(data, function(key, sto) {
                                    $('select[name="sto_id"]').append(
                                        '<option value="' + sto.sto_id + '">' +
                                        sto.nama + '</option>');
                                });
                            } else {
                                $('#sto').empty();
                            }
                        }
                    });
                } else {
                    $('#sto').empty();
                }
            });
        });
    </script> --}}

    @include('sections.cardClose')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#witelDropDown").change(function() {
                var witel = $(this).find(":selected").val();
                window.location.replace("https://telkom-ped.com/khs/create?witel="+witel);
            }) 
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#create-designator').DataTable({
                "pageLength": 5,
                "scrollX" : true,
            });
        });
    </script>
@endsection
