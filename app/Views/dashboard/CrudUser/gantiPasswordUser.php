<div id="modal-updateStatus" class="w-full inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-xl sm:w-full">
            <div class="bg-white rounded-4 px-16 py-8 pt-5 pb-6 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-start mb-12 text-xl leading-6 font-medium text-gray-900" id="modal-title">
                            Ganti Password
                        </h3>
                        <div class="w-full mt-2">
                            <form action="gantiPassword?id=<?= htmlspecialchars($id_security) ?>" method="post"
                                enctype="multipart/form-data" id="gantiPass">
                                <div class="mb-6">
                                    <div class="px-8">
                                        <?php if (isset($_SESSION['error'])): ?>
                                            <p class="text-red-600 mt-4"><?= $_SESSION['error']; ?></p>
                                            <?php unset($_SESSION['error']); ?>
                                        <?php endif; ?>
                                        <div class="w-full mb-6">
                                            <label
                                                class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                                for="password-sekarang">
                                                Password Sekarang :
                                            </label>
                                            <input
                                                class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                                id="password_sekarang" name="password_sekarang" type="text" required>

                                        </div>
                                        <label class="text-start block capitalize tracking-wide  text-sm font-bold mb-2"
                                            for="tgl_serah">
                                            Password Baru
                                        </label>

                                        <div class="w-full mb-6">
                                            <label
                                                class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                                for="password-baru">
                                                Password :
                                            </label>
                                            <input
                                                class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                                id="password_baru" name="password_baru" type="text" required>
                                        </div>
                                        <div class="w-full mb-6">
                                            <label
                                                class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                                for="password_konfirmasi">
                                                Konfirmasi Password :
                                            </label>
                                            <input
                                                class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                                id="password_konfirmasi" name="password_konfirmasi" type="text"
                                                required>
                                        </div>
                                    </div>
                                    <div class="flex justify-center mb-4">
                                        <button type="submit"
                                            onclick="return confirm('Apakah Anda Yakin Ingin menyimpan perubahan?');"
                                            class="mr-2 rounded-3 border border-transparent shadow-sm px-5 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">
                                            Ganti
                                        </button>
                                        <a href="<?= BASE_URL; ?>User/profile"
                                            class="rounded-3 border border-transparent shadow-sm px-5 py-2 bg-gradient-to-tl from-red-600 to-orange-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm "
                                            onclick="return confirm('Apakah Anda Yakin Ingin Keluar?');">
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>