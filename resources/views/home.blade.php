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
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>



    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
    <!--navbar-->
 <!--   <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <img src="images/Infacare logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" ;">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="color: black;">Infasolution</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: black;">Infagrowth</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: black;">Infanurse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: black;">Infarent</a>
                    </li>
                    <div class="d-flex">
                        <a class="nav-link text-dark mx-2" aria-current="page" href="#">Karina Ayu</a>
                        <img src="images/profile.png" class="profile-pict" alt="" style="width:40px">
                    </div>
                </ul>
            </div>
    </nav>
-->
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
         <a href="/reviewNurse">  <h5 style="font-weight: bold;">Leave Us Review!</h5> </a>
        </div>
    </div>

    <div class="container" id="card">
        <div class="card mb-3" style="width: 25rem; height: fit-content;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="images/ryujin.png" class="img-fluid rounded-start py-4" alt="" style="width: 110px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mt-3">Ajeng Riyustina</h5>
                        <p class="card-text text-muted">Sidoarjo</p>
                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<style>

.navbar{
    background-color: #EFE2DA;
}
h1{
    margin-top: 100px;
    font-family: 'Telex', sans-serif;
    letter-spacing: 5px;
    font-size: 60px;
    font-weight: 500;
}
#icon{
    margin-top: 15px;
    margin-right: 10px;
}
#infasolution:hover {
    scale:1.05;
    /* border-radius */
    cursor: pointer;
    transition: all 0.5s ease-in-out;
}
#infagrowth:hover {
    scale:1.05;
    /* border-radius */
    cursor: pointer;
    transition: all 0.5s ease-in-out;
}
#infanurse:hover {
    scale:1.05;
    /* border-radius */
    cursor: pointer;
    transition: all 0.5s ease-in-out;
}
#infarent:hover {
    scale:1.05;
    /* border-radius */
    cursor: pointer;
    transition: all 0.5s ease-in-out;
}
#review{
    font-family: 'Lexend', sans-serif;
    margin-bottom: 5px;
}
.checked {
    color: orange;
}
#card{
    margin-bottom: 20px;
}
.img-fluid{
    margin-left: 15px;
}

    </style>

@endsection
