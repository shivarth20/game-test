<!-- resources/views/leaderboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Leaderboard</h1>
    <div class="grid grid-cols-4 gap-4">
        @foreach ($topUsers as $user)
        <div class="flex flex-col items-center">
            <img src="{{$user->profile_image_url}}" alt="{{ $user->name }}" class="w-36 h-36 rounded-full mb-2">
            <p class="text-sm">{{ $user->name }}</p>
        </div>
        @endforeach
    </div>
</div>

</div>
</body>
</html>
