@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="#" onclick="ModalTambahVideos()" class="btn btn-success mb-3"> + Add New Data</a>

            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th>Kode Videos</th>
                        <th>Judul Videos</th>
                        <th>Gambar Videos</th>
                        <th>Link Videos</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->kd_videos }}</td>
                        <td>{{ $video->judul_videos }}</td>
                        <td>
                            <a href="{{ $video->gambar_videos }}" target="_blank">
                                <img src="{{ $video->gambar_videos }}" alt="Gambar Videos" style="width: 100px; height: auto;">
                            </a>
                        </td>
                        <td>
                            <a href="{{ $video->link_videos }}" target="_blank">{{ $video->link_videos }}</a>
                        </td>
                        <td>
                            <a href="#" onclick="ModalEditVideos(`{{ $video->kd_videos }}`, `{{ addslashes($video->judul_videos) }}`, `{{ addslashes($video->gambar_videos) }}`, `{{ addslashes($video->link_videos) }}`)" class="btn btn-info">Update</a>
                            <a href="#" onclick="ModalHapusVideos('{{ $video->kd_videos }}')" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Form Modal Tambah Videos-->
            <form action="videos/tambah" method="post">
                @csrf
                <div class="modal fade" id="ModalTambahVideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Tambah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode Videos</label>
                                    <input type="text" class="form-control" name="kd_videos" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul Videos</label>
                                    <textarea name="judul_videos" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Videos</label>
                                    <input type="text" class="form-control" name="gambar_videos" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Videos</label>
                                    <textarea name="link_videos" class="form-control" required></textarea>
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

          <!-- Form Modal Hapus Videos-->
          <form action="videos/hapus" method="post">
    @csrf
    <div class="modal fade" id="ModalHapusVideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <input type="hidden" name="kd_videos" id="kd_videos_hapus">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" name="hapus" value="Hapus">
                </div>
            </div>
        </div>
    </div>
</form>

            <form action="videos/edit" method="post">
                @csrf
                <div class="modal fade" id="ModalEditVideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Ubah</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Kode Videos</label>
                                    <input type="text" class="form-control" name="kd_videos" id="edit_kd_videos" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Judul Videos</label>
                                    <input type="text" class="form-control" name="judul_videos" id="edit_judul_videos" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Videos</label>
                                    <input type="text" class="form-control" name="gambar_videos" id="edit_gambar_videos" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Link Videos</label>
                                    <input type="text" class="form-control" name="link_videos" id="edit_link_videos" required>
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
                function ModalTambahVideos() {
                    var modal = new bootstrap.Modal(document.getElementById('ModalTambahVideos'));
                    modal.show();
                }


    function ModalHapusVideos(kd_videos) {
        document.getElementById('kd_videos_hapus').value = kd_videos;
        var modal = new bootstrap.Modal(document.getElementById('ModalHapusVideos'));
        modal.show();
    }



                function ModalEditVideos(kd_videos, judul_videos, gambar_videos, link_videos) {
                    document.getElementById('edit_kd_videos').value = kd_videos;
                    document.getElementById('edit_judul_videos').value = judul_videos;
                    document.getElementById('edit_gambar_videos').value = gambar_videos;
                    document.getElementById('edit_link_videos').value = link_videos;
                    var modal = new bootstrap.Modal(document.getElementById('ModalEditVideos'));
                    modal.show();
                }
            </script>
        </div>
    </div>
</div>
@endsection
