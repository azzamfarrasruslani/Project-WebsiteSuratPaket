<div id="table" class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
    <!-- Card -->
    <div class="w-full px-2 py-6 mx-auto">
        <div class="flex-none w-full max-w-full px-4">
            <div
                class="relative flex flex-col min-w-0 mb-14 pb-5 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
                <div
                    class="p-6 pb-3 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex justify-between items-center">
                    <h2 class="text-xl font-bold mb-4">Detail Barang</h2>
                    <div class="flex-none w-1/2 max-w-full px-3 text-right">
                        <a href="<?= BASE_URL; ?>SerahTerima/dataBarang"
                            class="inline-block px-8 py-2 mb-0 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-transparent border bg-gradient-to-tl from-red-600 to-orange-600 border-solid rounded-lg shadow-none cursor-pointer bg-150 active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 hover:opacity-75">Keluar</a>
                    </div>
                </div>
                <?php if (!empty($serah_terima)): ?>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">

                        <div class="py-4 ">
                            <h2 class="text-sm text-gray-700">Data Barang</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-xs">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left font-bold text-blue-500">Keterangan</th>
                                        <th scope="col" class="px-6 py-3 text-left font-bold text-blue-500">Detail</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Nomor Resi</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['no_resi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Jenis Barang</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['jenis_barang'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Foto Barang</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="getFotoBarang?id=<?= $serah_terima['id_serah_terima'] ?>"
                                                class="bg-gradient-to-tl from-emerald-500 to-teal-400 text-sm px-2 py-2 text-white rounded-1"
                                                target="_blank">
                                                <i class="fa-regular fa-image fa-xl" style="color: #ffffff;"></i>
                                                <span class="ml-2">Buka Foto</span>
                                            </a>
                                            <!-- <img src="getFotoBarang?id=<?= $serah_terima['id_serah_terima'] ?>"
                                                alt="Product Image" style="width: 200px; height: auto;"> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Waktu Barang Diterima</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['waktu_penerimaan'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Waktu Barang Diserahkan</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?= !empty($serah_terima['waktu_penyerahan']) ? $serah_terima['waktu_penyerahan'] : '-' ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Status Barang</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <?php if ($serah_terima['status_barang'] == 'Belum Diambil'): ?>
                                                <span
                                                    class="bg-gradient-to-tl from-red-600 to-orange-600 text-white px-2 py-2 rounded-1 whitespace-nowrap">Belum
                                                    Diambil</span>
                                            <?php else: ?>
                                                <span
                                                    class="bg-gradient-to-tl from-emerald-500 to-teal-400 text-white px-2 py-2 rounded-1 whitespace-nowrap">Sudah
                                                    Diambil</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Posisi Barang</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['posisi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Penerima</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['nama_security'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="py-4 ">
                            <h2 class="text-sm text-gray-700">Data Pemilik</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-xs">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left font-bold text-blue-500">Keterangan</th>
                                        <th scope="col" class="px-6 py-3 text-left font-bold text-blue-500">Detail</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Nama Pemilik</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['nama_pemilik'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">No Hp</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['noHp_pemilik'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Alamat Email</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['email_pemilik'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="py-4 ">
                            <h2 class="text-sm text-gray-700">Data Pengirim</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-xs">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left font-bold text-blue-500">Keterangan</th>
                                        <th scope="col" class="px-6 py-3 text-left font-bold text-blue-500">Detail</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Nama Kurir/Pengirim</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['nama_kurir'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">Ekspedisi</td>
                                        <td class="px-6 py-4 whitespace-nowrap"><?= $serah_terima['ekspedisi'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <p>Data tidak tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>