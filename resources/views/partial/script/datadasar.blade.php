{{-- Faskes Page Start --}}

<div class="modal fade" id="faskesTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Faskes</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tableApotik">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Tempat Usaha</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Bidang Usaha</th>
                            <th class="text-center">Apoteker</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->name_apotik }}</td>
                                <td class="text-center">{{ $data->alamat_apotik }}</td>
                                <td class="text-center">{{ $data->bidang_usaha }}</td>
                                <td class="text-center">{{ $data->apoteker }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableApotik').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true
        });
    });
</script>


{{-- Faskes Page End --}}


{{-- Nakes Page Start --}}

<div class="modal fade" id="nakesTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Nakes</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tableNakes">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">Konsentrasi Nakes</th>
                            <th class="text-center">Spesialis Nakes</th>
                            <th class="text-center">Organisasi Nakes</th>
                        </tr>
                    </thead>
                    @foreach ($nakes as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->nama_nakes }}</td>
                                <td class="text-center">{{ $data->nama_konsentrasi }}</td>
                                <td class="text-center">{{ $data->nama_spesialis }}</td>
                                <td class="text-center">{{ $data->name_organisasi }}</td>
                            </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableNakes').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Nakes Page End --}}

{{-- Organisasi Page Start --}}

<div class="modal fade" id="organisasiTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Organisasi</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tableOrganisasi">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Organisasi</th>
                            <th class="text-center">Jenis Organisasi</th>
                            <th class="text-center">Kelompok</th>
                            <th class="text-center">Desa</th>
                            <th class="text-center">Kecamatan</th>
                        </tr>
                    </thead>
                    @foreach ($organisasi as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->name_organisasi }}</td>
                                <td class="text-center">{{ $data->nama_organisasi }}</td>
                                <td class="text-center">
                                    @if( $data->kelompok  == "faskes")
                                        Faskes
                                    @elseif ( $data->kelompok == "nonfaskes")
                                        Non Faskes
                                    @endif
                                </td>
                                <td class="text-center">{{ $data->desa }}</td>
                                <td class="text-center">{{ $data->kecamatan }}</td>
                            </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableOrganisasi').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Organisasi Page End --}}

{{-- Penyakit Page Start --}}

<div class="modal fade" id="penyakitTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Penyakit</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tablePenyakit">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Penyakit</th>
                        </tr>
                    </thead>
                    @foreach ($penyakit as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->tahun }}</td>
                                <td class="text-center">{{ $data->nama_penyakit }}</td>
                            </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tablePenyakit').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Penyakit Page End --}}

{{-- Obat Page Start --}}

<div class="modal fade" id="obatTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Obat</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tableObat">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Obat Paten</th>
                            <th class="text-center">Obat Generik</th>
                        </tr>
                    </thead>
                    @foreach ($penggunaanObat as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->tahun }}</td>
                                <td class="text-center">{{ $data->obat_paten }}</td>
                                <td class="text-center">{{ $data->obat_generik }}</td>
                            </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableObat').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Obat Page End --}}

{{-- Alat Kontrasepsi Page Start --}}

<div class="modal fade" id="kontrasepsiTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Alat Kontrasepsi</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start" id="tableKontrasepsi">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Alat Kontrasepsi</th>
                        </tr>
                    </thead>
                    @foreach ($kontrasepsi as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->tahun }}</td>
                                <td class="text-center">{{ $data->nama_kontrasepsi }}</td>
                            </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableKontrasepsi').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Obat Page End --}}
