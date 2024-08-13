@extends('layouts.app')

@section('title', 'Kemerdekaan Sebangsa Putih Merah')

@section('main')
  <x-svb-navigation-bar :menus=true active="blog" :logo=false :login=true :avatar=true></x-svb-navigation-bar>

  <div class="min-vh-100 d-flex flex-column align-items-center container my-4">
    <div class="d-flex flex-column align-items-center gap-4 mb-3">
      <h2 class="text-h4 text-md-h2 fw-bold text-center">
        Kemerdekaan Sebangsa Putih Merah
      </h2>
      <h5 class="text-h6 text-md-h5 text-center">
        Merayakan kemerdekaan bangsa Indonesia ke-79
      </h5>
    </div>

    <div class="d-flex justify-content-center my-4">
      <img src="{{ Vite::asset('resources/images/examples/flag.jpg') }}" alt="Bendera Indonesia"
        class="img-fluid size-3/4 ratio-box object-cover">
    </div>

    <article class="mt-4 w-lg-75">
      <p class="text-body mb-3">
        Pada tanggal 17 Agustus 1945, Indonesia menyatakan kemerdekaannya dari penjajahan kolonial. Tahun ini, kita
        merayakan ulang tahun kemerdekaan yang ke-79 dengan penuh semangat dan rasa syukur. Merah putih, warna bendera
        kita, melambangkan keberanian dan kesucian, serta semangat persatuan yang mengikat seluruh rakyat Indonesia.
      </p>
      <p class="text-body mb-3">
        Setiap tahun, perayaan hari kemerdekaan dirayakan dengan berbagai kegiatan yang meriah, mulai dari upacara
        bendera, lomba-lomba tradisional, hingga pertunjukan seni budaya. Selain itu, acara ini juga menjadi momen untuk
        merenungkan perjalanan panjang bangsa ini, dari perjuangan kemerdekaan hingga pencapaian-pencapaian saat ini.
      </p>
      <p class="text-body mb-3">
        Mari kita teruskan semangat perjuangan para pahlawan dengan kontribusi positif dalam kehidupan sehari-hari. Dengan
        bersatu, kita bisa menghadapi berbagai tantangan dan mewujudkan cita-cita bangsa yang adil dan makmur.
      </p>

      <section class="d-flex flex-column align-items-center mt-5">
        <p class="text-h3 fw-semibold text-center">
          Selamat Hari Kemerdekaan Indonesia yang ke-79!
        </p>
        <p class="text-h6 fw-medium">
          Semoga Indonesia terus maju dan sejahtera. Merdeka!
        </p>
      </section>
    </article>
  </div>

  <x-svb-footer></x-svb-footer>
@endsection
