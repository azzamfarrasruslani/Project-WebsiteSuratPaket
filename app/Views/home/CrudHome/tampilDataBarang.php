<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Paket | Politeknik Caltex Riau</title>
    <!-- Shortcut Icon -->
    <link rel="icon" type="image/png" href="<?= BASE_URL; ?>assets/images/envelope icon.svg" />
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300&family=Baloo+Thambi+2&family=Barlow+Semi+Condensed:ital,wght@1,100&family=Montserrat:wght@200;300;500;700&family=Poppins:wght@100;200;300;500;700&family=Roboto:wght@300&display=swap"
        rel="stylesheet" />
    <!-- Style -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/home.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Fontawesome Icon -->
    <script src="https://kit.fontawesome.com/c23fedd423.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Table -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.tailwind.min.css" rel="stylesheet">
    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: 0.5rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
           
        }
        .dataTables_wrapper .dataTables_paginate {
            padding-bottom: 4rem;
        }
        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
            
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

        .hidden-col {
            display: none;
        }

        @media (min-width: 768px) {
            .hidden-col {
                display: table-cell;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar">
        <a href="#"><img class="logo" src="<?= BASE_URL; ?>assets/images/logo-web.png"></a>
        <div class="navbar-login">
            <a href="<?= BASE_URL; ?>Home/home">Home <i class="fa-solid fa-house" style="color: #5e72e4;"></i></a>
        </div>
        <a href="#menu" id="hamburger-menu">
            <button class="menu"
                onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))"
                aria-label="Main Menu">
                <svg width="100" height="100" viewBox="0 0 100 100">
                    <path class="line line1"
                        d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line line2" d="M 20,50 H 80" />
                    <path class="line line3"
                        d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                </svg>
            </button>
        </a>
    </nav>
    <!-- Navbar End -->



    <div id="table" class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
        <!-- Card -->
        <div class="w-full px-2 py-6 mx-auto">
            <div class="flex-none w-full max-w-full px-4">
               
                    <div
                        class="p-6 pb-3 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                        <h2 class="text-xl font-bold mb-4">Data Paket</h2>
                      
                    </div>
                    <div class="px-8 mt-6 lg:mt-0 rounded shadow bg-white">
                        <?php if (!empty($tampilDataBarang)): ?>
                            <table id="example" class="stripe hover mb-12"
                                style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                                <thead>
                                    <tr>
                                        <th class="text-sm " data-priority="1">No Resi</th>
                                        <th class="text-sm" data-priority="2">Jenis Barang</th>
                                        <th class="text-sm" data-priority="3">Nama Pemilik</th>
                                        <th class="text-sm" data-priority="4">NO HP</th>
                                        <th class="text-sm" data-priority="5">Posisi</th>
                                        <th class="text-sm" data-priority="6">Status</th>
                                        <th class="text-sm" data-priority="7">Waktu Terima</th>
                                        <th class="text-sm" data-priority="8">Nama Security</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tampilDataBarang as $index => $item): ?>
                                        <tr>
                                            <td class="text-sm"><?= $item['no_resi'] ?></td>

                                            <td class="text-sm"><?= $item['jenis_barang'] ?></td>

                                            <td class="capitalize text-sm"><?= $item['nama_pemilik'] ?></td>
                                            <td><?= $item['noHp_pemilik'] ?></td>

                                            <td class="capitalize text-sm">
                                                <?= !empty($item['posisi']) ? $item['posisi'] : 'data tidak tersedia' ?>
                                            </td>
                                            <td class="text-xs px-4">
                                                <?php if ($item['status_barang'] == 'Belum Diambil'): ?>
                                                    <span
                                                        class="bg-red-500 text-white px-2 py-2 rounded whitespace-nowrap">
                                                        Belum Diambil
                                                    </span>
                                                <?php else: ?>
                                                    <span
                                                        class="bg-green-500 text-white px-2 py-2 rounded whitespace-nowrap">
                                                        Sudah Diambil
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-sm whitespace-nowrap">
                                                <!-- <?= $item['waktu_penerimaan'] ?> -->
                                                <?= date("d-m-Y,H:i:s", strtotime($item["waktu_penerimaan"])) ?>
                                            </td>

                                            <!-- <td class="text-sm">
                        <?= !empty($item['waktu_penyerahan']) ? $item['waktu_penyerahan'] : '-' ?>
                        
                      </td> -->
                                            <td class="text-sm"><?= $item['nama_security'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-sm " data-priority="1">No Resi</th>
                                        <th class="text-sm" data-priority="2">Jenis Barang</th>
                                        <th class="text-sm" data-priority="3">Nama Pemilik</th>
                                        <th class="text-sm" data-priority="4">NO HP</th>
                                        <th class="text-sm" data-priority="5">Posisi</th>
                                        <th class="text-sm" data-priority="6">Status</th>
                                        <th class="text-sm" data-priority="7">Waktu Terima</th>
                                        <th class="text-sm" data-priority="8">Nama Security</th>
                                    </tr>
                                </tfoot>
                            </table>
                        <?php else: ?>
                            <p>Data tidak tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

</body>
<!-- plugin for scrollbar  -->
<script src="<?= BASE_URL; ?>assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="<?= BASE_URL; ?>assets/js/dashboard-tailwind.js?v=1.0.1" async></script>
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Tampilkan pesan jika ada
Notifikasi::tampilPesan();
?>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function () {

        var table = $('#example').DataTable({
            // responsive: true,
            scrollX: true
        })
            .columns.adjust()
            .responsive.recalc();
    });
</script>

</html>