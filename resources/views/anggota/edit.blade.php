@extends('layouts.app')

@section('title')
    <title>Edit Anggota</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Edit Anggota
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
                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            Form Edit
                    </div>
                </div>
            <div class="card-body">
                <div class="tab-content">
                <form action="{{ route('anggota.update', $anggota->id) }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        @method('put')
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nama">NTA</label>
                            <div class="col-sm-10"><input type="text" placeholder="Masukan NTA" name="nta" value="{{ $anggota->nta }}" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nominal">Nama</label>
                            <div class="col-sm-10"><input type="text" placeholder="Masukan Nama" value="{{ $anggota->nama }}" name="nama" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nominal">Tempat Lahir</label>
                            <div class="col-sm-10"><input type="text" placeholder="Masukan Tempat Lahir" value="{{ $anggota->tempat }}" name="tempat" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="nominal">Nama</label>
                            <div class="col-sm-10"><input type="date" placeholder="Masukan Tanggal Lahir" value="{{ $anggota->tgl_lahir }}" name="tgl_lahir" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="tgl_bayar">Pangkalan</label>
                            <div class="col-sm-10"><input type="text" placeholder="Masukan Pangkalan"  value="{{ $anggota->pangkalan }}" name="pangkalan" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="">Golongan</label>
                            <div class="col-sm-10"><select name="gol" id="gol" type="select"  class="custom-select" 
                                     class="form-control {{ $errors->has('gol') ? 'is-invalid':'' }}">
                                    <option disable="true" selected="true" disabled>--- Pilih Golongan ---</option>
                                    <option value="Siaga" {{ $anggota->gol == "Siaga" ? 'selected':''}} >Siaga</option>
                                    <option value="Penggalang" {{ $anggota->gol == "Penggalang" ? 'selected':''}} >Penggalang</option>
                                    <option value="Penegak" {{ $anggota->gol == "Penegak" ? 'selected':''}} >Penegak</option>
                                    <option value="Pandega" {{ $anggota->gol == "Pandega" ? 'selected':''}} >Pandega</option>
                               </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="tgl_bayar">Kwaran</label>
                            <div class="col-sm-10"><input type="text" placeholder="Masukan Kwaran"  value="{{ $anggota->kwaran }}" name="kwaran" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="kwarcab">Kwarcab</label>
                            <div class="col-sm-10"><input type="text" placeholder="Masukan Kwarcab"  value="{{ $anggota->kwarcab }}" name="kwarcab" class="form-control">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="">Agama</label>
                            <div class="col-sm-10"><select name="agama" id="agama" type="select"  class="custom-select" 
                                     class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Agama ---</option>
                                    <option value="Islam" {{ $anggota->agama == "Islam" ? 'selected':''}} >Islam</option>
                                    <option value="Kristen" {{ $anggota->agama == "Kristen" ? 'selected':''}} >Kristen</option>
                                    <option value="Hindu" {{ $anggota->agama == "Hindu" ? 'selected':''}} >Hindu</option>
                                    <option value="Budha" {{ $anggota->agama == "Budha" ? 'selected':''}} >Budha</option>
                               </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="">Golongan Darah</label>
                            <div class="col-sm-10"><select name="goldar" id="goldar" type="select"  class="custom-select" 
                                     class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Golongan Darah---</option>
                                    <option value="A" {{ $anggota->goldar == "A" ? 'selected':''}} >A</option>
                                    <option value="AB" {{ $anggota->goldar == "AB" ? 'selected':''}} >AB</option>
                                    <option value="B" {{ $anggota->goldar == "B" ? 'selected':''}} >B</option>
                                    <option value="O" {{ $anggota->goldar == "O" ? 'selected':''}} >O</option>
                               </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="foto">Foto</label>
                            <div class="col-sm-5"><input name="foto" type="file" class="form-control-file">
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