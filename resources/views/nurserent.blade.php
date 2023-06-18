@extends('components.header')


@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.cdnfonts.com/css/cormorant-2" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/telex" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/spartan" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/lexend-deca" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Our Service</title>

        <title>Rent Cart</title>

        <style>
            .font-telex {
                font-family: 'Telex', sans-serif;
            }

            .font-lexend {
                font-family: 'Lexend Deca', sans-serif;
            }

            .font-sparta {
                font-family: 'Spartan', sans-serif;
            }
        </style>
    </head>

    <body class="bg-[#FFF1C7]">

        <div class="mx-[165px] my-12">
            <div class="flex flex-row gap-12">
                <a href="infanurse"><img class="" src="{{ asset('images/back.svg') }}"> </a>
                <h1 class="text-[50px] tracking-widest font-lexend font-semibold">Nurse Cart</h1>
            </div>
            <div class="w-full px-8 mt-6 items-center relative text-center font-lexend grid grid-cols-5  h-40 bg-white">
                @php
                    $id = $_GET['id']; // Ambil nilai id dari URL
                    $nurse = DB::table('database_nurses')
                        ->where('id', $id)
                        ->first(); // Ambil data nurse berdasarkan id
                    $imagePath = 'images/nurse/nurse' . $nurse->id . '.jpg';
                    $imageURL = file_exists(public_path($imagePath)) ? asset($imagePath) : asset('images/nurse.jpg');
                    $harga = $nurse->harga ?? null; // Harga default jika tidak ada
                    $count = 0; // Inisialisasi nilai count
                    $totalPrice = $harga !== null ? $harga * $count : null; // Hitung total price jika harga tidak null
                @endphp


                <img src="{{ $imageURL }}" alt="Profile Image" class="person-img"
                    onclick="redirectToNurseRent({{ $nurse->id }})" style="scale: 0.7; top:-16px; position: relative;">

                <div class="col-span-1 text-left  ml-4">
                    <div class="flex flex-col">
                        <h1 class="text-xl">{{ $nurse->namaNurse }}</h1>
                        <p class="text-[#677489]">{{ $nurse->asal }}</p>
                    </div>
                </div>

                <h1 id="harga" class="text-[#5A5A5A] col-span-1" data-harga="{{ $harga !== null ? $harga : 'Null' }}">
                    Rp{{ $harga !== null ? number_format($harga, 0, ',', '.') : 'Null' }}
                </h1>

                <div class="col-span-1">
                    <div class="flex items-center justify-center">
                        <button id="decrementBtn" class="text-xl px-4 py-2 text-gray-400 ring-1 ring-gray-200">-</button>
                        <span id="countDisplay"
                            class="text-2xl px-6 py-[6px] ring-1 ring-gray-200">{{ $count }}</span>
                        <button id="incrementBtn"
                            class="text-xl px-4 py-2  text-gray-400 ring-1 ring-gray-200 rounded-r">+</button>
                    </div>
                </div>

                <h1 id="totalPriceDisplay" class="text-[#90C57E] font-bold">
                    @php
                        $formattedPrice = $totalPrice !== null ? 'Rp' . number_format($totalPrice, 0, ',', '.') : 'Null';
                    @endphp
                    {{ $formattedPrice }}
                </h1>

                <a class="absolute right-8 w-10" href="/infanurse">
                    <img src="{{ asset('images/del-icon.svg') }}" alt="">
                </a>
            </div>
            <!-- Akhir foreach -->

            <div class="fixed bottom-0 bg-white font-sparta w-[1040px] h-32">
                <div class="flex flex-row mx-6 gap-4 justify-end items-center h-full">
                    <h1>Total:</h1>
                    <h1 id="totalPrice" class="text-[#90C57E] font-bold">
                        @php
                            $formattedPrice = $totalPrice !== null ? 'Rp' . number_format($totalPrice, 0, ',', '.') : 'Null';
                        @endphp
                        {{ $formattedPrice }}
                    </h1>
                    <form id="rentForm" action="{{ route('submit-nurserent') }}" method="POST">
                        @csrf
                        <input type="hidden" name="nurseId" value="{{ $nurseId }}">
                        <input id="countInput" type="hidden" name="durasiSewa" value="">
                        <input id="totalPriceInput" type="hidden" name="harga" value="">
                        <button onclick="submitRentForm()"
                            class="bg-[#90C57E] font-semibold w-56 h-16 flex items-center justify-center">
                            Rent
                        </button>
                    </form>


                </div>
            </div>
        </div>

        <script>
            const countDisplay = document.getElementById("countDisplay");
            const incrementBtn = document.getElementById("incrementBtn");
            const decrementBtn = document.getElementById("decrementBtn");
            const hargaElement = document.getElementById("harga");
            const totalPriceDisplay = document.getElementById("totalPriceDisplay");
            const totalPriceElement = document.getElementById("totalPrice");

            let count = parseInt(countDisplay.textContent);
            let harga = parseFloat(hargaElement.dataset.harga);
            let totalPrice = null;

            incrementBtn.addEventListener("click", () => {
                count++;
                countDisplay.textContent = count;
                updateTotalPrice();
            });

            decrementBtn.addEventListener("click", () => {
                if (count > 0) {
                    count--;
                    countDisplay.textContent = count;
                    updateTotalPrice();
                }
            });

            function updateTotalPrice() {
                const countDisplay = document.getElementById("countDisplay");
                const hargaElement = document.getElementById("harga");
                const totalPriceDisplay = document.getElementById("totalPriceDisplay");
                const totalPriceElement = document.getElementById("totalPrice");

                let count = parseInt(countDisplay.textContent);
                let harga = parseFloat(hargaElement.dataset.harga);
                let totalPrice = null;

                totalPrice = harga !== null ? harga * count : null;
                const formattedPrice = totalPrice !== null ? 'Rp' + numberWithCommas(totalPrice) : 'Null';
                totalPriceDisplay.textContent = formattedPrice;
                totalPriceElement.textContent = formattedPrice;
                document.getElementById("totalPriceInput").value = totalPrice;
            }


            function numberWithCommas(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        </script>

        <script>
            function submitRentForm() {
                var count = parseInt(countDisplay.textContent);
                var harga = parseFloat(hargaElement.dataset.harga, 10);
                var totalPrice = count * harga;

                // Set nilai input tersembunyi
                document.getElementById("countInput").value = count;
                document.getElementById("totalPriceInput").value = totalPrice;

                // Submit formulir
                document.getElementById("rentForm").submit();
            }
        </script>

    </body>
@endsection
