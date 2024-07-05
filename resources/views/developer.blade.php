<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Developer\'s Corner') }}
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
            margin-top:20px; /* Adjust top margin as needed */
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
            background-blend-mode:soft-light;
            background-image: url('{{ asset('images/D.png') }}');
            background-position: center;
            background-size:default;
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
           
            max-width: 80%; 
            transition: opacity 0.3s ease; /* Smooth transition */
            z-index: 11; /* Ensure placeholder content is in front */
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
                <h3 class="text-2xl font-semibold text-gray-800 mb-6">Developer's Corner</h3>
              
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="col-span-1 md:col-span-3 flex justify-center relative">
                        <div class="background-container">
                            <img src="{{ asset('images/bg9.jpg') }}" alt="Background Image" class="mx-auto" >
                            <div class="content">
                                <div class="buttons">
                                    <div class="custom-button" onclick="showDeveloper()">
                                        <img src="{{ asset('images/icons/developer.gif') }}" alt="developer Icon">
                                        <div class="custom-button-text">Developer</div>
                                    </div>
                                    <div class="custom-button" onclick="showMotto()">
                                        <img src="{{ asset('images/icons/motto2.gif') }}" alt="motto Icon">
                                        <div class="custom-button-text">Motto</div>
                                    </div>
                                    <div class="custom-button" onclick="showContact()">
                                        <img src="{{ asset('images/icons/contact2.gif') }}" alt="Contact Icon">
                                        <div class="custom-button-text">Contact</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="placeholder" id="placeholder">
                            <div class="placeholder-content">
                                 
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

    <script>
        function showDeveloper() {
            document.getElementById('placeholder').classList.add('active');
            document.querySelector('.placeholder-content').innerHTML = `
                <h2 style ="font-size: 1.5em;">Message from the Developer</h2>
                <p>Hi there! I'm Khine Zar Thwel, Ladia, the creator of 'Plant Task.' I designed this app with a simple yet powerful idea in mind: no matter how small a task may seem, every effort you make counts. Just like in a garden, every droplet of water helps a plant grow, every task you complete brings you closer to your goals.

                </p>With 'Plant Task,' I wanted to create a space where productivity meets joy. 
                <p>As you complete tasks, you'll earn droplets that you can use to nurture your virtual garden, watching it bloom and flourish over time. This project merges my passion for organization and creativity, using the latest technologies to deliver an engaging and beautiful experience.</p>
                <p>I'm excited to share 'Plant Task' with you and hope it brings a touch of nature's magic to your daily routine.</p>
            `;
        }

        function showMotto() {
            document.getElementById('placeholder').classList.add('active');
            document.querySelector('.placeholder-content').innerHTML = `
                <h2 style ="font-size: 1.5em;">Our Motto</h2>
                <p> "Tiny Efforts, Beautiful Blossoms.  </p>
                <p>  Every Droplet Makes a Difference." </p>
            `;
        }

        function showContact() {
        document.getElementById('placeholder').classList.add('active');
        document.querySelector('.placeholder-content').innerHTML = `
            <h2 style="font-size: 1.5em;">Contact Information</h2>
            <ul>
                <li>Email: saraslays365@gmail.com</li>
                <li>Instagram: @ladii_belorve</li>
                <li>Phone: +1234567890</li>
            </ul>
        `;
    }
</script>
</x-app-layout>
