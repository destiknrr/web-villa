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

  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

 </head>

 <body class="bg-white text-slate-50">
  <header class="py-4 brand-color-nav" >
   <div class="container mx-auto flex justify-between items-center">
    <div class="flex items-center mx-10">
     <img alt="Logo" class="h-12 w-auto" height="48" src="assets/gambar/logo.png"/>
     <!-- <span class="ml-2 text-4xl font-bold">
      Villa Situ Lengkong
     </span> -->
    </div>
    
   <?php
    include 'navbar.php';
   ?> 

   </div>
  </header>
  <main class="container mx-auto py-12">
   <section class="flex flex-col md:flex-row items-center mb-12">
    <div class="md:w-1/2 mb-8 md:mb-0" data-aos="fade-right">
     <h1 class="text-4xl font-bold mb-4 mx-10 text-brand">
        SELAMAT DATANG!
    <?php
    //    var_dump($villas); 
        // echo "<br>" . "<image src='{$villas[1]['foto_utama']}'>" . $villas[1]['foto_utama'] ;  
      ?>
     </h1>
     <h2 class="text-2xl font-family text-brand mb-4 mx-10">
      Villa Situ Lengkong
     </h2>
     <p class="text-gray-600 mx-10">
      Menemukan informasi villa di Situ Lengkong Panjalu untuk staycation lebih mudah dengan website kami.
     </p>
    </div>
    <div class="md:w-1/2" data-aos="fade-up">
     <img class="w-full h-auto rounded-lg shadow-lg" height="400" src="assets/gambar/main-poto.jpeg" width="600"/>
    </div>
   </section>



   <section id="detail">
        <div class="bungkus text-center py-10">
            <h2 class="text-3xl font-bold mb-8 text-brand mt-brand-1" data-aos="zoom-in-up">
                Yuk Lihat Detail Villa!
            </h2>
            <div class="flex flex-col md:flex-row justify-center items-center space-y-8 md:space-y-0 md:space-x-8 mb-8">
                <?php
                foreach($villas as $villa) {
                ?>
                <div class="w-full md:w-1/3" data-aos="zoom-in-up">
                    <img class="w-full h-auto rounded-lg shadow-lg mb-4" 
                        height="300" 
                        src="<?php echo $villa['foto_utama']; ?>" 
                        width="400"/>
                    <h3 class="text-xl font-bold text-brand">
                        <?php echo $villa['nama_villa']; ?>
                    </h3>
                </div>
                <?php
                }
                ?>
            </div>
            <a href="villakami.php" class="brand-color-nav py-2 px-6 rounded-full hover:bg-stone-500 text-brand inline-block" data-aos="fade-up">
                Lihat Selengkapnya
            </a>
        </div>
    </section>

   <section class="py-12" data-aos="fade-up">
    <h2 class="text-3xl font-bold text-center mb-8 text-gray">
     Proses Penyewaan Villa
    </h2>
    <div class="flex flex-col md:flex-row justify-center items-start space-y-8 md:space-y-0 md:space-x-8">
     <div class="w-full md:w-1/3 text-center">
      <h3 class="text-2xl font-bold mb-4 text-gray">
       1
      </h3>
      <h4 class="text-xl text-gray font-bold mb-2">
       Pemilihan Villa dan Tanggal
      </h4>
      <p class="text-gray">
       Tim kami akan membantu Anda menyesuaikan villa dan tanggal yang tersedia. Sesuaikan dengan tim kami mengenai kebutuhan dan tujuan Anda menginap di villa kami.
      </p>
     </div>
     <div class="w-full md:w-1/3 text-center">
      <h3 class="text-2xl font-bold mb-4 text-gray">
       2
      </h3>
      <h4 class="text-xl font-bold mb-2 text-gray">
       Proses DP
      </h4>
      <p class="text-gray">
       Saat Anda telah menemukan villa dengan tanggal yang pas, maka tahap selanjutnya adalah pembayaran DP minimal sebesar 50% dari harga sewa villa.
      </p>
     </div>
     <div class="w-full md:w-1/3 text-center">
      <h3 class="text-2xl font-bold mb-4 text-gray">
       3
       <h4 class="text-xl font-bold mb-2 text-gray">
        Pelunasan
       </h4>
       <p class="text-gray">
        Anda diharapkan untuk melunasi pembayaran sewa villa maksimal tiga hari sebelum tanggal menginap Anda. Agar pada saat check-in, Anda tidak perlu memikirkan mengenai pembayaran lagi.
       </p>
      </h3>
     </div>
    </div>
   </section>
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
