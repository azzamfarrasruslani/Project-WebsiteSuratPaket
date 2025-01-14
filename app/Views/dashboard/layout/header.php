<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Shortcut Icon -->
    <link rel="icon" type="image/png" href="<?= BASE_URL; ?>assets/images/envelope icon.svg" />
    <!-- <title>Surat Paket | Dashboard</title> -->
    <title><?php echo 'Surat Paket | ' . ($title ? $title : 'Surat Paket'); ?></title>
    <!-- Fonts and icons  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Fontawesome Icon -->
    <script src="https://kit.fontawesome.com/c23fedd423.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="<?= BASE_URL; ?>assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= BASE_URL; ?>assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="<?= BASE_URL; ?>assets/css/argon-dashboard-tailwind.css" rel="stylesheet" />
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Table -->
    <link href="<?= BASE_URL; ?>assets/css/styleTable.css" rel="stylesheet" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.tailwind.min.css" rel="stylesheet">
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
</body>

<div class="absolute bg-y-50 w-full top-0  min-h-75">
    <span class="absolute top-0 left-0 w-full h-full bg-blue-500"></span>
</div>
<?php
$isActive = $data['isActive'];
?>
<!-- sidenav  -->
<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-30">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="" target="_blank">
            <img src="<?= BASE_URL; ?>assets/images/envelope icon.svg"
                class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                alt="main_logo" />
            <img src="<?= BASE_URL; ?>assets/images/envelope icon.svg"
                class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
                alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Surat Paket PCR</span>
        </a>
    </div>

    <hr
        class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 <?= $isActive('dashboard/dashboard') ?> <?= $isActive('dashboard/viewDatabyWaktuTerima') ?> <?= $isActive('dashboard/viewDatabyWaktuSerah') ?>"
                    href="<?= BASE_URL; ?>dashboard/dashboard">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Data</h6>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap  px-4  transition-colors dark:text-white dark:opacity-80 <?= $isActive('SerahTerima/dataBarang') ?>
                <?= $isActive('SerahTerima/detailData') ?> <?= $isActive('SerahTerima/viewEditBarang') ?> <?= $isActive('SerahTerima/viewUpdateStatus') ?>"
                    href="<?= BASE_URL; ?>SerahTerima/dataBarang">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-table" style="color: #fb6340;"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Paket</span>
                </a>
            </li>
            <!-- Tampiilkan jika role admin -->
            <?php if ($_SESSION['user_role'] !== 'user'): ?>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 
                    <?= $isActive('User/dataUser') ?>   <?= $isActive('User/viewInsertDataUser') ?> "
                        href="<?= BASE_URL; ?>User/dataUser">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fa-solid fa-users-rectangle" style="color: #63E6BE;"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data User</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Akun</h6>
            </li>

            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 <?= $isActive('User/profile') ?> <?= $isActive('User/viewGantiPassword') ?>"
                    href="<?= BASE_URL; ?>User/profile">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                </a>
            </li>
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 <?= $isActive('/auth/logout') ?>"
                    href="<?= BASE_URL; ?>/auth/logout" onclick="return confirm('Apakah anda yakin ingin keluar?')">

                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fa-solid fa-right-from-bracket" style="color: #f55540;"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>