@extends('components.header')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="">
        <title>Infanurse</title>
    </head>

    <body>



        <div class="header" style="display: flex; flex-direction: row; align-items: center; margin-left: 10px;">
            <p style="font-size: 96px; font-weight: 700;">Infanurse</p>

            <div class="rent">
               <a href="/rentHistory"> <button style="align-items: center; font-size: 24px; margin-left: 30px;">Rent History</button> </a>
            </div>
        </div>

        <div class="card" style="background-color: #F0CDC4">
            <div class="card-baris-1">
                @php
                    $nurses = DB::table('database_nurses')->get();
                    $chunks = $nurses->chunk(4);
                @endphp

                @foreach (json_decode(json_encode($chunks), true) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $nurse)
                            @php
                                $imagePath = 'images/nurse/nurse' . $nurse['id'] . '.jpg';
                                $imageURL = file_exists(public_path($imagePath)) ? asset($imagePath) : asset('images/nurse.jpg');
                            @endphp
                            <div class="col-lg-3 col-md-6 col-sm-12 bentuk-card">
                                <img src="{{ $imageURL }}" alt="Profile Image" class="person-img" onclick="showPopup({{ $nurse['id'] }})">
                                <p style="font-weight: bolder; font-size: 22px; font-family: 'Poppins';">
                                    {{ $nurse['namaNurse'] }}</p>
                                <div class="tambah-lokasi">
                                    <div class="lokasi-waktu">
                                        <div class="detail-card">
                                            <img src="images/icon_lokasi.png"
                                                style="position: relative; width: 23px;height: 23px; left: -1px; top: -5px"
                                                alt="">
                                            <p>{{ $nurse['asal'] }}</p>
                                        </div>
                                        <div class="detail-card" style="margin-top: -20px;">
                                            <img src="images/icon_jam.png"
                                                style="position: relative; width: 23px;height: 23px; left: -8px; top: -5px"
                                                alt="">
                                            <p>{{ $nurse['tahunPengalaman'] }} Years</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="iconbintang">
                                    @php
                                        $rating = round($nurse['ratingNurse']);
                                    @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rating)
                                            <img src="{{ asset('images/icon_bintang_berisi.png') }}" alt="">
                                        @else
                                            <img src="{{ asset('images/icon_bintang_kosong.png') }}" alt="">
                                        @endif
                                    @endfor
                                </div>
                                <img src="images/icon tambah.png" alt=""
                                    style="position: relative; width: 23px;height: 23px; left: 100px; top: -70px" onclick="redirectToNurseRent({{ $nurse['id'] }})">

                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>



        <div id="popup" class="popup" style="display: none;">
            <div class="popup-content" style="width: 661px; height:940px">
                <div class="profile">
                    <div class="detail-profil" style="align-items: center">
                        <img src="images/kotakprofil.png" alt="" style=" top: -60px; height:260px; left: 9px; position: relative; width: 661px;margin-bottom: -200px;">
                        <p style="z-index: 2; font-size: 37px; font-weight: bolder;">Profile</p>
                        <img id="popupImage" src="" alt="" style="z-index: 2;">
                        <p id="popupName"1
                            style="font-size: 24px; font-weight: bolder;align-items: center;margin-left: 30px;"></p>
                        <div class="iconbintang" id="popupRating"></div>
                        <div class="lokasi-sid">
                            <div class="lokasi">
                                <img src="images/icon_lokasi.png" alt="" style="width: 20px; height: 21px;">
                                <p id="popupAsal" style="font-size: 20px;"></p>
                            </div>
                            <div class="lokasi">
                                <img src="images/bintang_kosong_icon.png" alt="" style="width: 20px; height: 21px;">
                                <p id="popupTahunPengalaman" style="font-size: 20px;"></p>
                            </div>

                        </div>

                        <div class="information">
                            <div class="information-1">
                                <p style="font-size: 22px; font-weight: 600;">Further information</p>
                                <p id="popupBerat" style="font-size: 16px;"></p>
                                <p id="popupTinggi" style="font-size: 16px;"></p>
                                <p id="popupStatus" style="font-size: 16px;"></p>
                                <p id="popupTTL" style="font-size: 16px;"></p>
                            </div>

                            <div class="information-1">
                                <p style="font-size: 22px; font-weight: 600;">Work Experience</p>
                                <p id="popupWorkExperience"></p>
                            </div>

                            <div class="button close" onclick="closePopup()">
                                <p style="position: relative; top: 60px; left: -45px; font-size: 25px; font-weight: bolder; background-color: #FF9F84; color: white;">
                                    OK</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function redirectToNurseRent(id) {
                window.location.href = "/nurserent?id=" + id;
            }
        </script>

        <script>

            function showPopup(id) {
                var popup = document.getElementById("popup");
                popup.style.display = "block";

                // Ambil data nurse berdasarkan ID yang diklik
                var nurses = @json($nurses);
                var currentNurse = nurses.find(function(nurse) {
                    return nurse.id === id;
                });

                // Perbarui konten popup dengan data yang sesuai
                var popupImage = document.getElementById("popupImage");
                popupImage.src = "{{ asset('images/nurse/nurse') }}" + currentNurse.id + ".jpg";
                popupImage.onerror = function() {
                    this.src = "{{ asset('images/nurse.jpg') }}";
                };

                document.getElementById("popupName").innerText = currentNurse.namaNurse;

                var popupRating = document.getElementById("popupRating");
                popupRating.innerHTML = "";
                for (var i = 1; i <= 5; i++) {
                    var img = document.createElement("img");
                    if (i <= Math.round(currentNurse.ratingNurse)) {
                        img.src = "{{ asset('images/icon_bintang_berisi.png') }}";
                    } else {
                        img.src = "{{ asset('images/icon_bintang_kosong.png') }}";
                    }
                    popupRating.appendChild(img);
                }

                document.getElementById("popupAsal").innerText = currentNurse.asal;
                document.getElementById("popupTahunPengalaman").innerText = currentNurse.tahunPengalaman + " Years";
                document.getElementById("popupBerat").innerText = "Weight: " + currentNurse.beratNurse + " kg";
                document.getElementById("popupTinggi").innerText = "Height: " + currentNurse.tinggiNurse + " cm";
                document.getElementById("popupStatus").innerText = "Status: " + currentNurse.statusNurse;
                document.getElementById("popupTTL").innerText = "Birth: " + currentNurse.TTLNurse;
                document.getElementById("popupWorkExperience").innerText = currentNurse.workExperience;
            }

            function closePopup() {
                var popup = document.getElementById("popup");
                popup.style.display = "none";
            }
        </script>




    </body>

    </html>

    <style>
        <style>html {
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

        /* Perbaharuan CSS untuk menampilkan hanya 1 baris dengan maksimal 4 kotak */
        .card-baris-1 {
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-left: calc(50% - 700px);
            margin-bottom: 57px;
        }

        .bentuk-card {
            margin-right: 47px;
            margin-bottom: 50px;
        }

        @media (max-width: 1200px) {
            .bentuk-card {
                margin-right: 20px;
            }
        }

        @media (max-width: 768px) {
            .card-baris-1 {
                justify-content: center;
            }

            .bentuk-card {
                margin-right: 20px;
            }
        }
    </style>
@endsection
