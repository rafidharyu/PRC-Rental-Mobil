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
                <form>
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
                            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" aria-label="Default select example">
                                <option value="" hidden>Pilih Jenis Mobil</option>
                                <option value="new_avanza">New Avanza</option>
                                <option value="avanza">Avanza</option>
                                <option value="brio">Brio</option>
                                <option value="xpander">Xpander</option>
                                <option value="new_rush">New Rush</option>
                                <option value="innova_reborn">Innova Reborn</option>
                                <option value="fortuner_vrz">Fortuner VRZ</option>
                                <option value="pajero">Pajero</option>
                            </select>

                            @error('type')
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
                            <a href="#" class="text-start text-white d-block mb-2">Butuh lokasi pengantaran yang berbeda?</a>
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
                                <input class="form-control" type="date">
                                <select class="form-select ms-3" aria-label="Default select example">
                                    <option selected>12:00AM</option>
                                    <option value="1">1:00AM</option>
                                    <option value="2">2:00AM</option>
                                    <option value="3">3:00AM</option>
                                    <option value="4">4:00AM</option>
                                    <option value="5">5:00AM</option>
                                    <option value="6">6:00AM</option>
                                    <option value="7">7:00AM</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group">
                                <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                    <span class="fas fa-calendar-alt"></span><span class="ms-1">Drop off</span>
                                </div>
                                <input class="form-control" type="date">
                                <select class="form-select ms-3" aria-label="Default select example">
                                    <option selected>12:00AM</option>
                                    <option value="1">1:00AM</option>
                                    <option value="2">2:00AM</option>
                                    <option value="3">3:00AM</option>
                                    <option value="4">4:00AM</option>
                                    <option value="5">5:00AM</option>
                                    <option value="6">6:00AM</option>
                                    <option value="7">7:00AM</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mt-3">
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
            <button type="button" class="btn btn-primary">Kirim</button>
        </div>
      </div>
    </div>
  </div>
