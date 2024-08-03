@extends('layouts.admin')
@section('page-title')
    {{ __('Pasien Create') }}
@endsection

@section('breadcrumb')
    {{--  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>  --}}
    <li class="breadcrumb-item"><a href="{{ route('pasien.index') }}">{{ __('Pasien') }}</a></li>
    <li class="breadcrumb-item">{{ __('Pasien Create') }}</li>
@endsection
@push('script-page')
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.repeater.min.js') }}"></script>
@endpush
@section('content')
    <div class="row">

        <form id="form-data">
            <div class="col-12">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label">Kewarganegaraan</label>
                                    <div id="wni">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="wni" value="1">
                                            <label class="form-check-label" for="inlineRadio1">WNI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="wni" id="inlineRadio2"
                                                value="0">
                                            <label class="form-check-label">WNA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label class="form-label">Nomor Induk Kependudukan</label>
                                    <input class="form-control" type="text" name="nik" id="nik"
                                        placeholder="5108062603930001">
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-group">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" name="nama" id="nama">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div id="jenis_kelamin">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                value="L">
                                            <label class="form-check-label" for="inlineRadio1">L</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                value="P">
                                            <label class="form-check-label">P</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">No Telpon</label>
                                    <input class="form-control" type="text" name="no_telpon" id="no_telpon">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">Provinsi</label>
                                    <select class="form-control form-control select2" id="provinsi" name="provinsi"
                                        style="width: 100%">
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group ">
                                    <label class="form-label">Kabupaten</label>
                                    <select class="form-control form-control select2" id="kabupaten" name="kabupaten"
                                        style="width: 100%">
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">Kecamatan</label>
                                    <select class="form-control form-control select2" id="kecamatan" name="kecamatan"
                                        style="width: 100%">
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label class="form-label">Desa</label>
                                    <select class="form-control form-control select2" id="desa" name="desa"
                                        style="width: 100%">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <label class="form-label">Identitas Lainnya</label>
                            <hr>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label">Nomor BPJS</label>
                                    <input class="form-control" type="text" name="no_bpjs" id="no_bpjs">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label">Nomor IKS/Nomor Premi</label>
                                    <input class="form-control" type="text" name="no_premi" id="no_premi">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="form-label">Nomor Paspor</label>
                                    <input class="form-control" type="text" name="no_paspor" id="no_paspor">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Pekerjaan</label>
                                    <div id="profesi">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profesi"
                                                value="PNS">
                                            <label class="form-check-label" for="inlineRadio1">PNS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profesi"
                                                value="Swasta">
                                            <label class="form-check-label">Swasta</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profesi"
                                                value="TNI/Polri">
                                            <label class="form-check-label">TNI/Polri </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profesi">
                                            <label class="form-check-label">Pelajar</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profesi"
                                                value="Mahasiswa">
                                            <label class="form-check-label">Mahasiswa</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profesi"
                                                value="Tidak Bekerja">
                                            <label class="form-check-label">Tidak Bekerja</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="profesi"
                                                value="lainnya">
                                            <label class="form-check-label">Lainnya</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Agama</label>
                                    <div id="agama">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="inlineRadio1" value="ISLAM">
                                            <label class="form-check-label">Islam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="inlineRadio2" value="HINDU">
                                            <label class="form-check-label">Hindu</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="inlineRadio2" value="BUDHA">
                                            <label class="form-check-label">Budha</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="inlineRadio2" value="KRISTEN">
                                            <label class="form-check-label">Kristen</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="inlineRadio2" value="KATOLIK">
                                            <label class="form-check-label">Katolik</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="inlineRadio2" value="KONGHUCU">
                                            <label class="form-check-label">Konghucu</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Status Pernikahan</label>
                                    <div id="status_pernikahan">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_pernikahan"
                                                value="Single">
                                            <label class="form-check-label">Single</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_pernikahan"
                                                value="Menikah">
                                            <label class="form-check-label">Menikah</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_pernikahan"
                                                value="Bercerai">
                                            <label class="form-check-label">Bercerai</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_pernikahan"
                                                value="Janda/Duda">
                                            <label class="form-check-label">Janda/Duda</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Pendidikan Terkahir</label>
                                    <div id="pendidikan_terkahir">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terkahir"
                                                value="Tidak Sekolah">
                                            <label class="form-check-label" for="inlineRadio1">Tidak Sekolah</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terkahir"
                                                value="SD">
                                            <label class="form-check-label">SD</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terkahir"
                                                value="SLTP">
                                            <label class="form-check-label">SLTP</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terkahir"
                                                value="SLTP sederajat">
                                            <label class="form-check-label">SLTP sederajat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terkahir"
                                                value="SLTA sederajat">
                                            <label class="form-check-label">SLTA sederajat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terkahir"
                                                value="D1-D3 sederajat">
                                            <label class="form-check-label">D1-D3 sederajat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pendidikan_terkahir"
                                                value="D1-D3 sederajat">
                                            <label class="form-check-label">D1-D3 sederajat</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">

                            <button class="btn btn-light">{{ __('Cancel') }}</button>
                            <button class="btn btn-primary ml-2" id="btn-submit">{{ __('Create') }}</button>
                        </div>
        </form>

    </div>
@endsection
@push('script-page')
    @include('pasien.script')
    <script>
        $(document).ready(function() {

            loadProvinsi();
            $(document).on('click', '#btn-submit', function(e) {
                e.preventDefault();
                $('.text-danger').remove();
                $(".form-group").removeClass('has-error has-feedback');
                var url = "{{ $url }}";
                var form = $('#form-data')[0];
                var formData = new FormData(form);
                var findForm = $("#form-data");

                // Format tanggal_lahir to d-m-Y using jQuery and Moment.js
                var tanggalLahirInput = $('input[name="tanggal_lahir"]');
                var tanggalLahirValue = tanggalLahirInput.val();
                if (tanggalLahirValue) {
                    var formattedDate = moment(tanggalLahirValue).format('DD-MM-YYYY');
                    formData.set('tanggal_lahir', formattedDate);
                }

                swal({
                    title: "Anda Yakin?",
                    text: "Proses tidak dapat dibatalkan",
                    icon: "warning",
                    buttons: [
                        'Tidak, Batalkan!',
                        'Ya, Saya yakin!'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        let ajaxPost = ajaxRequest(url, 'POST', formData).done(function(res) {
                            console.log('res')
                            swal({
                                icon: 'success',
                                title: res.message,
                                showConfirmButton: false,
                            }).then(function() {
                                window.location.replace(
                                    "{{ route('pasien.index') }}");
                            });

                            show_toastr('error', xhr.responseJSON?.message);

                        })
                        ajaxPost.fail(function(e) {
                            console.log('e', e);
                            swal({
                                icon: 'warning',
                                title: e.responseJSON.message,
                                showConfirmButton: false,
                            });
                            if (parseInt(e.status) == 422) {
                                $.each(e.responseJSON.errors, function(elem, messages) {
                                    findForm.find('#' + elem).after(
                                        '<p class="text-danger text-sm">' +
                                        messages.join('') + '</p>');
                                    //ADD HAS FEEDBACK CLASS
                                    findForm.find('#' + elem).closest(
                                        '.form-group').addClass(
                                        "has-error has-feedback");

                                });
                            }
                        })
                    }
                })

            })
        });
    </script>
@endpush
