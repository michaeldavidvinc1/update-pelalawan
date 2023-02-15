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
                <table class="table table-hover data-table display compac row-border text-sm-start"
                    id="tableOrganisasi">
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
                    <tbody>
                        @foreach ($organisasi as $data)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $data->name_organisasi }}</td>
                                <td class="text-center">{{ $data->nama_organisasi }}</td>
                                <td class="text-center">
                                    @if ($data->kelompok == 'faskes')
                                        Faskes
                                    @elseif ($data->kelompok == 'nonfaskes')
                                        Non Faskes
                                    @endif
                                </td>
                                <td class="text-center">{{ $data->desa }}</td>
                                <td class="text-center">{{ $data->kecamatan }}</td>
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
                <table class="table table-hover data-table display compac row-border text-sm-start"
                    id="tableKontrasepsi">
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

{{-- Alat Kontrasepsi Page End --}}

{{-- Keluarga Page Start --}}

<div class="modal fade" id="jamsekdaTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Jamkesda</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start"
                    id="tableJamkesda">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">No KK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Tempat Lahir</th>
                            <th class="text-center">Tanggal Lahir</th>
                            <th class="text-center">Status Kawin</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center">Status Dalam Keluarga</th>
                            <th class="text-center">Status Jamkesda</th>
                        </tr>
                    </thead>
                    @foreach ($jamkesda as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $data->nik }}</td>
                            <td class="text-center">{{ $data->no_kk }}</td>
                            <td class="text-center">{{ $data->nama }}</td>
                            <td class="text-center">{{ $data->jenis_kelamin }}</td>
                            <td class="text-center">{{ $data->tempat_lahir }}</td>
                            <td class="text-center">{{ $data->tanggal_lahir }}</td>
                            <td class="text-center">{{ $data->status_keluarga }}</td>
                            <td class="text-center">{{ $data->agama }}</td>
                            <td class="text-center">{{ $data->status_kawin }}</td>
                            <td class="text-center">{{ $data->status_jamkesda }}</td>
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
        $('#tableJamkesda').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Keluarga Page End --}}

{{-- Inventaris Page Start --}}

<div class="modal fade" id="inventarisTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5 text-center" id="modelHeading">Data Aset</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover data-table display compac row-border text-sm-start"
                    id="tableInventaris">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-center">Nama Aset</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Kondisi</th>
                        </tr>
                    </thead>
                    @foreach ($inventaris as $data)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $data->tahun }}</td>
                            <td class="text-center">{{ $data->nama_aset }}</td>
                            <td class="text-center">{{ $data->jumlah }}</td>
                            <td class="text-center">{{ $data->kondisi }}</td>
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
        $('#tableInventaris').DataTable({
            fixedHeader: true,
            paginate: true,
            searching: true,
        });
    });
</script>

{{-- Inventaris Page End --}}
