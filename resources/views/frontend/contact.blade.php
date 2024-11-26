@extends('frontend.template.main')

@section('title', 'Kontak')
@section('head', 'Kontak Kami')

@section('content')
        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-4 text-capitalize mb-3">Hubungi <span class="text-judul">Kami</span></h1>
                    <p class="mb-0">Jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut, jangan ragu untuk menghubungi kami. Kami siap membantu Anda!</a>.</p>
                </div>
                <div class="row g-5">
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="row g-5">
                            <div class="col-md-6 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="p-4 bg-light rounded d-flex justify-content-center">
                                    <div class="bg-white rounded p-4 w-100">
                                        <h4 class="mb-3">PRC Sewa Mobil Lampung</h4>
                                        <div class="d-flex align-items-center flex-shrink-0 mb-3">
                                            <i class="fas fa-map-marker-alt text-judul me-2"></i><p class="mb-0">Sumber Rejo, Kemiling, Bandar Lampung City, Lampung 35153</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <a href="mailto:prclampung@gmail.com" target="_blank"><i class="fas fa-envelope text-judul me-2"></i></a><p class="mb-0">prclampung@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="row g-5">
                                    <div class="col-md-6 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.5s">
                                        <div class="contact-add-item p-4">
                                            <div class="contact-icon mb-4">
                                                <a href="https://wa.me/6285769040309" target="_blank"><i class="fab fa-whatsapp fa-2x text-dark"></i></a>
                                            </div>
                                            <div>
                                                <h4>WhatsApp</h4>
                                                <p class="mb-0">+62 85769040309</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.7s">
                                        <div class="contact-add-item p-4">
                                            <div class="contact-icon mb-4">
                                                <a href="https://www.instagram.com/sewamobillampung.co/" target="_blank"><i class="fab fa-instagram fa-2x text-dark"></i></a>
                                            </div>
                                            <div>
                                                <h4>Instagram</h4>
                                                <p class="mb-0">sewamobillampung.co</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="rounded">
                            <iframe class="rounded w-100"
                            style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.6105640317915!2d105.2086875!3d-5.3904375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40d1b8ca724e5b%3A0x467c53bfeaf76d93!2sSEWA%20MOBIL%20LAMPUNG%20%7C%20PRC%20RENT%20CAR!5e1!3m2!1sen!2sid!4v1731577704075!5m2!1sen!2sid"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
@endsection
