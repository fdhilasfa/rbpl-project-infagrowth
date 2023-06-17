@extends('components.headerbaru')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome To Infagrowth</title>
</head>

@section('content')

    <body>
        <div class="row" style="margin-left: 113px;">
            <div class="col-sm-6" style="margin-top: 100px;">
                <h1 style="font-size: 96px;">Infacare</h1>
                <p style="font-size:24px;">A new breakthrough in helping pregnant, lactating mothers and parents in
                    preventing their babies from
                    stunting. Infacare is a new standalone product with several helpful features, such as infanurse,
                    infarent, infagrowth, infasolution, and infadetection.</p>
                    <a href="/register"> <button type="button" class="btn btn-outline-light text-dark btn-lg"
                    style="background-color: pink; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.493); outline-width:100px; margin-top:130px; margin-left:90px; height:53px; width:205px;">Get
                    Started</button> </a>
            </div>
            <div class="col-sm-6">
                <img src="images/momandkid.png" style="width: 616px; height: 621px; margin-top: 100px;">
            </div>
        </div>






        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    </body>

    </html>
@endsection
