<div class="modal fade" id="exampleModal-@yield('angka'){{ $d->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $d->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3>Apakah Kamu Yakin Ingin Menghapus Data Ini??</h3>
        </div>
        <div class="modal-footer">
          <form action="@yield('contentModal')" method="POST">
          @csrf
          @method('DELETE')
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya, Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>