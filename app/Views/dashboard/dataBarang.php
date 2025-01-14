<?php include ('CrudBarang/inputDataBarang.php'); ?>
<div id="table" class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
  <?php if (isset($_SESSION['status'])): ?>
    <div><?= $_SESSION['status'];
    unset($_SESSION['status']); ?></div>
  <?php endif; ?>
  <!-- Card -->
  <div class="w-full px-2 py-6 mx-auto">
    <div class="flex-none w-full max-w-full px-4">
      <div
        class="relative flex flex-col min-w-0 mb-6 pb-5 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div
          class="p-6 pb-3 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
          <h2 class="text-xl font-bold mb-4">Data Paket Masuk</h2>
          <a href="javascript:;"  onclick="toggleModal()"
            class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
            <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah Data
          </a>
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
                  <th class="text-sm" data-priority="8">Nama Security</th>
                  <th class="text-sm" data-priority="9">Options</th>
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
                      <?= date("d-m-Y,H:i:s", strtotime($item["waktu_penerimaan"])) ?>
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
                          role="menu" aria-orientation="vertical" aria-labelledby="menu-button-<?= $index ?>" tabindex="-1">
                          <div class="py-1" role="none">
                            <?php if ($item['status_barang'] == 'Belum Diambil'): ?>
                              <?php if ($item['status_notifikasi']== '0'): ?>
                                <!-- Beri Notif -->
                                <a href="<?= BASE_URL; ?>Email/sendNotification?id=<?= $item['id_serah_terima'] ?>"
                                  class="text-gray-700 px-4 py-4 text-sm mb-2 whitespace-nowrap capitalize font-semibold flex items-center"
                                  role="menuitem" tabindex="-1" id="menu-item-<?= $index ?>-0">
                                  <i class="fa-solid fa-bell fa-xl" style="color: #ffa200;"></i>
                                  <span class="ml-2">Beri Notifikasi</span>
                                </a>
                              <?php else: ?>
                                <!-- Update Status -->
                                <a href="viewUpdateStatus?id=<?= $item['id_serah_terima'] ?>"
                                  class="text-gray-700 px-4 py-4 text-sm mb-2 whitespace-nowrap capitalize font-semibold flex items-center"
                                  role="menuitem" tabindex="-1"
                                  onclick="return confirm('Apakah anda yakin update status barang?')"
                                  id="menu-item-<?= $index ?>-0">
                                  <i class="fa-solid fa-check fa-xl" style="color: #63E6BE;"></i>
                                  <span class="ml-2">selesaikan</span>
                                </a>
                              <?php endif; ?>
                            <?php endif; ?>

                            <!-- More Data -->
                            <a href="detailData?id=<?= $item['id_serah_terima'] ?>"
                              class="text-gray-700 px-4 py-4 text-sm mb-2 whitespace-nowrap capitalize font-semibold flex items-center"
                              role="menuitem" tabindex="-1" id="menu-item-<?= $index ?>-0">
                              <i class="fa-solid fa-magnifying-glass-plus fa-xl" style="color: #FFD43B;"></i>
                              <span class="ml-2">detail</span>
                            </a>
                            <!-- Edit -->
                            <a href="viewEditBarang?id=<?= $item['id_serah_terima'] ?>"
                              class="text-gray-700 px-4 py-4 text-sm mb-2 whitespace-nowrap capitalize font-semibold flex items-center"
                              role="menuitem" tabindex="-1" id="menu-item-<?= $index ?>-0">
                              <i class="fa-solid fa-pen-to-square fa-xl" style="color: #0091ff;"></i>
                              <span class="ml-2">edit</span>
                            </a>
                            <!-- Hapus -->
                            <a href="hapusData?id=<?= $item['id_serah_terima'] ?>"
                              class="text-gray-700 px-4 py-4 text-sm mb-2 whitespace-nowrap capitalize font-semibold flex items-center"
                              role="menuitem" tabindex="-1" id="menu-item-<?= $index ?>-0">
                              <i class="fa-solid fa-trash fa-xl" style="color: #ff004c;"></i>
                              <span class="ml-2">hapus</span>
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
                  <th class="text-sm" data-priority="8">Nama Security</th>
                  <th class="text-sm" data-priority="9">Options</th>
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
