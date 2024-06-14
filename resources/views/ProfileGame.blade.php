@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="#" onclick="ModalTambahProfile()" class="btn btn-success mb-3"> + Add New Data</a>

            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th>Kode Profile</th>
                        <th>Judul Profile</th>
                        <th>Gambar Profile</th>
                        <th>Link Profile</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profilegame as $profilegame)
                    <tr>
                        <td>{{ $profilegame->kd_profile }}</td>
                        <td>{{ $profilegame->judul_profile }}</td>
                        <td>
                            <a href="{{ $profilegame->gambar_profile }}" target="_blank">
                                <img src="{{ $profilegame->gambar_profile }}" alt="Gambar profile" style="width: 100px; height: auto;">
                            </a>
                        </td>
                        <td>
                            <a href="{{ $profilegame->link_profile }}" target="_blank">{{ $profilegame->link_profile }}</a>
                        </td>
                        <td>
                            <a href="#" onclick="ModalEditProfile(`{{ $profilegame->kd_profile }}`, `{{ addslashes($profilegame->judul_profile) }}`, `{{ addslashes($profilegame->gambar_profile) }}`, `{{ addslashes($profilegame->link_profile) }}`)" class="btn btn-info">Update</a>
                            <a href="#" onclick="ModalHapusProfile(`{{ $profilegame->kd_profile }}`)" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Form Modal Tambah Profile-->
            <form action="profilegame/tambah" method="post">
                @csrf
                <div class="modal fade" id="ModalTambahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Tambah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode Profile</label>
                                    <input type="text" class="form-control" name="kd_profile" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul Profile</label>
                                    <textarea name="judul_profile" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Profile</label>
                                    <input type="text" class="form-control" name="gambar_profile" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Profile</label>
                                    <textarea name="link_profile" class="form-control" required></textarea>
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

            <!-- Form Modal Hapus profile-->
            <form action="profilegame/hapus" method="post">
                @csrf
                <div class="modal fade" id="ModalHapusProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                            <div class="modal-footer">
                                <input type="hidden" name="kd_profile" id="kd_profile_hapus">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" name="hapus" value="Hapus">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Form Modal Edit profile-->
            <form action="profilegame/edit" method="post">
                @csrf
                <div class="modal fade" id="ModalEditProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Ubah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode Profile</label>
                                    <input type="text" class="form-control" name="kd_profile" id="edit_kd_profile" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul Profile</label>
                                    <input type="text" class="form-control" name="judul_profile" id="edit_judul_profile" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Profile</label>
                                    <input type="text" class="form-control" name="gambar_profile" id="edit_gambar_profile" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Profile</label>
                                    <input type="text" class="form-control" name="link_profile" id="edit_link_profile" required>
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
                function ModalTambahProfile() {
                    var modal = new bootstrap.Modal(document.getElementById('ModalTambahProfile'));
                    modal.show();
                }

                function ModalHapusProfile(id) {
                    document.getElementById('kd_profile_hapus').value = id;
                    var modal = new bootstrap.Modal(document.getElementById('ModalHapusProfile'));
                    modal.show();
                }

                function ModalEditProfile(kd_profile, judul_profile, gambar_profile, link_profile) {
                    document.getElementById('edit_kd_profile').value = kd_profile;
                    document.getElementById('edit_judul_profile').value = judul_profile;
                    document.getElementById('edit_gambar_profile').value = gambar_profile;
                    document.getElementById('edit_link_profile').value = link_profile;
                    var modal = new bootstrap.Modal(document.getElementById('ModalEditProfile'));
                    modal.show();
                }
            </script>
@endsection
