                    <?= $this->extend('/layout/template') ?>
                    <?= $this->section('content') ?>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-2">Jadwal Temu</h4>
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambahJadwal">Tambah Jadwal</button>

                        <!-- Hoverable Table rows -->
                        <div class="card">
                            <h5 class="card-header">Data Jadwal Temu</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Dokter</th>
                                            <th>Spesialisasi</th>
                                            <th>Nama Pasien</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $no = 1;
                                        foreach ($jadwal as $d): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= esc($d['nama_dokter']) ?></td>
                                                <td><?= esc($d['spesialisasi']) ?></td>
                                                <td><?= esc($d['nama_pasien']) ?></td>
                                                <td><?= esc($d['waktu_jadwal']) ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalEditJadwal"
                                                        data-id="<?= $d['id'] ?>"
                                                        data-id_dokter="<?= $d['id_dokter'] ?>"
                                                        data-id_pasien="<?= $d['id_pasien'] ?>"
                                                        data-waktu="<?= date('Y-m-d\TH:i', strtotime($d['waktu_jadwal'])) ?>">
                                                        <span class="tf-icons bx bx-pencil"></span>
                                                    </button>
                                                    <button class="btn btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalHapusJadwal"
                                                        data-id="<?= $d['id'] ?>"
                                                        data-dokter="<?= $d['nama_dokter'] ?>"
                                                        data-pasien="<?= $d['nama_pasien'] ?>">
                                                        <i class="bx bx-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Modal Tambah -->
                        <form action="/jadwal/simpan" method="post">
                            <div class="modal fade" id="modalTambahJadwal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Jadwal Temu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="col mb-3">
                                                    <label class="form-label">Nama Dokter</label>
                                                    <select name="id_dokter" class="form-select" required>
                                                        <option value="">Pilih Dokter</option>
                                                        <?php foreach ($dokter as $d): ?>
                                                            <option value="<?= $d['id'] ?>"><?= $d['nama'] ?> - <?= $d['spesialisasi'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label">Nama Pasien</label>
                                                    <select name="id_pasien" class="form-select" required>
                                                        <option value="">Pilih Pasien</option>
                                                        <?php foreach ($pasien as $p): ?>
                                                            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label class="form-label">Tanggal dan Waktu</label>
                                                    <input type="datetime-local" name="waktu_jadwal" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <!-- Modal Edit -->
                        <div class="modal fade" id="modalEditJadwal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Edit Data Pasien</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/jadwal/simpan" method="post">
                                        <input type="hidden" name="id" id="edit-id">
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                <div class="col mb-3">
                                                    <label class="form-label">Nama Dokter</label>
                                                    <select name="id_dokter" id="edit-dokter" class="form-select" required>
                                                        <?php foreach ($dokter as $d): ?>
                                                            <option value="<?= $d['id'] ?>"><?= $d['nama'] ?> - <?= $d['spesialisasi'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col mb-3">
                                                    <label class="form-label">Nama Pasien</label>
                                                    <select name="id_pasien" id="edit-pasien" class="form-select" required>
                                                        <?php foreach ($pasien as $p): ?>
                                                            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label class="form-label">Tanggal dan Waktu</label>
                                                    <input type="datetime-local" name="waktu_jadwal" id="edit-waktu" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="modalHapusJadwal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="/jadwal/hapus" method="post">
                                        <input type="hidden" name="id" id="hapus-id">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Jadwal Temu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus jadwal antara <strong id="hapus-dokter"></strong> dan <strong id="hapus-pasien"></strong>?</p>
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
                                const modal = document.getElementById('modalHapusJadwal');
                                modal.addEventListener('show.bs.modal', function(event) {
                                    const button = event.relatedTarget;

                                    modal.querySelector('#hapus-id').value = button.getAttribute('data-id');
                                    modal.querySelector('#hapus-dokter').textContent = button.getAttribute('data-dokter');
                                    modal.querySelector('#hapus-pasien').textContent = button.getAttribute('data-pasien');
                                });
                            });
                        </script>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const modalEdit = document.getElementById('modalEditJadwal');
                                modalEdit.addEventListener('show.bs.modal', function(event) {
                                    const button = event.relatedTarget;

                                    modalEdit.querySelector('#edit-id').value = button.getAttribute('data-id');
                                    modalEdit.querySelector('#edit-dokter').value = button.getAttribute('data-id_dokter');
                                    modalEdit.querySelector('#edit-pasien').value = button.getAttribute('data-id_pasien');
                                    modalEdit.querySelector('#edit-waktu').value = button.getAttribute('data-waktu');
                                });
                            });
                        </script>

                        <?= $this->endSection() ?>