<?php include ('CrudBarang/inputDataBarang.php'); ?>
<div id="table" class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
  <!-- Card -->
  <div class="w-full px-2 py-6 mx-auto">
    <div class="flex-none w-full max-w-full px-4">
      <div
        class="relative flex flex-col min-w-0 mb-6 pb-5 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div
          class="p-6 pb-3 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
          <h2 class="text-xl font-bold mb-4">Data User</h2>
          <a href="viewInsertDataUser"
            class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
            <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah User
          </a>
        </div>
        <div class="px-8 mt-6 lg:mt-0 rounded shadow bg-white">
          <?php if (!empty($security)): ?>
            <table id="example" class="stripe hover mb-12" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
              <thead>
                <tr>
                  <th class="text-sm " data-priority="1">AUTHOR</th>
                  <!-- <th class="text-sm" data-priority="2">Nama Secuirty</th> -->
                  <th class="text-sm" data-priority="3">No Hp</th>
                  <th class="text-sm" data-priority="4">Username</th>
                  <th class="text-sm" data-priority="5">Tanggal Registrasi</th>
                  <th class="text-sm" data-priority="6">Role</th>
                  <th class="text-sm" data-priority="7">Status</th>
                  <th class="text-sm" data-priority="8">Option</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($security as $index => $item): ?>
                  <tr>
                    <td class="text-sm whitespace-nowrap">
                      <div class="flex px-2 py-1">
                        <div>
                          <?php if (empty($item['foto_profile'])): ?>
                            <img src="<?= BASE_URL; ?>assets/images/blank-profile-picture.png"
                              class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl object-cover"
                              alt="foto-profile" />
                          <?php else: ?>
                            <img src="getFotoProfile?id=<?=$item['id_security'] ?>"
                              class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl object-cover"
                              alt="foto-profile" />
                          <?php endif; ?>
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-0 text-sm leading-normal dark:text-white"> <?= $item['nama_security'] ?></h6>
                          <p class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                            ID <?= $item['id_security'] ?>
                          </p>
                        </div>
                      </div>
                    </td>

                    <!-- <td class="capitalize text-sm"><?= $item['nama_security'] ?></td> -->

                    <td class="text-sm"><?= $item['noHp_security'] ?></td>
                    <td class="capitalize text-sm"> <?= $item['username'] ?>
                    <td class="text-sm"><?= date("d-m-Y", strtotime($item["tanggal_registrasi"])) ?></td>
                    <td class="text-sm"><?= $item['role'] ?></td>

                    </td>
                    <td class="text-xs px-10">
                      <?php if ($item['role'] != 'admin'): ?>
                        <?php if ($item['status'] == '0'): ?>
                          <a href="aktifkanAkun?id=<?= $item['id_security'] ?>"
                            onclick="return confirm('Apakah anda yakin ingin mengaktifkan akun')"
                            class="bg-gradient-to-tl from-red-600 to-orange-600 text-white px-5 py-2 rounded-1 whitespace-nowrap">
                            Nonaktif
                          </a>
                        <?php else: ?>
                          <a href="nonAktifkanAkun?id=<?= $item['id_security'] ?>"
                            onclick="return confirm('Apakah anda yakin ingin menonaktifkan akun')"
                            class="bg-gradient-to-tl from-emerald-500 to-teal-400 text-white px-8 py-2  rounded-1 whitespace-nowrap">
                            Aktif
                          </a>
                        <?php endif; ?>
                      <?php else: ?>
                        <span
                          class=" bg-gradient-to-tl from-blue-500 to-violet-500 text-white px-8 py-2  rounded-1 whitespace-nowrap">
                          Aktif
                        </span>
                      <?php endif; ?>
                    </td>
                    <td> <a href="viewEditBarang?id=<?= $item['id_security'] ?>"
                        class="text-gray-700  px-4 py-4 text-sm mb-2 whitespace-nowrap capitalize font-semibold flex items-center"
                        role="menuitem" tabindex="-1" id="menu-item-<?= $index ?>-0">
                        <i class="fa-solid fa-pen-to-square fa-2xl" style="color: #0091ff;"></i>
                      </a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <th class="text-sm " data-priority="1">AUTHOR</th>
                  <!-- <th class="text-sm" data-priority="2">Nama Secuirty</th> -->
                  <th class="text-sm" data-priority="3">No Hp</th>
                  <th class="text-sm" data-priority="4">Username</th>
                  <th class="text-sm" data-priority="5">Tanggal Registrasi</th>
                  <th class="text-sm" data-priority="6">Role</th>
                  <th class="text-sm" data-priority="7">Status</th>
                  <th class="text-sm" data-priority="8">Option</th>
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