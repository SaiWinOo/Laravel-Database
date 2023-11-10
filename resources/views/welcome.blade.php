<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<body>
<ul>
    @foreach($users as $user)

        <li>Name : {{ $user->name }}     --------- >>>>>>>> Role : {{  count($user->role) > 0  ? $user->role[0]?->name : '' }}</li>
    @endforeach
</ul>

<form action="{{ route('user.store') }}" method="POST"   class="grid grid-cols-2 gap-10 p-40">
    @csrf
        <input type="text" class="p-3 border border-gray-400 " name="name" placeholder="name" />
        <input type="text" class="p-3 border border-gray-400 " name="email" placeholder="email" />
        <input type="password" class="p-3 border border-gray-400 "  name="password" placeholder="password" />
    <button class="col-span-full bg-green-400 p-2"> Submit</button>
</form>
</body>
</html>
