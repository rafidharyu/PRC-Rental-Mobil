<!-- Modal -->
<div class="modal fade" id="modalBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">CONTINUE CAR RESERVATION</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="bg-secondary rounded p-5">
                {{-- <h4 class="text-white mb-4">CONTINUE CAR RESERVATION</h4> --}}
                <form action="{{ route('book.attempt') }}" method="post" role="form" id="bookForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="ms-1">Nama</span>
                                </div>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="name" placeholder="Nama Anda" value="{{ old('name') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="ms-1">Email</span>
                                </div>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" placeholder="Email Anda" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="ms-1">No. HP</span>
                                </div>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" placeholder="No. HP Anda" value="{{ old('phone') }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <select name="car_id" id="car_id" class="form-select @error('car_id') is-invalid @enderror" aria-label="Default select example">
                                <option value="" hidden>Pilih Jenis Mobil</option>
                                @foreach ($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->name }}</option>
                                @endforeach
                                {{-- <option value="new_avanza">New Avanza</option>
                                <option value="avanza">Avanza</option>
                                <option value="brio">Brio</option>
                                <option value="xpander">Xpander</option>
                                <option value="new_rush">New Rush</option>
                                <option value="innova_reborn">Innova Reborn</option>
                                <option value="fortuner_vrz">Fortuner VRZ</option>
                                <option value="pajero">Pajero</option> --}}
                            </select>

                            @error('car_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="fas fa-map-marker-alt"></span> <span class="ms-1">Pick Up</span>
                                </div>

                                <select name="pick_option" id="pick_option" class="form-select @error('pick_option') is-invalid @enderror">
                                    <option value="" hidden>Pilih Lokasi Pengambilan</option>
                                    <option value="garasi">Garasi</option>
                                    <option value="tempat_lain">Tempat Lain</option>
                                </select>

                                @error('pick_option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="fas fa-map-marker-alt"></span><span class="ms-1">Drop off</span>
                                </div>
                                <select name="drop_option" id="drop_option" class="form-select @error('drop_option') is-invalid @enderror">
                                    <option value="" hidden>Pilih Lokasi Pengembalian</option>
                                    <option value="garasi">Garasi</option>
                                    <option value="tempat_lain">Tempat Lain</option>
                                </select>

                                @error('drop_option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="fas fa-calendar-alt"></span><span class="ms-1">Pick Up</span>
                                </div>
                                <input class="form-control" type="date" name="pick_date" value="{{ old('pick_date') }}" required>
                                <select class="form-select ms-3" name="pick_time" aria-label="Default select example">
                                    <option value="06:00" {{ old('pick_time') == '06:00' ? 'selected' : '' }}>6:00 Pagi</option>
                                    <option value="07:00" {{ old('pick_time') == '07:00' ? 'selected' : '' }}>7:00 Pagi</option>
                                    <option value="08:00" {{ old('pick_time') == '08:00' ? 'selected' : '' }}>8:00 Pagi</option>
                                    <option value="09:00" {{ old('pick_time') == '09:00' ? 'selected' : '' }}>9:00 Pagi</option>
                                    <option value="10:00" {{ old('pick_time') == '10:00' ? 'selected' : '' }}>10:00 Pagi</option>
                                    <option value="11:00" {{ old('pick_time') == '11:00' ? 'selected' : '' }}>11:00 Pagi</option>
                                    <option value="12:00" {{ old('pick_time') == '12:00' ? 'selected' : '' }}>12:00 Siang</option>
                                    <option value="13:00" {{ old('pick_time') == '13:00' ? 'selected' : '' }}>1:00 Siang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="fas fa-calendar-alt"></span><span class="ms-1">Drop Off</span>
                                </div>
                                <input class="form-control" type="date" name="drop_date" value="{{ old('drop_date') }}" required>
                                <select class="form-select ms-3" name="drop_time" aria-label="Default select example">
                                    <option value="06:00" {{ old('drop_time') == '06:00' ? 'selected' : '' }}>6:00 Pagi</option>
                                    <option value="07:00" {{ old('drop_time') == '07:00' ? 'selected' : '' }}>7:00 Pagi</option>
                                    <option value="08:00" {{ old('drop_time') == '08:00' ? 'selected' : '' }}>8:00 Pagi</option>
                                    <option value="09:00" {{ old('drop_time') == '09:00' ? 'selected' : '' }}>9:00 Pagi</option>
                                    <option value="10:00" {{ old('drop_time') == '10:00' ? 'selected' : '' }}>10:00 Pagi</option>
                                    <option value="11:00" {{ old('drop_time') == '11:00' ? 'selected' : '' }}>11:00 Pagi</option>
                                    <option value="12:00" {{ old('drop_time') == '12:00' ? 'selected' : '' }}>12:00 Siang</option>
                                    <option value="13:00" {{ old('drop_time') == '13:00' ? 'selected' : '' }}>1:00 Siang</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <select name="drive_option" id="drive_option" class="form-select @error('drive_option') is-invalid @enderror" aria-label="Default select example">
                                <option value="" hidden>Pilih Jenis Pengemudi</option>
                                <option value="menyetir_sendiri">Menyetir Sendiri</option>
                                <option value="dikemudikan_oleh_sopir">Include Sopir</option>
                            </select>

                            @error('drive_option')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <a href="#" class="text-start text-white d-block mb-2">Upload Bukti Pembayaran DP,<span>     </span>jika diperlukan: </a>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">

                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="input-group">
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5"
                                placeholder="Catatan :
- Berikan catatan yang diinginkan.
- Berikan alamat lokasi jika memilih opsi 'tempat lain'.
- Upload file bukti pembayaran jika sudah memberikan DP.">{{ old('message') }}</textarea>

                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="agree" required>
                                <label class="form-check-label" for="agree">
                                    Saya setuju dengan <a href="{{ route('blog') }}">syarat dan kondisi</a> yang berlaku
                                </label>
                                <div class="invalid-feedback">
                                    Anda harus menyetujui syarat dan kondisi
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" form="bookForm" class="btn btn-primary">Kirim</button>
        </div>
      </div>
    </div>
  </div>
