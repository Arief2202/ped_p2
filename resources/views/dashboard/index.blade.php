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
                                <th class="th" scope="col">288</th>
                                <th class="th" scope="col">144</th>
                                <th class="th" scope="col">96</th>
                                <th class="th" scope="col">Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($witels as $witel)
                            <tr>
                              <td>{{$witel['nama_witel']}}</td>
                              <td>{{$khss->where('witel_id', '=', $witel->id)->count()}}</td>
                              {{-- <td>{{$khsd->where('idkhs', '=', $khss->where('witel_id', '=', $witel->id))->total}} </td> --}}
                              <td>{{$khss->where('witel_id', '=', $witel->id)->count()}} </td>
                              <td>{{$khss->where('witel_id', '=', $witel->id)->count()}}</td>
                              <td>{{$khss->where('witel_id', '=', $witel->id)->count()}}</td>
                              <td> </td>
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