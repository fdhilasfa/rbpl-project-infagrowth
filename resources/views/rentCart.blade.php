@extends('components.header')

<!DOCTYPE html>
<html>

<head>
   <title>Shopping Cart</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet" />
   <link href="RentCart.css" rel="stylesheet">
</head>

@section('content')
<body>

   <section>
      <div class="container">
         <h2>Rent Cart</h2>
         <div class="cart">
            <div class="col-md-12 col-lg-10 mx-auto">
                <div class="cart-item"style="border-radius: 8px;">
                    <div class="row justify-content-start">
                      <div class="col-md-6">
                        <div class="pt-1 pb-1 text-left"> <!-- Menambahkan kelas text-left untuk membuat tulisan rata kiri -->
                          <div class="d-flex justify-content-start align-items-center"> <!-- Mengubah nilai justify-content menjadi flex-start -->
                            <h5 class="mr-3 d-inline-block" style="margin-right: 150px;">Product</h5> <!-- Menambahkan properti margin-right -->
                            <h5 class="mr-3 d-inline-block" style="margin-right: 60px;">Duration(Month)</h5> <!-- Menambahkan properti margin-right -->
                            <h5 class="d-inline-block">Price</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>



                <div class="row justify-content-end">
                  <div class="col-md-6">
                    <div class="pt-1 pb-1">
                      <div class="d-flex justify-content-end align-items-center"> <!-- Menggunakan flexbox untuk menempatkan elemen secara sejajar -->
                        <h5 class="mr-3">Total: $<span id="sub-total">1,278</span></h5> <!-- Memberikan margin kanan agar ada jarak antara elemen -->
                        <button type="button" class="btn btn-success check-out"style="color: #000;">Rent</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
         </div>
      </div>
   </section>
   <script src="RentCart.js"></script>
</body>
</html>
<style>
body{
    background: #FFF1C7;
    }
  h2 {
      font-size: 60px;
      margin-top: 40px;
  }
  .barang {
      display: flex;
      flex-direction: column;
      align-items: center; /* Memposisikan elemen ke tengah secara horizontal */
      text-align: left; /* Memposisikan teks ke tengah secara horizontal */

    }

    .barang h5 {
      margin-bottom: 5px; /* Memberikan ruang antara tulisan */
    }

    .barang h6 {
      margin-top: 5px;
      color:#5A5A5A; /* Memberikan ruang antara tulisan */
    }
  .cart{
      margin: 20px 0;
      background-color: #FFF1C7;
      padding: 60px 0;
  }
  .total-price{
      padding-bottom: 15px;
  }
  .cart-item{
      background-color: #fff;
      border-radius: 10px;
      padding: 15px 20px;
      margin-bottom: 20px;
  }
  .center-item{
      display: flex;
      align-items: center;
      justify-content: flex-start;
  }
  .cart-item img{
      width: 115px;
  }
  .cart-item h5{
      padding: 0 45px;
  }
  .cart-item .remove-item{
      width: 25px!important;
  }
  .btn-default{
      background-color: #fff;
  }
  .cart-item .form-control{
      background-color: #F6F5FA;
      border: none;
      width: 65px;
      border-radius: 10px!important;
      font-weight: 700;
      font-size: 20px;
  }
  .input-group{
      width: unset;
      flex-wrap: nowrap;
  }
  .status{
      text-align: right;
  }
  .check-out{
      float: right;
      padding: 10px 30px;
      font-size: 19px;
      background-color: #90C57E;
      border: none;
  }
  </style>
@endsection
