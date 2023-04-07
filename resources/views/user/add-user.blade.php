<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="font-inter">
  <div id="login" class="flex flex-col items-center justify-center h-screen">
    <div class="border border-zinc-900 w-96 p-4 rounded-lg">
      <h2 class="text-xl text-center font-bold">CREATE NEW USER</h2>
      <form action="/add-user/add" method="POST">
        @csrf
        <div class="mt-2">
          <label for="nama" class="block text-sm font-medium text-zinc-900">Nama</label>
          <input type="text" name="nama" id="nama"
            class="mt-1 block w-full border border-zinc-900 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-black-500 focus:border-black-500 sm:text-sm"
            placeholder="nama">
        </div>
        <div class="mt-2">
          <label for="alamat" class="block text-sm font-medium text-zinc-900">Alamat</label>
          <input type="text" name="alamat" id="alamat"
            class="mt-1 block w-full border border-zinc-900 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-black-500 focus:border-black-500 sm:text-sm"
            placeholder="alamat">
        </div>


        <div class="mt-4">
          <button type="submit"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-zinc-900 hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zinc-900">
            Submit
          </button>
        </div>

    </div>
  </div>
</body>

</html>
