<!-- Modal -->
<!-- <div id="modal" class="absolute w-full inset-0 hidden z-50 overflow-y-auto"> -->
<div id="modal" class="w-full inset-0 hidden z-50 overflow-y-auto">
  <div class="flex items-center justify-center min-h-screen px-4">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
      <div class="bg-white rounded-4 px-16 pt-5 pb-6 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-start mb-12  text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Form Barang
            </h3>

            <div class="mt-2">
              <form action="" method="post">
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-start block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                      for="grid-first-name">
                      First Name
                    </label>
                    <input
                      class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                      id="grid-first-name" type="text" placeholder="Jane">
                  </div>
                  <div class="w-full md:w-1/2 px-3">
                    <label class="text-start block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                      for="grid-last-name">
                      Last Name
                    </label>
                    <input
                      class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                      id="grid-last-name" type="text" placeholder="Doe">
                  </div>
                </div>




                <div class="mt-5 sm:mt-6 sm:flex sm:flex-row-reverse">
                  <button type="submit"
                    class="w-full inline-flex mb-4 justify-center rounded-3 border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Simpan
                  </button>
                  <button
                    class="mt-3 w-full inline-flex justify-center rounded-3 border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:w-auto sm:text-sm">
                    Batal
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>