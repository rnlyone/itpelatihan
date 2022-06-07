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
                    <section id="card-demo-example">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                    <h4 class="card-title">Info Kegiatan</h4>
                                    <a href="/regis/{{$pelatihanid->id}}" class="btn btn-primary waves-effect waves-float waves-light">Daftar Kegiatan Ini</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="disabledInput">Nama Kegiatan</label>
                                                    <input type="text" class="form-control" value="{{$pelatihanid->nama}}" id="disabledInput" disabled="">
                                                </div>
                                            </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="disabledInput">Batas Pendaftaran</label>
                                                        <input type="text" class="form-control" value="{{$pelatihanid->batas_daftar}}" id="disabledInput" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="disabledInput">Tanggal Mulai</label>
                                                        <input type="text" class="form-control" value="{{$pelatihanid->tgl_mulai}}" id="disabledInput" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="disabledInput">Tanggal Selesai</label>
                                                        <input type="text" class="form-control" value="{{$pelatihanid->tgl_akhir}}" id="disabledInput" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="disabledInput">Kuota</label>
                                                        <input type="text" class="form-control" value="{{$pelatihanid->kuota}} Orang" id="disabledInput" disabled="">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="disabledInput">Biaya</label>
                                                        <input type="text" class="form-control" value="{{$pelatihanid->biaya}}" id="disabledInput" disabled="">
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Detail Kegiatan</h4>
                                        </div>
                                    <div class="card-body">
                                        <img class="card-img-top" src="{{asset('image/'.$pelatihanid->foto)}}" alt="Gambar Sertifikasi">
                                        <div id="desch" hidden>
                                            {{$pelatihanid->deskripsi}}
                                        </div>
                                        <div id="desc">
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                      <h4 class="card-title">Daftar Pendaftar</h4>
                                    </div>
                                    <div class="card-body">
                                      <table class="datatables-basic table" id="daftarpendaftar">
                                          <thead>
                                            <tr>
                                              <th>No.</th>
                                              <th>Name</th>
                                              <th>Fakultas</th>
                                              <th>Status</th>
                                            </tr>
                                          </thead>
                                        <tbody>
                                            @foreach ($pendaftar as $index => $p)
                                              <tr>
                                                  <td>{{$index+1}}</td>
                                                  <td>{{$p->nama}}</td>
                                                  <td>{{$p->fakultas}}</td>
                                                  <td>
                                                      @if ($p->status == 'belum_konfirmasi')
                                                          <span class="badge bg-secondary">Belum</span>
                                                          @elseif ($p->status == 'diterima')
                                                          <span class="badge bg-success">Diterima</span>
                                                          @else
                                                          <span class="badge bg-danger">Ditolak</span>
                                                      @endif
                                                  </td>
                                              </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>

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

<script>
    $(document).ready( function () {
        var strh = $("#desch");
        var str = $("#desc");
        str.html(strh.text());
        });
</script>

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
