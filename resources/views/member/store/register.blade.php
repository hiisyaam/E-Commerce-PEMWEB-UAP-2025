<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Daftar Toko
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow rounded-lg">

                <h3 class="text-lg font-semibold mb-4">Form Pendaftaran Toko</h3>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-200 text-red-800 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('member.store.register.submit') }}" 
                      method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nama Toko</label>
                        <input type="text" name="store_name"
                               class="w-full border rounded p-2"
                               value="{{ old('store_name') }}"
                               placeholder="Masukkan nama toko">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Alamat Toko</label>
                        <textarea name="address"
                                  class="w-full border rounded p-2"
                                  placeholder="Alamat lengkap toko">{{ old('address') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nomor Telepon</label>
                        <input type="text" name="phone"
                               class="w-full border rounded p-2"
                               value="{{ old('phone') }}"
                               placeholder="08123456789">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Deskripsi Toko</label>
                        <textarea name="description"
                                  class="w-full border rounded p-2"
                                  placeholder="Ceritakan tentang toko Anda">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Logo Toko (Opsional)</label>
                        <input type="file" name="logo" class="w-full">
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Daftar Toko
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>