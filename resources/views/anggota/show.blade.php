@extends('layouts.app')

@section('title')
    <title>Detail Anggota</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Detail Anggota
                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        Detail Anggota
                    </div>
                </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td width="15%">NTA</td>
                                    <td width="2%">:</td>
                                    <td width="35%">{{ $anggota->nta }}</td>
                                    <td class="text-center" rowspan="6"><img src="{{asset('storage/'.$anggota->foto)}}" width="80%"/></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $anggota->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan</td>
                                    <td>:</td>
                                    <td>{{ $anggota->gol }}</td>
                                </tr>
                                <tr>
                                    <td>Pangkalan</td>
                                    <td>:</td>
                                    <td>{{ $anggota->pangkalan }}</td>
                                </tr>
                                <tr>
                                    <td>Kwaran</td>
                                    <td>:</td>
                                    <td>{{ $anggota->kwaran }}</td>
                                </tr>
                                <tr>
                                    <td>Kwarcab</td>
                                    <td>:</td>
                                    <td>{{ $anggota->kwarcab }}</td>
                                </tr>
                                <tr>
                                    <td>agama</td>
                                    <td>:</td>
                                    <td colspan="2">{{ $anggota->agama }}</td>
                                </tr>
                                <tr>
                                    <td>Golongan Darah</td>
                                    <td>:</td>
                                    <td colspan="2">{{ $anggota->goldar }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
@endsection