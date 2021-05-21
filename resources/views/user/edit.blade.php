@extends('layouts.app')

@section('title')
    <title>Ubah Password</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-id icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Ubah Password
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
                        Form Edit
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
                    <form action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        @method('put')
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nama">Password Lama</label>
                            <div class="col-sm-10"><input placeholder="Masukan Password Lama" type="password" name="old_password" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nama">Password Baru</label>
                            <div class="col-sm-10"><input placeholder="Masukan Password Baru" type="password" name="password" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nama">Konfirmasi Password Baru</label>
                            <div class="col-sm-10"><input placeholder="Masukan Konfirmasi Password Baru" type="password" name="password_confirmation" class="form-control">
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
