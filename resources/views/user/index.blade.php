@extends('layouts.app')

@section('title')
    <title>Manajemen User</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Manajemen User
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
                    <a href="{{ route('user.create') }}" class="btn btn-info">
                            <i class="metismenu-icon pe-7s-note"></i> Tambah User
                        </a>
                </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-hover">
                            <thead>
                               <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($user as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td><td>
                                                @foreach ($row->getRoleNames() as $role)
                                                <label for="" class="badge badge-info">{{ $role }}</label>
                                                @endforeach
                                            </td>
                                    <td>
                                        <form action="{{ route('user.destroy', $row->id) }}" method="POST">
                                            @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a href="{{ route('user.edit', $row->id) }}" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-sm"><i class="metismenu-icon pe-7s-pen"></i></a>
                                                <button onclick="return confirm('Konfirmasi?')" data-toggle="tooltip" title="Hapus" class="btn btn-danger btn-sm"><i class="metismenu-icon pe-7s-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
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