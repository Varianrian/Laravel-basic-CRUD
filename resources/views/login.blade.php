<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="font-inter">
  <div id="login" class="flex flex-col items-center justify-center h-screen">
    <div class="border border-zinc-900 w-96 p-4">
      <h2 class="text-xl text-center font-bold">LOGIN USER</h2>
      @if ($errors->any())
        <div class="mt-2 text-xs bg-rose-500 text-white p-2 rounded-md">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @if (session('success'))
        <div class="mt-2 text-xs bg-green-500 text-white p-2 rounded-md">
          {{ session('success') }}
        </div>
      @endif
      <form action="/login" method="POST">
        @csrf

        <div class="mt-2">
          <label for="email" class="block text-sm font-medium text-zinc-900">Email</label>
          <input type="email" name="email" id="email"
            class="mt-1 block w-full border border-zinc-900 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-black-500 focus:border-black-500 sm:text-sm"
            placeholder="Email">
        </div>
        <div class="mt-4">
          <label for="password" class="block text-sm font-medium text-zinc-900">Password</label>
          <input type="password" name="password" id="password"
            class="mt-1 block w-full border border-zinc-900 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-black-500 focus:border-black-500 sm:text-sm"
            placeholder="Password">
        </div>
        <div class="mt-4">
          <button type="submit"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-zinc-900 hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zinc-900">
            Login
          </button>
        </div>

        <div class="ml-auto text-xs mt-4">
          <a href="{{ route('register') }}" class="font-medium text-zinc-900 hover:text-zinc-700">
            Don't have an account? Register here
          </a>
        </div>

    </div>
  </div>
</body>

</html>
