@extends('frontend.template.main')

@section('title', 'Testimonial')
@section('head', 'Our Testimonial')

@section('content')
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
                            <form action="{{ route('review.attempt') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="code">Code Transaction</label>
                                    <input type="text" name="code" id="code"
                                        class="form-control @error('code')
                           'is-invalid'
                       @enderror"
                                        value="{{ old('code') }}">

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="rate">Rating <span style="color: gold;">&#9733;</span></label>
                                    <select name="rate" id="rate" class="form-select">
                                        <option value="" hidden>-- Choose Review --</option>
                                        <option value="1" style="color: gold;">&#9733;</option>
                                        <option value="2" style="color: gold;">&#9733;&#9733;</option>
                                        <option value="3" style="color: gold;">&#9733;&#9733;&#9733;</option>
                                        <option value="4" style="color: gold;">&#9733;&#9733;&#9733;&#9733;</option>
                                        <option value="5" style="color: gold;">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                    </select>

                                    @error('rate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" cols="5" rows="5"
                                        class="form-control @error('code')
                           'is-invalid'
                       @enderror">{{ old('comment') }}</textarea>

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const select = document.getElementById('rate');

    select.addEventListener('change', function () {
        // Ambil opsi yang dipilih
        const selectedOption = select.options[select.selectedIndex];
        // Terapkan warna emas ke elemen dropdown
        select.style.color = 'gold';
        select.style.fontWeight = 'bold';
    });
</script>

@endsection
