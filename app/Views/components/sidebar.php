<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == '') ? '' : 'collapsed' ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'keranjang') ? '' : 'collapsed' ?>" href="keranjang">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li>

        <?php if (session()->get('role') == 'admin'): ?>
        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'produk') ? '' : 'collapsed' ?>" href="produk">
                <i class="bi bi-receipt"></i>
                <span>Produk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'admin/diskon') ? '' : 'collapsed' ?>" href="<?= base_url('admin/diskon') ?>">
                <i class="bi bi-percent"></i>
                <span>Diskon</span>
            </a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'profile') ? '' : 'collapsed' ?>" href="profile">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'productcategory') ? '' : 'collapsed' ?>" href="productcategory">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Kategori Produk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'faq') ? '' : 'collapsed' ?>" href="faq">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'contact') ? '' : 'collapsed' ?>" href="contact">
                <i class="bi bi-telephone"></i>
                <span>Contact</span>
            </a>
        </li>

    </ul>
</aside>
<!-- End Sidebar -->
