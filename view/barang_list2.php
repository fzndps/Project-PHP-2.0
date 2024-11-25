<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <!-- Navbar -->
  <?php include 'include/navbar.php'; ?>

  <!-- Main container -->
  <div class="flex">
    <!-- Sidebar -->
    <?php include 'include/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 p-8">
      <div class="container mx-auto">
        <!-- Button to Open Modal -->
        <div class="mb-4">
          <button
            id="openModalBtn"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
            Tambahkan Barang
          </button>
        </div>

        <!-- Modal -->
        <div id="userModal"
          class="hidden fixed z-10 inset-0 overflow-y-auto bg-black/20 backdrop-blur-sm">
          <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
              <!-- Modal Header -->
              <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Tambahkan Barang</h2>
                <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
              </div>

              <!-- Modal Body -->
              <form id="addUserForm" action="index.php?modul=dataBarang&insert=addBarang" method="POST">
                <!-- namaBarang -->
                <div class="mb-4">
                  <label for="namaBarang" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                  <input type="text" id="namaBarang" name="namaBarang"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Nama Barang" required>
                </div>

                <!-- role description -->
                <div class="mb-4">
                  <label for="hargaBarang" class="block text-gray-700 text-sm font-bold mb-2">Harga Barang</label>
                  <input id="hargaBarang" name="hargaBarang"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan Harga Barang" required>
                </div>

                <!-- Role -->
                <div class="mb-4">
                  <label for="totalBarang" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Barang</label>
                  <input id="totalBarang" name="totalBarang"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Jumlah Barang" required>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Tambahkan Barang
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div id="updateUserModal"
          class="hidden fixed z-10 inset-0 overflow-y-auto bg-black/20 backdrop-blur-sm">
          <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
              <!-- Modal Header -->
              <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Update Barang</h2>
                <button id="closeUpdateModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
              </div>

              <!-- Modal Body -->
              <form id="updateUserForm" action="index.php?modul=dataBarang&insert=editBarang" method="POST">
                <input type="hidden" id="updateIdBarang" name="idBarang">
                <div class="mb-4">
                  <label for="updateNamaBarang" class="block text-gray-700 text-sm font-bold mb-2">Nama Barang</label>
                  <input type="text" id="updateNamaBarang" name="namaBarang"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                  <label for="updateHargaBarang" class="block text-gray-700 text-sm font-bold mb-2">Harga Barang</label>
                  <textarea id="updateHargaBarang" name="hargaBarang"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"rows="3"
                    required></textarea>
                </div>
                <div class="mb-4">
                  <label for="updateTotalBarang" class="block text-gray-700 text-sm font-bold mb-2">Total Barang</label>
                  <input id="updateTotalBarang" name="totalBarang"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex justify-end">
                  <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Barang
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>


        <!-- User Table -->
        <div class="bg-white shadow-md rounded my-6">
          <table class="min-w-full bg-cyan-50 grid-cols-1">
            <thead class="bg-gray-800 text-white">
              <tr>
                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID Barang</th>
                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Barang</th>
                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Harga Barang</th>
                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Total Barang</th>
                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
              </tr>
            </thead>
            <tbody class="text-gray-700">
              <?php foreach ($barangs as $barang) { ?>
                <tr class="text-center border-b border-gray-200 pb-1">
                  <td class="py-3 px-4 text-black-600"><?php echo htmlspecialchars($barang->idBarang); ?></td>
                  <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($barang->namaBarang); ?></td>
                  <td class="w-1/3 py-3 px-4"><?php echo htmlspecialchars($barang->hargaBarang); ?></td>
                  <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($barang->totalBarang); ?></td>
                  <td class="w-1/6 py-3 px-4">
                    <button
                      class="bg-sky-600 hover:bg-sky-800 text-white font-bold py-1 px-2 rounded mr-2 openUpdateModal"
                      data-id="<?php echo htmlspecialchars($barang->idBarang); ?>"
                      data-namaBarang="<?php echo htmlspecialchars($barang->namaBarang); ?>"
                      data-hargaBarang="<?php echo htmlspecialchars($barang->hargaBarang); ?>"
                      data-totalBarang="<?php echo htmlspecialchars($barang->totalBarang); ?>">
                      Update
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                      <a href="index.php?modul=dataBarang&insert=delete&id=<?php echo htmlspecialchars($barang->idBarang); ?>">Delete</a>
                    </button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Script -->
  <script>
    const modal = document.getElementById('userModal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');

    openModalBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', () => {
      modal.classList.add('hidden');
    });


    const updateModal = document.getElementById('updateUserModal');
    const openUpdateButtons = document.querySelectorAll('.openUpdateModal');
    const closeUpdateModalBtn = document.getElementById('closeUpdateModalBtn');

    // Event untuk membuka modal update
    openUpdateButtons.forEach(button => {
      button.addEventListener('click', () => {
        const idBarang = button.getAttribute('data-id');
        const namaBarang = button.getAttribute('data-namaBarang');
        const hargaBarang = button.getAttribute('data-hargaBarang');
        const totalBarang = button.getAttribute('data-totalBarang');

        // Isi form modal update
        document.getElementById('updateIdBarang').value = idBarang;
        document.getElementById('updateNamaBarang').value = namaBarang;
        document.getElementById('updateHargaBarang').value = hargaBarang;
        document.getElementById('updateTotalBarang').value = totalBarang;

        // Tampilkan modal
        updateModal.classList.remove('hidden');
      });
    });


    // Event untuk menutup modal update
    closeUpdateModalBtn.addEventListener('click', () => {
      updateModal.classList.add('hidden');
    });
  </script>

</body>

</html>