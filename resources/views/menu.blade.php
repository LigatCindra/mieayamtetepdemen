<!DOCTYPE html>
@php
use Illuminate\Support\Facades\Vite;
@endphp
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link rel="stylesheet" href="{{ asset('css/menu2.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lalezar:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lilita+One:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=RocknRoll+One:wght@400&display=swap" />
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "weekly"});</script>
</head>

<body>
    <div class="navbar-menu">
        <div class="navlogo">
            <img src="{{ asset('storage/uploads/logo.png') }}">
        </div>
        <div class="navtext">
            <p>Mie Ayam <br/> Tetep Demen</p>
        </div>
        <nav>
            <div class="navbutton">
                <a href="{{url('/')}}">Home</a>
            </div>
        </nav>
    </div>
    <section class="menuheader">
        <div class="menupage">
            <div class="menutext">MENU</div>
            <div class="kategori">
                <a href="{{ url('/menu/makanan') }}">Makanan</a>
                <a href="{{ url('/menu/minuman') }}">Minuman</a>
            </div>
        </div>
    </section>
    <section class="menucontent">
        @foreach ($makanan as $makan)
            <div class="boxmenu">
                <div class="imagehere">
                    <img src="{{ asset('storage/' . $makan->url_gambar) }}">
                </div>
                <div class="description">
                    <h2>{{ $makan->nama_makanan }}</h2>
                    <p>{{$makan->deskripsi}}</p>
                    <p>Rp.{{ number_format($makan->harga, 0, ',', '.') }}</p>
                </div>
            </div>
        @endforeach
    </section>
    </section>
    <section> {{-- pesan menu --}}
        <div class="pesanan">
            <p>Klik tombol di bawah untuk memesan!</p>
            <div class="pesanbutton">
                <a href="https://wa.me/+6287749840598/?text=halo%20saya%20adalah%20...%20">
                    <img src="{{asset('storage/uploads/wa3.png')}}" >
                </a>
            </div>
        </div>
    </section>
    <section> {{-- penkaki --}}
        <div class="footer">
            <div class="footer-content">
                <img class="logofooter" src="{{ asset('storage/uploads/logo.png') }}" alt="Logo">
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
    </section>
</body>
</html>
