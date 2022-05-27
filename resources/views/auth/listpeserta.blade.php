@include('app.auth.app', ['dash_active' => 'active', 'title' => 'Peserta'])

@php
    use App\Models\Pendaftar;
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
                        <h2 class="content-header-title float-start mb-0">Detail {{$pelatihanid->nama}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">M-Technolabs</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="/dash">Pelatihan</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{$pelatihanid->nama}}</a>
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
                    <div class="col-md-9 col-12">
                        <label class="form-label" for="disabledInput">Informasi Pelatihan</label>
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Info Pelatihan</h4>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="disabledInput">Nama Pelatihan</label>
                                        <input type="text" class="form-control" value="{{$pelatihanid->nama}}" id="disabledInput" disabled="">
                                    </div>
                                </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Batas Pendaftaran</label>
                                            <input type="text" class="form-control" value="{{$pelatihanid->batas_daftar}}" id="disabledInput" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Tanggal Mulai</label>
                                            <input type="text" class="form-control" value="{{$pelatihanid->tgl_mulai}}" id="disabledInput" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Tanggal Selesai</label>
                                            <input type="text" class="form-control" value="{{$pelatihanid->tgl_akhir}}" id="disabledInput" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Kuota</label>
                                            <input type="text" class="form-control" value="{{$pelatihanid->kuota}} Orang" id="disabledInput" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Biaya</label>
                                            <input type="text" class="form-control" value="{{$pelatihanid->biaya}}" id="disabledInput" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Kategori</label>
                                            <input type="text" class="form-control" value="{{$pelatihanid->kategori}}" id="disabledInput" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Visibilitas</label>
                                            <input type="text" class="form-control" value="{{$pelatihanid->visible}}" id="disabledInput" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="disabledInput">Info Rekening</label>
                                            <input type="text" class="form-control" value="{{$pelatihanid->id_rek}}" id="disabledInput" disabled="">
                                        </div>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                            <label class="form-label" for="disabledInput">Preview</label>
                            <div class="card">
                                <img class="card-img-top" src="/image/{{$pelatihanid->foto}}" alt="Gambar Sertifikasi">
                                <div class="card-body">
                                    <h5>{{$pelatihanid->nama}}</h5>
                                    <p>
                                        @php
                                        $arr = str_split($pelatihanid->deskripsi);
                                        $desc = '';
                                        if (count($arr) < 80) {
                                            for($i = 0; $i < count($arr); $i++) { $desc .=$arr[$i]; }
                                        } else {
                                            for($i = 0; $i < 80; $i++) { $desc .=$arr[$i]; }
                                        }

                                        $daftarcount = Pendaftar::all()->where('id_pelatihan', $pelatihanid->id)->count();
                                        @endphp
                                        {{$desc}}...
                                    </p>
                                    <a data-bs-toggle="modal" data-bs-target="#pelatihandetail{{$pelatihanid->id}}"
                                    class="btn-sm btn-outline-secondary waves-effect">Lihat Detail</a>
                                    <a href="daftar/{{$pelatihanid->id}}" class="btn-sm btn-primary waves-effect">Daftar</a>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Daftar Pendaftar</h4>
                            </div>
                            <div class="card-body">
                            <table class="datatables-basic table" id="daftarpendaftar">
                                <thead>
                                    <tr>
                                    <th>No.</th>
                                    <th>Jenis</th>
                                    <th>Nama</th>
                                    <th>NIM/NIPS</th>
                                    <th>Fakultas</th>
                                    <th>WA</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendaftar as $index => $p)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>@if ($p->jenis_pendaftar == 'mahasiswa')
                                            <span class="badge bg-info">Mahasiswa</span>
                                            @else
                                            <span class="badge bg-primary">Tenaga Didik</span>
                                            @endif
                                        </td>
                                        <td>{{$p->nama}}</td>
                                        <td>{{$p->nim_nips}}</td>
                                        <td>{{$p->fakultas}}</td>
                                        <td><a href="http://wa.me/62{{$p->telepon}}" class="btn btn-outline-primary btn-sm waves-effect">{{$p->telepon}}</a></td>
                                        <td>
                                            @if ($p->status == 'belum_konfirmasi')
                                            <span class="badge bg-secondary">Belum</span>
                                            @elseif ($p->status == 'diterima')
                                            <span class="badge bg-success">Diterima</span>
                                            @else
                                            <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>@if ($p->status == 'belum_konfirmasi')
                                            <a href="/status/terima/{{$p->id}}" class="btn btn-icon btn-success"><i data-feather="check"></i></a>
                                            <a href="/status/tolak/{{$p->id}}" class="btn btn-icon btn-danger"><i data-feather="x"></i></a>
                                            @elseif ($p->status == 'diterima')
                                            <a href="/status/tolak/{{$p->id}}" class="btn btn-icon btn-danger"><i data-feather="x"></i></a>
                                            @else
                                            <a href="/status/terima/{{$p->id}}" class="btn btn-icon btn-success"><i data-feather="check"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
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
      else if(sel1.val() === ''){//Checks the select value
        dselect($('select[id="activeprodi"]'));
      }
    });
  });

})(jQuery);
</script>
