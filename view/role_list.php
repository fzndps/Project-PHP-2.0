<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
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
        <!-- Your main content goes here -->
        <div class="container mx-auto">
            <!-- Button to Insert New Role -->
            <div class="mb-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <a href="index.php?modul=role&fitur=add">Insert New Role</a>
                </button>
            </div>

            <!-- Roles Table -->
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white grid-cols-1">
                    <thead class="bg-gray-800 text-white">

                    <tr>
                        <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Role ID</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Role Name</th>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">Role Description</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Role Status</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                    </tr>

                    </thead>
                    <tbody class="text-gray-700">
                    <!-- Static Data Rows -->
                     <?php foreach($roles as $role){?>
                    <tr class="text-center border-b border-gray-200 pb-1">
                        <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($role->role_id);?></td>
                        <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($role->role_name);?></td>
                        <td class="w-1/3 py-3 px-4"><?php echo htmlspecialchars($role->role_description);?></td>
                        <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($role->role_status);?></td>
                        <td class="w-1/6 py-3 px-4">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="index.php?modul=role&fitur=update&id=<?php echo htmlspecialchars($role->role_id); ?>">Update</a>
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="index.php?modul=role&fitur=delete&id=<?php echo htmlspecialchars($role->role_id); ?>">Delete</a>
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- More rows can be added statically here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
