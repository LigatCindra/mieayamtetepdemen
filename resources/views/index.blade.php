<!DOCTYPE html>
<html lang="en">
    @if ($logo && $logo->id == 8)
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/infes.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lilita+One:wght@400&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lalezar:wght@400&display=swap">
    <link rel="icon" href="{{ asset($logo->url) }}" type="image/ico">
    <title>Mie Ayam Tetep Demen</title>
</head>

<body>
    
    <div class="navbar-menu">
        <div class="navlogo">
            <img src="{{ asset($logo->url) }}">
        </div>
        <div class="navtext">
            <p>Mie Ayam <br/> Tetep Demen</p>
        </div>
        <nav>
            <div class="navbutton">
                <a href="{{url('/menu/makanan')}}">Menu</a>
            </div>
        </nav>
    </div>
    @endif
    <section> {{-- header home --}}
        @if ($banner && $banner->id == 6)
        <div class="homeheader" data-aos="fade-down"
        data-aos-duration="1000">
            <img src="{{ asset($banner->url) }}">
            <div class="overlay" data-aos="fade-left" data-aos-duration="1000"></div>
            <p>Mie Ayam Tetep Demen</p>
        </div>
        @endif
    </section>
    <section> {{-- profil home --}}
        <div class="profil">
            @if ($profil && $profil->id == 7)
            <h2 data-aos="fade-down" data-aos-duration="1000">Profil Kami</h2>
            <div class="imgprofil" data-aos="fade-right" data-aos-duration="1500">
                <img src="{{ asset($profil->url) }}">
            </div>
            <div class="textprofil" data-aos="fade-left" data-aos-duration="1500">
                <p>Mie ayam kami tidak menggunakan bahan pengawet sama sekali, dan terdapat dua macam bentuk mie!</p>
            </div>
        </div>
        @endif
    </section>
    <section> {{-- profil menu --}}
        <div class="menuteaser" data-aos="zoom-in" data-aos-duration="1500">
            <div class="menubutton">
                <a>Menu Andalan</a>
            </div>
        </div>
        @if ($original && $pangsit)
        <div class="menuimages">
            <img class="mieayam" src="{{ asset('storage/' . $original->url_gambar) }}" data-aos="fade-up-right" data-aos-duration="1500">
            <img class="pangsit" src="{{ asset('storage/' . $pangsit->url_gambar) }}"  data-aos="fade-up-left" data-aos-duration="1500">
        </div>
        @endif
        
    </section>
    <section> {{-- pesan menu --}}
        <div class="pesanan">
            <p>Keburu laper? Langsung pesan aja!</p>
            <div class="pesanbutton" data-aos="flip-left" data-aos-duration="1500">
                <a href="{{url('/menu/makanan')}}">Pesan Di Sini!</a>
            </div>
        </div>
    </section>
    <section> {{-- penkaki --}}
        @if ($logo && $logo->id == 8)
        <div class="footer">
            <div class="footer-content">
                <img class="logofooter" src="{{ asset($logo->url) }}" alt="Logo">
                <div class="footer-info">
                    <p>PT Mie Abadi</p>
                    <p>Jl. Kalimantan Cimone Mas Permai 1</p>
                </div>
                <div class="footer-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5485402536187!2d106.614498!3d-6.1911099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fedafe6ce6fb%3A0xea5f92d69d0b6998!2sJl.%20Kalimantan%2C%20RT.005%2FRW.006%2C%20Cimone%20Jaya%2C%20Kec.%20Karawaci%2C%20Kota%20Tangerang%2C%20Banten%2015114!5e0!3m2!1sen!2sid!4v1702298553350!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="copyright-box">
            <p class="copyright">© 2023 PT Mie Abadi. All rights reserved.</p>
        </div>
        @endif
    </section>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
</html>
