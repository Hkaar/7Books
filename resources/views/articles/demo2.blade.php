@extends('layouts.app')

@section('title', 'Keanekaragaman Bangsa Besar')

@section('main')
  <x-svb-navigation-bar :menus=true active="blog" :logo=false :login=true :avatar=true></x-svb-navigation-bar>

  <div class="min-vh-100 d-flex flex-column align-items-center container my-4">
    <div class="d-flex flex-column align-items-center flex-wrap gap-4">
      <h2 class="text-h4 text-md-h2 fw-bold text-center">
        Keanekaragaman Bangsa Besar
      </h2>
      <h5 class="text-h6 text-md-h5 text-center">
        Merayakan Kekayaan Budaya dan Persatuan di Indonesia
      </h5>
    </div>

    <div class="d-flex justify-content-center my-4">
      <img src="{{ Vite::asset('resources/images/examples/collage.png') }}" alt="Keanekaragaman Bangsa Besar"
        class="img-fluid size-3/4">
    </div>

    <article class="w-lg-75">
      <section class="mb-5">
        <h3 class="text-h5 text-md-h3 fw-semibold mb-3">Beragam Jenis Suku dan Budaya</h3>

        <p>
          Indonesia dikenal sebagai negara dengan keanekaragaman suku dan budaya yang sangat kaya. Dari Sabang di ujung
          barat hingga Merauke di ujung timur, negara ini memiliki lebih dari 300 suku bangsa yang masing-masing memiliki
          tradisi, bahasa, dan kebudayaan yang unik. Keberagaman ini menjadikan Indonesia sebagai negara yang memiliki
          potensi luar biasa dalam hal budaya dan adat istiadat.
        </p>

        <div class="d-flex justify-content-center">
          <img src="{{ Vite::asset('resources/images/examples/baduy.jpg') }}" alt="Suku Baduy" class="img-fluid my-4">
        </div>

        <p>
          Salah satu contoh suku yang masih mempertahankan adat dan budaya tradisionalnya adalah Suku Baduy di Banten.
          Mereka dikenal dengan cara hidup yang sederhana dan komitmen mereka terhadap pelestarian tradisi. Masyarakat
          Baduy hidup dengan prinsip-prinsip adat yang kuat, menjadikan mereka sebagai simbol dari kekayaan budaya yang
          berusia ribuan tahun.
        </p>
      </section>

      <section class="mb-5">
        <h3 class="text-h5 text-md-h3 fw-semibold mb-3">Flora & Fauna yang Unik antar Pulau</h3>

        <p>
          Indonesia memiliki kekayaan alam yang melimpah, termasuk flora dan fauna yang tidak ditemukan di tempat lain.
          Setiap pulau di Indonesia memiliki spesies uniknya sendiri, berkat keragaman ekosistem dan iklim yang berbeda di
          seluruh kepulauan.
        </p>

        <div class="d-flex justify-content-center gap-3">
          <img src="{{ Vite::asset('resources/images/examples/komodo.jpg') }}" alt="Komodo"
            class="img-fluid size-1/2 my-4">

          <img src="{{ Vite::asset('resources/images/examples/flower.jpg') }}" alt="Bunga Raflesia"
            class="img-fluid size-1/2 my-4 object-cover">
        </div>

        <p>
          Contohnya, Komodo, yang merupakan spesies kadal raksasa yang hanya ditemukan di Pulau Komodo dan sekitarnya,
          serta Bunga Raflesia arnoldii, yang merupakan bunga terbesar di dunia dan dapat ditemukan di hutan hujan tropis
          Sumatra. Keberadaan spesies-spesies ini menambah kekayaan biodiversitas Indonesia dan menjadikannya sebagai
          tujuan wisata alam yang sangat berharga.
        </p>
      </section>

      <section class="mb-5">
        <h3 class="text-h5 text-md-h3 fw-semibold mb-3">Tarian Tradisional</h3>

        <p>
          Tarian tradisional merupakan bagian integral dari warisan budaya Indonesia. Setiap daerah memiliki tarian yang
          unik, mencerminkan karakter dan sejarah masyarakat setempat. Tarian-tarian ini sering ditampilkan dalam acara
          adat, festival, dan perayaan penting.
        </p>

        <div class="d-flex justify-content-center">
          <img src="{{ Vite::asset('resources/images/examples/dance.jpg') }}" alt="Tari Kecak"
            class="img-fluid size-1/2 my-4">
        </div>

        <p>
          Tari Kecak, misalnya, adalah salah satu tarian tradisional Bali yang terkenal. Dikenal dengan sebutan "Tari
          Cak," tarian ini melibatkan sekelompok pria yang duduk melingkar dan melakukan vokalisasi yang dinamis sambil
          menari. Tarian ini bukan hanya menarik dari segi visual tetapi juga kaya akan makna dan nilai-nilai spiritual.
        </p>
      </section>

      <section class="mb-5">
        <h3 class="text-h5 text-md-h3 fw-semibold mb-3">Rumah Adat yang Megah dan Unik</h3>

        <p>
          Rumah adat di Indonesia bervariasi sesuai dengan suku dan daerahnya. Setiap rumah adat dirancang dengan
          memperhatikan fungsionalitas serta simbolisme budaya. Rumah-rumah ini sering kali menjadi pusat kegiatan
          komunitas dan mencerminkan gaya hidup serta kepercayaan masyarakat yang membangunnya.
        </p>

        <div class="d-flex justify-content-center">
          <img src="{{ Vite::asset('resources/images/examples/house.jpg') }}" alt="Rumah Adat"
            class="img-fluid size-1/2 my-4">
        </div>

        <p>
          Contohnya adalah Rumah Adat Minangkabau dengan atap yang melengkung menyerupai tanduk kerbau. Rumah ini tidak
          hanya berfungsi sebagai tempat tinggal tetapi juga sebagai simbol kekuatan dan kekayaan budaya masyarakat
          Minangkabau.
        </p>
      </section>

      <section class="mb-5">
        <h3 class="text-h5 text-md-h3 fw-semibold mb-3">Pertunjukkan Musik Tradisional</h3>

        <p>
          Musik tradisional Indonesia menawarkan beragam alat musik dan gaya bermain yang mencerminkan keanekaragaman
          budaya di seluruh negeri. Dari gamelan Jawa hingga alat musik dari Papua, setiap daerah memiliki jenis musiknya
          sendiri yang sering kali digunakan dalam upacara adat dan festival.
        </p>

        <div class="d-flex justify-content-center">
          <img src="{{ Vite::asset('resources/images/examples/music.jpg') }}" alt="Gambelan Jawa" class="img-fluid my-4">
        </div>

        <p>
          Gamelan, misalnya, adalah ansambel musik tradisional Jawa yang terdiri dari berbagai alat musik perkusi seperti
          gong dan metallophone. Gamelan sering dimainkan dalam upacara keagamaan, pertunjukan tari, dan acara penting
          lainnya. Musik ini tidak hanya menyajikan melodi yang indah tetapi juga menciptakan suasana yang sarat dengan
          nilai-nilai budaya.
        </p>
      </section>
    </article>
  </div>

  <x-svb-footer></x-svb-footer>
@endsection
