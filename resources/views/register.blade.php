<!-- resources/views/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    @vite('resources/css/app.css')
</head>

<!-- register.blade.php -->

@if ($errors->any())
    <div id="errorMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Validation Error!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div id="successMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif


<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-8 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6">User Registration</h2>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block mb-1">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full h-12 border border-gray-300 rounded-lg px-4 py-2" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block mb-1">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full h-12 border border-gray-300 rounded-lg px-4 py-2" required>
            </div>

            <div class="mb-4">
                <label for="pronouns" class="block mb-1">Pronouns:</label>
                <select id="pronouns" name="pronoun" class="form-select w-full h-12 border border-gray-300 rounded-lg px-4 py-2">
                    <option value="she" {{ old('pronoun') == 'she' ? 'selected' : '' }}>She/Her</option>
                    <option value="he" {{ old('pronoun') == 'he' ? 'selected' : '' }}>He/Him</option>
                    <option value="they" {{ old('pronoun') == 'they' ? 'selected' : '' }}>They/Them</option>
                </select>

            </div>

            <div class="mb-4">
                <label for="instagram_handle" class="block mb-1">Instagram Handle:</label>
                <input type="text" id="instagram_handle" name="instagram_handle" value="{{ old('instagram_handle') }}" class="w-full h-12 border border-gray-300 rounded-lg px-4 py-2">
            </div>

            <div class="mb-4">
                <label for="profile_image" class="block mb-1">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" value="{{ old('profile_image') }}" class="w-full h-12 border border-gray-300 rounded-lg px-4 py-2">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mt-4">Register</button>
        </form>
    </div>
</body>
</html>

<script>
    // Auto-hide success and error messages after 5 seconds
    setTimeout(function() {
        var errorMessage = document.getElementById("errorMessage");
        var successMessage = document.getElementById("successMessage");
        
        if (errorMessage) {
            errorMessage.style.display = "none";
        }
        
        if (successMessage) {
            successMessage.style.display = "none";
        }
    }, 5000); // 5000 milliseconds = 5 seconds
</script>
