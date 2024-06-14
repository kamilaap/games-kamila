@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="#" onclick="ModalTambahTrick()" class="btn btn-success mb-3"> + Add New Data</a>

            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th>Kode Tips and Trick</th>
                        <th>Judul Tips and Trick</th>
                        <th>Gambar Tips and Trick</th>
                        <th>Link Tips and Trick</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trick as $trick)
                    <tr>
                        <td>{{ $trick->kd_trick }}</td>
                        <td>{{ $trick->judul_trick }}</td>
                        <td>
                            <a href="{{ $trick->gambar_trick }}" target="_blank">
                                <img src="{{ $trick->gambar_trick }}" alt="Gambar Trick" style="width: 100px; height: auto;">
                            </a>
                        </td>
                        <td>
                            <a href="{{ $trick->link_trick }}" target="_blank">{{ $trick->link_trick }}</a>
                        </td>
                        <td>
                            <a href="#" onclick="ModalEditTrick(`{{ $trick->kd_trick }}`, `{{ addslashes($trick->judul_trick) }}`, `{{ addslashes($trick->gambar_trick) }}`, `{{ addslashes($trick->link_trick) }}`)" class="btn btn-info">Update</a>
                            <a href="#" onclick="ModalHapusTrick(`{{ $trick->kd_trick }}`)" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Form Modal Tambah Trick-->
            <form action="trick/tambah" method="post">
                @csrf
                <div class="modal fade" id="ModalTambahTrick" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Tambah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode Trick</label>
                                    <input type="text" class="form-control" name="kd_trick" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul Trick</label>
                                    <textarea name="judul_trick" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Trick</label>
                                    <input type="text" class="form-control" name="gambar_trick" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Trick</label>
                                    <textarea name="link_trick" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Form Modal Hapus Trick-->
            <form action="trick/hapus" method="post">
                @csrf
                <div class="modal fade" id="ModalHapusTrick" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                            <div class="modal-footer">
                                <input type="hidden" name="kd_trick" id="kd_trick_hapus">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" name="hapus" value="Hapus">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Form Modal Edit Trick-->
            <form action="trick/edit" method="post">
                @csrf
                <div class="modal fade" id="ModalEditTrick" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Ubah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode Trick</label>
                                    <input type="text" class="form-control" name="kd_trick" id="edit_kd_trick" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul Trick</label>
                                    <input type="text" class="form-control" name="judul_trick" id="edit_judul_trick" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Trick</label>
                                    <input type="text" class="form-control" name="gambar_trick" id="edit_gambar_trick" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Trick</label>
                                    <input type="text" class="form-control" name="link_trick" id="edit_link_trick" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" name="ubah" value="Ubah">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script>
                function ModalTambahTrick() {
                    var modal = new bootstrap.Modal(document.getElementById('ModalTambahTrick'));
                    modal.show();
                }

                function ModalHapusTrick(id) {
                    document.getElementById('kd_trick_hapus').value = id;
                    var modal = new bootstrap.Modal(document.getElementById('ModalHapusTrick'));
                    modal.show();
                }

                function ModalEditTrick(kd_trick, judul_trick, gambar_trick, link_trick) {
                    document.getElementById('edit_kd_trick').value = kd_trick;
                    document.getElementById('edit_judul_trick').value = judul_trick;
                    document.getElementById('edit_gambar_trick').value = gambar_trick;
                    document.getElementById('edit_link_trick').value = link_trick;
                    var modal = new bootstrap.Modal(document.getElementById('ModalEditTrick'));
                    modal.show();
                }
            </script>
@endsection
