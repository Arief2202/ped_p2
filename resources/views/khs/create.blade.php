@extends('layouts.main')

@if($request->modal_witel != NULL)
    <?php 
        $foundWitel = true;
        $request->witel=$request->modal_witel;
        $paket = $witel->where('id', '=', $request->modal_witel)->first()->paket;
    ?>
@elseif($request->witel != NULL)
    <?php 
        $foundWitel = true;
        $paket = $witel->where('id', '=', $request->witel)->first()->paket;
    ?>
@else
    <?php 
        $foundWitel = false;
        $request->witel=0; 
        $paket = null;
    ?>
@endif
<?php $total = 0; ?>
{{-- @dd($request->witel) --}}

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
            <form action="create/submit" method="POST">@csrf
                @if(!$foundWitel)
                    <div class="alert alert-danger ms-1 me-2" role="alert">
                        Silahkan Pilih Witel Terlebih Dahulu!!!
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <strong><label for="witel" class="form-label">Witel</label></strong>
                        <select class="form-select @if(!$foundWitel) is-invalid @endif"  name="witel_id" id="witelDropDown" required>
                            <option hidden selected disabled value>Pilih Witel</option>
                            @foreach ($witel as $item)
                                <option @if($request->witel == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nama_witel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <strong><label for="sto" class="form-label">STO</label></strong>
                        <select class="form-select"  name="sto_id" id="sto" @if(!$foundWitel) disabled @endif required>
                            <option hidden selected disabled value>Pilih STO</option>
                            @if($foundWitel)
                                @foreach ($sto as $item)
                                    <option @if($request->modal_sto == $item->id) selected @endif value="{{ $item->id }}">{{ $item->nama_sto }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <strong><label for="id_project" class="form-label">ID Project</label></strong>
                        <input type="text" class="form-control" id="id_project" name="id_project" @if($request->modal_id_project)value="{{$request->modal_id_project}}"@endif placeholder="Ketik disini" required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <strong><label class="form-label">Tematik</label></strong>
                        <select class="form-select"  name="tematik" id="tematik" required>
                            <option hidden selected disabled value>Pilih Tematik</option>
                            <option @if($request->modal_tematik == "Feeder untuk STTF") selected @endif value="Feeder untuk STTF">Feeder untuk STTF</option>
                            <option @if($request->modal_tematik == "Feeder Kritis (Kapasitas ODP diatas 80%)") selected @endif value="Feeder Kritis (Kapasitas ODP diatas 80%)">Feeder Kritis (Kapasitas ODP diatas 80%)</option>
                            <option @if($request->modal_tematik == "Pensisteman dan Uplink Mini OLT") selected @endif value="Pensisteman dan Uplink Mini OLT">Pensisteman dan Uplink Mini OLT</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <strong><label for="nama_lop_feeder" class="form-label">Nama LOP FEEDER</label></strong>
                        <input type="text" class="form-control" id="nama_lop_feeder" name="nama_lop_feeder" placeholder="Ketik disini" @if($request->modal_nama_lop_feeder)value="{{$request->modal_nama_lop_feeder}}"@endif required>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <strong><label for="periode_pengajuan" class="form-label">Waktu Periode Pengajuan</label></strong>
                        <input type="month" class="form-control" max="{{date('Y-m')}}" id="periode_pengajuan" name="periode_pengajuan"  onfocus="this.showPicker()" @if($request->modal_periode_pengajuan)value="{{$request->modal_periode_pengajuan}}"@endif required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <strong><label class="form-label">Status</label></strong>
                            <select class="form-select"  name="status" id="status" required>
                                <option hidden selected disabled value>Pilih Status</option>
                                <option @if($request->modal_status == "Design") selected @endif value="Design">Design</option>
                                <option @if($request->modal_status == "Survey") selected @endif value="Survey">Survey</option>
                                <option @if($request->modal_status == "Installasi") selected @endif value="Installasi">Installasi</option>
                                <option @if($request->modal_status == "Selesai") selected @endif value="Selesai">Selesai</option>
                            </select>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <strong><label for="kebutuhan" class="form-label">Kebutuhan</label></strong>
                        <input type="text" class="form-control" id="kebutuhan" name="kebutuhan" placeholder="Ketik disini" @if($request->modal_kebutuhan)value="{{$request->modal_kebutuhan}}"@endif required>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col">
                        <h5 class="card-title">Plan RAB</h5>
                    </div>
                    @if($foundWitel) 
                        <div class="col d-flex justify-content-end">
                            <a class="btn btn-primary me-3" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Data</a>
                        </div>
                    @else
                        <div class="col d-flex justify-content-end">
                            <button class="btn btn-primary me-3" disabled>Tambahkan Data</button>
                        </div>
                    @endif 
                </div>
                
                <div style="max-height: 70vh; overflow-y:auto;">
                    <div class="card-text me-3">
                        <table style="width: 100%" id="tableDesignator" class="table table-responsive table-hover">
                            <thead class="thead">
                                <tr>
                                    <th class="th" scope="col">No.</th>
                                    <th class="th" scope="col">Designator</th>
                                    <th class="th" scope="col">Deskripsi</th>
                                    <th class="th" scope="col">Jumlah</th>
                                    <th class="th" scope="col">Satuan</th>
                                    <th class="th" scope="col">Harga Material</th>
                                    <th class="th" scope="col">Harga Jasa</th>
                                    <th class="th" scope="col">Harga Total</th>
                              </tr>
                            </thead>
                            <tbody id="tableDesignatorr">    
                                @if($request->designator)
                                    @foreach($request->designator as $itemDesignator)
                                        <?php                                             
                                            $item = $designator->where('id', '=', $itemDesignator)->first();
                                            $total += ($paket == 5 ? $item->p5_jasa + $item->p5_material : $item->p10_jasa + $item->p10_material);
                                        ?>
                                        
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$item->designator}}</td>
                                            <td>{{$item->deskripsi}}</td>
                                            <td><input style="width: 6vw;" class="inputCount px-2" onchange="changePrice({{$loop->index}})" id="count{{$loop->index}}" name="count[]" type="number" value="1" min="1"></td>
                                            <td>{{$item->satuan}}</td>
                                            <td><p class="outputMaterial" id="material{{$loop->index}}" style="display:inline">Rp {{number_format(($paket == 5 ? $item->p5_material : $item->p10_material), 0, ',', '.')}}</p></td>
                                            <td><p class="outputJasa" id="jasa{{$loop->index}}" style="display:inline">Rp {{number_format(($paket == 5 ? $item->p5_jasa : $item->p10_jasa), 0, ',', '.')}}</p></td>
                                            <td><p class="outputTotal" id="total{{$loop->index}}" style="display:inline">Rp {{number_format(($paket == 5 ? $item->p5_jasa + $item->p5_material : $item->p10_jasa + $item->p10_material), 0, ',', '.')}}</p></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>  
                    </div>
                </div>
                <div class="row me-2 mt-2">
                    <div class="col d-flex justify-content-end">      
                        <h4 style="background-color: rgba(255, 255, 0, 0.526); padding:5px; border-radius:10px;">
                            <b>Total :</b> 
                            <p id="totalAll" style="display:inline">
                                Rp {{number_format($total, 0, ',', '.')}}
                            </p>
                        </h4>
                    </div>
                </div>
                  
                @if($request->designator)
                    @foreach($request->designator as $item)
                        <input type="hidden" name="designator[]" value="{{$item}}">
                    @endforeach
                @endif
                <div class="row me-2 mt-2">
                    <div class="col d-flex justify-content-end">
                        <input id="btn-sa" class="btn btn-success" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('sections.cardClose')

    {{-- Modal Input Designator --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">            
            <form action="create" method="post" id="add_designator">@csrf
                <input type="hidden" name="modal_witel" id="modal_witel" value="">
                <input type="hidden" name="modal_sto" id="modal_sto" value="">
                <input type="hidden" name="modal_id_project" id="modal_id_project" value="">
                <input type="hidden" name="modal_tematik" id="modal_tematik" value="">
                <input type="hidden" name="modal_nama_lop_feeder" id="modal_nama_lop_feeder" value="">
                <input type="hidden" name="modal_periode_pengajuan" id="modal_periode_pengajuan" value="">
                <input type="hidden" name="modal_status" id="modal_status" value="">
                <input type="hidden" name="modal_kebutuhan" id="modal_kebutuhan" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Designator</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="col">
                            <div class="inputGroup">
                        {{-- <label for="search">Search</label> --}}
                        {{-- <input type="text" value="" name="searchColumn" id="searchColumn"/> --}}

                                {{-- <div class="control">
                                    <input class="input" type="text" placeholder="Search" id="search" />
                                    <span class="icon is-small is-left">
                                    <span class="searchIcon"></span>
                                    </span>
                                </div> --}}
                            </div>
                            {{-- <hr> --}}

                            @if($request->designator)
                                @foreach($designator as $item)
                                    @foreach($request->designator as $itemDesignator)
                                        @if($item->id == $itemDesignator)
                                            <div class="p-2 pt-3 checkbox-form" style="background-color:#eef1fa; border-radius:10px;">
                                                <label>
                                                    <strong class="px-3">
                                                        <input class="checkbox" type="checkbox" name="designator[]" value="{{ $item->id }}" checked>
                                                        <i class="fa fa-2x icon-checkbox"></i> &nbsp;&nbsp; {{ $item->designator }}
                                                    </strong>
                                                    <p class="px-4 ms-3">{{ $item->deskripsi }}</p>
                                                </label>
                                            </div>  
                                            <hr>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endif
                            
                            
                            @foreach($designator as $item)
                                <?php $show = true ?>
                                @if($request->designator)
                                    @foreach($request->designator as $itemDesignator)
                                        @if($item->id == $itemDesignator)
                                        <?php $show = false ?>
                                        @endif
                                    @endforeach
                                @endif

                                @if($show)
                                    <div class="p-2 pt-3 checkbox-form" style="background-color:#eef1fa; border-radius:10px;">
                                        <label>
                                            <strong class="px-3">
                                                <input class="checkbox" type="checkbox" name="designator[]" value="{{ $item->id }}">
                                                <i class="fa fa-2x icon-checkbox"></i> &nbsp;&nbsp; {{ $item->designator }}
                                            </strong>
                                            <p class="px-4 ms-3">{{ $item->deskripsi }}</p>
                                        </label>
                                    </div>  
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="submit">
                    </div>                
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">        
        $(document).ready(function(){
                $("#witelDropDown").change(function() {
                    var witel = $(this).find(":selected").val();
                    document.getElementById('witelDropDown').value = witel;
                    updateValue();
                    document.getElementById('add_designator').submit();
                });
        });        
        
        $('#exampleModal').on('show.bs.modal', function () {
            updateValue();
        });
        $('#exampleModal').on('hidden.bs.modal', function () {
            document.getElementById('add_designator').submit();
        });

        function updateValue(){
            var witel = document.getElementById('witelDropDown').value;
            var sto = document.getElementById('sto').value;
            var id_project = document.getElementById('id_project').value;
            var tematik = document.getElementById('tematik').value;
            var nama_lop_feeder = document.getElementById('nama_lop_feeder').value;
            var periode_pengajuan = document.getElementById('periode_pengajuan').value;
            var status = document.getElementById('status').value;
            var kebutuhan = document.getElementById('kebutuhan').value;
            document.getElementById('modal_witel').value = witel;
            document.getElementById('modal_sto').value = sto;
            document.getElementById('modal_id_project').value = id_project;
            document.getElementById('modal_tematik').value = tematik;
            document.getElementById('modal_nama_lop_feeder').value = nama_lop_feeder;
            document.getElementById('modal_periode_pengajuan').value = periode_pengajuan;
            document.getElementById('modal_status').value = status;
            document.getElementById('modal_kebutuhan').value = kebutuhan;
        } 
    </script>

    {{-- search1 --}}
    {{-- <script>
        $(document).on("input", "#searchColumn", function(){
            var v = $(this).val();
            var elem = $( "input[value*='"+ v +"']" );
            if(elem.val() ){
                elem.show();
            $(":checkbox").not(elem).hide();
            }else{
                $(":checkbox").hide()
            }
        });
    </script> --}}

    {{-- <script>
    $(document).ready(function(){
        var list = $("ul");
        var unorderedList = list.children();

        list.on("click", ":checkbox", function() {
            var i = document.createDocumentFragment();
            var checked = document.createDocumentFragment();
            var unchecked = document.createDocumentFragment();

            for (i = 0; i < unorderedList.length; i++) {
                if (unorderedList[i].getElementsByTagName("input")[0].checked) {
                    checked.appendChild(unorderedList[i]);
                    unorderedList[i].style.backgroundColor = "red";
                } else {
                    unchecked.appendChild(unorderedList[i]);
                    unorderedList[i].style.backgroundColor = "white";
                }
            }
            list.append(checked).append(unchecked);
        })
    });
    </script> --}}

    <script>
        $(document).ready(function () {
            $('#tableDesignator').DataTable({
                "pageLength": 10,
                "scrollX" : true
            });

            @if($request->designator)
                let inputCount = document.getElementsByClassName('inputCount');
                let outputJasa = document.getElementsByClassName('outputJasa');
                let outputMaterial = document.getElementsByClassName('outputMaterial');
                let outputTotal = document.getElementsByClassName('outputTotal');
                var priceMaterial = [];
                var priceJasa = [];
                var priceTotal = [];
                @foreach($request->designator as $des)
                    <?php $item = $designator->where('id', '=', $des)->first(); ?>
                    priceMaterial[{{$loop->index}}] = {{($paket == 5 ? $item->p5_material : $item->p10_material)}};
                    priceJasa[{{$loop->index}}] = {{($paket == 5 ? $item->p5_jasa : $item->p10_jasa)}};
                    priceTotal[{{$loop->index}}] = priceMaterial[{{$loop->index}}] + priceJasa[{{$loop->index}}];
                @endforeach

                var formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'idr',
                    maximumFractionDigits: 0,
                });

                @foreach($request->designator as $des)
                    <?php $item = $designator->where('id', '=', $des)->first(); ?>
                        inputCount[{{$loop->index}}].addEventListener('input', function(event) {
                        priceMaterial[{{$loop->index}}] = {{($paket == 5 ? $item->p5_material : $item->p10_material)}}*event.target.value;
                        priceJasa[{{$loop->index}}] = {{($paket == 5 ? $item->p5_jasa : $item->p10_jasa)}}*event.target.value;
                        priceTotal[{{$loop->index}}] = priceMaterial[{{$loop->index}}] + priceJasa[{{$loop->index}}];
                        outputMaterial[{{$loop->index}}].innerText = formatter.format(priceMaterial[{{$loop->index}}]);
                        outputJasa[{{$loop->index}}].innerText = formatter.format(priceJasa[{{$loop->index}}]);
                        outputTotal[{{$loop->index}}].innerText = formatter.format(priceTotal[{{$loop->index}}]);

                        var totalAll = 0;
                        for(var a = 0; inputCount[a]; a++){
                            totalAll = totalAll + priceTotal[a];
                        }
                        document.getElementById('totalAll').innerText = formatter.format(totalAll);

                    });
                @endforeach
            @endif
                
        });
    </script>
@endsection
