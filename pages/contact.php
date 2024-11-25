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
                <h1 class="text-4xl font-bold mb-4 text-brand">
                VILLA SITU LENGKONG
                </h1>
                <h2 class="text-3xl mb-4 text-brand">
                HUBUNGI KAMI
                </h2>
                <p class="text-xl font-bold mb-2 text-gray-600">
                <a class="underline" href="https://wa.me/+6281312599216">
                0813-1259-9216
                </a>
            </div>
            <div class="md:w-1/2 mt-4 md:mt-0" data-aos="zoom-in">
            <img alt="Living room with sofas, a table, and guitars" class="rounded-lg shadow-lg" height="400" src="assets\gambar\villa-kayu-5.jpeg" width="700"/>
            </div>
        </div>
        <div class="flex justify-center space-x-6 mt-6" data-aos="fade-in">
            <a class="text-3xl text-gray-600" href="https://www.instagram.com/">
            <i class="fab fa-instagram">
            </i>
            </a>
            <a class="text-3xl text-gray-600" href="https://www.facebook.com/login/?next=https%3A%2F%2Fwww.facebook.com%2F%3Flocale%3Did_ID">
            <i class="fab fa-facebook">
            </i>
            </a>
            <a class="text-3xl text-gray-600" href="https://g.co/kgs/Nc4SkEE">
            <i class="fas fa-link">
            </i>
            </a>
            <a class="text-3xl text-gray-600" href="https://wa.me/+6281312599216">
            <i class="fab fa-whatsapp">
            </i>
            </a>
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