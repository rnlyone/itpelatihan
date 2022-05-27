@include('app.auth.app', ['infobayar_active' => 'active', 'title' => 'Pengaturan'])
    <!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Pengaturan </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">M-Technolabs</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="/">Sertifikasi</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#"></a>
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
                        <div class="row match-height">

                            <!-- Tabs Aligned at End starts -->
                            <div class="col-md-6">
                                <div class="card">
                                  <div class="card-header">
                                    <h4 class="card-title">Info Rekening</h4>
                                  </div>
                                  <div class="card-body">
                                    <table class="datatables-basic table" id="daftarpendaftar">
                                        <thead>
                                          <tr>
                                            <th>No.</th>
                                            <th>Nama Rekening</th>
                                            <th>No Rekening</th>
                                            <th>Nama Bank</th>
                                          </tr>
                                        </thead>
                                      <tbody>
                                          @foreach ($rek as $index => $r)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$r->namarek}}</td>
                                                <td>{{$r->norek}}</td>
                                                <td>{{$r->bank}}</td>
                                            </tr>
                                          @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
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
