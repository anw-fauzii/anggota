<!DOCTYPE html>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
    <meta charset='UTF-8'>
    <link rel="shortcut icon">
    <title>Cetak Kartu</title>
</head>
<body onload='window.print()' style="font-family: arial;font-size: 12px;position:absolute;">
<div style="width: 750px;height: 243px;margin: 50px;background-image: url('/bg.png');">
    <img style="position: absolute;padding-left: 12px;padding-top: 5px;" class="img-responsive img" width="40px">
    <img style="position: absolute;padding-left: 312px;padding-top: 5px;" class="img-responsive img" width="50px">
    <p style="position: absolute; font-family: arial; font-size: 10px; padding-left: 85px;text-transform: uppercase; text-align: center;"> Pemerintah Provinsi Jawa Barat<br>Kabupaten Garut<br>Dinas Pendidikan Kabupaten Garut<br><b style="font-size: 12px"></b></p>
    <p style="padding-left: 123px;padding-top: 70px; "><b>KARTU ANGGOTA PRAMUKA</b></p>
    <img style="border: 1px solid #ffffff;position: absolute;margin-left: 20px;margin-top: -20px;" src="{{asset('storage/'.$anggota->foto)}}" width="80px">
        <table style="margin-top: -10px; padding-left: 120px; position: relative;font-family: arial;font-size: 11px;">
            <tr>
                <td>NTA</td>
                <td>:</td>
                <td>{{$anggota->nta}}</td>
            </tr><tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{$anggota->nama}}</td>
            </tr>
            </tr><tr>
                <td>TTL</td>
                <td>:</td>
                <td>{{$anggota->tempat}}, {{$anggota->tgl_lahir}}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{$anggota->agama}}</td>
            </tr>
            <tr>
                <td>Goldar</td>
                <td>:</td>
                <td>{{$anggota->goldar}}</td>
            </tr>
            <tr>
                <td>Pangkalan</td>
                <td>:</td>
                <td>{{$anggota->pangkalan}}</td>
            </tr>
            <tr>
                <td>Berlaku</td>
                <td>:</td>
                <td>Selama Menjadi Siswa/i</td>
            </tr>
        </table>
        <p style="padding-left: 10px;font-size: 8px; font-family: arial;position: absolute;">Alamat: Jl. yg Lurus Desa Garut Kec. Tarogong Wetan - Kode Pos 9999<br> Email: sakola@gmail.com | Telp. 0101010101010 | Website: wwww.sakola.go.id</p>
        <p style="margin-top: -200px;padding-left: 450px;padding-top: 10px;"><b>TATA TERTIB ANGGOTA PRAMUKA</b><br>
<ol style="padding-left: 400px;color: #FFFFFF; font-family: arial;font-size: 11px;text-align: justify;padding-right: 10px">
                      <li>Datang</a></li>
                      <li>Jalani</li>
                      <li>Lupakan</li>
                      <li>:)</li>
                    </ol>
        </p><br><br>
        <p style="position: absolute;padding-left: 550px;margin-top: -10px;font-size: 10px; font-family: arial;">

        </p><br>
        <p style="position: absolute;padding-left: 550px;margin-top: -10px;font-size: 10px; font-family: arial;">Mengetahui, <br>Kepala Sekolah</p>
        <img style="position: absolute;padding-left: 530px;padding-top: 5px;" class="img-responsive img"  width="70px">
    <br><img style="position: absolute;padding-left: 530px;margin-top: -20px;" class="img-responsive img"   width="50px">
        <p style="position: absolute;padding-left: 550px;margin-top: 20px;font-size: 10px; font-family: arial;"><b><u>Wawan Tungir</u></b><br>NIP. 1212121212</p>
</div>


</body>
</html>