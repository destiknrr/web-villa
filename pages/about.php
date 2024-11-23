<?php
    require '../backend/function.php';
    $villas = ambilSemuaVilla();
?>

<html lang="en">
    <head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <title>
        Villa Situ Lengkong
    </title>

    <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <link href="assets/css/style.css" rel="stylesheet"/>
  <!-- Add in head section -->
  <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- AOS  -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    </head>
    <body>
        <header class="py-4 brand-color-nav" >
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center mx-10">
            <img alt="Logo" class="h-12 w-auto" height="48" src="assets/gambar/logo.png"/>
            </div>
            
        <?php
            include 'navbar.php';
        ?> 
        </div>
        </header>

    <main>
        <body class="bg-gray-100">
        <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="flex flex-col items-center md:flex-row md:items-start md:justify-between w-full max-w-5xl p-4">
            <div class="flex flex-col items-center md:items-start md:w-1/2" data-aos="fade-up">
            <h1 class="text-4xl font-bold mb-4 my-8 text-brand">
            VILLA SITU LENGKONG
            </h1>
            <h2 class="text-xl mb-4 text-brand">
            Kami menyediakan beberapa Private Villa yang dapat Anda sewa harian. Lengkap dengan informasi foto, harga, lokasi dan juga fasilitas yang tersedia. Anda juga dapat menghubungi admin untuk reservasi online melalui website kami “Villa Situ Lengkong”.             
            </h2>
            </div>
            <div class="md:w-1/2 mt-4 md:mt-0" data-aos="zoom-in">
            <img alt="Living room with sofas, a table, and guitars" class="rounded-lg shadow-lg my-8" height="400" src="assets\gambar\villa-bata-2.jpeg" width="700"/>
            </div>
        </div>
        <div class="text-3xl text-brand font-bold text-center mt-10 mb-4" data-aos="fade-up">
            <h>
                LOKASI 
            </h>
        </div>       
        <div class="w-full flex justify-center">
            <div class="w-full max-w-4xl px-4 py-8 bg-white shadow-md rounded-lg mb-10" data-aos="fade-in">
                <div class="relative w-full h-0 pb-[56.25%]" >
                    <iframe 
                        class="absolute top-0 left-0 w-full h-full"
                        loading="lazy" 
                        allowfullscreen 
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q=Situ%20Lengkong%20Panjalu&zoom=10&maptype=roadmap">
                    </iframe>
                </div>
            </div>
        </div>       
        </div>
        </body>
    </main>
    <div>
    <?php 
    include 'footer.php';
    ?>
  </div>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

    </body>
</html>