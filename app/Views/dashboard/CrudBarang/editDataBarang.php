<!-- Modal -->
<div id="modal-edit" class="w-full  inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white rounded-4 px-8 pt-5 pb-6 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-start mb-12 text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Edit Barang
                        </h3>

                        <div class="mt-2">
                            <form action="updateBarang" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_serah_terima"
                                    value="<?= $serah_terima['id_serah_terima'] ?>" required>

                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <!-- No Resi -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="nomor-resi">
                                            Nomor Resi :
                                        </label>
                                        <input
                                            class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="no_resi" name="no_resi" type="text"
                                            value="<?= $serah_terima['no_resi'] ?>" required>
                                    </div>
                                    <!-- Jenis Barang -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="jenis-barang">
                                            Jenis Barang :
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="jenis_barang" name="jenis_barang"
                                                onchange="handleOtherOption(this, 'otherInputJenisBarang', 'finalJenisBarang')"
                                                required>
                                                <option value="" disabled selected>Pilih Jenis Barang</option>
                                                <option class="bg-blue-500 text-white" selected
                                                    value="<?= $serah_terima['jenis_barang'] ?>">
                                                    <?= $serah_terima['jenis_barang'] ?>
                                                </option>
                                                <option>Surat</option>
                                                <option>Paket</option>
                                                <option>Cargo</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <!-- Input field for "other" option -->
                                        <input
                                            class="other-input hidden appearance-none mt-2 w-full bg-gray-200 text-gray-700 border  rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="otherInputJenisBarang" type="text" placeholder="Enter other option">
                                        <!-- Hidden input field to store the final value -->
                                        <input type="hidden" id="finalJenisBarang" name="jenis_barang">
                                    </div>
                                    <!-- Nama Pemilik -->
                                    <div class="w-full px-3 mb-6">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="nama-pemilik">
                                            Nama Pemilik :
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="nama_pemilik" name="nama_pemilik" type="text"
                                            value="<?= $serah_terima['nama_pemilik'] ?>" required>
                                    </div>
                                </div>
                                <!-- Tanggal Penerimaan -->
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="">
                                            Tanggal Penerimaan :
                                        </label>
                                        <input
                                            class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="tgl_terima" name="tgl_terima" type="datetime-local"
                                            value="<?= $serah_terima['waktu_penerimaan'] ?>" required>
                                    </div>
                                    <!-- Tanggal Penyerahan -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="">
                                            Tanggal Penyerahaan :
                                        </label>
                                        <input
                                            class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="tgl_serah" name="tgl_serah" type="datetime-local"
                                            value="<?= $serah_terima['waktu_penyerahan'] ?>">
                                    </div>
                                    <!-- Nama Kurir -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="nama-kurir">
                                            Nama Kurir :
                                        </label>
                                        <input
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 mb-3 leading-tight focus:outline-none focus:bg-white"
                                            id="nama_kurir" name="nama_kurir" type="text"
                                            value="<?= $serah_terima['nama_kurir'] ?>" required>
                                    </div>
                                    <!-- Status Barang -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="status-barang">
                                            Status Barang :
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="status_barang" name="status_barang" required>
                                                <option selected value="<?= $serah_terima['status_barang'] ?>" required>
                                                    <?= $serah_terima['status_barang'] ?>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- No HP Pemilik Barang-->
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="no_hp">
                                            Nomor HP :
                                        </label>
                                        <input
                                            class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="no_hp" name="no_hp" type="text"
                                            value="<?= $serah_terima['noHp_pemilik'] ?>" required>
                                    </div>
                                    <!-- Email Pemilik Barang -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="email">
                                            Email :
                                        </label>
                                        <input
                                            class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="email" name="email" type="email"
                                            value="<?= $serah_terima['email_pemilik'] ?>" required>
                                    </div>
                                </div>
                                <!-- Ekspedisi -->
                                <div class="flex flex-wrap -mx-3 mb-12">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="ekspedisi">
                                            Ekspedisi:
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="ekspedisi" name="ekspedisi"
                                                onchange="handleOtherOption(this, 'otherInputEkspedisi', 'finalEkspedisi')">
                                                <option value="" disabled selected>Pilih Ekspedisi</option>
                                                <option selected value="<?= $serah_terima['ekspedisi'] ?>" required>
                                                    <?= $serah_terima['ekspedisi'] ?>
                                                </option>
                                                <option>JNE</option>
                                                <option>POS</option>
                                                <option>TIKI</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <!-- Input field for "other" option -->
                                        <input
                                            class="other-input hidden appearance-none mt-2 w-full bg-gray-200 text-gray-700 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="otherInputEkspedisi" type="text" placeholder="Enter other option">
                                        <!-- Hidden input field to store the final value -->
                                        <input type="hidden" id="finalEkspedisi" name="ekspedisi">
                                    </div>
                                    <!-- Security -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="security">
                                            Security (Penerima) :
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="security" name="security">
                                                <option value="" disabled selected>Pilih Security</option>
                                                <option selected value="<?= $serah_terima['nama_security'] ?>">
                                                    <?= $serah_terima['nama_security'] ?>
                                                </option>
                                                <?php if (!empty($security_names)): ?>
                                                    <?php foreach ($security_names as $security): ?>
                                                        <option value="<?= htmlspecialchars($security['nama_security']) ?>">
                                                            <?= htmlspecialchars($security['nama_security']) ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <option value="" disabled>Tidak ada data security</option>
                                                <?php endif; ?>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="flex flex-wrap -mx-3 mb-12">
                                    <!-- Posisi Barang -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="ekspedisi">
                                            Posisi Barang :
                                        </label>
                                        <div class="relative">
                                            <select
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="posisi_barang" name="posisi_barang">
                                                <option value="" disabled selected>Pilih Posisi Barang</option>
                                                <option selected value="<?= $serah_terima['posisi'] ?>" required>
                                                    <?= $serah_terima['posisi'] ?>
                                                <option>Gedung Rektorat</option>
                                                <option>Sarana Prasarana</option>
                                                <option value="other">Other</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <!-- Input field for "other" option -->
                                        <input
                                            class="other-input hidden appearance-none mt-2 w-full bg-gray-200 text-gray-700 border rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="otherInputPosisi" type="text" placeholder="Enter other option">
                                        <!-- Hidden input field to store the final value -->
                                        <input type="hidden" id="finalPosisi" name="posisi_barang">
                                    </div>
                                    <!-- Foto Barang -->
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="text-start block capitalize tracking-wide text-gray-700 text-sm font-thin mb-2"
                                            for="foto_barang">
                                            Foto Barang :
                                        </label>
                                        <input
                                            class="appearance-none mb-6 block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-2 leading-tight focus:outline-none focus:bg-white"
                                            id="foto_barang" name="foto_barang" type="file">
                                    </div>
                                </div>
                                <div class="flex justify-start mb-4">
                                    <button type="submit"
                                        class="justify-items-start mb-4 mr-2 rounded-3 border border-transparent shadow-sm px-5 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">
                                        <i class="fa-solid fa-file"></i> Simpan
                                    </button>
                                    <button
                                        class="justify-items-start mb-4 rounded-3 border border-transparent shadow-sm px-5 py-2 bg-gradient-to-tl from-red-600 to-orange-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Keluar?');">
                                        <i class="fa-solid fa-file-excel"></i> Batal
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


<script>
    function handleOtherOption(select, otherInputId, finalInputId) {
        var otherInput = document.getElementById(otherInputId);
        var finalInput = document.getElementById(finalInputId);
        if (select.value === 'other') {
            otherInput.classList.remove('hidden'); // show input field
            otherInput.value = ''; // clear input value
            otherInput.focus(); // focus on input field
            finalInput.value = ''; // clear final input value
        } else {
            otherInput.classList.add('hidden'); // hide input field
            finalInput.value = select.value; // set final input value to selected value
        }
    }

    // Update final input value on input change
    function addOtherInputListener(otherInputId, finalInputId) {
        document.getElementById(otherInputId).addEventListener('input', function () {
            var finalInput = document.getElementById(finalInputId);
            finalInput.value = this.value;
        });
    }

    // Initialize listeners for all other input fields
    addOtherInputListener('otherInputJenisBarang', 'finalJenisBarang');
    addOtherInputListener('otherInputEkspedisi', 'finalEkspedisi');
    addOtherInputListener('otherInputPosisi', 'finalPosisi');
</script>