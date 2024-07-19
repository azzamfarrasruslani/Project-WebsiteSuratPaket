<div id="modal" class="w-full inset-0 z-50 overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen px-4">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
      <div class="bg-white rounded-4 px-8 pt-5 pb-6 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-start mb-12 text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Form User
            </h3>
            <div class="mt-2">
              <form action="insertDataUser" method="post" enctype="multipart/form-data">
                <!-- Reset -->
                <div class="flex justify-start mb-4">
                  <button type="reset"
                    class="justify-items-start mb-4 rounded-3 border border-transparent shadow-sm px-5 py-2 bg-gradient-to-tl from-red-600 to-orange-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    <i class="fa-solid fa-trash-can " style="color: #ffffff;"></i> Reset
                  </button>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                  <!-- Nama -->
                  <div class="w-full px-3 mb-6">
                    <label class="text-start block capitalize tracking-wide text-gray-700 text-sm font-semibold mb-2"
                      for="nama-security">
                      Nama :
                    </label>
                    <input
                      class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                      id="nama_security" name="nama_security" type="text" required>
                  </div>


                  <!-- Nomor HP -->
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-start block capitalize tracking-wide text-gray-700 text-sm font-semibold mb-2"
                      for="noHp-security">
                      No HP :
                    </label>
                    <input
                      class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                      id="noHp_security" name="noHp_security" type="number" required>
                  </div>
                  <!-- User Name -->
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-start block capitalize tracking-wide text-gray-700 text-sm font-semibold mb-2"
                      for="username">
                      Username :
                    </label>
                    <input
                      class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                      id="username" name="username" type="text" required>
                  </div>

                </div>
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-12">
            <!-- Password -->
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="text-start block capitalize tracking-wide text-gray-700 text-sm font-semibold mb-2"
                for="password">
                Password :
              </label>
              <input type="password"
                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                id="password" name="password" required>
            </div>
           

            <!-- Role-->
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="text-start block capitalize tracking-wide text-gray-700 text-sm font-semibold mb-2"
                for="role">
                Role :
              </label>
              <div class="relative">
                <select
                  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  id="role" name="role" required>
                  <option value="" disabled selected>Pilih Role</option>
                  <option>admin</option>
                  <option>user</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <!-- Button -->
          <div class="flex justify-start mb-4">
            <button type="submit"
              class="justify-items-start mb-4 mr-2 rounded-3 border border-transparent shadow-sm px-5 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">
              <i class="fa-solid fa-file"></i> Tambah User
            </button>
            <a href="<?= BASE_URL; ?>User/dataUser"
              class="justify-items-start mb-4 rounded-3 border border-transparent shadow-sm px-5 py-2 bg-gradient-to-tl from-red-600 to-orange-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm"
              onclick="return confirm('Apakah Anda Yakin Ingin Keluar?');">
              <i class="fa-solid fa-file-excel"></i> Batal
            </a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>