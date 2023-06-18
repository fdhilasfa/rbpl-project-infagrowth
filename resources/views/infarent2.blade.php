@extends('components.header')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="page2.css">
        <title>Document</title>
        <style>
            body {
                background-color: #FFF1C7;
                justify-content: center;
            }

            .keranjang {
                display: flex;
                flex-direction: row;
                align-items: center;
            }

            .card {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
            }

            .bentuk-card {
                display: flex;
                flex-direction: column;
                padding: 10px;
                align-items: center;
                background-color: white;
                border-style: solid;
                border-color: white;
                height: 374px;
                width: 300px;
                border-radius: 10px;
                box-shadow: 0px 4px 6px #505050;
                margin-right: 47px;
                margin-bottom: 57px;
            }

            .bentuk-card img {
                width: 200px;
                height: 200px;
            }

            .detail-card {
                display: flex;
                flex-direction: row;
                align-items: center;
                margin-right: 10px;
                width: 176px;
                height: 45px;
                align-items: center;
                margin-left: 30px;
            }

            .detail-card p {
                font-size: 17px;
            }

            .lokasi-waktu p {
                font-weight: 800;
                color: #5A5A5A;
                font-size: 17px;
            }

            .detail-card img {
                width: 18px;
                height: 18px;
                margin-right: 5px;
            }

            .lokasi-waktu {
                display: flex;
                flex-direction: column;
                padding-bottom: 20px;
                column-gap: 10px;
                margin-top: 10px;
                margin-left: -20px;
            }

            .tambah-lokasi {
                display: flex;
                flex-direction: row;
                align-items: center;
                margin-top: -30px;
            }

            .iconbintang {
                display: flex;
                flex-direction: row;
                position: relative;
                top: -30px;
                left: 70px;
            }

            .iconbintang img {
                width: 22px;
                height: 22px;
                margin-right: 5px;
            }
        </style>
    </head>

    <body>
        <div class="header" style="display: flex; flex-direction: row;align-items: center; margin-left: 30px;">
            <p style="font-size: 96px; font-weight: 700;">Infarent</p>

            <div class="rent" style="margin-left: 20px;">
                <a href="/rentHistory">
                    <button type="button" class="btn btn-default btn-lg bg"
                        style="background-color:white;">Rent History</button>
                </a>
            </div>
        </div>

        <div class="card">
            @php
                $perlengkapanbayis = DB::table('perlengkapanbayis')->get();
                $chunks = $perlengkapanbayis->chunk(4);
            @endphp

            @foreach ($chunks as $chunk)
                <div class="card-baris-1">
                    @foreach ($chunk as $barang)
                        @php
                            $rating = round($barang->rating);
                            $imagePath = 'images/barang/barang' . $barang->id . '.jpg';
                            $imageURL = file_exists(public_path($imagePath)) ? asset($imagePath) : asset('images/barang.jpg');
                            $url = route('rentCart', ['id' => $barang->id]);
                        @endphp

                        <div id="{{ $barang->id }}" class="bentuk-card">

                                <img src="{{ $imageURL }}" alt="Profile Image" class="person-img"
                                    onclick="redirectToNurseRent({{ $barang->id }})">

                                <p style="font-weight: bolder; font-size: 22px; font-family: 'Poppins';">
                                    {{ $barang->namaBarang }}</p>
                                <div class="tambah-lokasi">
                                    <div class="lokasi-waktu">
                                        <div class="detail-card">
                                            <img src="images/icon_lokasi.png" alt="">
                                            <p>{{ $barang->lokasi }}</p>
                                        </div>
                                        <div class="detail-card" style="margin-top: -20px;">
                                            <img src="images/iconduit.png" alt="">
                                            <p>{{ $barang->hargaBarang }}/month</p>
                                        </div>
                                        <a href="{{ $url }}" onclick="renCart()">
                                            <img src="images/keranjang-infarent.png" alt=""
                                                style="width: 23px;height: 23px;width: 37px; height: 37px;margin-left: 10px;">
                                        </a>
                                        <div class="iconbintang">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $rating)
                                                    <img src="{{ asset('images/icon_bintang_berisi.png') }}" alt="">
                                                @else
                                                    <img src="{{ asset('images/icon_bintang_kosong.png') }}" alt="">
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <script>
            function rentCart() {
                // Lakukan pengalihan ke halaman keranjang belanja
                window.location.href = "/rentCart/" + id;
            }
        </script>


    </body>

    </html>
@endsection
