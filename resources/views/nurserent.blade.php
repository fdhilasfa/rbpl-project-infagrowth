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
        .font-sparta{
            font-family: 'Spartan', sans-serif;
        }
    </style>
</head>

<body class="bg-[#FFF1C7]">


    <div class="mx-[165px] my-12">
        <div class="flex flex-row gap-12">
            <img class="" src="{{ asset('images/back.svg') }}">
            <h1 class="text-[50px] tracking-widest font-lexend font-semibold">Nurse Cart</h1>
        </div>
        <div class="w-full px-8 items-center text-center font-lexend grid grid-cols-5  h-14 bg-white">
            <h1 class="col-span-2 text-left ml-4">Product</h1>
            <h1 class="text-black/[0.4] col-span-1">Price</h1>
            <h1 class="text-black/[0.4] col-span-1">Duration (Month)</h1>
            <h1 class="text-black/[0.4] col-span-1">Total Price</h1>
        </div>
        <!-- mulai foreach -->
        <div class="w-full px-8 mt-6 items-center relative text-center font-lexend grid grid-cols-5  h-40 bg-white">
            <img class="col-span-1 text-left ml-4 w-28" src="{{ asset('images/img-1.png') }}">

            <div class="col-span-1 text-left  ml-4">
                <div class="flex flex-col">
                    <h1 class="text-xl">Baby Walker</h1>
                    <p class="text-[#677489]">Kalimantan Barat</p>
                </div>
            </div>
            <h1 class="text-[#5A5A5A] col-span-1">Rp70.000</h1>
            <div class="col-span-1">
                <div class="flex items-center justify-center">
                    <button id="decrementBtn" class="text-xl px-4 py-2 text-gray-400 ring-1 ring-gray-200">-</button>
                    <span id="countDisplay" class="text-2xl px-6 py-[6px] ring-1 ring-gray-200 ">0</span>
                    <button id="incrementBtn" class="text-xl px-4 py-2  text-gray-400 ring-1 ring-gray-200 rounded-r">+</button>
                </div>
            </div>
            <h1 class="text-[#5A5A5A] col-span-1">Rp70.000</h1>
            <a class="absolute right-8 w-10" href="">
            <img  src="{{ asset('images/del-icon.svg') }}" alt="">

            </a>
        </div>
        <!-- pemisah -->
        <div class="w-full px-8 mt-6 items-center relative text-center font-lexend grid grid-cols-5  h-40 bg-white">
            <img class="col-span-1 text-left ml-4 w-28" src="{{ asset('images/img-2.png') }}">
            <div class="col-span-1 text-left  ml-4">
                <div class="flex flex-col">
                    <h1 class="text-xl">Portable Bathub</h1>
                    <p class="text-[#677489]">Jakarta</p>
                </div>
            </div>
            <h1 class="text-[#5A5A5A] col-span-1">Rp80.000</h1>
            <div class="col-span-1">
                <div class="flex items-center justify-center">
                    <button id="decrementBtn" class="text-xl px-4 py-2 text-gray-400 ring-1 ring-gray-200">-</button>
                    <span id="countDisplay" class="text-2xl px-6 py-[6px] ring-1 ring-gray-200 ">3</span>
                    <button id="incrementBtn" class="text-xl px-4 py-2  text-gray-400 ring-1 ring-gray-200 rounded-r">+</button>
                </div>
            </div>
            <h1 class="text-[#5A5A5A] col-span-1">Rp240.000</h1>
            <a class="absolute right-8 w-10" href="">
                <img  src="{{ asset('images/del-icon.svg') }}" alt="">
            </a>
        </div>
        <!-- akhir foreach -->
        <div class="fixed bottom-0 bg-white font-sparta w-[1200px] h-32">
            <div class="flex flex-row mx-6 gap-4 justify-end items-center h-full">
                <h1>Total (2 Item):</h1>
                <h1 class="text-[#90C57E] font-bold">Rp310.000</h1>
                <button class="bg-[#90C57E] font-semibold w-56 h-16 flex items-center justify-center">
                    Rent
                </button>
            </div>
        </div>
    </div>

    <script>
        const countDisplay = document.getElementById("countDisplay");
        const incrementBtn = document.getElementById("incrementBtn");
        const decrementBtn = document.getElementById("decrementBtn");
        let count = 0;

        incrementBtn.addEventListener("click", () => {
            count++;
            countDisplay.textContent = count;
        });

        decrementBtn.addEventListener("click", () => {
            if (count > 0) {
                count--;
                countDisplay.textContent = count;
            }
        });
    </script>
</body>

@endsection
