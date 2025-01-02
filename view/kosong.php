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
        <div class="flex-1 p-8 flex justify-center items-center">
            <div class="flex">
                <!-- Main Content -->
                <main class="w-3/4 bg-gray-100 p-6">
                    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

                    <!-- Statistik -->
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-gray-600">Total Users</h2>
                            <p class="text-2xl font-bold">120</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-gray-600">Total Items</h2>
                            <p class="text-2xl font-bold">350</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h2 class="text-gray-600">Total Transactions</h2>
                            <p class="text-2xl font-bold">75</p>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="mt-8">
                        <h2 class="text-xl font-bold mb-4">Quick Links</h2>
                        <div class="grid grid-cols-3 gap-4">
                            <a href="#" class="bg-blue-500 text-white p-4 rounded-lg shadow-md hover:bg-blue-600">
                                Add New Item
                            </a>
                            <a href="#" class="bg-green-500 text-white p-4 rounded-lg shadow-md hover:bg-green-600">
                                View Users
                            </a>
                            <a href="#" class="bg-purple-500 text-white p-4 rounded-lg shadow-md hover:bg-purple-600">
                                Recent Transactions
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="mt-8">
                        <h2 class="text-xl font-bold mb-4">Recent Activity</h2>
                        <table class="w-full bg-white rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="p-4 text-left">Date</th>
                                    <th class="p-4 text-left">Activity</th>
                                    <th class="p-4 text-left">User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-4">2025-01-01</td>
                                    <td class="p-4">Added a new item</td>
                                    <td class="p-4">Admin</td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <td class="p-4">2025-01-02</td>
                                    <td class="p-4">Updated user data</td>
                                    <td class="p-4">Editor</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </div>

</body>

</html>