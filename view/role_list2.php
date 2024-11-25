<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Role</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-zinc-100 font-sans leading-normal tracking-normal">

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
            Tambahkan Role Baru
          </button>
        </div>

        <!-- Modal -->
        <div id="userModal"
          class="hidden fixed z-10 inset-0 overflow-y-auto bg-black/20 backdrop-blur-sm">
          <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
              <!-- Modal Header -->
              <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Tambahkan Role Baru</h2>
                <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
              </div>

              <!-- Modal Body -->
              <form id="addUserForm" action="index.php?modul=role&fitur=add" method="POST">
                <!-- role_name -->
                <div class="mb-4">
                  <label for="role_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Role</label>
                  <input type="text" id="role_name" name="role_name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter Role Name" required>
                </div>

                <!-- role_description -->
                <div class="mb-4">
                  <label for="role_description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Role</label>
                  <textarea id="role_description" name="role_description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter Role Description" rows="3" required></textarea>
                </div>

                <!-- Role -->
                <div class="mb-4">
                  <label for="role_status" class="block text-gray-700 text-sm font-bold mb-2">Status Role</label>
                  <select id="role_status" name="role_status"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Pilih Status</option>
                    <option value=1>Active</option>
                    <option value=0>Inactive</option>
                  </select>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                  <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Tambahkan Role
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
                <h2 class="text-xl font-semibold">Update Role</h2>
                <button id="closeUpdateModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
              </div>

              <!-- Modal Body -->
              <form id="updateUserForm" action="index.php?modul=role&fitur=edit" method="POST">
                <input type="hidden" id="updateRole_id" name="role_id">
                <div class="mb-4">
                  <label for="updateRole_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Role</label>
                  <input type="text" id="updateRole_name" name="role_name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                  <label for="updateRole_description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Role</label>
                  <textarea id="updateRole_description" name="role_description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"rows="3"
                    required></textarea>
                </div>
                <div class="mb-4">
                  <label for="updateRole_status" class="block text-gray-700 text-sm font-bold mb-2">Status Role</label>
                  <select id="updateRole_status" name="role_status"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Pilih Status</option>
                    <option value=1>Active</option>
                    <option value=0>Inactive</option>
                  </select>
                </div>
                <div class="flex justify-end">
                  <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Role
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
                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Role ID</th>
                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Role</th>
                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Deskripsi Role</th>
                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Status Role</th>
                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
              </tr>
            </thead>
            <tbody class="text-gray-700">
              <?php foreach ($roles as $role) { ?>
                <tr class="text-center border-b border-gray-200 pb-1">
                  <td class="py-3 px-4 text-black-600"><?php echo htmlspecialchars($role->role_id); ?></td>
                  <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($role->role_name); ?></td>
                  <td class="w-1/3 py-3 px-4"><?php echo htmlspecialchars($role->role_description); ?></td>
                  <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($role->role_status); ?></td>
                  <td class="w-1/6 py-3 px-4">
                    <button
                      class="bg-sky-600 hover:bg-sky-800 text-white font-bold py-1 px-2 rounded mr-2 openUpdateModal"
                      data-id="<?php echo htmlspecialchars($role->role_id); ?>"
                      data-role_name="<?php echo htmlspecialchars($role->role_name); ?>"
                      data-role_description="<?php echo htmlspecialchars($role->role_description); ?>"
                      data-role_status="<?php echo htmlspecialchars($role->role_status); ?>">
                      Update
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                      <a href="index.php?modul=role&fitur=delete&id=<?php echo htmlspecialchars($role->role_id); ?>">Delete</a>
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
        const role_id = button.getAttribute('data-id');
        const role_name = button.getAttribute('data-role_name');
        const role_description = button.getAttribute('data-role_description');
        const role_status = button.getAttribute('data-role_status');

        // Isi form modal update
        document.getElementById('updateRole_id').value = role_id;
        document.getElementById('updateRole_name').value = role_name;
        document.getElementById('updateRole_description').value = role_description;
        document.getElementById('updateRole_status').value = role_status;

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