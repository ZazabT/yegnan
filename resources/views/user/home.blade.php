<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yegnan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    @vite('resources/css/app.css')
    <style>
        /* Optional hover effects */
        button:hover {
            transition: background-color 0.9s ease-in-out;
            color: #50087b;
        }
        .money_amoun{
            color: rgb(39, 39, 39);
            font-weight:700;
        }

        .house-card {
         transition: transform 0.3s ease; 
         cursor: pointer;
         position: relative;
       }

        .house-card:hover {
            transform: scale(1.05); 

        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            50% { transform: translateX(4px); }
            75% { transform: translateX(-4px); }
            100% { transform: translateX(0); }
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .fa-star {
            transition: transform 0.3s ease; /
        }

        .house-card:hover .fa-star {
            animation: shake 0.5s ease infinite; 
        }


        .search-button:hover {
            background-color: rgba(80, 8, 123, 0.85);
            transition: background-color 0.3s ease-in-out;
        }

        .language-icon:hover {
            color: #50087b;
            transition: color 0.3s ease-in-out;
        }

        .category:hover {
            color: #50087b;
            transition: color 0.3s ease-in-out;
            cursor: pointer;
           scale: 1.1;

        }

        /* Scrollable Categories */
        .category-container {
            display: flex;
            gap: 2.3rem;
            overflow-x: auto;
            padding: 1rem;
            white-space: nowrap;
        }

        .category-container::-webkit-scrollbar {
            display: none; /* Hide scrollbar */
        }

        /* Custom styles for Filter */
        .filter-container {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            border: 2px solid gray;
            padding: 0.5rem 1rem;
            border-radius: 0.2rem;
            cursor: pointer;
        }

        .filter-container:hover {
            background-color: #50087b;
            color: white;
            border: 2px solid #50087b;
        }
      
    </style>
</head>
<body>
    {{-- Header --}}
    <header class="">

          {{-- Nav bar --}}
    <div class="grid grid-cols-3 items-center px-8 py-4 border-b-2">
        {{-- Logo --}}
        <div class="flex items-center">
            <img src="{{asset('images/yegnaLogo-removebg.png')}}" alt="logo" class="w-48 h-auto hover:scale-90 cursor-pointer"> <!-- Larger size -->
        </div>

        {{-- Nav bar links --}}
        <div class="flex justify-evenly items-center border rounded-full shadow-md h-14 w-96 p-1">
            <button class="border-r-2 p-2 text-sm font-medium px-5 hover:scale-105 hover:font-bold">Anywhere</button>
            <button class="border-r-2 p-2 text-sm font-medium px-5 hover:scale-105 hover:font-bold">Any week</button>
            <button class="border-r-2 p-2 text-sm font-medium px-5 hover:scale-105 hover:font-bold">Any guest</button>
            <i class="fa-solid fa-magnifying-glass border rounded-full p-2 text-white bg-[#50087b]"></i>
        </div>

        <div class="flex justify-end items-center gap-6">
            <button class="text-sm font-medium px-4 hover:text-[#50087b;]">Yegnan Home</button>
            <span class="material-symbols-outlined language-icon text-2xl cursor-pointer">language</span>

            <div class="flex justify-evenly border rounded-full shadow-md h-12 w-24 items-center hover:bg-gray-100">
                <i class="fa-solid fa-bars"></i>
                <button class="border rounded-full text-white bg-[#50087b] hover:bg-[#451f5c] hover:text-white h-8 w-8 flex items-center justify-center">T</button>
            </div>
        </div>
    </div>

    {{-- Categories --}}
    <div class="flex justify-center items-center py-6">
        <div class="category-container ">
            {{-- Category 1 --}}
            <div class="flex flex-col items-center text-gray-500 category ">
                <span class="material-symbols-outlined text-2xl">
                    apartment
                </span>
                <p class="text-sm font-medium mt-2">Apartment</p>
            </div>

            {{-- Category 2 --}}
            <div class="flex flex-col items-center text-gray-500  category">
                <span class="material-symbols-outlined text-2xl">
                    villa
                </span>
                <p class="text-sm font-medium mt-2">Villa</p>
            </div>

            {{-- Category 3 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    hotel
                </span>
                <p class="text-sm font-medium mt-2">Hotel</p>
            </div>

            {{-- Category 4 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    pool
                </span>
                <p class="text-sm font-medium mt-2">Resort</p>
            </div>

            {{-- Category 5 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    camping
                </span>
                <p class="text-sm font-medium mt-2">Camping</p>
            </div>

            {{-- Category 6 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    beach_access
                </span>
                <p class="text-sm font-medium mt-2">Beach House</p>
            </div>

            {{-- Category 1 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    apartment
                </span>
                <p class="text-sm font-medium mt-2">Apartment</p>
            </div>

            {{-- Category 2 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    villa
                </span>
                <p class="text-sm font-medium mt-2">Villa</p>
            </div>

            {{-- Category 3 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    hotel
                </span>
                <p class="text-sm font-medium mt-2">Hotel</p>
            </div>

            {{-- Category 4 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    pool
                </span>
                <p class="text-sm font-medium mt-2">Resort</p>
            </div>

            {{-- Category 5 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    camping
                </span>
                <p class="text-sm font-medium mt-2">Camping</p>
            </div>

            {{-- Category 6 --}}
            <div class="flex flex-col items-center text-gray-500  category">
                <span class="material-symbols-outlined text-2xl">
                    beach_access
                </span>
                <p class="text-sm font-medium mt-2">Beach House</p>
            </div>

            <div class="flex flex-col items-center text-gray-500  category">
                <span class="material-symbols-outlined text-2xl">
                    hotel
                </span>
                <p class="text-sm font-medium mt-2">Hotel</p>
            </div>

            {{-- Category 4 --}}
            <div class="flex flex-col items-center text-gray-500  category">
                <span class="material-symbols-outlined text-2xl">
                    pool
                </span>
                <p class="text-sm font-medium mt-2">Resort</p>
            </div>

            {{-- Category 5 --}}
            <div class="flex flex-col items-center text-gray-500 category">
                <span class="material-symbols-outlined text-2xl">
                    camping
                </span>
                <p class="text-sm font-medium mt-2">Camping</p>
            </div>

            
            {{-- Repeat other categories here if needed --}}
        </div>

        {{-- Circle Arrow for scrolling --}}
        <div class="flex justify-center items-center ml-4">
            <span class="material-symbols-outlined text-2xl cursor-pointer">
                arrow_circle_right
            </span>
        </div>

        {{-- Filter --}}
        <div class="flex filter-container ml-6">
            <span class="material-symbols-outlined">
                tune
            </span>
            <p>Filter</p>
        </div>
    </div>

    </header>
    {{-- Header End --}}




    {{-- Main --}}
    <main class="mt-6 mx-10 ">
       
        <div class="grid grid-cols-4 gap-6 ">
            <!-- House Listing 1 -->
            <div class="house-card ">
                <img src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg" alt="image" class="w-full h-64 rounded-xl">
                <i class="fa-solid fa-heart absolute top-2 right-2 text-2xl transition-transform duration-200 hover:scale-125 text-white hover:text-red-500" ></i>
                <div class="flex justify-between items-center mt-2">
                    <p class="text-lg font-medium">Western Cape, South Africa</p>
                    <div class="flex items-center">
                        <i class="fa-regular fa-star text-yellow-500"></i>
                        <p class="text-lg font-medium ml-1">5.0</p>
                    </div>
                </div>
                <p class="text-sm/relaxed mt-1 text-gray-500">5112 kilometers away</p>
                <p class="text-sm/relaxed mt-1 text-gray-500">Dec 10-15</p>
                <p class="money_amoun text-sm/relaxed mt-1">$100 per night</p>
            </div>
            
        
            <!-- House Listing 2 -->
            <div class="house-card ">
                <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg" alt="image" class="w-full h-64 rounded-xl">
                <div class="flex justify-between items-center mt-2">
                    <p class="text-lg font-medium">New York, USA</p>
                    <div class="flex items-center">
                        <i class="fa-regular fa-star text-yellow-500"></i>
                        <p class="text-lg font-medium ml-1">4.8</p>
                    </div>
                </div>
                <p class="text-sm/relaxed mt-1">350 kilometers away</p>
                <p class="text-sm/relaxed mt-1">Dec 12-17</p>
                <p class="money_amoun text-sm/relaxed mt-1">$200 per night</p>
            </div>
        
            <!-- House Listing 3 -->
            <div class="house-card">
                <img src="https://images.pexels.com/photos/259588/pexels-photo-259588.jpeg" alt="image" class="w-full h-64 rounded-xl">
                <div class="flex justify-between items-center mt-2">
                    <p class="text-lg font-medium">Paris, France</p>
                    <div class="flex items-center">
                        <i class="fa-regular fa-star text-yellow-500"></i>
                        <p class="text-lg font-medium ml-1">4.9</p>
                    </div>
                </div>
                <p class="text-sm/relaxed mt-1">650 kilometers away</p>
                <p class="text-sm/relaxed mt-1">Dec 5-10</p>
                <p class="money_amoun text-sm/relaxed mt-1">$150 per night</p>
            </div>
        
            <!-- House Listing 4 -->
            <div class=" house-card">
                <img src="https://images.pexels.com/photos/221506/pexels-photo-221506.jpeg" alt="image" class="w-full h-64 rounded-xl">
                <div class="flex justify-between items-center mt-2">
                    <p class="text-lg font-medium">Los Angeles, USA</p>
                    <div class="flex items-center">
                        <i class="fa-regular fa-star text-yellow-500"></i>
                        <p class="text-lg font-medium ml-1">5.0</p>
                    </div>
                </div>
                <p class="text-sm/relaxed mt-1">400 kilometers away</p>
                <p class="text-sm/relaxed mt-1">Dec 22-27</p>
                <p class="money_amoun text-sm/relaxed mt-1">$250 per night</p>
            </div>
        
            <!-- House Listing 5 -->
            <div class="house-card ">
                <img src="https://images.pexels.com/photos/280229/pexels-photo-280229.jpeg" alt="image" class="w-full h-64 rounded-xl">
                <div class="flex justify-between items-center mt-2">
                    <p class="text-lg font-medium">Tokyo, Japan</p>
                    <div class="flex items-center">
                        <i class="fa-regular fa-star text-yellow-500"></i>
                        <p class="text-lg font-medium ml-1">4.7</p>
                    </div>
                </div>
                <p class="text-sm/relaxed mt-1">700 kilometers away</p>
                <p class="text-sm/relaxed mt-1">Dec 1-5</p>
                <p class="money_amoun text-sm/relaxed mt-1">$180 per night</p>
            </div>
        
          <!-- House Listing 1 -->
          <div class="house-card">
            <img src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">Western Cape, South Africa</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">5.0</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">5112 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 10-15</p>
            <p class="money_amoun text-sm/relaxed mt-1">$100 per night</p>
        </div>
    
        <!-- House Listing 2 -->
        <div class="house-card">
            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">New York, USA</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">4.8</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">350 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 12-17</p>
            <p class="money_amoun text-sm/relaxed mt-1">$200 per night</p>
        </div>
    
        <!-- House Listing 3 -->
        <div class="house-card">
            <img src="https://images.pexels.com/photos/259588/pexels-photo-259588.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">Paris, France</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">4.9</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">650 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 5-10</p>
            <p class="money_amoun text-sm/relaxed mt-1">$150 per night</p>
        </div>
    
        <!-- House Listing 4 -->
        <div class=" house-card">
            <img src="https://images.pexels.com/photos/221506/pexels-photo-221506.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">Los Angeles, USA</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">5.0</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">400 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 22-27</p>
            <p class="money_amoun text-sm/relaxed mt-1">$250 per night</p>
        </div>
    
        <!-- House Listing 5 -->
        <div class="house-card">
            <img src="https://images.pexels.com/photos/280229/pexels-photo-280229.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">Tokyo, Japan</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">4.7</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">700 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 1-5</p>
            <p class="money_amoun text-sm/relaxed mt-1">$180 per night</p>
        </div>
        
        <!-- House Listing 1 -->
        <div class="house-card">
            <img src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">Western Cape, South Africa</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">5.0</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">5112 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 10-15</p>
            <p class="money_amoun text-sm/relaxed mt-1">$100 per night</p>
        </div>
    
        <!-- House Listing 2 -->
        <div class="house-card">
            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">New York, USA</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">4.8</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">350 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 12-17</p>
            <p class="money_amoun text-sm/relaxed mt-1">$200 per night</p>
        </div>
    
        <!-- House Listing 3 -->
        <div class="house-card">
            <img src="https://images.pexels.com/photos/259588/pexels-photo-259588.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">Paris, France</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">4.9</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">650 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 5-10</p>
            <p class="money_amoun text-sm/relaxed mt-1">$150 per night</p>
        </div>
    
        <!-- House Listing 4 -->
        <div class="house-card">
            <img src="https://images.pexels.com/photos/221506/pexels-photo-221506.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">Los Angeles, USA</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">5.0</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">400 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 22-27</p>
            <p class="money_amoun text-sm/relaxed mt-1">$250 per night</p>
        </div>
    
        <!-- House Listing 5 -->
        <div class="flex flex-col h-96 house-card">
            <img src="https://images.pexels.com/photos/280229/pexels-photo-280229.jpeg" alt="image" class="w-full h-64 rounded-xl">
            <div class="flex justify-between items-center mt-2">
                <p class="text-lg font-medium">Tokyo, Japan</p>
                <div class="flex items-center">
                    <i class="fa-regular fa-star text-yellow-500"></i>
                    <p class="text-lg font-medium ml-1">4.7</p>
                </div>
            </div>
            <p class="text-sm/relaxed mt-1">700 kilometers away</p>
            <p class="text-sm/relaxed mt-1">Dec 1-5</p>
            <p class="money_amoun text-sm/relaxed mt-1">$180 per night</p>
        </div>
        
            <div class=" house-card">
                <img src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg" alt="image" class="w-full h-64 rounded-xl">
                <div class="flex justify-between items-center mt-2">
                    <p class="text-lg font-medium">London, UK</p>
                    <div class="flex items-center">
                        <i class="fa-regular fa-star text-yellow-500"></i>
                        <p class="text-lg font-medium ml-1">5.0</p>
                    </div>
                </div>
                <p class="text-sm/relaxed mt-1">1000 kilometers away</p>
                <p class="text-sm/relaxed mt-1">Dec 15-20</p>
                <p class="money_amoun text-sm/relaxed mt-1">$300 per night</p>
            </div>
        
            <!-- Repeat for 40 houses... -->
        </div>
        
    </main>
    {{-- Main End --}}  


 
    
    {{-- Footer --}}
    <footer class="footer">
    </footer>
    {{-- Footer End --}}
</body>
</html>
