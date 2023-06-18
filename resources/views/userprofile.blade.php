@extends('components.header')

@section('content')
    <title>Profile Page</title>

    <!DOCTYPE html>
    <!---Coding By CodingLab | www.codinglabweb.com--->
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />


        <!---Custom CSS File--->
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <script src="path/to/custom-file-input.js"></script>
        <section class="container">
            <p
                style="text-align:left; color: #000000; font-size: 30px; font-weight:1000; letter-spacing: 9.5%; margin-left:50px; margin-bottom:-50px">
                Edit Profile
            </p>

            <form id="form1" action="{{ route('showuserprofile') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf



                {{-- <div class="profile-picture">
                    @if (Auth::user()->profile_picture)
                        <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}"
                            alt="Profile Picture">
                        <!--<p>Profile picture has been added.</p>-->
                    @else
                        <p>No profile picture added.</p>
                    @endif
                </div> --}}


                <div class="input-label-pp">
                    <label for="profile_picture">Profile Photo</label>
                </div>
                <div class="file-input-wrapper">
                    <input type="file" id="profile_picture" name="profile_picture" id="profilePicture" accept="image/*"
                        required class="file-input">
                    <button type="button" class="custom-file-button" style="font-family:Lexend">Upload Photo</button>
                </div>

                <div class="file-label-wrapper">
                    <label type="text" class="custom-label">Maximum size of 1MB. JPG, GIF, or PNG.</button>
                </div>
            </form>

            <form id="form2" method="POST" action="{{ route('save-profile') }}" enctype="multipart/form-data" class="form">
                @csrf

                <div class="column">
                    <div class="input-label">
                        <label>First Name</label>
                    </div>
                    <div class="input-label">
                        <label style="margin-left: 378px;">Last Name</label>
                    </div>
                </div>

                <div class="column">
                    <div class="input-column" style="font-family: Lexend">
                        <input type="text" placeholder="Enter first name" required name="first_name" id="firstName" />
                    </div>

                    <div class="input-column" style="font-family: Lexend">
                        <input type="text" placeholder="Enter last name" required name="last_name" id="lastName" />
                    </div>
                </div>


                <div class="input-label">
                    <label>Email Address</label>
                </div>

                <div class="input-box single" style="font-family: Lexend">
                    <input type="text" id="emailInput" placeholder="Enter email address"
                        pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" required name="email_address"
                        id="emailAddress" />
                    <span id="emailStatus"></span>
                </div>

                <script>
                    const emailInput = document.getElementById('emailInput');
                    const emailStatus = document.getElementById('emailStatus');
                    const saveProfileButton = document.getElementById('saveProfileButton');

                    emailInput.addEventListener('input', function(event) {
                        const email = emailInput.value;
                        const isValidEmail = email.includes('@') && email.endsWith('.com');

                        if (isValidEmail) {
                            emailStatus.innerHTML = '&#10004;'; // Checkmark symbol
                            emailStatus.style.color = 'green';
                            saveProfileButton.disabled = false;
                        } else {
                            emailStatus.innerHTML = '&#9888; Enter a valid email address!'; // Exclamation mark symbol
                            emailStatus.style.color = 'red';
                            saveProfileButton.disabled = true;
                        }
                    });

                    saveProfileButton.addEventListener('click', function(event) {
                        if (!emailInput.validity.valid) {
                            event.preventDefault();
                            alert('Please enter a valid email address!');
                        }
                    });
                </script>



                <div class="input-label">
                    <label>Address</label>
                </div>
                <div class="input-box address" style="font-family: Lexend">
                    <input type="text" placeholder="Enter street address" required name="address" id="address" />
                </div>

                <div class="input-label">
                    <label>Contact Number</label>
                </div>
                <div class="input-box" style="font-family: Lexend">
                    <input type="number" placeholder="Enter phone number" required name="contact_number"
                        id="contactNumber" />
                </div>


                <div class="column">
                    <div class="input-label">
                        <label>Province</label>
                    </div>
                    <div class="input-label" style="font-family: Lexend">
                        <label style="margin-left: 390px;">City</label>
                    </div>
                </div>

                <div class="input-label">

                    <div class="column">
                        <div class="select-box" style="font-family: Lexend">
                            <select id="provinceSelect" name="province" id="province">
                                <option hidden>Select Province</option>
                                <option>Aceh</option>
                                <option>Bali</option>
                                <option>Banten</option>
                                <option>Bengkulu</option>
                                <option>Central Java</option>
                                <option>Central Kalimantan</option>
                                <option>Central Sulawesi</option>
                                <option>East Java</option>
                                <option>East Kalimantan</option>
                                <option>East Nusa Tenggara</option>
                                <option>Gorontalo</option>
                                <option>Jakarta</option>
                                <option>Jambi</option>
                                <option>Lampung</option>
                                <option>Maluku</option>
                                <option>North Kalimantan</option>
                                <option>North Maluku</option>
                                <option>North Sulawesi</option>
                                <option>North Sumatra</option>
                                <option>Papua</option>
                                <option>South Kalimantan</option>
                                <option>South Sulawesi</option>
                                <option>South Sumatra</option>
                                <option>Southeast Sulawesi</option>
                                <option>West Java</option>
                                <option>West Kalimantan</option>
                                <option>West Nusa Tenggara</option>
                                <option>West Papua</option>
                                <option>West Sulawesi</option>
                                <option>West Sumatra</option>
                                <option>Yogyakarta</option>
                            </select>
                        </div>


                        <div class="select-box" style="font-family: Lexend">
                            <select id="citySelect" name="city">
                                <option hidden>Select City</option>

                            </select>
                        </div>

                        <script>
                            // Get the select elements
                            const provinceSelect = document.getElementById('provinceSelect');
                            const citySelect = document.getElementById('citySelect');

                            // Define the city options for each province
                            const citiesByProvince = {
                                Aceh: ['Banda Aceh', 'Langsa', 'Lhokseumawe', 'Sabang'],
                                Bali: ['Denpasar', 'Singaraja', 'Tabanan'],
                                'Bangka belitung': ['Pangkalpinang', 'Tanjung Pandan', 'Manggar'],
                                Banten: ['Serang', 'Tangerang', 'Cilegon'],
                                Bengkulu: ['Bengkulu', 'Curup', 'Mukomuko'],
                                'Central Java': ['Semarang', 'Surakarta', 'Yogyakarta'],
                                'Central Kalimantan': ['Palangkaraya', 'Sampit', 'Pangkalan Bun'],
                                'Central Sulawesi': ['Palu', 'Makassar', 'Toli-Toli'],
                                'East Java': ['Surabaya', 'Malang', 'Madiun'],
                                'East Kalimantan': ['Balikpapan', 'Samarinda', 'Tenggarong'],
                                'East Nusa Tenggara': ['Kupang', 'Ende', 'Labuan Bajo'],
                                Gorontalo: ['Gorontalo', 'Kwandang', 'Tilamuta'],
                                Jakarta: ['Jakarta Selatan', 'Jakarta Barat', 'Jakarta Pusat'],
                                Jambi: ['Jambi', 'Sungai Penuh', 'Muara Bulian'],
                                Lampung: ['Bandar Lampung', 'Metro', 'Krui'],
                                Maluku: ['Ambon', 'Ternate', 'Tual'],
                                'North Kalimantan': ['Tanjung Selor', 'Tarakan', 'Nunukan'],
                                'North Maluku': ['Ternate', 'Sofifi', 'Jailolo'],
                                'North Sulawesi': ['Manado', 'Bitung', 'Tomohon'],
                                'North Sumatra': ['Medan', 'Pematangsiantar', 'Tebing Tinggi'],
                                Papua: ['Jayapura', 'Merauke', 'Biak'],
                                'West Java': ['Bandung', 'Bogor', 'Cirebon'],
                                'West Kalimantan': ['Pontianak', 'Singkawang', 'Ketapang'],
                                'West Nusa Tenggara': ['Mataram', 'Bima', 'Sumbawa Besar'],
                                'West Papua': ['Manokwari', 'Sorong', 'Fakfak'],
                                'West Sulawesi': ['Mamuju', 'Majene', 'Polewali Mandar'],
                                'West Sumatra': ['Padang', 'Bukittinggi', 'Pariaman'],
                                Yogyakarta: ['Yogyakarta', 'Bantul', 'Sleman'],
                            };

                            // Event listener for province select change
                            provinceSelect.addEventListener('change', function() {
                                // Clear the current city options
                                citySelect.innerHTML = '<option hidden>Select City</option>';

                                // Get the selected province value
                                const selectedProvince = this.value;

                                // Get the cities for the selected province
                                const cities = citiesByProvince[selectedProvince] || [];

                                // Populate the city select options
                                cities.forEach(function(city) {
                                    const option = document.createElement('option');
                                    option.textContent = city;
                                    citySelect.appendChild(option);
                                });
                            });
                        </script>

                    </div>
                </div>



                <div class="input-label">
                    <label>Birthday</label>
                    <div class="column">
                        <div class="input-3column" style="font-family: Lexend">
                            <select name="birthday_month" id="birthdayMonth">
                                <option hidden>Month</option>
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                        </div>

                        <div class="input-3column" style="font-family: Lexend">
                            <select name="birthday_day" id="birthdayDay">
                                <option hidden>Day</option>
                                <?php for ($day = 1; $day <= 31; $day++): ?>
                                <option><?php echo $day; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>


                        <div class="input-3column" style="font-family: Lexend">
                            <select name="birthday_year" id="year">
                                <option hidden>Year</option>
                                <?php for ($year = 1900; $year <= 2023; $year++): ?>
                                <option><?php echo $year; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!--<form action="{{ route('profile.password.verify') }}" method="POST">-->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-label">
                        <label for="password">{{ __('Password') }}</label>

                    </div>
                    <div class="input-box" style="font-family: Lexend">
                        <input type="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password"
                            name="password" autocomplete="current-password" />

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <span id="passwordStatus"></span>

                    <div class="column">
                </form>

                <div class="input-box-cancel" class="cancel-button" style="font-family: Lexend">
                    <button type="cancel" class="cancel-button" style="font-size:1.3rem">Cancel</button>
                </div>


                <div class="input-box-save" style="font-family: Lexend;">
                    <button type="submit" class="save-button" style="font-size:1.3rem"
                        id="saveProfileButton">Save</button>
                </div>

                </div>
                <script>
                    document.getElementById('saveProfileButton').addEventListener('click', function() {
                        var activeForm = getActiveForm();

                        if (activeForm) {
                            activeForm.submit();
                        }
                    });

                    function getActiveForm() {
                        var form1 = document.getElementById('form1');
                        var form2 = document.getElementById('form2');

                        if (form1 && form1.action.includes('profilepicture.upload')) {
                            return form1;
                        } else if (form2 && form2.action.includes('save-profile')) {
                            return form2;
                        }

                        return null;
                    }
                </script>
            </form>






            <!-- <script>
                var passwordInput = document.getElementById('passwordInput');
                var passwordStatus = document.getElementById('passwordStatus');
                var saveProfileButton = document.getElementById('saveProfileButton');

                passwordInput.addEventListener('input', function() {
                    var password = this.value;

                    // Send an AJAX request to verify the password
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('profile.password.verify') }}', true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                // Password is correct
                                passwordStatus.innerHTML = '&#10004;'; // Checkmark symbol
                                passwordStatus.style.color = 'green';
                                saveProfileButton.disabled = false;
                            } else {
                                // Password is incorrect
                                passwordStatus.innerHTML =
                                    '&#9888; These credentials do not match our records.'; // Exclamation mark symbol
                                passwordStatus.style.color = 'red';
                                passwordStatus.style.marginLeft = '50px';
                                saveProfileButton.disabled = true;

                            }
                        }
                    };
                    xhr.send(JSON.stringify({
                        password: password
                    }));
                });

                saveProfileButton.addEventListener('click', function(event) {
                    if (saveProfileButton.disabled) {
                        event.preventDefault();
                        alert('Please enter a valid password.');
                    }
                });
            </script>

                                                -->


        </section>
    </body>

    </html>

    <style>
        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Telex:wght@200;300;400;500;600;700&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Lexend:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Telex", sans-serif;
        }

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
            margin-left: 170%;
            margin-top: 62px;
        }

        body {
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 0px;
            background: #EFE2DA;
        }

        /*
                                                                    .file-input {
                                                                height: 55px;
                                                                width: 20%;
                                                                color: #fff;
                                                                font-size: 1rem;
                                                                font-weight: 400;
                                                                margin-top: 30px;
                                                                border: none;
                                                                cursor: pointer;
                                                                transition: all 0.2s ease;
                                                                background: #FF9F84;
                                                                border: 1px solid #ddd;
                                                                border-radius: 6px;
                                                                margin-left: 30px;
                                                            }
                                                            */
        .file-input-wrapper {
            position: relative;
            display: inline-block;
        }

        .file-input-wrapper .file-input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-wrapper .custom-file-button {
            height: 50px;
            width: 50%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 7px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #FF9F84;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-left: 220px;
        }

        .form .custom-file-button button:hover {
            background: #f8c3b4;
        }




        .custom-label {
            height: 50px;
            width: 500%;
            color: #C7A4A4;
            font-size: 0.9rem;
            font-weight: 400px;
            margin-top: 7px;
            margin-left: 220px;
            margin-bottom: 20px;
            font-family: Lexend;
        }


        .container {}

        .container header {
            font-size: 1.5rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }

        .container .form {
            margin-top: 30px;
        }


        .form .input-box {
            width: 100%;
            margin-top: 0px;
            margin-left: 25px;
            margin-right: 0px;

        }

        .form .input-box-cancel {
            width: 12%;
            margin-top: 5px;
            margin-left: 25px;
            margin-right: 30px;

        }

        .form .input-box-save {
            width: 12%;
            margin-top: 5px;

        }


        .label {
            color: #333;
            font-weight: bold;
        }

        .input-label label {
            color: #333;
            font-weight: bold;
            margin-left: 50px;
            margin-top: 15px;
            margin-bottom: 2px;
            font-family: "Lexend", sans-serif;

        }

        .input-label-pp label {
            color: #333;
            font-weight: bold;
            margin-left: 50px;
            margin-top: -100px;
            margin-bottom: 2px;
            font-family: "Lexend", sans-serif;

        }

        .input-box label {
            color: #333;
            font-weight: bold;
            margin-left: 25px;
        }

        .form :where(.input-box input, .input-box-cancel input, .input-box-save input) {
            position: relative;
            height: 50px;
            width: 77%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 8px;
            border: 1.5px solid #858585;
            border-radius: 6px;
            padding: 0px 15px;
            margin-left: 25px;
            margin-right: 25px;

        }


        .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .input-box-cancel input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .input-box-save input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .form .column {
            display: flex;
            column-gap: 5px;

        }



        .address :where(input, .select-box) {
            margin-top: 0px;
            margin-bottom: 15px;

        }

        .address :where(input, .input-column) {
            margin-top: 0px;
            margin-bottom: 15px;

        }

        .address :where(input, .input-3column) {
            margin-top: 0px;
            margin-bottom: 15px;

        }


        .form .select-box select {
            position: relative;
            height: 50px;
            width: 400px;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 0px;

            border: 1px solid #858585;
            border-radius: 6px;
            padding: 0 10px;
            margin-left: 50px;
            margin-right: 0px;


        }

        .form .input-column input {
            position: relative;
            height: 50px;
            width: 400px;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 0px;

            border: 1px solid #858585;
            border-radius: 6px;
            padding: 0 10px;
            margin-left: 50px;
            margin-right: 0px;


        }

        .form .input-3column select {
            position: relative;
            height: 50px;
            width: 200px;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 0px;

            border: 1px solid #858585;
            border-radius: 6px;
            padding: 0 10px;
            margin-left: 50px;
            margin-right: 0px;


        }


        .select-box select {
            height: 100%;

            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
        }

        .input-column input {
            height: 100%;

            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
        }

        .input-3column select {
            height: 100%;

            outline: none;
            border: none;
            color: #707070;
            font-size: 1rem;
        }

        .form .save-button {
            height: 55px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #FF9F84;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-left: 30px;
        }

        .form .cancel-button {
            height: 55px;
            width: 100%;
            color: #FF9F84;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #ffffff;
            border: 2px solid #FF9F84;
            border-radius: 6px;
            margin-left: 25px;

        }



        .form button:hover {
            background: #f8c3b4;
        }

        .form .save-button button:hover {
            background: #000000;
        }

        /*Responsive*/
        @media screen and (max-width: 500px) {
            .form .column {
                flex-wrap: wrap;
            }

            .form :where(.gender-option, .gender) {
                row-gap: 15px;
            }
        }
    </style>
@endsection
