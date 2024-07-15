


  <?php include ('CrudBarang/inputDataBarang.php'); ?>







  <div id="table" class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
    <!-- Card -->
    <div class="w-full px-2 py-6 mx-auto">
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
                    <!-- <th class="text-sm" data-priority="8">Waktu Serah</th> -->
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

                      <!-- <td class="text-sm"><?= $item['status_barang'] ?></td> -->
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
                      <td class="text-sm"><?= $item['waktu_penerimaan'] ?></td>

                      <!-- <td class="text-sm">
                        <?= !empty($item['waktu_penyerahan']) ? $item['waktu_penyerahan'] : '-' ?>
                      </td> -->

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

                              <?php if ($item['status_barang'] == 'Belum Diambil'): ?>
                                <!-- Update Status-->
                                <a href="viewUpdateStatus?id=<?= $item['id_serah_terima'] ?>"
                                  class=" text-gray-700 block px-8 py-4 text-sm " role="menuitem" tabindex="-1"
                                  onclick="return confirm('Apakah anda yakin upadate status barang ?') "
                                  id=" menu-item-<?= $index ?>-0"><i class="fa-solid fa-check fa-xl"
                                    style="color: #63E6BE;"></i>
                                </a>
                              <?php endif; ?>

                              <!-- More Data -->
                              <a href="detailData?id=<?= $item['id_serah_terima'] ?>"
                                class=" text-gray-700 block px-8 py-4 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-<?= $index ?>-0"><i class="fa-solid fa-magnifying-glass-plus fa-xl"
                                  style="color: #FFD43B;"></i>
                              </a>

                              <!-- Gambar
                              <a href="<?= BASE_URL; ?>serahTerima/getFotoBarang ?id=<?= $item['id_serah_terima'] ?>"
                                class=" text-gray-700 block px-8 py-4 text-sm " role="menuitem" tabindex="-1"
                                id="menu-item-<?= $index ?>-0"><i class="fa-solid fa-image fa-xl"
                                  style="color: #63E6BE;"></i>
                              </a> -->


                              <!-- Edit -->
                              <a href="viewEditBarang?id=<?= $item['id_serah_terima'] ?>"
                                class=" text-gray-700 block px-8 py-4 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-<?= $index ?>-0"><i class="fa-solid fa-pen-to-square fa-xl"
                                  style="color: #0091ff;"></i></a>
                              <!-- Hapus -->
                              <a href="hapusData?id=<?= $item['id_serah_terima'] ?>"
                                class=" text-gray-700 block px-8 py-4 text-sm" role="menuitem" tabindex="-1"
                                id="menu-item-<?= $index ?>-0"
                                onclick="return confirm('Are you sure you want to delete this item?');"><i
                                  class="fa-solid fa-trash fa-xl" style="color: #ff004c;"></i></a>


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
                    <!-- <th class="text-sm" data-priority="8">Waktu Serah</th> -->
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

      // function toggleModalUpdateStatus() {
      //   const modal = document.getElementById('modal-updateStatus');
      //   const body = document.querySelector('body');

      //   modal.classList.toggle('hidden');
      //   body.classList.toggle('modal-blur');
      // }


      // function toggleModalEdit(id) {
      //   // Toggle modal dan table visibility
      //   document.getElementById('modal-edit').classList.toggle('hidden');
      //   document.getElementById('table').classList.toggle('hidden');

      //   // Simpan id_serah_terima untuk digunakan kemudian
      //   document.getElementById('modal-edit').dataset.idSerahTerima = id;
      // }


      function toggleDropdown(index) {
        var dropdown = document.getElementById("dropdown-menu-" + index);
        dropdown.classList.toggle("hidden");
      }

      window.onclick = function (event) {
        if (!event.target.matches('[id^="menu-button-"]')) {
          var dropdowns = document.getElementsByClassName("dropdown-menu");
          for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i]; if
              (!openDropdown.classList.contains('hidden')) { openDropdown.classList.add('hidden'); }
          }
        }
      } </script>









   