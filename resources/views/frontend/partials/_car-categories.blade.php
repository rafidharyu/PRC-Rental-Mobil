<div class="container-fluid categories pt-5 pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
            <h1 class="display-5 text-capitalize mb-3">Pilihan <span class="text-judul">Mobil</span></h1>
            <p class="mb-0">Kami menyediakan berbagai pilihan kendaraan sesuai kebutuhan Anda. Mulai dari mobil
                keluarga yang nyaman, mobil mewah untuk acara spesial, hingga kendaraan praktis untuk perjalanan
                sehari-hari. Dengan pilihan yang beragam, Anda dapat dengan mudah menemukan kendaraan yang tepat untuk
                disewa, sesuai dengan selera dan anggaran Anda.
        </div>
        <div class="categories-carousel owl-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($cars as $car)
                <div class="categories-item p-4">
                    <div class="categories-item-inner">
                        <div class="categories-img img rounded-top">
                            <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid w-100 rounded-top"
                                alt="{{ $car->name }}">
                        </div>
                        <div class="categories-content rounded-bottom p-4">
                            <h4>{{ $car->name }}</h4>
                            <div class="mb-4">
                                <h5 class="text-body">Status:
                                    <span class="{{ $car->status == 'available' ? 'text-success' : 'text-danger' }}">
                                        {{ $car->status == 'available' ? 'Tersedia' : 'Tidak Tersedia' }}
                                    </span>
                                </h5>
                            </div>
                            <div class="mb-4">
                                <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">Rp.
                                    {{ number_format($car->price_day, 0, ',', '.') }}/Day
                                </h4>
                            </div>
                            <div class="row gy-2 gx-0 text-center mb-4 d-flex justify-content-center">
                                <div class="col-4 border-end border-white">
                                    <i class="fa fa-users text-dark"></i> <span
                                        class="text-body ms-1">{{ $car->seat }} Seat</span>
                                </div>
                                <div class="col-4 border-end border-white">
                                    <i class="fa fa-cogs text-dark"></i> <span
                                        class="text-body ms-1">{{ $car->transmisi }}</span>
                                </div>
                            </div>
                            <div class="row gy-2 gx-0 text-center mb-4 d-flex justify-content-center">
                                <div class="col-4 border-end border-white">
                                    <i class="fa fa-car text-dark"></i> <span
                                        class="text-body ms-1">{{ $car->year_of_car }}</span>
                                </div>
                                <div class="col-4">
                                    <i class="fa fa-gas-pump text-dark"></i> <span
                                        class="text-body ms-1">{{ $car->fuel }}</span>
                                </div>
                            </div>
                            <a href="#"
                                class="btn btn-primary rounded-pill d-flex justify-content-center py-3" data-bs-toggle="modal"data-bs-target="#modalBook">Book Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
