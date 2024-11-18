<div class="container-fluid testimonial pt-5 pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize mb-3">Reviews<span class="text-primary"> Klien Kami</span></h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item">
                <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                </div>
                <div class="testimonial-inner p-4">
                    {{-- <img src="{{ asset('frontend') }}/img/testimonial-1.jpg" class="img-fluid" alt=""> --}}
                    <div class="ms-4">
                        <h4>Person Name</h4>
                        <div class="d-flex text-primary">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star text-body"></i>
                        </div>
                    </div>
                </div>
                <div class="border-top rounded-bottom p-4">
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam soluta neque ab
                        repudiandae reprehenderit ipsum eos cumque esse repellendus impedit.</p>
                </div>
            </div>
        </div>

        <div class="my-5">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow mx-4">
                        <div class="bg-secondary rounded p-5">
                            <h4 class="text-white mb-4">Berikan Penilaian Anda</h4>
                            <form>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <div class="d-flex align-items-center bg-light text-body rounded-start p-1">
                                                    <span class="ms-1">Kode</span>
                                                </div>
                                                <input type="text" name="code"
                                                    class="form-control @error('code') is-invalid @enderror" id="code"
                                                    placeholder="Kode Transaksi Anda" value="{{ old('code') }}">

                                                @error('code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <div class="rating-container">
                                                    <label for="rate">Rating</label>
                                                    <div class="star-rating">
                                                        <input type="radio" id="star5" name="rate" value="5" />
                                                        <label for="star5" title="5 stars">&#9733;</label>
                                                        <input type="radio" id="star4" name="rate" value="4" />
                                                        <label for="star4" title="4 stars">&#9733;</label>
                                                        <input type="radio" id="star3" name="rate" value="3" />
                                                        <label for="star3" title="3 stars">&#9733;</label>
                                                        <input type="radio" id="star2" name="rate" value="2" />
                                                        <label for="star2" title="2 stars">&#9733;</label>
                                                        <input type="radio" id="star1" name="rate" value="1" />
                                                        <label for="star1" title="1 star">&#9733;</label>
                                                    </div>
                                                </div>

                                                @error('rate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group">
                                                    <textarea
                                                        class="form-control @error('comment') is-invalid @enderror"
                                                        name="comment" rows="5"
                                                        placeholder="Berikan Komentar Anda">{{ old('comment') }}</textarea>

                                                    @error('comment')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-light w-100 py-2">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
