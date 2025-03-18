<!-- Modal -->
<div class="modal fade" id="downloadModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fas fa-file-excel"></i> Unduh Laporan Transaksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('panel.transaction.download') }}" method="post"
                    id="downloadForm">
                    @csrf
                    <div class="mb-3">
                        <label for="start_date">Dari Tanggal</label>
                        <input type="date" name="start_date" id="start_date"
                            class="form-control @error('start_date') is-invalid @enderror"
                            value="{{ old('start_date') }}">

                        @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="end_date">Sampai Tanggal</label>
                        <input class="form-control @error('end_date') is-invalid @enderror" type="date" id="end_date"
                            name="end_date" value="{{ old('end_date') }}" required
                            min="{{ old('start_date') ? old('start_date') : date('Y-m-d') }}">

                        @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i>
                    Batal</button>
                <button type="submit" form="downloadForm" class="btn btn-secondary"><i class="fas fa-save"></i>
                    Kirim</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('start_date').addEventListener('change', function() {
        var startDate = this.value;
        document.getElementById('end_date').setAttribute('min', startDate);
    });

    document.getElementById('downloadForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = this;
        var formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        }).then(response => response.blob())
        .then(blob => {
            if (blob.size > 0) {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = 'laporan-transaksi.xlsx';
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Laporan berhasil diunduh!',
                    showConfirmButton: false,
                    timer: 1500
                });
                form.reset();
                var modal = bootstrap.Modal.getInstance(document.getElementById('downloadModal'));
                modal.hide();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Terjadi kesalahan saat mengunduh laporan.',
                });
            }
        }).catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Terjadi kesalahan saat mengunduh laporan.',
            });
        });
    });
</script>

<script>
    document.getElementById('start_date').addEventListener('change', function() {
        var startDate = this.value;
        document.getElementById('end_date').setAttribute('min', startDate);
    });
</script>


