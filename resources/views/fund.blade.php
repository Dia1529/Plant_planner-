<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fund Me') }}
        </h2>
    </x-slot>

    <style>
        body {
            background-color: whitesmoke;
        }
        .custom-button {
            width: 150px;
            height: 150px; /* Adjust button height */
            background-color: #f8f9fa;
            border-radius: 60%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            cursor: pointer;
            text-align: center; /* Center text */
        }
        .custom-button:hover {
            transform: scale(1.1);
        }
        .custom-button img {
            width: 150px;
            height: 150px; /* Adjust icon size */
        }
        .custom-button-text {
            margin-top: -18px;
            font-size: 1.2em;
            color: #6b7280;
            text-align: center;
        }
        .buttons {
            position: absolute;
            top: 30px;
            right: 70px;
            display: flex;
            flex-direction: column; /* Arrange buttons vertically */
            gap: 70px; /* Spacing between buttons */
            margin-top: 20px; /* Adjust top margin as needed */
            width: 150px; /* Adjust width to fit buttons */
            z-index: 1; /* Ensure buttons are behind placeholder text */
        }
        .background-container {
            position: relative;
            width: 100%;
            height: 100%;
            z-index: 0; /* Ensure background is behind placeholder text */
        }
        .background-container img {
            width: 100%;
            height: 650px; /* Adjust height of background image */
            object-fit: cover; /* Ensure the image covers the container */
        }
        .placeholder {
            position: absolute;
            top: 60px;
            left: 50px;
            width: 70%;
            height: 80%;
            background-color: #cbd5c0; /* Placeholder background color */
            background-blend-mode: soft-light;
            background-image: url('{{ asset('images/D.png') }}'); /* Placeholder image */
            background-position: center;
            background-size:default;/* Adjust background size as needed */
            background-repeat: no-repeat;
            padding: 20px; /* Adjust padding as needed */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Example box shadow */
            z-index: 10; /* Ensure placeholder is in front */
            display: flex;
            opacity: 0.85;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .placeholder-content {
            max-width: 80%; /* Adjust max-width as needed */
            max-height: 80%; /* Adjust max-height as needed */
            opacity: 2; /* Initially hide content */
            transition: opacity 0.3s ease; /* Smooth transition */
            z-index: 11; /* Ensure placeholder content is in front */
            color: #333; /* Text color */
        }
        .placeholder.active .placeholder-content {
            opacity: 2; /* Show content when active */
        }
        .rights-reserved {
            margin-top:auto; /* Push the element to the bottom */
            font-size: 0.9em;
            color: #6b7280;
            text-align: center;
            padding-top: 20px;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 text-center">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Treat Me</h3>
                
              
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="col-span-1 md:col-span-3 flex justify-center relative">
                        <div class="background-container">
                            <img src="{{ asset('images/bg6.jpg') }}" alt="Fund Me Image" class="mx-auto">
                            <div class="content">
                                <div class="buttons">
                                    <div class="custom-button" onclick="showFundMe()">
                                        <img src="{{ asset('images/icons/fund.gif') }}" alt="Fund Me Icon">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="placeholder" id="placeholder">
                            <div class="placeholder-content">
                                <!-- Content  -->
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="rights-reserved">
                             © 2024 Khine Zar Thwel, Ladia. All rights reserved.
                            </div>
        </div>
        </div>
    </div>

    <script>
        function showFundMe() {
            document.getElementById('placeholder').classList.add('active');
            document.querySelector('.placeholder-content').innerHTML = `
                <h2 style="font-size: 1.5em;">Buy Me a Drink and Sprinkle Some Magic! </h2>
                <p>Want to make my day brighter?Treat me to a virtual drink and keep the creative ideas blooming like flowers! Your support means a lot and fuels my passion for cultivating innovative projects like 'Plant Task.' Let's raise a glass to nurturing our dreams together and watching them grow as beautifully.</p><br><br>
           <img src="{{ asset('images/bank.jpg') }}" alt="Fund Me Image" class="mx-auto" style="max-width: 200px;">

            `;
        }
    </script>
</x-app-layout>
