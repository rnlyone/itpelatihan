@include('app.app', ['title' => 'Sertifikasi'])

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
                        <h2 class="content-header-title float-start mb-0">Pelatihan IT Fundamental</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Kegiatan
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
                            @if ($pelatihans == "")
                                <h5>Maaf, Belum ada pelatihan yang dibuka</h5>
                            @endif
                            @foreach ($pelatihans as $p)
                            <div class="col-md-6 col-lg-4">
                                <div class="card">
                                    <img class="card-img-top" src="image/{{$p->foto}}" alt="Gambar Sertifikasi">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$p->nama}}</h4>
                                            @php

                                            $daftarcount = Pendaftar::all()->where('id_pelatihan', $p->id)->count();
                                            @endphp
                                        <p class="mt-2">
                                            @php
                                                $date = date_create($p->batas_daftar);
                                                $datemulai = date_create($p->tgl_mulai);
                                                $dateakhir = date_create($p->tgl_akhir);

                                            @endphp
                                        <span class="fw-bolder">Batas Pendaftaran : </span>{{date_format($date,"D, d/m/Y")}}<br>
                                        <span class="fw-bolder">Tanggal Mulai : </span>{{date_format($datemulai,"D, d/m/Y")}}<br>
                                        <span class="fw-bolder">Tanggal Selesai : </span>{{date_format($dateakhir,"D, d/m/Y")}}<br>
                                        @if ($p->biaya != 0)
                                        <span class="fw-bolder">Biaya : </span>{{$p->biaya}} &nbsp; <span class="fw-bolder">||</span> &nbsp;
                                        @endif
                                        <span class="fw-bolder">Pendaftar : </span>{{$daftarcount}}/{{$p->kuota}} orang</p>
                                        <a href="daftar/{{$p->id}}" class="btn btn-primary waves-effect">Detail</a>
                                    </div>
                                </div>
                            </div>

                            {{-- modal --}}
                            <div class="modal fade" id="pelatihandetail{{$p->id}}" tabindex="-1"
                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">{{$p->nama}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="card-img-top" src="image/{{$p->foto}}" alt="Gambar Sertifikasi">
                                            <h4 class="card-title mt-1">{{$p->nama}}</h4>
                                            <div class="hdesc-content" hidden>
                                                {{$p->deskripsi}}
                                            </div>
                                            <div class="desc-content">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="daftar/{{$p->id}}" class="btn btn-primary">Daftar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </section>

                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center"
        href="#"><i class="spinner" data-feather="settings"></i></a>
    <div class="customizer-content">
        <!-- Customizer header -->
        <div class="customizer-header px-2 pt-1 pb-0 position-relative">
            <h4 class="mb-0">Theme Customizer</h4>
            <p class="m-0">Customize & Preview in Real Time</p>

            <a class="customizer-close" href="#"><i data-feather="x"></i></a>
        </div>

        <hr />

        <!-- Styling & Text Direction -->
        <div class="customizer-styling-direction px-2">
            <p class="fw-bold">Skin</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="skinlight" name="skinradio" class="form-check-input layout-name" checked
                        data-layout="" />
                    <label class="form-check-label" for="skinlight">Light</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="skinbordered" name="skinradio" class="form-check-input layout-name"
                        data-layout="bordered-layout" />
                    <label class="form-check-label" for="skinbordered">Bordered</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="skindark" name="skinradio" class="form-check-input layout-name"
                        data-layout="dark-layout" />
                    <label class="form-check-label" for="skindark">Dark</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="skinsemidark" name="skinradio" class="form-check-input layout-name"
                        data-layout="semi-dark-layout" />
                    <label class="form-check-label" for="skinsemidark">Semi Dark</label>
                </div>
            </div>
        </div>

        <hr />

        <!-- Menu -->
        <div class="customizer-menu px-2">
            <div id="customizer-menu-collapsible" class="d-flex">
                <p class="fw-bold me-auto m-0">Menu Collapsed</p>
                <div class="form-check form-check-primary form-switch">
                    <input type="checkbox" class="form-check-input" id="collapse-sidebar-switch" />
                    <label class="form-check-label" for="collapse-sidebar-switch"></label>
                </div>
            </div>
        </div>
        <hr />

        <!-- Layout Width -->
        <div class="customizer-footer px-2">
            <p class="fw-bold">Layout Width</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="layout-width-full" name="layoutWidth" class="form-check-input" checked />
                    <label class="form-check-label" for="layout-width-full">Full Width</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="layout-width-boxed" name="layoutWidth" class="form-check-input" />
                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                </div>
            </div>
        </div>
        <hr />

        <!-- Navbar -->
        <div class="customizer-navbar px-2">
            <div id="customizer-navbar-colors">
                <p class="fw-bold">Navbar Color</p>
                <ul class="list-inline unstyled-list">
                    <li class="color-box bg-white border selected" data-navbar-default=""></li>
                    <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                    <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                    <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                    <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                    <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                    <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                    <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                </ul>
            </div>

            <p class="navbar-type-text fw-bold">Navbar Type</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="nav-type-floating" name="navType" class="form-check-input" checked />
                    <label class="form-check-label" for="nav-type-floating">Floating</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="nav-type-sticky" name="navType" class="form-check-input" />
                    <label class="form-check-label" for="nav-type-sticky">Sticky</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="nav-type-static" name="navType" class="form-check-input" />
                    <label class="form-check-label" for="nav-type-static">Static</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="nav-type-hidden" name="navType" class="form-check-input" />
                    <label class="form-check-label" for="nav-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
        <hr />

        <!-- Footer -->
        <div class="customizer-footer px-2">
            <p class="fw-bold">Footer Type</p>
            <div class="d-flex">
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-sticky" name="footerType" class="form-check-input" />
                    <label class="form-check-label" for="footer-type-sticky">Sticky</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-static" name="footerType" class="form-check-input" checked />
                    <label class="form-check-label" for="footer-type-static">Static</label>
                </div>
                <div class="form-check me-1">
                    <input type="radio" id="footer-type-hidden" name="footerType" class="form-check-input" />
                    <label class="form-check-label" for="footer-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End: Customizer-->

</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<script>

</script>

@include('app.footer')

<script>
    $(document).ready( function () {
        var strh = $(".hdesc-content");
        var str = $(".desc-content");
        for (let index = 0; index < str.length; index++) {
            var objh = $(strh[index]);
            var obj = $(str[index]);
            obj.html(objh.text());
        }
        });
</script>
