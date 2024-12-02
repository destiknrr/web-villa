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

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Add in head section -->
    <style>
    .swiper {
        position: relative;
        height: 400px;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
    }

    .slider-nav-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .slider-nav-button:hover {
        background: rgba(255, 255, 255, 1);
    }

    .slider-nav-button.prev {
        left: 20px;
    }

    .slider-nav-button.next {
        right: 20px;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #333;
    }
    </style>
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
   <section class="relative">
    <img alt="Scenic view of the lake and trees" data-aos="fade-right" class="w-full h-96 object-cover" height="400" src="assets/gambar/main-poto.jpeg" width="1200"/>
   </section>
   <section class="text-center py-8 bg-white">
    <h1 class="text-3xl font-bold text-brand" data-aos="fade-zoom-up">
     VILLA SITU LENGKONG
    </h1>
    <p class="text-gray-600" data-aos="fade-zoom-up">
     Temukan villa yang cocok untuk kebutuhan staycation Anda!
    </p>
   </section>

   <section class="bg-gray-100 py-8">
    <div class="max-w-4xl mx-auto grid grid-cols-2 gap-2">
        <?php foreach($villas as $villa) { ?>
            <div class="bg-white p-4 rounded-lg shadow-md" data-aos="fade-zoom-up">
                <img alt="<?php echo $villa['nama_villa']; ?>" 
                     class="w-full h-48 rounded-lg object-cover" 
                     src="<?php echo $villa['foto_utama']; ?>" 
                     height="200" 
                     width="300"/>
                <div class="mt-4 text-center">
                    <h2 class="text-xl font-bold">
                        <?php echo $villa['nama_villa']; ?>
                    </h2>
                    <p class="text-gray-600">
                        Kapasitas Maksimal <?php echo $villa['kapasitas_maksimal']; ?> Orang
                    </p>
                    <p class="text-gray-600 mt-2">
                        Rp <?php echo number_format($villa['harga_permalam'], 0, ',', '.'); ?>/malam
                    </p>

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal-<?php echo $villa['id']; ?>" data-modal-toggle="crud-modal-<?php echo $villa['id']; ?>" class="mt-2 px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800" type="button">
                        Lihat Detail
                    </button>

                    <?php
                    $foto = ambilFotoBanyak($villa['id']);
                    ?>

                    <!-- Main modal -->
                    <div id="crud-modal-<?php echo $villa['id']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-medium text-white mb-1">
                                        <?php echo $villa['nama_villa']; ?>
                                    </h3>
                                    <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-<?php echo $villa['id']; ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">

                                <!-- carousel -->
                                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                    <!-- Carousel wrapper -->
                                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                                        <?php 
                                            $nomor = 0;
                                            foreach ($foto as $f) { 
                                        ?>
                                        <!-- Item 1 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src= "<?= $f['path_foto'];?>" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="foto villa">
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <!-- Slider indicators -->
                                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                        <?php
                                        for($i = 0; $i < count($foto); $i++) {
                                            $active = $i === 0 ? 'true' : 'false';
                                            echo '<button type="button" class="w-3 h-3 rounded-full bg-white/30 dark:bg-gray-800/30" aria-current="'.$active.'" aria-label="Slide '.($i+1).'" data-carousel-slide-to="'.$i.'"></button>';
                                        }
                                        ?>
                                    </div>
                                    
                                    <!-- Slider controls -->
                                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                            </svg>
                                            <span class="sr-only">Previous</span>
                                        </span>
                                    </button>
                                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                            </svg>
                                            <span class="sr-only">Next</span>
                                        </span>
                                    </button>
                                </div>
                                <!-- end carousel -->

                                    <p class="text-slate-50 mt-4 mb-2 font-extralight	">Kapasitas Maksimal: <?php echo $villa['kapasitas_maksimal']; ?> Orang</p>
                                    <p class="text-slate-50 mt-2 text-left font-extralight"><?php echo $villa['deskripsi']; ?></p>
                                    <p class="text-slate-50 mt-2 text-left font-extralight">Harga: Rp <?php echo number_format($villa['harga_permalam'], 0, ',', '.'); ?>/malam</p>
                                    <p class="text-slate-50 mt-2 text-left font-extralight"> Fasilitas: <?php echo $villa['fasilitas']; ?></p>
                                </div>
                                <button class="mt-2 mb-2 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-500" type="button">
                                    <a href="contact.php?id=<?= $villa['id']; ?>"> Booking </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end modals -->

                    <!-- Include Flowbite JS -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

                </div>
            </div>
        <?php } ?>
    </div>
</section>
</main>


<section class="relative text-center" data-aos="fade-zoom-in">
    <!-- Image -->
    <img 
        class="mx-auto w-full max-h-[300px] object-cover sm:max-h-[400px] md:max-h-[500px]" 
        src="assets/gambar/info.jpeg" 
        alt="Informasi"
    />

    <!-- Overlay -->
    <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white p-4 md:p-8">
        <!-- Title -->
        <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold">INFORMASI</h1>

        <!-- Content -->
        <div class="max-w-3xl w-full ">
            <p class="text-sm md:text-base lg:text-lg text-left leading-relaxed">
                Harap menyesuaikan kapasitas dengan kapasitas maksimal masing-masing villa. 
                <br class="my-2"/>
                • Dilarang menggunakan obat-obatan terlarang dan melakukan tindakan yang tidak sesuai dengan hukum yang berlaku.
                <br class="my-2"/>
                • Kerusakan atau kehilangan barang-barang yang ditimbulkan oleh tamu, akan dikenakan biaya ganti rugi.
            </p>
        </div>
    </div>
</section>


    <!-- Footer -->
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