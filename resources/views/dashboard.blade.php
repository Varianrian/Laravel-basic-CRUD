<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="font-inter">
  <div class="mx-auto container px-36 flex flex-col">
    <h2 class="py-5 text-4xl text-center font-bold my-4">User Dashboard</h2>
    @if (session('success'))
      <div id="alert"
        class="bg-green-100 border border-green-400 text-green-700 text-center px-4 py-3 rounded absolute w-80 left-1/2 transform -translate-x-1/2 top-8">
        <strong class="font-bold">{{ session('success') }}</strong>
      </div>
    @endif

    <div class="flex w-full justify-between">
      <a href="{{ route('add-user') }}"
        class="py-2 px-4 bg-zinc-900 text-white rounded-md items-start w-52 hover:bg-zinc-800 text-center">Add
        User</a>
      <a href="{{ route('logout') }}"
        class="py-2 px-4 border border-zinc-900 text-black rounded-md items-end w-52 hover:bg-zinc-900 hover:text-white text-center">Logout</a>
    </div>
    <table class="mt-4 table-auto w-full border border-zinc-200">
      <thead class="bg-zinc-900 text-white">
        <tr>
          <th class="p-3">ID</th>
          <th class="p-3">Nama</th>
          <th class="p-3">Alamat</th>
          <th class="p-3">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $id = 1;
        @endphp
        @if ($users->count() == 0)
          <tr>
            <td class="border p-3 text-center font-medium" colspan="4">No users</td>
          </tr>
        @endif
        @foreach ($users as $user)
          {{-- if no users --}}
          <tr>
            <td class="border p-3 text-center">{{ $id++ }}</td>
            <td class="border p-3">{{ $user->nama }}</td>
            <td class="border p-3">{{ $user->alamat }}</td>
            <td class="border p-3 text-center space-x-2">
              <a href="{{ route('delete-user', $user->id) }}" class="">
                <i class="fa-solid fa-trash hover:bg-slate-300 p-1.5 text-xl rounded"></i>
              </a>
              <a href="{{ route('edit-user', $user->id) }}" class="">
                <i class="fa-solid fa-pen-to-square hover:bg-slate-300 p-1.5 text-xl rounded"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>

  <script src="https://kit.fontawesome.com/348e129488.js" crossorigin="anonymous"></script>
</body>

</html>

<script>
  const alert = document.getElementById('alert');
  if (alert) {
    setTimeout(() => {
      alert.remove();
    }, 2000);
  }
</script>
