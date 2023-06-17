@extends('components.header')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <title>Document</title>
    </head>

    <body>



        <div class="header" style="display: flex; flex-direction: row;align-items: center; margin-left: 10px;">
            <p style="font-size: 96px; font-weight: 700;">Infanurse</p>

            <div class="rent">
                <p style="align-items: center; font-size: 24px;margin-left: 30px;">Rent History</p>
            </div>
        </div>


        <div class="card" style="background-color: #F0CDC4">
            <div class="card-baris-1">
                @php
                    $nurses = DB::table('database_nurses')->get();
                    $chunks = $nurses->chunk(4);
                @endphp

                @foreach ($chunks as $chunk)
                    <div class="row">
                        @foreach ($chunk as $nurse)
                            <div class="col-lg-3 col-md-6 col-sm-12 bentuk-card">
                                <img src="{{ asset('images/nurse'.$nurse->id.'.jpg') }}" alt="{{ $nurse->namaNurse ?: 'nurse' }}" class="card-image">
                                <p style="font-weight: bolder; font-size: 22px; font-family: 'Poppins';">{{ $nurse->namaNurse }}</p>
                                <p>{{ $nurse->asal }}</p>
                                <p>{{ $nurse->tahunPengalaman }} Years</p>

                                <div class="iconbintang">
                                    @php
                                        $rating = round($nurse->ratingNurse);
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rating)
                                            <img src="{{ asset('images/icon_bintang_berisi.png') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/icon_bintang_kosong.png') }}" alt="">
                                        @endif
                                    @endfor
                                </div>

                                <img src="{{ asset('images/icon_tambah.png') }}" alt="" style="width: 23px; height: 23px;" onclick="showPopup({{ $nurse->id }})">
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div id="popup" class="popup">
                <div class="popup-content">
                    <img src="{{ asset('images/nurse'.$nurse->id.'.jpg') }}" alt="{{ $nurse->namaNurse ?: 'nurse' }}">
                    <p style="font-size: 24px; font-weight: bolder; align-items: center; margin-left: 30px;">{{ $nurse->namaNurse }}</p>

                    <div class="iconbintang">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $rating)
                                <img src="{{ asset('images/icon_bintang_berisi.png') }}" alt="">
                            @else
                                <img src="{{ asset('images/icon_bintang_kosong.png') }}" alt="">
                            @endif
                        @endfor
                    </div>

                    <p style="font-size: 20px;">{{ $nurse->asal }}</p>
                    <p style="font-size: 20px;">{{ $nurse->tahunPengalaman }}</p>

                    <p>Weight : {{ $nurse->beratNurse }} kg</p>
                    <p>Height : {{ $nurse->tinggiNurse }} cm</p>
                    <p>Status : {{ $nurse->statusNurse }}</p>
                    <p>Birth : {{ $nurse->TTLNurse }}</p>

                    <div class="information-1">
                        <p style="font-size: 22px; font-weight: 600;">Work Experience</p>
                        <p>{{ $nurse->workExperience }}</p>
                    </div>

                    <div class="button" class="close" onclick="closePopup()">
                        <p style="font-size: 25px; font-weight: bolder; background-color: #FF9F84; color: white;">OK</p>
                    </div>
                </div>
            </div>

            

        <script>
            function showPopup() {
                var popup = document.getElementById("popup");
                popup.style.display = "block";
            }

            function closePopup() {
                var popup = document.getElementById("popup");
                popup.style.display = "none";
            }
        </script>

    </body>

    </html>

    <style>
        html {
            background-color: #F0CDC4;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {
            background-color: #F0CDC4;
            justify-content: center;
        }



        .rent {
            background-color: white;
            width: 192px;
            height: 49px;
            border-radius: 16px;
            align-items: center;
            display: flex;
            margin-left: 25px;
            margin-top: 20px;


        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .card-baris-1 {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-left: 45px;
            margin-bottom: 57px;
        }

        .card-baris-2 {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-left: 45px;
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

        }

        .lokasi-waktu p {
            font-weight: 800;
            color: #5A5A5A;
            font-size: 17px;


        }


        .detail-card img {
            width: 30px;
            height: 30px;
            margin-right: 5px;
        }

        .lokasi-waktu {
            display: flex;
            flex-direction: column;
            padding-bottom: 20px;
            column-gap: 10px;
            margin-top: 10px;
            margin-right: 100px;

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
            margin-top: -20px;
        }

        .iconbintang img {
            width: 22px;
            height: 22px;
            margin-right: 5px;
        }

        .popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,

        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        * {
            justify-content: center;
        }

        .detail-profil img {
            width: 227px;
            height: 227px;

        }

        .detail-profil {
            justify-content: center;
            align-items: center;
            display: flex;
            width: 661px;
            flex-direction: column;
            margin-top: -100px;


        }

        .information {
            display: flex;
            flex-direction: column;
        }

        .information-1 {

            display: flex;
            margin-top: 20px;
            flex-direction: column;
        }

        .information-1 p {
            display: flex;
            flex-direction: column;
            font-size: 17px;
            margin-top: -10px;
        }

        .button {

            width: 165px;
            height: 47px;
            border-radius: 5px;
            margin-left: 120px;


        }

        .button p {
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            display: flex;

        }

        .profile {
            display: flex;
            flex-direction: column;
            width: 600px;
            border-radius: 10px;
            height: 906px;
            background-color: white;
            justify-content: center;
            align-items: center;
        }

        .iconbintang {
            display: flex;
            flex-direction: row;
            margin-top: -20px;
        }

        .iconbintang img {
            width: 22px;
            height: 22px;
            margin-right: 5px;
        }

        .lokasi-sid {
            display: flex;
            flex-direction: row;
        }

        .lokasi {
            display: flex;
            flex-direction: row;
            align-items: center;

        }

        .lokasi img {
            margin-left: 10px;
        }
    </style>
@endsection
