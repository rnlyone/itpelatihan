@include('app.app', ['title' => 'Sertifikasi'])

@php
    use App\Models\Pengaturan;
@endphp
<!-- BEGIN: Header-->
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75" data-feather="alert-circle"></span><span>No
                    results found.</span></div>
        </a></li>
</ul>
<!-- END: Header-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Daftar {{$pelatihanid->nama}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Kegiatan</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="/daftar/{{$pelatihanid->id}}">{{$pelatihanid->nama}}</a>
                                </li>
                                <li class="breadcrumb-item">Daftar
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="dashboard-ecommerce">
                <div class="row match-height">
                    <section id="card-demo-example">
                        <div class="row">
                            <!-- Centered Aligned Tabs starts -->
                            <div class="col-xl-12 col-lg-12">
                              <div class="card">
                                <div class="card-header">
                                  <h4 class="card-title">Form Pendaftaran</h4>
                                </div>
                                <div class="card-body">
                                  <ul class="nav nav-tabs justify-content-center" role="tablist">
                                    <li class="nav-item">
                                      <a class="btn nav-link" id="form-tab-mhs" data-bs-toggle="tab" href="#form-mhs" aria-controls="form-mhs" role="tab" aria-selected="true"><h1>Mahasiswa</h1></a>
                                    </li>
                                    &nbsp;&nbsp;&nbsp;
                                    <li class="nav-item">
                                      <a class="btn nav-link" id="form-tab-tendik" data-bs-toggle="tab" href="#form-tendik" aria-controls="form-tendik" role="tab" aria-selected="false"><h1>Tenaga Kependidikan</h1></a>
                                    </li>
                                  </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="form-mhs" aria-labelledby="form-tab-mhs" role="tabpanel">
                                            <form action="/daftar/store" method="post" enctype="multipart/form-data" class="needs-validation">
                                                @csrf
                                            <input type="text" name="id_pelatihan" value="{{$pelatihanid->id}}" hidden>
                                            <input type="text" name="jenis_pendaftar" value="mahasiswa" hidden>
                                            <input type="text" name="bid_pekerjaan" value="mahasiswa" hidden>
                                            <label class="form-label" for="basic-default-password1">Nama Lengkap</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2"><i data-feather="user"></i></span>
                                                <input
                                                type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{old('nama')}}" aria-label="Nama Lengkap" aria-describedby="basic-addon-search2"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Nomor Induk Mahasiswa</label>
                                            <div class="input-group input-group-merge form-password-toggle mb-2">
                                                <input
                                                type="text" class="form-control" id="nim" name="nim_nips" value="{{old('nim_nips')}}" placeholder="Nomor Induk Mahasiswa" aria-describedby="nim"
                                                />
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="fakultas">Fakultas</label>
                                                <select class="form-select" id="fakultas" name="fakultas" required>
                                                <option value="">Pilih Fakultas</option>
                                                <option value="FH">Fakultas Hukum</option>
                                                <option value="FIK">Fakultas Ilmu Komputer</option>
                                                <option value="FAI">Fakultas Agama Islam</option>
                                                <option value="FK">Fakultas Kedokteran</option>
                                                <option value="FTI">Fakultas Teknologi Industri</option>
                                                <option value="FS">Fakultas Sastra</option>
                                                <option value="FEB">Fakultas Ekonomi dan Bisnis</option>
                                                <option value="FP">Fakultas Pertanian</option>
                                                <option value="FKM">Fakultas Kesehatan Masyarakat</option>
                                                <option value="FF">Fakultas Farmasi</option>
                                                <option value="FKG">Fakultas Kedokteran Gigi</option>
                                                <option value="FT">Fakultas Teknik</option>
                                                <option value="FPIK">Fakultas Perikanan & Ilmu Kelautan</option>
                                                <option value="S2">Pascasarjana S2</option>
                                                <option value="S3">Pascasarjana S3</option>
                                                </select>
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="basicSelect">Program Studi</label>
                                                <select class="form-select prodiselect" id="activeprodi" name="prodi" disabled required>
                                                    <option value="">Pilih Fakultas Terlebih Dahulu</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FIK" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FIKOM)</option>
                                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FH" name="prodi" disabled hidden readonly required>
                                                    <option value="Ilmu Hukum">Ilmu Hukum</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FAI" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FAI)</option>
                                                    <option value="Hukum Keluarga Islam">Hukum Keluarga Islam</option>
                                                    <option value="Hukum Ekonomi Syariah">Hukum Ekonomi Syariah</option>
                                                    <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                                                    <option value="Pendidikan Bahasa Arab">Pendidikan Bahasa Arab</option>
                                                    <option value="Pendidikan Guru Madrasah Ibtidaiyah">Pendidikan Guru Madrasah Ibtidaiyah</option>
                                                    <option value="Komunikasi dan Penyiaran Islam">Komunikasi dan Penyiaran Islam</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FEB" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FEB)</option>
                                                    <option value="Ekonomi Pembangunan">Ekonomi Pembangunan</option>
                                                    <option value="Manajemen">Manajemen</option>
                                                    <option value="Akuntansi">Akuntansi</option>
                                                    <option value="Profesi Akuntan">Profesi Akuntan</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FT" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FT)</option>
                                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                                    <option value="Arsitektur">Arsitektur</option>
                                                    <option value="Lingkungan">Lingkungan</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FS" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FS)</option>
                                                    <option value="Sastra Arab">Sastra Arab</option>
                                                    <option value="Sastra Inggris">Sastra Inggris</option>
                                                    <option value="Sastra Indonesia">Sastra Indonesia</option>
                                                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                                    <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                                    <option value="Pendidikan Bahasa dan Sastra Indonesia">Pendidikan Bahasa dan Sastra Indonesia</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FPIK" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FPIK)</option>
                                                    <option value="Budidaya Perairan">Budidaya Perairan</option>
                                                    <option value="Pemanfaatan SD Perikanan">Pemanfaatan SD Perikanan</option>
                                                    <option value="Ilmu Kelautan">Ilmu Kelautan</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FP" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FP)</option>
                                                    <option value="Agroteknologi">Agroteknologi</option>
                                                    <option value="Agribisnis">Agribisnis</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FTI" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FTI)</option>
                                                    <option value="Teknik Industri">Teknik Industri</option>
                                                    <option value="Teknik Kimia">Teknik Kimia</option>
                                                    <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                                                    <option value="Profesi Insinyur">Profesi Insinyur</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FK" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FK)</option>
                                                    <option value="Pendidikan Dokter">Pendidikan Dokter</option>
                                                    <option value="Profesi Dokter">Profesi Dokter</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FKM" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FKM)</option>
                                                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                                    <option value="Keperawatan">Keperawatan</option>
                                                    <option value="Kebidanan">Kebidanan</option>
                                                    <option value="Profesi Ners">Profesi Ners</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FF" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FF)</option>
                                                    <option value="Farnasi">Farnasi</option>
                                                    <option value="Profesi Apoteker">Profesi Apoteker</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FKG" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FKG)</option>
                                                    <option value="Pendidikan Kedokteran Gigi">Pendidikan Kedokteran Gigi</option>
                                                    <option value="Profesi Dokter Gigi">Profesi Dokter Gigi</option>
                                                </select>
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="basicSelect">Agama</label>
                                                <select class="form-select prodiselect" id="basicSelect" name="agama" required>
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                            <label class="form-label" for="basicSelect">Jenis Kelamin</label>
                                            <div class="input-group input-group-merge mb-1">
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="pria" checked="" required>
                                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="wanita" required>
                                                    <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                                    </div>
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Tempat Lahir</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2"><i data-feather="home"></i></span>
                                                <input
                                                type="text" class="form-control" name="tpt_lahir" placeholder="Tempat Lahir" aria-label="Tempat Lahir" aria-describedby="basic-addon-search2" required value="{{old('tpt_lahir')}}"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Alamat Lengkap</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2"><i data-feather="map-pin"></i></span>
                                                <input
                                                type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" aria-label="Alamat Lengkap" aria-describedby="basic-addon-search2" required value="{{old('alamat')}}"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Email</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2">@</i></span>
                                                <input
                                                type="email" class="form-control" name="email" placeholder="Email@email.com" aria-label="Email" aria-describedby="basic-addon-search2" required value="{{old('email')}}"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Nomor Telepon Whatsapp</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2">+62</i></span>
                                                <input
                                                type="number" class="form-control" name="telepon" placeholder="81234567" aria-label="NOWA" aria-describedby="basic-addon-search2" required value="{{old('telepon')}}"
                                                />
                                            </div>

                                            <label>Foto (Aspek Rasio 3x4 (640x480): </label>
                                            <div class="mb-1">
                                                <input name="foto" class="form-control" type="file" id="fotopelatihan" accept=".jpg, .png, .jpeg|image/*" required/>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane active" id="service-center" aria-labelledby="service-tab-center" role="tabpanel">
                                        <h3 class="text-center">
                                            Pilih Jenis Pendaftar
                                        </h3>
                                        </div>

                                        <div class="tab-pane" id="form-tendik" aria-labelledby="form-tab-tendik" role="tabpanel">
                                            <form action="/daftar/store" method="post" enctype="multipart/form-data" class="needs-validation">
                                                @csrf
                                            <input type="text" name="id_pelatihan" value="{{$pelatihanid->id}}" hidden>
                                            <input type="text" name="jenis_pendaftar" value="tendik" hidden>
                                            <label class="form-label" for="basic-default-password1">Nama Lengkap</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2"><i data-feather="user"></i></span>
                                                <input
                                                type="text" class="form-control" name="nama" placeholder="Nama Lengkap" aria-label="Nama Lengkap" aria-describedby="basic-addon-search2"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">NIPS</label>
                                            <div class="input-group input-group-merge form-password-toggle mb-2">
                                                <input
                                                type="text" class="form-control" id="nim" name="nim_nips" placeholder="NIPS" aria-describedby="NIPS"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Bidang Pekerjaan</label>
                                            <div class="input-group input-group-merge form-password-toggle mb-2">
                                                <select class="form-select prodiselect" name="bid_pekerjaan">
                                                    <option value="">Pilih Bidang</option>
                                                    <option value="Akademik">Akademik</option>
                                                    <option value="Keuangan">Keuangan</option>
                                                    <option value="Kemahasiswaan">Kemahasiswaan</option>
                                                    <option value="Keagamaan">Keagamaan</option>
                                                </select>
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="fakultas">Fakultas</label>
                                                <select class="form-select" id="fakultas" name="fakultas">
                                                    <option value="">Pilih Fakultas</option>
                                                    <option value="FH">Fakultas Hukum</option>
                                                    <option value="FIK">Fakultas Ilmu Komputer</option>
                                                    <option value="FAI">Fakultas Agama Islam</option>
                                                    <option value="FK">Fakultas Kedokteran</option>
                                                    <option value="FTI">Fakultas Teknologi Industri</option>
                                                    <option value="FS">Fakultas Sastra</option>
                                                    <option value="FEB">Fakultas Ekonomi dan Bisnis</option>
                                                    <option value="FP">Fakultas Pertanian</option>
                                                    <option value="FKM">Fakultas Kesehatan Masyarakat</option>
                                                    <option value="FF">Fakultas Farmasi</option>
                                                    <option value="FKG">Fakultas Kedokteran Gigi</option>
                                                    <option value="FT">Fakultas Teknik</option>
                                                    <option value="FPIK">Fakultas Perikanan & Ilmu Kelautan</option>
                                                    <option value="S2">Pascasarjana S2</option>
                                                    <option value="S3">Pascasarjana S3</option>
                                                    <option value="Lembaga">Biro & Lembaga UMI</option>
                                                </select>
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="basicSelect">Program Studi</label>
                                                <select class="form-select prodiselect" id="activeprodi" name="prodi" disabled>
                                                    <option value="">Pilih Fakultas Terlebih Dahulu</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FIK" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FIKOM)</option>
                                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FH" name="prodi" disabled hidden readonly required>
                                                    <option value="Ilmu Hukum">Ilmu Hukum</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FAI" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FAI)</option>
                                                    <option value="Hukum Keluarga Islam">Hukum Keluarga Islam</option>
                                                    <option value="Hukum Ekonomi Syariah">Hukum Ekonomi Syariah</option>
                                                    <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                                                    <option value="Pendidikan Bahasa Arab">Pendidikan Bahasa Arab</option>
                                                    <option value="Pendidikan Guru Madrasah Ibtidaiyah">Pendidikan Guru Madrasah Ibtidaiyah</option>
                                                    <option value="Komunikasi dan Penyiaran Islam">Komunikasi dan Penyiaran Islam</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FEB" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FEB)</option>
                                                    <option value="Ekonomi Pembangunan">Ekonomi Pembangunan</option>
                                                    <option value="Manajemen">Manajemen</option>
                                                    <option value="Akuntansi">Akuntansi</option>
                                                    <option value="Profesi Akuntan">Profesi Akuntan</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FT" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FT)</option>
                                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                                    <option value="Arsitektur">Arsitektur</option>
                                                    <option value="Lingkungan">Lingkungan</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FS" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FS)</option>
                                                    <option value="Sastra Arab">Sastra Arab</option>
                                                    <option value="Sastra Inggris">Sastra Inggris</option>
                                                    <option value="Sastra Indonesia">Sastra Indonesia</option>
                                                    <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                                    <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                                    <option value="Pendidikan Bahasa dan Sastra Indonesia">Pendidikan Bahasa dan Sastra Indonesia</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FPIK" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FPIK)</option>
                                                    <option value="Budidaya Perairan">Budidaya Perairan</option>
                                                    <option value="Pemanfaatan SD Perikanan">Pemanfaatan SD Perikanan</option>
                                                    <option value="Ilmu Kelautan">Ilmu Kelautan</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FP" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FP)</option>
                                                    <option value="Agroteknologi">Agroteknologi</option>
                                                    <option value="Agribisnis">Agribisnis</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FTI" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FTI)</option>
                                                    <option value="Teknik Industri">Teknik Industri</option>
                                                    <option value="Teknik Kimia">Teknik Kimia</option>
                                                    <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                                                    <option value="Profesi Insinyur">Profesi Insinyur</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FK" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FK)</option>
                                                    <option value="Pendidikan Dokter">Pendidikan Dokter</option>
                                                    <option value="Profesi Dokter">Profesi Dokter</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FKM" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FKM)</option>
                                                    <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                                    <option value="Keperawatan">Keperawatan</option>
                                                    <option value="Kebidanan">Kebidanan</option>
                                                    <option value="Profesi Ners">Profesi Ners</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FF" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FF)</option>
                                                    <option value="Farnasi">Farnasi</option>
                                                    <option value="Profesi Apoteker">Profesi Apoteker</option>
                                                </select>
                                                <select class="form-select prodiselect" id="FKG" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (FKG)</option>
                                                    <option value="Pendidikan Kedokteran Gigi">Pendidikan Kedokteran Gigi</option>
                                                    <option value="Profesi Dokter Gigi">Profesi Dokter Gigi</option>
                                                </select>
                                                <select class="form-select prodiselect" id="S2" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (S2)</option>
                                                    <option value="Magister Manajemen">Magister Manajemen</option>
                                                    <option value="Magister Ilmu Hukum">Magister Ilmu Hukum</option>
                                                    <option value="Magister Pendidikan Agama Islam">Magister Pendidikan Agama Islam</option>
                                                    <option value="Magister Akuntansi">Magister Akuntansi</option>
                                                    <option value="Magister Ilmu Ekonomi">Magister Ilmu Ekonomi</option>
                                                    <option value="Magister MPTK">Magister MPTK</option>
                                                    <option value="Magister Teknik Kimia">Magister Teknik Kimia</option>
                                                    <option value="Magister Agroteknologi">Magister Agroteknologi</option>
                                                    <option value="Magister Teknik Sipil">Magister Teknik Sipil</option>
                                                    <option value="Magister Kesehatan Masyarakat">Magister Kesehatan Masyarakat</option>
                                                    <option value="Magister Teknik Mesin">Magister Teknik Mesin</option>
                                                </select>
                                                <select class="form-select prodiselect" id="S3" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Program Studi (S3)</option>
                                                    <option value="Doktor Ilmu Manajemen">Doktor Ilmu Manajemen</option>
                                                    <option value="Doktor Ilmu Hukum">Doktor Ilmu Hukum</option>
                                                    <option value="Doktor Manajemen Pendidikan Islam">Doktor Manajemen Pendidikan Islam</option>
                                                </select>
                                                <select class="form-select prodiselect" id="Lembaga" name="prodi" disabled hidden required>
                                                    <option value="">Pilih Lembaga</option>
                                                    <option value="LEMBAGA PENJAMINAN MUTU (LPM)">LEMBAGA PENJAMINAN MUTU (LPM)</option>
                                                    <option value="LEMBAGA PENELITIAN PEMANFAATAN & SUMBERDAYA (LP2S)">LEMBAGA PENELITIAN PEMANFAATAN & SUMBERDAYA (LP2S)</option>
                                                    <option value="LEMBAGA PENGABDIAN kepada MASYARAKAT (LPKM)">LEMBAGA PENGABDIAN kepada MASYARAKAT (LPKM)</option>
                                                    <option value="Biro Administrasi Umum dan Personalia">Biro Administrasi Umum dan Personalia</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>

                                            <div class="mb-1">
                                                <label class="form-label" for="basicSelect">Agama</label>
                                                <select class="form-select prodiselect" id="basicSelect" name="agama" required>
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                            <label class="form-label" for="basicSelect">Jenis Kelamin</label>
                                            <div class="input-group input-group-merge mb-1">
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="pria" checked="">
                                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="wanita">
                                                    <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                                    </div>
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Tempat Lahir</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2"><i data-feather="home"></i></span>
                                                <input
                                                type="text" class="form-control" name="tpt_lahir" placeholder="Tempat Lahir" aria-label="Tempat Lahir" aria-describedby="basic-addon-search2"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Alamat Lengkap</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2"><i data-feather="map-pin"></i></span>
                                                <input
                                                type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" aria-label="Alamat Lengkap" aria-describedby="basic-addon-search2"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Email</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2">@</i></span>
                                                <input
                                                type="email" class="form-control" name="email" placeholder="Email@email.com" aria-label="Email" aria-describedby="basic-addon-search2"
                                                />
                                            </div>

                                            <label class="form-label" for="basic-default-password1">Nomor Telepon Whatsapp</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <span class="input-group-text" id="basic-addon-search2">+62</i></span>
                                                <input
                                                type="number" class="form-control" name="telepon" placeholder="81234567" aria-label="NOWA" aria-describedby="basic-addon-search2"
                                                />
                                            </div>

                                            <label>Foto (Aspek Rasio 3x4 (640x480): </label>
                                            <div class="mb-1">
                                                <input name="foto" class="form-control" type="file" id="fotopelatihan" accept=".jpg, .png, .jpeg|image/*"/>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                              </div>
                                            </form>
                                        </div>
                                        @if (session()->get('success'))
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Sukses</h4>
                                            <div class="alert-body">
                                                {{session('success')}}
                                            </div>
                                        </div>
                                        @elseif (session()->get('error'))
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Error</h4>
                                            <div class="alert-body">
                                                {{session('error')}}
                                            </div>
                                        </div>
                                        @endif
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Error</h4>
                                                    <div class="alert-body">
                                                        {{$error}}
                                                    </div>
                                                </div>
                                            @endforeach
                                            @endif
                                    </div>

                                </div>
                              </div>
                            </div>
                            <!-- Centered Aligned Tabs ends -->

                            <!-- Tabs Aligned at End starts -->
                            <div class="col-md-6">
                                @if ($pelatihanid->biaya != 0)
                                <div class="card bg-warning">
                                    <div class="card-header">
                                      <h4 class="card-title text-white">Informasi Pembayaran</h4>
                                    </div>
                                    <div class="card-body">
                                      <form class="form form-horizontal">
                                        <div class="row">
                                          <div class="col-12">
                                            <div class="mb-1 row">
                                              <div class="col-sm-3">
                                                <label class="col-form-label text-white" for="contact-icon">Nomor Rekening</label>
                                              </div>
                                              <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg></span>
                                                  <input type="text" id="contact-icon" value="{{ Pengaturan::where('id', $pelatihanid->id_rek)->first()->norek}}  ({{Pengaturan::where('id', $pelatihanid->id_rek)->first()->bank}})" class="form-control" name="contact-icon" placeholder="Nomor Rekening" disabled>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-12">
                                            <div class="mb-1 row">
                                              <div class="col-sm-3">
                                                <label class="col-form-label text-white" for="pass-icon" >Nama Rekening</label>
                                              </div>
                                              <div class="col-sm-9">
                                                <div class="input-group input-group-merge">
                                                  <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                                  <input type="text" value="{{ Pengaturan::where('id', $pelatihanid->id_rek)->first()->namarek}}" id="pass-icon" class="form-control" name="contact-icon" disabled="">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-sm-9 offset-sm-3">
                                            <div class="mb-1">
                                                <label class="form-check-label text-white" for="customCheck2">Silahkan Konfirmasi Pembayaran Anda di sini</label>
                                            </div>
                                          </div>
                                          <div class="col-sm-9 offset-sm-3">
                                            <button type="reset" class="btn btn-primary me-1 waves-effect waves-float waves-light">Konfirmasi</button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                @endif
                              </div>
                            <!-- Tabs Aligned at End ends -->
                          </div>
                    </section>

                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('app.footer')

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="{{asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-number-input.min.js')}}"></script>
<script>
    $(document).ready( function () {
    $('#daftarpendaftar').DataTable();
} );
</script>

<script>
    function dselect(params) {
        $('select[name="prodi"]').attr('disabled', 'disabled');
        $('select[name="prodi"]').attr('hidden', 'hidden');
        params.removeAttr('disabled');
        params.removeAttr('hidden');
    }

    (function($){
    $(document).ready(function(){
    $('select[name="fakultas"]').on('change', function(){ //wait for changes in select 1
        var sel1 = $(this);

      if(sel1.val() === 'FIK'){//Checks the select value
        dselect($('select[id="FIK"]'));
      }
      else if(sel1.val() === 'FH'){//Checks the select value
        dselect($('select[id="FH"]'));
      }
      else if(sel1.val() === 'FT'){//Checks the select value
        dselect($('select[id="FT"]'));
      }
      else if(sel1.val() === 'FAI'){//Checks the select value
        dselect($('select[id="FAI"]'));
      }
      else if(sel1.val() === 'FKG'){//Checks the select value
        dselect($('select[id="FKG"]'));
      }
      else if(sel1.val() === 'FPIK'){//Checks the select value
        dselect($('select[id="FPIK"]'));
      }
      else if(sel1.val() === 'FK'){//Checks the select value
        dselect($('select[id="FK"]'));
      }
      else if(sel1.val() === 'FTI'){//Checks the select value
        dselect($('select[id="FTI"]'));
      }
      else if(sel1.val() === 'FS'){//Checks the select value
        dselect($('select[id="FS"]'));
      }
      else if(sel1.val() === 'FF'){//Checks the select value
        dselect($('select[id="FF"]'));
      }
      else if(sel1.val() === 'FKM'){//Checks the select value
        dselect($('select[id="FKM"]'));
      }
      else if(sel1.val() === 'FP'){//Checks the select value
        dselect($('select[id="FP"]'));
      }
      else if(sel1.val() === 'FPIK'){//Checks the select value
        dselect($('select[id="FPIK"]'));
      }
      else if(sel1.val() === 'S2'){//Checks the select value
        dselect($('select[id="S2"]'));
      }
      else if(sel1.val() === 'S3'){//Checks the select value
        dselect($('select[id="S3"]'));
      }
      else if(sel1.val() === 'Lembaga'){//Checks the select value
        dselect($('select[id="Lembaga"]'));
      }
      else if(sel1.val() === ''){//Checks the select value
        dselect($('select[id="activeprodi"]'));
      }
    });
  });

})(jQuery);
</script>
