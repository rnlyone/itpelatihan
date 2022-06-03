@include('app.auth.app', ['dash_active' => 'active', 'title' => 'Dashboard'])

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section class="app-user-list">
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
                <!-- list section start -->
                <div class="card">
                    <div style="margin: 10pt">
                    <div class="card-datatable table-responsive pt-0">
                        <div class="card-header p-0">
                            <div class="head-label"><h5 class="mt-1">Pelatihan</h5></div>
                            <div class="dt-action-buttons text-end">
                                <button data-toggle="modal" data-bs-toggle="modal" data-bs-target="#tambah-pelatihan" href="javascript:void(0)" class="btn btn-success" id="tombol-tambah">
                                    <i data-feather='plus'></i>
                                </button>
                            </div>
                        </div>
                        <table class="user-list-table table" id="pelatihantable">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Batas Pendaftaran</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Kuota</th>
                                    <th>Biaya</th>
                                    <th>Kategori</th>
                                    <th>Visible</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- Modal to add new user starts-->

                    </div>
                    <!-- Modal to add new user Ends-->
                </div>
                <!-- list section end -->
            </section>
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
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<!-- Modal to add new user starts-->
<div class="modal fade text-start" id="tambah-pelatihan" tabindex="-1" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Tambah Pelatihan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="pelatihan/store" method="post" enctype="multipart/form-data" class="needs-validation">
                @csrf
                <div class="modal-body">
                    <label>Nama Pelatihan: </label>
                    <div class="mb-1">
                        <input type="text" name="nama" placeholder="Nama Pelatihan" value="{{old('nama')}}" class="form-control" />
                    </div>

                    <label>Batas Pendaftaran: </label>
                    <div class="mb-1">
                        <input type="date" name="batas_daftar" placeholder="Batas Daftar" value="{{old('batas_daftar')}}" class="form-control" required/>
                    </div>

                    <label>Tanggal Mulai: </label>
                    <div class="mb-1">
                        <input type="date" name="tgl_mulai" placeholder="Tanggal Mulai" value="{{old('tgl_mulai')}}" class="form-control" required/>
                    </div>

                    <label>Tanggal Selesai: </label>
                    <div class="mb-1">
                        <input type="date" name="tgl_akhir" placeholder="Tanggal Selesai" value="{{old('tgl_akhir')}}" class="form-control" />
                    </div>

                    <label>Kuota: </label>
                    <div class="mb-1">
                        <input type="number" name="kuota" class="touchspin-min-max" value="{{old('kuota') ?? '25'}}" required/>
                    </div>

                    <label>Biaya: </label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                        <input name="biaya" type="number" id="numeral-formatting" class="form-control numeral-mask"
                            placeholder="800000" aria-label="800000" value="{{old('biaya')}}"
                            required/>
                        <div class="valid-feedback">Baik!</div>
                        <div class="invalid-feedback">Tolong Lengkapi</div>
                    </div>

                    <label>Kategori: </label>
                    <div class="mb-1">
                        <input type="text" name="id_kategori" placeholder="Kategori" value="{{old('id_kategori')}}" class="form-control" />
                    </div>

                    <label>Deskripsi: </label>
                    <div class="mb-1">
                        <textarea name="deskripsi" class="form-control" id="deskripsipelatihan" cols="30" rows="10">{{old('deskripsi')}}</textarea>
                    </div>

                    <label>Rekening Pembayaran: </label>
                    <div class="mb-1">
                        <select class="form-select" name="rekening" id="basicSelect">
                            @foreach ($rekening as $r)
                                <option value="{{$r->id}}">{{$r->bank}} || {{$r->name}}</option>
                            @endforeach
                          </select>
                    </div>

                    <label>Foto (Aspek Rasio 16:11 [min. 800:550]): </label>
                    <div class="mb-1">
                        <input name="foto" class="form-control" type="file" id="fotopelatihan" accept=".jpg, .png, .jpeg|image/*" required/>
                    </div>

                    <label class="form-check-label switch-icon-left switch-icon-right mb-50" for="customSwitch3">Visibilitas</label>
                    <div class="input-group input-group-merge mb-1">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visible" id="inlineRadio1" value="1" checked="" required>
                            <label class="form-check-label" for="inlineRadio1">Terlihat</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visible" id="inlineRadio2" value="0" required>
                            <label class="form-check-label" for="inlineRadio2">Tidak Terlihat</label>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>
 <!-- Modal to add new user Ends-->


 @foreach ($pelatihandata as $ald)
<div class="modal fade text-start" id="modaledit{{$ald->id}}" tabindex="-1" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Edit Pelatihan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="pelatihan/edit" enctype="multipart/form-data" method="post">
                @csrf
                <div class="modal-body">
                    <input type="text" name="idedit" placeholder="Id Alternatif" value="{{$ald->id}}" class="form-control" hidden>
                    <label>Nama Pelatihan: </label>
                    <div class="mb-1">
                        <input type="text" name="nama" placeholder="Nama Pelatihan" value="{{$ald->nama}}" class="form-control" />
                    </div>

                    <label>Batas Pendaftaran: </label>
                    <div class="mb-1">
                        <input type="date" name="batas_daftar" placeholder="Batas Daftar" value="{{$ald->batas_daftar}}" class="form-control" required/>
                    </div>

                    <label>Tanggal Mulai: </label>
                    <div class="mb-1">
                        <input type="date" name="tgl_mulai" placeholder="Tanggal Mulai" value="{{$ald->tgl_mulai}}" class="form-control" required/>
                    </div>

                    <label>Tanggal Selesai: </label>
                    <div class="mb-1">
                        <input type="date" name="tgl_akhir" placeholder="Tanggal Selesai" value="{{$ald->tgl_akhir}}" class="form-control" />
                    </div>

                    <label>Kuota: </label>
                <div class="mb-1">
                        <input type="number" name="kuota" class="touchspin-min-max" value="{{$ald->kuota}}"/>
                    </div>

                    <label>Biaya: </label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                        <input name="biaya" type="number" id="numeral-formatting" class="form-control numeral-mask"
                            placeholder="800000" aria-label="800000" value="{{$ald->biaya}}"
                            required/>
                        <div class="valid-feedback">Baik!</div>
                        <div class="invalid-feedback">Tolong Lengkapi</div>
                    </div>

                    <label>Kategori: </label>
                    <div class="mb-1">
                        <input type="text" name="id_kategori" placeholder="Kategori" value="{{$ald->id_kategori}}" class="form-control" />
                    </div>

                    <label>Deskripsi: </label>
                    <div class="mb-1">
                        <textarea name="deskripsi" class="form-control" id="deskripsipelatihan" cols="30" rows="10">{{$ald->deskripsi}}</textarea>
                    </div>
                    <label>Rekening Pembayaran: </label>
                    <div class="mb-1">
                        <select class="form-select" name="rekening" id="basicSelect">
                            @foreach ($rekening as $r)
                                <option value="{{$r->id}}"
                                    @if ($ald->id_rek == $r->id)
                                        selected
                                    @endif
                                    >{{$r->bank}} || {{$r->name}}</option>
                            @endforeach
                          </select>
                    </div>

                    <label>Foto (Aspek Rasio 16:11 [min. 800:550]): </label>
                    <div class="mb-1">
                        <input name="foto" class="form-control" type="file" id="fotopelatihan" accept=".jpg, .png, .jpeg|image/*"/>
                    </div>

                    <label class="form-check-label switch-icon-left switch-icon-right mb-50" for="customSwitch3">Visibilitas</label>
                    <div class="input-group input-group-merge mb-1">
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visible" id="inlineRadio1" value="1" @if ($ald->visible == '1')checked @endif required>
                            <label class="form-check-label" for="inlineRadio1">Terlihat</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="visible" id="inlineRadio2" @if ($ald->visible == '0')checked @endif value="0" required>
                            <label class="form-check-label" for="inlineRadio2">Tidak Terlihat</label>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Accept</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach ($pelatihandata as $ald)
    <div class="modal fade modal-danger text-start" id="modaldel{{$ald->id}}" tabindex="-1"
    aria-labelledby="myModalLabel120" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel120">Tetap Hapus Pelatihan?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="card-text mb-0">
                    <span class="text-danger"><b>Peringatan!!</b></span>, Apabila Anda Menghapus Tahun
                    Ajaran, Maka Semua Pendaftar yang berkaitan dengan Pelatihan tersebut akan
                    dihapus.
                </p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="/pelatihan/destroy/{{$ald->id}}">Tetap Hapus</a>
            </div>
        </div>
    </div>
    </div>
@endforeach


@include('app.auth.footer')

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="{{asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-number-input.min.js')}}"></script>
<script>
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

    $(document).ready(function(){
        const table = $('#pelatihantable').DataTable(
            {
                serverSide : true,
                processing : true,
                language : {
                    processing : "<div class='spinner-border text-primary' role='status'> <span class='visually-hidden'>Loading...</span></div>"
                },

                ajax : {
                    url: '{{ route('pelatihan.index') }}',
                    type: 'GET'
                },

                columns : [
                    {data: 'id'},
                    {data: 'nama'},
                    {data: 'batas_daftar'},
                    {data: 'tgl_mulai'},
                    {data: 'tgl_akhir'},
                    {data: 'kuota'},
                    {data: 'biaya'},
                    {data: 'id_kategori'},
                    {data: 'visible'},
                    {data: 'action'},
                ],

                order: [[0, 'asc']],
                "drawCallback" : function( settings ) {
                    feather.replace();
                }
            })
        });
</script>
