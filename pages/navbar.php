<nav class="relative">
    <!-- Mobile menu button -->
    <div class="lg:hidden">
        <button class="mobile-menu-button p-2 text-slate-50 hover:text-stone-900">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Regular menu -->
    <div class="hidden lg:flex lg:space-x-4">
        <a class="hover:text-stone-900 <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'text-stone-900' : 'text-slate-50'; ?>" href="index.php">
            Beranda
        </a>
        <a class="hover:text-stone-900 <?php echo (basename($_SERVER['PHP_SELF']) == 'villakami.php') ? 'text-stone-900' : 'text-slate-50'; ?>" href="villakami.php">
            Villa Kami
        </a>
        <a class="hover:text-stone-900 <?php echo (basename($_SERVER['PHP_SELF']) == 'booking.php.php') ? 'text-stone-900' : 'text-slate-50'; ?>" href="booking.php.php">
            Booking
        </a>
        <a class="hover:text-stone-900 <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'text-stone-900' : 'text-slate-50'; ?>" href="about.php">
            Tentang Kami  
        </a>
        <a class="hover:text-stone-900 <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'text-stone-900' : 'text-slate-50'; ?>" href="contact.php">
            Hubungi Kami
        </a>
    </div>

    <!-- Mobile menu -->
    <div class="mobile-menu hidden absolute top-12 right-4 w-48 bg-white shadow-lg rounded-lg py-2 z-50">
        <a class="block px-4 py-2 hover:bg-gray-100 <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'text-stone-900' : 'text-gray-800'; ?>" href="index.php">
            Beranda
        </a>
        <a class="block px-4 py-2 hover:bg-gray-100 <?php echo (basename($_SERVER['PHP_SELF']) == 'villakami.php') ? 'text-stone-900' : 'text-gray-800'; ?>" href="villakami.php">
            Villa Kami
        </a>
        <a class="block px-4 py-2 hover:bg-gray-100 <?php echo (basename($_SERVER['PHP_SELF']) == 'booking.php.php') ? 'text-stone-900' : 'text-gray-800'; ?>" href="booking.php.php">
            Cek Tanggal
        </a>
        <a class="block px-4 py-2 hover:bg-gray-100 <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'text-stone-900' : 'text-gray-800'; ?>" href="about.php">
            Tentang Kami  
        </a>
        <a class="block px-4 py-2 hover:bg-gray-100 <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'text-stone-900' : 'text-gray-800'; ?>" href="contact.php">
            Hubungi Kami
        </a>
    </div>
</nav>

<script>
    // Mobile menu toggle
    const btn = document.querySelector('.mobile-menu-button');
    const menu = document.querySelector('.mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
