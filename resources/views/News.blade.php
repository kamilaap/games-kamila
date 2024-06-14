@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="#" onclick="ModalTambahNews()" class="btn btn-success mb-3"> + Add New Data</a>

            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th>Kode News</th>
                        <th>Judul News</th>
                        <th>Gambar News</th>
                        <th>Link News</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $news)
                    <tr>
                        <td>{{ $news->kd_news }}</td>
                        <td>{{ $news->judul_news }}</td>
                        <td>
                            <a href="{{ $news->gambar_news }}" target="_blank">
                                <img src="{{ $news->gambar_news }}" alt="Gambar News" style="width: 100px; height: auto;">
                            </a>
                        </td>
                        <td>
                            <a href="{{ $news->link_news }}" target="_blank">{{ $news->link_news }}</a>
                        </td>
                        <td>
                            <a href="#" onclick="ModalEditNews(`{{ $news->kd_news }}`, `{{ addslashes($news->judul_news) }}`, `{{ addslashes($news->gambar_news) }}`, `{{ addslashes($news->link_news) }}`)" class="btn btn-info">Update</a>
                            <a href="#" onclick="ModalHapusNews(`{{ $news->kd_news }}`)" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Form Modal Tambah News-->
            <form action="news/tambah" method="post">
                @csrf
                <div class="modal fade" id="ModalTambahNews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Tambah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode News</label>
                                    <input type="text" class="form-control" name="kd_news" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul News</label>
                                    <textarea name="judul_news" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar News</label>
                                    <input type="text" class="form-control" name="gambar_news" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link News</label>
                                    <textarea name="link_news" class="form-control" required></textarea>
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

            <!-- Form Modal Hapus news-->
            <form action="news/hapus" method="post">
                @csrf
                <div class="modal fade" id="ModalHapusNews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Hapus</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                            <div class="modal-footer">
                                <input type="hidden" name="kd_news" id="kd_news_hapus">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <input type="submit" class="btn btn-primary" name="hapus" value="Hapus">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Form Modal Edit news-->
            <form action="news/edit" method="post">
                @csrf
                <div class="modal fade" id="ModalEditNews" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Ubah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode News</label>
                                    <input type="text" class="form-control" name="kd_news" id="edit_kd_news" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul News</label>
                                    <input type="text" class="form-control" name="judul_news" id="edit_judul_news" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar News</label>
                                    <input type="text" class="form-control" name="gambar_news" id="edit_gambar_news" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link News</label>
                                    <input type="text" class="form-control" name="link_news" id="edit_link_news" required>
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
                function ModalTambahNews() {
                    var modal = new bootstrap.Modal(document.getElementById('ModalTambahNews'));
                    modal.show();
                }

                function ModalHapusNews(id) {
                    document.getElementById('kd_news_hapus').value = id;
                    var modal = new bootstrap.Modal(document.getElementById('ModalHapusNews'));
                    modal.show();
                }

                function ModalEditNews(kd_news, judul_news, gambar_news, link_news) {
                    document.getElementById('edit_kd_news').value = kd_news;
                    document.getElementById('edit_judul_news').value = judul_news;
                    document.getElementById('edit_gambar_news').value = gambar_news;
                    document.getElementById('edit_link_news').value = link_news;
                    var modal = new bootstrap.Modal(document.getElementById('ModalEditNews'));
                    modal.show();
                }
            </script>
@endsection
