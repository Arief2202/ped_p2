@extends('layouts.main')

@section('style')
    {{-- <link rel="stylesheet" href="css/paketKurikulum/style.css">     --}}

@endsection

@section('body')
    @include('sections.cardOpen')
        <div class="row mb-4 mt-2">
            <div class="col-6">
                <h5 class="card-title">Halaman Designator</h5>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end ">
                    <button class="btn btn-primary me-3" href="/khs/designator/create" role="button" disabled>Tambahkan Designator</button>
                </div>
            </div>
        </div>
            {{-- <div style="overflow-y:auto;"> --}}
                <div class="card-text me-3">
                    <table id="example" class="table table-responsive table-hover">
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
                            @foreach($designators as $designator)
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