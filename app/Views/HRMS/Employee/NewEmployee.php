<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Employee</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-2xl mx-auto bg-white shadow rounded p-6">
        <h1 class="text-3xl font-bold mb-4">Create New Employee</h1>
        <form action="/index.php?action=store" method="POST">
    <!-- form fields here -->
</form>
            <!-- If you use CSRF protection, include a token here -->
            <div class="mb-4">
                <label for="first_name" class="block text-gray-700 font-medium mb-2">First Name</label>
                <input type="text" name="first_name" id="first_name" required 
                       class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="middle_name" class="block text-gray-700 font-medium mb-2">Middle Name</label>
                <input type="text" name="middle_name" id="middle_name" 
                       class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-gray-700 font-medium mb-2">Last Name</label>
                <input type="text" name="last_name" id="last_name" required 
                       class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <!-- Add additional fields as needed, e.g., date of birth, gender, etc. -->
            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Create Employee
                </button>
            </div>
        </form>
    </div>
</body>
</html>
