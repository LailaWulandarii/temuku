                    <?= $this->extend('/layout/template') ?>
                    <?= $this->section('content') ?>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-2">Data Dokter</h4>
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambahDokter">Tambah Dokter</button>

                        <!-- Hoverable Table rows -->
                        <div class="card">
                            <h5 class="card-header">Data Dokter</h5>
                            <div class="table-responsive text-nowrap">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Lengkap</th>
                                            <th>Spesialisasi</th>
                                            <th>Foto Diri</th>
                                            <th>Tanda Tangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $no = 1;
                                        foreach ($dokter as $d): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= esc($d['nama']) ?></td>
                                                <td><?= esc($d['spesialisasi']) ?></td>
                                                <td>
                                                    <img src="<?= base_url('assets/img/foto/' . $d['foto']) ?>" class="fotoktp" alt="Foto <?= $d['nama'] ?>" width="100">
                                                </td>
                                                <td>
                                                    <img src="<?= base_url('assets/img/ttd/' . $d['ttd']) ?>" class="fotottd" alt="TTD <?= $d['nama'] ?>" width="100">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalEditDokter"
                                                        data-id="<?= $d['id'] ?>"
                                                        data-nama="<?= $d['nama'] ?>"
                                                        data-spesialisasi="<?= $d['spesialisasi'] ?>"
                                                        data-foto="<?= $d['foto'] ?>"
                                                        data-ttd="<?= $d['ttd'] ?>">
                                                        <span class="tf-icons bx bx-pencil"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalHapusDokter"
                                                        data-id="<?= $d['id'] ?>"
                                                        data-nama="<?= $d['nama'] ?>">
                                                        <span class="tf-icons bx bx-trash"></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="modalTambahDokter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data Dokter</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/dokter/simpan" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="col mb-3">
                                                    <label for="nama" class="form-label">Nama Dokter</label>
                                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama dokter" required>
                                                </div>
                                                <div class="col mb-3">
                                                    <label for="spesialisasi" class="form-label">Spesialisasi</label>
                                                    <select name="spesialisasi" class="form-select" required>
                                                        <option value="">Pilih Spesialisasi</option>
                                                        <option value="Anak">Anak</option>
                                                        <option value="Penyakit Dalam">Penyakit Dalam</option>
                                                        <option value="Bedah">Bedah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="foto" class="form-label">Foto Diri</label>
                                                    <input class="form-control" type="file" name="foto" required>
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="ttd" class="form-label">Tanda Tangan</label>
                                                    <input class="form-control" type="file" name="ttd" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEditDokter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Edit Data Dokter</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/dokter/simpan" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="edit-id">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Dokter</label>
                                                <input type="text" name="nama" id="edit-nama" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Spesialisasi</label>
                                                <input type="text" name="spesialisasi" id="edit-spesialisasi" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Foto Lama</label><br>
                                                <img id="preview-foto" src="" width="100">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ganti Foto</label>
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">TTD Lama</label><br>
                                                <img id="preview-ttd" src="" width="100">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Ganti TTD</label>
                                                <input type="file" name="ttd" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="modalHapusDokter" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="/dokter/hapus" method="post">
                                        <input type="hidden" name="id" id="hapus-id">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Dokter</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong id="hapus-nama"></strong> dari daftar dokter?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const modalEdit = document.getElementById('modalEditDokter');
                                modalEdit.addEventListener('show.bs.modal', function(event) {
                                    const button = event.relatedTarget;

                                    modalEdit.querySelector('#edit-id').value = button.getAttribute('data-id');
                                    modalEdit.querySelector('#edit-nama').value = button.getAttribute('data-nama');
                                    modalEdit.querySelector('#edit-spesialisasi').value = button.getAttribute('data-spesialisasi');

                                    const foto = button.getAttribute('data-foto');
                                    const ttd = button.getAttribute('data-ttd');

                                    modalEdit.querySelector('#preview-foto').src = `/assets/img/foto/${foto}`;
                                    modalEdit.querySelector('#preview-ttd').src = `/assets/img/ttd/${ttd}`;
                                });
                            });
                        </script>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const modalHapus = document.getElementById('modalHapusDokter');
                                modalHapus.addEventListener('show.bs.modal', function(event) {
                                    const button = event.relatedTarget;
                                    const id = button.getAttribute('data-id');
                                    const nama = button.getAttribute('data-nama');

                                    modalHapus.querySelector('#hapus-id').value = id;
                                    modalHapus.querySelector('#hapus-nama').textContent = nama;
                                });
                            });
                        </script>

                        <?= $this->endSection() ?>