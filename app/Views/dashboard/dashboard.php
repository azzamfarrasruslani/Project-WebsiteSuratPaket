<!-- cards -->
<div class="w-full px-6 py-6 mx-auto">
  <!-- row 1 -->
  <div class="flex flex-wrap -mx-3">
    <!-- Paket Masuk Hari Ini -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div
        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal dark:text-white dark:opacity-60">Paket
                  Masuk</p>
                <h5 class="mb-2 font-bold dark:text-white"><?= $jmlBarangMasuk; ?></h5>
                <div class="flex justify-between items-center">
                  <p class="mb-0 dark:text-white dark:opacity-60">hari ini</p>
                </div>
              </div>
              <div class="mt-2">
                <a href="viewDatabyWaktuTerima"
                  class="text-sm py-2 px-2  bg-gradient-to-tl from-blue-500 to-violet-500 text-white  font-bold dark:text-white rounded-1">More
                  <i class="fa-solid fa-arrow-right fa-xl"></i></a>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div
                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                <i class="leading-none fa-solid fa-inbox text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Paket Diambil Hari Ini -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div
        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                  Paket Diambil</p>
                <h5 class="mb-2 font-bold dark:text-white"><?= $jmlBarangKeluar ?></h5>
                <div class="flex justify-between items-center">
                  <p class="mb-0 dark:text-white dark:opacity-60">
                    hari ini
                  </p>
                </div>
              </div>
              <div class="mt-2">
                <a href="viewDatabyWaktuSerah"
                  class="text-sm py-2 px-2 bg-gradient-to-tl from-red-600 to-orange-600 text-white  font-bold dark:text-white rounded-1">More
                  <i class="fa-solid fa-arrow-right fa-xl"></i></a>
              </div>
            </div>

            <div class="px-3 text-right basis-1/3">
              <div
                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                <i class="leading-none fa-solid fa-door-open text-lg relative top-3.5 text-white"
                  style="color: #ffffff;"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div
        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                  Belum Diambil</p>
                <h5 class="mb-2 font-bold dark:text-white"><?= $jmlBarangBelumDiambil ?></h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div
                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                <i class="leading-none fa-solid fa-building text-lg relative top-3.5 text-white"
                  style="color: #ffffff;"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card4 -->
    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
      <div
        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                  Sudah Diambil</p>
                <h5 class="mb-2 font-bold dark:text-white"><?= $jmlBarangSudahDiambil ?></h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div
                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                <i class="leading-none fa-solid fa-box-open text-lg relative top-3.5 text-white"
                  style="color: #ffffff;"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Riwayat aktifitas paket -->
  <div class="flex flex-wrap mt-6 -mx-30">
    <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
      <div
        class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
          <h6 class="capitalize dark:text-white">Riwayat Aktivitas Paket</h6>
          <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60"></p>
        </div>
        <div class="flex-auto p-4">
          <?php foreach (array_slice($dataRiwayat, 0, 6) as $index => $item): ?>
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              <?php if ($item['activity'] == 'User logged out'): ?>
                <li
                  class="relative flex flex-wrap lg:flex-nowrap whitespace-nowrap justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                  <div class="flex items-center w-full sm:w-auto">
                    <button
                      class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75">
                      <i class="fa-solid fa-right-from-bracket" style="color: #f55540;"></i>
                    </button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Logout</h6>
                      <span
                        class="text-xs leading-tight dark:text-white/80"><?= date('d F Y, \a\t h:i A', strtotime($item['activity_time'])) ?></span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center sm:mt-0 mt-2">
                    <p
                      class="relative z-10 inline-block m-0 text-xs font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 bg-clip-text sm:mt-0 mt-2">
                      <?= $_SESSION['nama_security'] ?> Melakukan logout
                    </p>
                  </div>
                </li>
              <?php elseif ($item['activity'] == 'User logged in'): ?>
                <li
                  class="relative flex flex-wrap lg:flex-nowrap whitespace-nowrap justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                  <div class="flex items-center w-full sm:w-auto">
                    <button
                      class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75">
                      <i class="fa-solid fa-user" style="color: #2dce89;"></i>
                    </button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Login</h6>
                      <span
                        class="text-xs leading-tight dark:text-white/80"><?= date('d F Y, \a\t h:i A', strtotime($item['activity_time'])) ?></span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center sm:mt-0 mt-2">
                    <p
                      class="relative z-10 inline-block m-0 text-xs font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                      <?= $_SESSION['nama_security'] ?> Melakukan login
                    </p>
                  </div>
                </li>
              <?php endif; ?>
            </ul>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Riwayat aktifitas User -->
    <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
      <div
        class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
          <h6 class="capitalize dark:text-white">Riwayat Aktivitas Pengguna</h6>
          <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60"></p>
        </div>
        <div class="flex-auto p-4">
          <?php foreach (array_slice($dataRiwayat, 0, 6) as $index => $item): ?>
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
              <?php if ($item['activity'] == 'User logged out'): ?>
                <li
                  class="relative flex flex-wrap lg:flex-nowrap whitespace-nowrap justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                  <div class="flex items-center w-full sm:w-auto">
                    <button
                      class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-red-600 border-transparent bg-transparent text-center align-middle font-bold uppercase text-red-600 transition-all hover:opacity-75">
                      <i class="fa-solid fa-right-from-bracket" style="color: #f55540;"></i>
                    </button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Logout</h6>
                      <span
                        class="text-xs leading-tight dark:text-white/80"><?= date('d F Y, \a\t h:i A', strtotime($item['activity_time'])) ?></span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center sm:mt-0 mt-2">
                    <p
                      class="relative z-10 inline-block m-0 text-xs font-semibold leading-normal text-transparent bg-gradient-to-tl from-red-600 to-orange-600 bg-clip-text sm:mt-0 mt-2">
                      <?= $_SESSION['nama_security'] ?> Melakukan logout
                    </p>
                  </div>
                </li>
              <?php elseif ($item['activity'] == 'User logged in'): ?>
                <li
                  class="relative flex flex-wrap lg:flex-nowrap whitespace-nowrap justify-between px-4 py-2 pl-0 mb-2 border-0 border-t-0 rounded-b-inherit text-inherit rounded-xl">
                  <div class="flex items-center w-full sm:w-auto">
                    <button
                      class="leading-pro ease-in text-xs bg-150 w-6.5 h-6.5 p-1.2 rounded-3.5xl tracking-tight-rem bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-emerald-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-emerald-500 transition-all hover:opacity-75">
                      <i class="fa-solid fa-user" style="color: #2dce89;"></i>
                    </button>
                    <div class="flex flex-col">
                      <h6 class="mb-1 text-sm leading-normal dark:text-white text-slate-700">Login</h6>
                      <span
                        class="text-xs leading-tight dark:text-white/80"><?= date('d F Y, \a\t h:i A', strtotime($item['activity_time'])) ?></span>
                    </div>
                  </div>
                  <div class="flex flex-col items-center justify-center sm:mt-0 mt-2">
                    <p
                      class="relative z-10 inline-block m-0 text-xs font-semibold leading-normal text-transparent bg-gradient-to-tl from-green-600 to-lime-400 bg-clip-text">
                      <?= $_SESSION['nama_security'] ?> Melakukan login
                    </p>
                  </div>
                </li>
              <?php endif; ?>
            </ul>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>