                    <?= $this->extend('/layout/template') ?>
                    <?= $this->section('content') ?>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-2">Data Pasien</h4>
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambahPasien">Tambah Pasien</button>

                        <!-- Hoverable Table rows -->
                        <div class="card">
                            <h5 class="card-header">Data Pasien</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Lengkap</th>
                                            <th>Keluhan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $no = 1;
                                        foreach ($pasien as $d): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= esc($d['nama']) ?></td>
                                                <td><?= esc($d['keluhan']) ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalEditPasien"
                                                        data-id="<?= $d['id'] ?>"
                                                        data-nama="<?= $d['nama'] ?>"
                                                        data-keluhan="<?= $d['keluhan'] ?>">
                                                        <span class="tf-icons bx bx-pencil"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalHapusPasien"
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
                        <div class="modal fade" id="modalTambahPasien" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Tambah Data Pasien</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/pasien/simpan" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nama" class="form-label">Nama Pasien</label>
                                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama pasien" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="keluhan" class="form-label">Keluhan</label>
                                                    <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Masukkan keluhan" rows="3"></textarea>
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
                        <div class="modal fade" id="modalEditPasien" tabindex="-1" aria-hidden="true">
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
                                    <form action="/pasien/simpan" method="post">
                                        <input type="hidden" name="id" id="edit-id">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nama" class="form-label">Nama Pasien</label>
                                                    <input type="text" name="nama" id="edit-nama" class="form-control" placeholder="Masukkan nama pasien" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="keluhan" class="form-label">Keluhan</label>
                                                    <textarea class="form-control" name="keluhan" id="edit-keluhan" placeholder="Masukkan keluhan" rows="3"></textarea>
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

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="modalHapusPasien" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="/pasien/hapus" method="post">
                                        <input type="hidden" name="id" id="hapus-id">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Hapus Pasien</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin ingin menghapus <strong id="hapus-nama"></strong> dari daftar pasien?</p>
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
                                const modalEdit = document.getElementById('modalEditPasien');
                                modalEdit.addEventListener('show.bs.modal', function(event) {
                                    const button = event.relatedTarget;

                                    modalEdit.querySelector('#edit-id').value = button.getAttribute('data-id');
                                    modalEdit.querySelector('#edit-nama').value = button.getAttribute('data-nama');
                                    modalEdit.querySelector('#edit-keluhan').value = button.getAttribute('data-keluhan');
                                });
                            });
                        </script>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const modalHapus = document.getElementById('modalHapusPasien');
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