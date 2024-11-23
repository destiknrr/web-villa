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
                    <button onclick="openModal(<?php echo $villa['id']; ?>)" 
                            class="mt-2 px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800">
                        Lihat Detail
                    </button>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

  </main>

<!-- Modal -->
<div id="villaModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50">
    <div class="relative p-8 bg-white max-w-4xl mx-auto my-10 rounded-lg">
        <button onclick="closeModal()" class="absolute right-4 top-4 text-gray-600 hover:text-gray-800">
            <i class="fas fa-times text-2xl"></i>
        </button>
        
        <!-- Update the Swiper container in the modal -->
        <div class="swiper mySwiper mb-4">
                <div class="swiper-wrapper" id="modalImages">
                <!-- Images will be dynamically inserted here -->
                <?php foreach ($villa['foto_villa'] as $foto) { ?>
                    <div class="swiper-slide">
                        <img src="<?php echo base_url('uploads/villa/' . $foto); ?>" 
                            alt="<?php echo $villa['nama_villa']; ?>"
                            class="img-fluid">
                    </div>
                <?php } ?>
                </div>

            <div class="slider-nav-button prev swiper-button-prev">
                <i class="bi bi-arrow-left-circle"></i>
            </div>
            <div class="slider-nav-button next swiper-button-next">
                <i class="bi bi-arrow-right-circle"></i> 
            </div>
            <div class="swiper-pagination"></div>
        </div>
        
        <div id="modalContent">
            <!-- Villa details will be inserted here -->
        </div>

        <!-- Booking Form -->
        <div class="flex justify-end">
            <button onclick="window.location.href='contact.php'" 
                    class="mt-2 px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800">
                    Booking Villa
            </button>
        </div>
    </div>
</div>

<script>
const swiper = new Swiper(".mySwiper", {
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    keyboard: {
        enabled: true,
    },
    effect: "fade",
    fadeEffect: {
        crossFade: true
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    }
});

function openModal(villaId) {
    fetch(`get_villa_detail.php?id=${villaId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('modalImages').innerHTML = `
                <div class="swiper-slide">
                    <img src="${data.foto_utama}" class="w-full h-64 object-cover">
                </div>
            `;
            
            document.getElementById('modalContent').innerHTML = `
                <h2 class="text-2xl font-bold text-gray-800 mb-4">${data.nama_villa}</h2>
                <div class="grid grid-cols-2 gap-4 text-gray-600 mb-4">
                    <div>
                        <p><strong>Kapasitas:</strong> ${data.kapasitas_maksimal} Orang</p>
                    </div>
                    <div>
                        <p><strong>Harga per Malam:</strong></p>
                        <p class="text-xl font-bold text-gray-800">
                            Rp ${new Intl.NumberFormat('id-ID').format(data.harga_permalam)}
                        </p>
                    </div>
                </div>
                <div class="text-gray-600">
                    <h3 class="font-bold mb-2">Deskripsi:</h3>
                    <p>${data.deskripsi}</p>
                </div>
                <div class="mt-4">
                    <h3 class="font-bold mb-2 text-gray-600">Fasilitas:</h3>
                    <p class="text-gray-600">${data.fasilitas || 'Tidak ada fasilitas tercatat'}</p>
                </div>
            `;
            
            swiper.update();
            document.getElementById('villaModal').classList.remove('hidden');
        });
}

function closeModal() {
    document.getElementById('villaModal').classList.add('hidden');
}
</script>

<section class="relative text-center" data-aos="fade-zoom-in">
        <img  class="mx-auto" height="300" src="assets/gambar/info.jpeg" width="1600"/>
        <div class="absolute inset-0 flex flex-col justify-center items-center bg-black bg-opacity-50 text-white p-1 md:p-2">
            <h1 class="text-3xl md:text-5xl font-bold text-center">INFORMASI</h1>
            
            <div class="max-w-4xl w-full mt-4 md:mt-8">
                <p class="text-sm md:text-base text-left">
                    Harap menyesuaikan kapasitas dengan kapasitas maksimal masing-masing villa. Apabila lebih dari kapasitas maksimal villa yang sedang di sewa, maka penyewa akan dikenakan biaya tambahan 50.000/orang (termasuk extra bed).
                    <br class="my-2"/>
                    • Dilarang menggunakan obat-obatan terlarang dan melakukan tindakan yang tidak sesuai dengan hukum yang berlaku.
                    <br class="my-2"/>
                    • Kerusakan atau kehilangan barang-barang yang di timbulkan oleh tamu, akan dikenakan biaya ganti rugi.
                </p>
                <p class="text-left mt-2 md:mt-4 text-sm md:text-base">Terima kasih.</p>
            </div>
</div>
    </section>
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