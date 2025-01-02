<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List User</title>
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
            Insert New User
          </button>
        </div>

        <!-- Modal -->
        <div id="userModal"
          class="hidden fixed z-10 inset-0 overflow-y-auto bg-black/20 backdrop-blur-sm">
          <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
              <!-- Modal Header -->
              <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Insert New User</h2>
                <button id="closeModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
              </div>

              <!-- Modal Body -->
              <form id="addUserForm" action="index.php?modul=dataUser&insert=addUser" method="POST">
                <!-- Username -->
                <div class="mb-4">
                  <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                  <input type="text" id="username" name="username"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter Username" required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                  <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                  <input type="password" id="password" name="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Enter Password" required>
                </div>

                <!-- Role -->
                <div class="mb-4">
                  <label for="role_name" class="block text-gray-700 text-sm font-bold mb-2">Role Name:</label>
                  <select id="role_name" name="role_name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Pilih Role</option>
                    <?php foreach ($roles as $role) { ?>
                      <option value="<?php echo htmlspecialchars($role->role_name); ?>">
                        <?php echo htmlspecialchars($role->role_name); ?>
                      </option>
                    <?php
                    } ?>
                  </select>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                  <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add User
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
                <h2 class="text-xl font-semibold">Update User</h2>
                <button id="closeUpdateModalBtn" class="text-gray-500 hover:text-gray-800">&times;</button>
              </div>

              <!-- Modal Body -->
              <form id="updateUserForm" action="index.php?modul=dataUser&insert=editUser" method="POST">
                <input type="hidden" id="updateUserId" name="idUser">
                <div class="mb-4">
                  <label for="updateUsername" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                  <input type="text" id="updateUsername" name="username"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                  <label for="updatePassword" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                  <input type="password" id="updatePassword" name="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                </div>
                <div class="mb-4">
                  <label for="updateRole" class="block text-gray-700 text-sm font-bold mb-2">Role Name:</label>
                  <select id="updateRole" name="role_name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="">Pilih Role</option>
                    <?php foreach ($roles as $role) { ?>
                      <option value="<?php echo htmlspecialchars($role->role_name); ?>">
                        <?php echo htmlspecialchars($role->role_name); ?>
                      </option>
                    <?php
                    } ?>
                  </select>
                </div>
                <div class="flex justify-end">
                  <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update User
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
                <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID user</th>
                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Username</th>
                <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Password</th>
                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Role Name</th>
                <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
              </tr>
            </thead>
            <tbody class="text-gray-700">
              <?php foreach ($users as $user) { ?>
                <tr class="text-center border-b border-gray-200 pb-1">
                  <td class="py-3 px-4 text-black-600 border-r border-gray-300"><?php echo htmlspecialchars($user->idUser); ?></td>
                  <td class="w-1/4 py-3 border-r border-gray-300 px-4"><?php echo htmlspecialchars($user->username); ?></td>
                  <td class="w-1/3 py-3 border-r border-gray-300 px-4">
                    <?php if (isset($_GET['viewPassword']) && $_GET['viewPassword'] == $user->idUser) { ?>
                      <?php echo htmlspecialchars($user->password); ?>
                    <?php } else { ?>
                      <a href="index.php?modul=dataUser&viewPassword=<?php echo htmlspecialchars($user->idUser); ?>"
                        class="text-blue-600 underline">Lihat</a>
                    <?php } ?>
                  </td>
                  <td class="w-1/6 py-3 border-r border-gray-300 px-4"><?php echo htmlspecialchars($user->role->role_name); ?></td>
                  <td class="w-1/6 py-3 px-4">
                    <button
                      class="bg-sky-600 hover:bg-sky-800 text-white font-bold py-1 px-2 rounded mr-2 openUpdateModal"
                      data-id="<?php echo htmlspecialchars($user->idUser); ?>"
                      data-username="<?php echo htmlspecialchars($user->username); ?>"
                      data-password="<?php echo htmlspecialchars($user->password); ?>"
                      data-role="<?php echo htmlspecialchars($user->role->role_name); ?>">
                      Update
                    </button>
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                      <a href="index.php?modul=dataUser&insert=deleteUser&id=<?php echo htmlspecialchars($user->idUser); ?>">Delete</a>
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
        const userId = button.getAttribute('data-id');
        const username = button.getAttribute('data-username');
        const password = button.getAttribute('data-password');
        const roleName = button.getAttribute('data-role');

        // Isi form modal update
        document.getElementById('updateUserId').value = userId;
        document.getElementById('updateUsername').value = username;
        document.getElementById('updatePassword').value = password;
        document.getElementById('updateRole').value = roleName;

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