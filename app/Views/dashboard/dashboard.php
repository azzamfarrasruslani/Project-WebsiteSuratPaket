
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
                  <p class="mb-0 font-sans text-sm font-semibold leading-normal dark:text-white dark:opacity-60">
                    Paket Masuk </p>
                  <h5 class="mb-2 font-bold dark:text-white"><?= $jmlBarangMasuk; ?></h5>
                  <p class="mb-0 dark:text-white dark:opacity-60">
                    hari ini
                  </p>
                </div>
              </div>
              <div class="px-3 text-right basis-1/3">
                <div
                  class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                  <i class="leading-none fa-solid fa-inbox text-lg relative top-3.5 text-white"
                    style="color: #ffffff;"></i>
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
                  <p class="mb-0 dark:text-white dark:opacity-60">
                    hari ini
                  </p>
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
                    Paket disimpan Satpam</p>
                  <h5 class="mb-2 font-bold dark:text-white">20</h5>
                  <p class="mb-0 dark:text-white dark:opacity-60">
                    hari ini
                  </p>
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
                    Paket disimpan RT</p>
                  <h5 class="mb-2 font-bold dark:text-white">10</h5>
                  <p class="mb-0 dark:text-white dark:opacity-60">
                    hari ini
                  </p>
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
    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-30">
      <div class="w-full max-w-full px-3 mt-0 lg:flex-none">
        <div
          class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
            <h6 class="capitalize dark:text-white">Riwayat Aktifitas</h6>
            <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
            </p>
          </div>
          <div class="flex-auto p-4">
            <div>
              <!-- <canvas id="chart-line" height="300"></canvas> -->
            </div>
          </div>
        </div>
      </div>



