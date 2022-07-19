@extends('layouts.main')

@section('style')
    {{-- <link rel="stylesheet" href="css/paketKurikulum/style.css">     --}}
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
                                <th class="th" scope="col">Program SAP</th>
                                <th class="th" scope="col">Tematik</th>
                                <th class="th" scope="col">Nama LOP Feeder</th>
                                <th class="th" scope="col">Tahun</th>
                                <th class="th" scope="col">Designator</th>
                                <th class="th" scope="col">Total Material</th>
                                <th class="th" scope="col">Total Jasa</th>
                                <th class="th" scope="col">Total</th>
                                <th class="th" scope="col">Status</th>
                                <th class="th" scope="col">Kebutuhan</th>
                                <th class="th" scope="col">Keterangan</th>
                                <th class="th" scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($khs as $khs)
                            <tr>
                              <th scope="row">{{ $loop->iteration }}</th>
                              <td>{{$khs->witel()->nama_witel}}</td>
                              <td>{{$khs->sto()->nama_sto}}</td>
                              <td>{{$khs['id_project']}}</td>
                              <td>{{$khs['program_sap']}}</td>
                              <td>{{$khs['tematik']}}</td>
                              <td>{{$khs['nama_lop_feeder']}}</td>
                              <td>{{$khs['tahun']}}</td>
                              <td><button style="background: transparent;border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-show tableAction ms-4 me-4'></i></button></td>
                              <td>Rp. 0</td>
                              <td>Rp. 0</td>
                              <td>Rp. 0</td>
                              <td>{{$khs['status']}}</td>
                              <td>{{$khs['kebutuhan']}}</td>
                              <td>{{$khs['keterangan']}}</td>
                              <td><button style="background: transparent;border:none;"><i class='bx bx-edit tableAction'></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
            {{-- </div> --}}


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Designator</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col col-md-9">
                            @foreach($designators as $item)
                              <div class="form-check">
                                <div style="" class="checkbox">
                                <label for="checkbox1" class="form-check-label ">
                                  <div class="inputGroup">
                                    <strong><input type="checkbox" name="designator[]" value="{{ $item->designatorid }}">  {{ $item->designator }}
                                    </strong><br>{{ $item->deskripsi }}
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
                      <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
    @include('sections.cardClose')
@endsection


@section('script')
    {{-- <script type="text/javascript" src="js/paketKurikulum/script.js"></script> --}}
    <script>
        $(document).ready(function () {
            $('#khs-table').DataTable({
                "pageLength": 5,
                "scrollX" : true
            });
        });
    </script>
@endsection