@extends('layouts.app')

@section('title')
    <title>Tambah User</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Tambah User
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
                        Form Input
                    </div>
                </div>
            <div class="card-body">
                <div class="tab-content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        @method('post')
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-10"><input type="text" name="name" value="{{ old('name') }}" placeholder="Masukan Nama" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nama">Email</label>
                            <div class="col-sm-10"><input type="email" name="email" value="{{ old('email') }}" placeholder="Masukan Email" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="">Role</label>
                            <div class="col-sm-10">
                                <div>
                                    <div class="custom-radio custom-control custom-control-inline"><input type="radio" id="admin" Value="admin" name="role" class="custom-control-input"><label class="custom-control-label"
                                        for="admin">Admin</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nama">Password</label>
                            <div class="col-sm-10"><input type="password" name="password" value="{{ old('password') }}" placeholder="Masukan Password" class="form-control">
                                </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm">
                                <i class="pe-7s-paper-plane"></i> Simpan
                            </button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>        
@endsection