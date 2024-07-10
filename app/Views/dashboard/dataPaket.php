<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- shortcut icon -->
  <link rel="icon" type="image/png" href="<?= BASE_URL; ?>assets/images/envelope icon.svg" />
  <title>Surat Paket | Dashboard</title>
  <!--     Fonts and icons     -->
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
  <!-- <link href="<?= BASE_URL; ?>assets/css/styles.css" rel="stylesheet" /> -->
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





<body
  class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
</body>

<div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
<!-- sidenav  -->
<aside
  class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
  aria-expanded="false">
  <div class="h-30">
    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
      sidenav-close></i>
    <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="" target="_blank">
      <!-- light mode -->
      <img src="<?= BASE_URL; ?>assets/images/envelope icon.svg"
        class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
        alt="main_logo" />
      <!-- dark mode -->
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
        <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80"
          href="<?= BASE_URL; ?>dashboard/dashboard">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
        </a>
      </li>

      <li class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Data</h6>
      </li>

      <!-- Data Paket -->
      <li class="mt-0.5 w-full">
        <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors "
          href="<?= BASE_URL; ?>SerahTerima/dataPaket">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="fa-solid fa-table" style="color:  #fb6340;"></i>
          </div>

          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Paket</span>
        </a>
      </li>

      <!-- Data User -->
      <li class="mt-0.5 w-full">
        <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
          href="<?= BASE_URL; ?>User/dataUser">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="fa-solid fa-users-rectangle" style="color: #63E6BE;"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data User</span>
        </a>
      </li>

      <!-- <li class="mt-0.5 w-full">
        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
          href="../pages/billing.html">
          <div
            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Billing</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
          href="../pages/virtual-reality.html">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Virtual Reality</span>
        </a>
      </li>

      <li class="mt-0.5 w-full">
        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
          href="../pages/rtl.html">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-red-600 ni ni-world-2"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">RTL</span>
        </a>
      </li> -->

      <li class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Akun</h6>
      </li>

      <li class="mt-0.5 w-full">
        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
          href="<?= BASE_URL; ?>dashboard/profile">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
        </a>
      </li>
      <li class="mt-0.5 w-full">
        <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
          href="<?= BASE_URL; ?>/auth/logout">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="fa-solid fa-right-from-bracket" style="color: #f55540;"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sign Out</span>
        </a>
      </li>

    </ul>
  </div>
</aside>





<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">

  <!-- Navbar -->
  <nav
    class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <nav>
        <!-- breadcrumb -->
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
          <li class="text-sm leading-normal">
            <a class="text-white opacity-50" href="javascript:;">Data</a>
          </li>
          <li
            class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
            aria-current="page">Data Paket</li>
        </ol>
        <h6 class="mb-0 font-bold text-white capitalize">Data Paket</h6>
      </nav>

      <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
        <div class="flex items-center md:ml-auto md:pr-4">
          <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
            <span
              class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
              <i class="fas fa-search"></i>
            </span>
            <input type="text"
              class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
              placeholder="Type here..." />
          </div>
        </div>
        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
          <!-- online builder btn  -->
          <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
          <li class="flex items-center pl-4 xl:hidden">
            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
              <div class="w-4.5 overflow-hidden">
                <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
              </div>
            </a>
          </li>
          <li class="flex items-center px-4">
            <a href="javascript:;" class="p-0 text-sm text-white transition-all ease-nav-brand">
              <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
              <!-- fixed-plugin-button-nav  -->
            </a>
          </li>

          <!-- notifications -->

          <li class="relative flex items-center pr-2">
            <p class="hidden transform-dropdown-show"></p>
            <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" dropdown-trigger
              aria-expanded="false">
              <i class="cursor-pointer fa fa-bell"></i>
            </a>

            <ul dropdown-menu
              class="text-sm transform-dropdown before:font-awesome before:leading-default dark:shadow-dark-xl before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:sm:right-8 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent dark:bg-slate-850 bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
              <!-- add show class on dropdown open js -->
              <li class="relative mb-2">
                <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                  href="javascript:;">
                  <div class="flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/team-2.jpg"
                        class="inline-flex items-center justify-center mr-4 text-sm text-white h-9 w-9 max-w-none rounded-xl" />
                    </div>
                    <div class="flex flex-col justify-center">
                      <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span
                          class="font-semibold">New message</span> from Laur</h6>
                      <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                        <i class="mr-1 fa fa-clock"></i>
                        13 minutes ago
                      </p>
                    </div>
                  </div>
                </a>
              </li>

              <li class="relative mb-2">
                <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                  href="javascript:;">
                  <div class="flex py-1">
                    <div class="my-auto">
                      <img src="../assets/img/small-logos/logo-spotify.svg"
                        class="inline-flex items-center justify-center mr-4 text-sm text-white bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 h-9 w-9 max-w-none rounded-xl" />
                    </div>
                    <div class="flex flex-col justify-center">
                      <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span
                          class="font-semibold">New album</span> by Travis Scott</h6>
                      <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                        <i class="mr-1 fa fa-clock"></i>
                        1 day
                      </p>
                    </div>
                  </div>
                </a>
              </li>

              <li class="relative">
                <a class="dark:hover:bg-slate-900 ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                  href="javascript:;">
                  <div class="flex py-1">
                    <div
                      class="inline-flex items-center justify-center my-auto mr-4 text-sm text-white transition-all duration-200 ease-nav-brand bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>credit-card</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(453.000000, 454.000000)">
                                <path class="color-background"
                                  d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                  opacity="0.593633743"></path>
                                <path class="color-background"
                                  d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                </path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div class="flex flex-col justify-center">
                      <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white">Payment successfully
                        completed</h6>
                      <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                        <i class="mr-1 fa fa-clock"></i>
                        2 days
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <?php include ('CrudBarang/inputDataBarang.php'); ?>

  <div id="table" class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
    <!-- Card -->
    <div class=" w-full px-2 py-6 mx-auto">
      <div class="flex-none w-full max-w-full px-4">
        <div
          class="relative flex flex-col min-w-0 mb-6 pb-5 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
          <div
            class="p-6 pb-3 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
            <h2 class="text-xl font-bold mb-4">Data Paket Masuk</h2>
            <button onclick="toggleModal()"
              class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
              <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah Data
            </button>
          </div>
          <div class="px-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <?php if (!empty($serah_terima)): ?>
              <table id="example" class="stripe hover mb-12" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
                <thead>
                  <tr>
                    <th class="text-sm " data-priority="1">No Resi</th>
                    <th class="text-sm" data-priority="2">Jenis Barang</th>
                    <th class="text-sm" data-priority="3">Nama Pemilik</th>
                    <th class="text-sm" data-priority="4">NO HP</th>
                    <th class="text-sm" data-priority="5">Posisi</th>
                    <th class="text-sm" data-priority="6">Status</th>
                    <th class="text-sm" data-priority="7">Waktu Terima</th>
                    <th class="text-sm" data-priority="8">Waktu Serah</th>
                    <th class="text-sm" data-priority="9">Nama Security</th>
                    <th class="text-sm" data-priority="10">Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($serah_terima as $index => $item): ?>
                    <tr>
                      <td class="text-sm"><?= $item['no_resi'] ?></td>

                      <td class="text-sm"><?= $item['jenis_barang'] ?></td>

                      <td class="capitalize text-sm"><?= $item['nama_pemilik'] ?></td>
                      <td><?= $item['noHp_pemilik'] ?></td>

                      <td class="capitalize text-sm">
                        <?= !empty($item['posisi']) ? $item['posisi'] : 'data tidak tersedia' ?>
                      </td>

                      <td class="text-sm"><?= $item['status_barang'] ?></td>

                      <td class="text-sm"><?= $item['waktu_penerimaan'] ?></td>

                      <td class="text-sm">
                        <?= !empty($item['waktu_penyerahan']) ? $item['waktu_penyerahan'] : '-' ?>
                      </td>

                      <td class="text-sm"><?= $item['nama_security'] ?></td>
                      <td>

                        <div class="relative inline-block text-left">
                          <div>
                            <button onclick="toggleDropdown(<?= $index ?>)" type="button"
                              class="bg-blue-500 inline-flex justify-center w-full rounded-3 border shadow-sm px-4 py-2 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                              id="menu-button-<?= $index ?>" aria-expanded="true" aria-haspopup="true">
                              <svg class="fill-current text-white w-5 h-5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path
                                  d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                              </svg>
                            </button>
                          </div>
                          <div id="dropdown-menu-<?= $index ?>"
                            class="hidden mt-2 rounded-3 shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button-<?= $index ?>"
                            tabindex="-1">
                            <div class="py-1" role="none">

                              <a href="<?= BASE_URL; ?>serahTerima/getFotoBarang ?id=<?= $item['id_serah_terima'] ?>"
                                class=" text-gray-700 block px-8 py-4 text-sm " role="menuitem" tabindex="-1"
                                id="menu-item-<?= $index ?>-0"><i class="fa-solid fa-image fa-xl"
                                  style="color: #63E6BE;"></i>
                              </a>

                              <a href="?id=<?= $item['id_serah_terima'] ?>"
                                class=" text-gray-700 block px-8 py-4 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-<?= $index ?>-0"><i class="fa-solid fa-pen-to-square fa-xl"
                                  style="color: #0091ff;"></i></a>

                              <a href="delete.php?id=<?= $item['id_serah_terima'] ?>"
                                class=" text-gray-700 block px-8 py-4 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-<?= $index ?>-0"
                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                  class="fa-solid fa-trash fa-xl" style="color: #ff004c;"></i></a>

                              <a href="delete.php?id=<?= $item['id_serah_terima'] ?>"
                                class=" text-gray-700 block px-8 py-4 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-<?= $index ?>-0"
                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                  class="fa-solid fa-magnifying-glass-plus fa-xl" style="color: #FFD43B;"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </td>
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
                    <th class="text-sm" data-priority="8">Waktu Serah</th>
                    <th class="text-sm" data-priority="9">Nama Security</th>
                    <th class="text-sm" data-priority="10">Options</th>
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




    <script>
      function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden');
        document.getElementById('table').classList.toggle('hidden');
      }

      function toggleDropdown(index) {
        var dropdown = document.getElementById("dropdown-menu-" + index);
        dropdown.classList.toggle("hidden");
      }

      window.onclick = function (event) {
        if (!event.target.matches('[id^="menu-button-"]')) {
          var dropdowns = document.getElementsByClassName("dropdown-menu");
          for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (!openDropdown.classList.contains('hidden')) {
              openDropdown.classList.add('hidden');
            }
          }
        }
      }
    </script>









    <!-- Footer Start -->
    <footer class="pt-4">
      <div class="w-full px-6 mx-auto">
        <div class=" flex-wrap items-center -mx-3 lg:justify-between">
          <div class="w-full max-w-full px-3 mt-0 mb-6 ">
            <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
              ©
              <script>
                document.write(new Date().getFullYear() + ",");
              </script>
              made with by
              <a href="https://pcr.ac.id/" class="font-semibold text-slate-700 dark:text-white"
                target="_blank">Politeknik
                Caltex Riau</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- Footer End -->

</main>









<div fixed-plugin>
  <a fixed-plugin-button
    class="fixed px-4 py-2 text-xl bg-white shadow-lg cursor-pointer bottom-8 right-8 z-990 rounded-circle text-slate-700">
    <i class="py-2 pointer-events-none fa fa-cog"> </i>
  </a>
  <!-- -right-90 in loc de 0-->
  <div fixed-plugin-card
    class="z-sticky backdrop-blur-2xl backdrop-saturate-200 dark:bg-slate-850/80 shadow-3xl w-90 ease -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white/80 bg-clip-border px-2.5 duration-200">
    <div class="px-6 pt-4 pb-0 mb-0 border-b-0 rounded-t-2xl">
      <div class="float-left">
        <h5 class="mt-4 mb-0 dark:text-white">Pengaturan</h5>
        <p class="dark:text-white dark:opacity-80">See our dashboard options.</p>
      </div>
      <div class="float-right mt-6">
        <button fixed-plugin-close-button
          class="inline-block p-0 mb-4 text-sm font-bold leading-normal text-center uppercase align-middle transition-all ease-in bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:-translate-y-px tracking-tight-rem bg-150 bg-x-25 active:opacity-85 dark:text-white text-slate-700">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr
      class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
    <div class="flex-auto p-6 pt-0 overflow-auto sm:pt-4">
      <!-- Sidebar Backgrounds -->
      <div>
        <h6 class="mb-0 dark:text-white">Sidebar Colors</h6>
      </div>
      <a href="javascript:void(0)">
        <div class="my-2 text-left" sidenav-colors>
          <span
            class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-500 to-violet-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
            active-color data-color="blue" onclick="sidebarColor(this)"></span>
          <span
            class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
            data-color="gray" onclick="sidebarColor(this)"></span>
          <span
            class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-blue-700 to-cyan-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
            data-color="cyan" onclick="sidebarColor(this)"></span>
          <span
            class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-emerald-500 to-teal-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
            data-color="emerald" onclick="sidebarColor(this)"></span>
          <span
            class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-orange-500 to-yellow-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
            data-color="orange" onclick="sidebarColor(this)"></span>
          <span
            class="py-2.2 text-xs rounded-circle h-5.6 mr-1.25 w-5.6 ease-in-out bg-gradient-to-tl from-red-600 to-orange-600 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700"
            data-color="red" onclick="sidebarColor(this)"></span>
        </div>
      </a>
      <!-- Sidenav Type -->
      <div class="mt-4">
        <h6 class="mb-0 dark:text-white">Sidenav Type</h6>
        <p class="text-sm leading-normal dark:text-white dark:opacity-80">Choose between 2 different sidenav
          types.
        </p>
      </div>
      <div class="flex">
        <button transparent-style-btn
          class="inline-block w-full px-4 py-2.5 mb-2 font-bold leading-normal text-center text-white capitalize align-middle transition-all bg-blue-500 border border-transparent border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-blue-500 to-violet-500 hover:border-blue-500"
          data-class="bg-transparent" active-style>White</button>
        <button white-style-btn
          class="inline-block w-full px-4 py-2.5 mb-2 ml-2 font-bold leading-normal text-center text-blue-500 capitalize align-middle transition-all bg-transparent border border-blue-500 border-solid rounded-lg cursor-pointer text-sm xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 hover:-translate-y-px dark:cursor-not-allowed dark:opacity-65 dark:pointer-events-none dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white dark:border-0 hover:shadow-xs active:opacity-85 ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-none hover:border-blue-500"
          data-class="bg-white">Dark</button>
      </div>
      <p class="block mt-2 text-sm leading-normal dark:text-white dark:opacity-80 xl:hidden">You can change the
        sidenav type just on desktop view.</p>
      <!-- Navbar Fixed -->
      <div class="flex my-4">
        <h6 class="mb-0 dark:text-white">Navbar Fixed</h6>
        <div class="block pl-0 ml-auto min-h-6">
          <input navbarFixed
            class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
            type="checkbox" />
        </div>
      </div>
      <hr
        class="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
      <div class="flex mt-2 mb-12">
        <h6 class="mb-0 dark:text-white">Light / Dark</h6>
        <div class="block pl-0 ml-auto min-h-6">
          <input dark-toggle
            class="rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
            type="checkbox" />
        </div>
      </div>
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

<script>
  function toggleDropdown(index) {
    var dropdown = document.getElementById("dropdown-menu-" + index);
    dropdown.classList.toggle("hidden");
  }

  window.onclick = function (event) {
    if (!event.target.matches('[id^="menu-button-"]')) {
      var dropdowns = document.getElementsByClassName("origin-top-right");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (!openDropdown.classList.contains('hidden')) {
          openDropdown.classList.add('hidden');
        }
      }
    }
  }
</script>


<!-- <script>
  document.querySelectorAll('.toggle-details').forEach(button => {
    button.addEventListener('click', function () {
      const rowId = this.getAttribute('data-row');
      const detailsRow = document.querySelector(`.details-row[data-row='${rowId}']`);
      detailsRow.classList.toggle('hidden');
    });
  });
</script> -->


<!-- <script>
  document.getElementById('search').addEventListener('keyup', function () {
    var input = this.value.toLowerCase();
    var rows = document.querySelectorAll('#example tbody tr');

    rows.forEach(function (row) {
      var cells = row.querySelectorAll('td');
      var match = false;

      cells.forEach(function (cell) {
        if (cell.innerText.toLowerCase().includes(input)) {
          match = true;
        }
      });

      row.style.display = match ? '' : 'none';
    });
  });

</script> -->


</html>