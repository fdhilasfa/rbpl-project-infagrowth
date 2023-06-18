@extends('components.header')

@section('content')
    <!doctype html>
    <html lang="en">

    <head>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Bungee&family=Fasthand&family=Knewave&display=swap');
        </style>


        <title>RBPL Infacare</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>



        <link rel="stylesheet" type="text/css" href="home.css">
        <link rel="stylesheet" href="fontawesome/css/all.css">
    </head>

    <body>

        <div class="container">
            <div class="col-md-6">
                <h1>Infacare</h1>
            </div>
        </div>

        <!-- <img src="infasolution.png" alt="" class="mx-auto d-block"> -->
        <div class="container py-5" id="icon">
            <div class="row g-5">
                <!-- <div class="col-md-8"> </div> -->
                <div class="col-md-3" id="infasolution">
                    <a href="infasolution"> <img src="images/infasolution.png" width="160px"> </a>
                </div>
                <div class="col-md-3" id="infagrowth">
                    <a href="infagrowth"> <img src="images/infagrowth.png" width="160px"> </a>
                </div>
                <div class="col-md-3" id="infanurse">
                    <a href="infanurse"> <img src="images/infanurse.png" width="160px"> </a>
                </div>
                <div class="col-md-3" id="infarent">
                    <a href="infarent"> <img src="images/infarent.png" width="160px"> </a>
                </div>
            </div>
        </div>

        <div class="container py-4" id="review">
            <div class="col-md-6 py-2">
                <a href="/reviewNurse">
                    <h5 style="font-weight: bold;">Leave Us Review!</h5>
                </a>
            </div>
        </div>

        <div class="container" id="card">
            <div class="card mb-3" style="width: 25rem; height: fit-content;">
                <div class="row g-0">
                    <div class="col-md-4">
                        @php
                            $imagePath = 'images/nurse/nurse' . $latestNurse->id . '.jpg';
                            $imageURL = file_exists(public_path($imagePath)) ? asset($imagePath) : asset('images/nurse.jpg');
                        @endphp
                        <img src="{{ $imageURL }}" class="img-fluid rounded-start py-4" alt=""
                            style="width: 110px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title mt-3">{{ $latestNurse->namaNurse }}</h5>
                            <p class="card-text text-muted">{{ $latestNurse->asal }}</p>
                            <p>{{ $latestNurse->reviewNurse }}</p>
                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <style>
        .navbar {
            background-color: #EFE2DA;
        }

        h1 {
            margin-top: 100px;
            font-family: 'Telex', sans-serif;
            letter-spacing: 5px;
            font-size: 60px;
            font-weight: 500;
        }

        #icon {
            margin-top: 15px;
            margin-right: 10px;
        }

        #infasolution:hover {
            scale: 1.05;
            /* border-radius */
            cursor: pointer;
            transition: all 0.5s ease-in-out;
        }

        #infagrowth:hover {
            scale: 1.05;
            /* border-radius */
            cursor: pointer;
            transition: all 0.5s ease-in-out;
        }

        #infanurse:hover {
            scale: 1.05;
            /* border-radius */
            cursor: pointer;
            transition: all 0.5s ease-in-out;
        }

        #infarent:hover {
            scale: 1.05;
            /* border-radius */
            cursor: pointer;
            transition: all 0.5s ease-in-out;
        }

        #review {
            font-family: 'Lexend', sans-serif;
            margin-bottom: 5px;
        }

        .checked {
            color: orange;
        }

        #card {
            margin-bottom: 20px;
        }

        .img-fluid {
            margin-left: 15px;
        }
    </style>
@endsection
