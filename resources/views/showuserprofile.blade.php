@extends('components.header')

@section('content')


    <html>

    <head>
        <title>About me</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Grape+Nuts&family=Montserrat:wght@100&family=Nunito+Sans&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Staatliches&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="style.css">
    </head>

@section('content')

    <body>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Telex:wght@200;300;400;500;600;700&display=swap");
            @import url("https://fonts.googleapis.com/css2?family=Lexend:wght@200;300;400;500;600;700&display=swap");
            @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700&display=swap");

            * {
                font-family: 'Telex';
                font-weight: 700;



            }

            #pencil {
                left: 18%;
            }
        </style>

        <section class="vh-100">
            <div class="container-fluid bg-light-pink" id="bg-light-pink">
                <div id="about-header">
                    <div class="d-flex justify-content-center pt-5 mb-3">

                        <i class="fa fa-pencil fa-2x position-relative" id="pencil" aria-hidden="true"></i>
                    </div>



                    <h1 class="text-center fw-bold" style="font-family: Nunito; opacity:90%; margin-top:110px; margin-bottom:-20px"></h1>

                </div>

                <div class="container w-50 mt-5" id="about-me">
                    <div class="card rounded-0">
                        <div class="card-header p-0 shadow-sm">
                            <h2 class="card-title bg-light-pink-2 text-center fw-normal py-3 mb-0"
                                style="font-family:Lexend; opacity:90%">About Me</h2>
                        </div>
                        <div class="card-body px-5  bg-light-pink-3">
                            <div class="row">


                                <div class="col-lg-1" style="margin-bottom: 10px;"></div>
                                <div class="col-lg-3"
                                    style="font-family:Lexend; opacity: 85%; font-weight:semi-bold; margin-bottom: 10px;">
                                    Name
                                </div>
                                <div class="col-lg-8" style="font-family:Lexend; opacity: 90%; margin-bottom: 10px;">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </div>

                                <div class="col-lg-1" style="margin-bottom: 10px;">
                                    <i class="fa fa-at" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-3"
                                    style="font-family:Lexend; opacity: 85%; font-weight:semi-bold; margin-bottom: 10px;">
                                    Email
                                </div>
                                <div class="col-lg-8" style="font-family:Lexend; opacity: 90%; margin-bottom: 10px;">
                                    {{$user->email_address}}
                                </div>

                                <div class="col-lg-1" style="margin-bottom: 10px;">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-3"
                                    style="font-family:Lexend; opacity: 85%; font-weight:semi-bold; margin-bottom: 10px;">
                                    Phone No.
                                </div>
                                <div class="col-lg-8" style="font-family:Lexend; opacity: 90%; margin-bottom: 10px;">
                                    {{$user->contact_number}}
                                </div>

                                <div class="col-lg-1" style="margin-bottom: 10px;">
                                    <i class="fa fa-map-pin" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-3"
                                    style="font-family:Lexend; opacity: 85%; font-weight:semi-bold; margin-bottom: 10px;">
                                    Address
                                </div>
                                <div class="col-lg-8" style="font-family:Lexend; opacity: 90%; margin-bottom: 10px;">
                                    {{$user->address}}
                                </div>

                                <div class="col-lg-1" style="margin-bottom: 10px;">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-3"
                                    style="font-family:Lexend; opacity: 85%; font-weight:semi-bold; margin-bottom: 10px;">
                                    Birthday
                                </div>
                                <div class="col-lg-8" style="font-family:Lexend; opacity: 90%; margin-bottom: 10px;">
                                    {{$user->birthday_day}} {{$user->birthday_month}} {{$user->birthday_year}}
                                </div>


                            </div>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('userprofile') }}" class="btn fw-semi bold mx-3" style="font-family: Lexend">Edit Profile</a>
                            <button type="button" class="btn fw-semi bold mx-3" style="font-family: Lexend" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign Out
                            </button>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </body>

    </html>

    <style>
        /* * {
                font-family: 'Montserrat';
                font-weight: 700;

            } */

            .profile-picture {
    width: 130px;
    height: 130px;
    border-radius: 50%;


}

.profile-picture img {
    width: 130px;
    height: 130px;
    border-radius: 100%;
    object-fit: cover;
    margin-left: -110%;

}




        .nav-link {
            font-weight: normal;
        }

        .bg-light-brown {
            background-color: #efe2da;
        }

        .greeting {
            position: absolute;
        }

        .greeting-title {
            font-size: 56px;
            font-weight: 900;
            line-height: 70px;
            margin-bottom: 0vh;
            font-family: 'Montserrat';

        }

        .greeting-image {
            position: relative;
            left: 40%;
            z-index: -1;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;

        }

        .navbar-brand {
            height: 10vh;
        }

        .profile-pict {
            height: 5vh;

        }


        #bg-light-pink {
            height: 46vh;
        }

        .btn {
            /* Button styles */
            /* ... */

            /* Add transition for smooth hover effect */
            transition: background-color 0.2s, box-shadow 0.2s;
            color: rgb(255, 255, 255);
            background: #ffb19c;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            /* Add a shadow to the button */
        }

        .btn:hover {
            /* Hover styles */
            background-color: #f2ccc2;
            /* desired hover background color */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Increase the shadow size on hover */
        }


        .bg-light-pink {
            background-color: #ffa084;
            margin-top: -2%;
        }

        .bg-light-pink-2 {
            background-color: #f7beae;
        }

        .bg-light-pink-3 {
            background-color: #FFDCD2;
        }


        .bg-light-pink,
        .bg-light-pink-2,
        .bg-light-pink-3 {
            /* Background color styles */
            /* ... */

            /* Add transition for smooth hover effect */
            transition: box-shadow 0.2s;
        }

        .bg-light-pink,
        .bg-light-pink-2,
        .bg-light-pink-3 {
            /* Hover styles */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Add a shadow to the container on hover */
        }

        #about-me-pict {
            height: 15vh;
        }

        #about-me {
            margin-top: 0vh;
        }
    </style>
@endsection
