<div id="table" class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
  <!-- Card -->
  <div class="w-full px-2 py-6 mx-auto">
    <div class="flex-none w-full max-w-full px-4">
      <div
        class="relative flex flex-col min-w-0 mb-6 pb-5 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div
          class="p-6 pb-3 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
          <h2 class="text-xl font-bold mb-4">Data Paket Masuk Hari Ini</h2>
          <h2 class="text-xl font-semibold mb-4"><?= date('d-m-Y') ?></h2>
        </div>
        <div class="px-8 mt-6 lg:mt-0 rounded shadow bg-white">
          <?php if (!empty($tampilDataByWaktuTerima)): ?>
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
                  <th class="text-sm" data-priority="8">Nama Security</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tampilDataByWaktuTerima as $index => $item): ?>
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
                          class="bg-gradient-to-tl from-red-600 to-orange-600 text-white px-2 py-2 rounded-1 whitespace-nowrap">
                          Belum Diambil
                        </span>
                      <?php else: ?>
                        <span
                          class="bg-gradient-to-tl from-emerald-500 to-teal-400 text-white px-2 py-2 rounded-1 whitespace-nowrap">
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



