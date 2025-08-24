<div>
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-5 px-5 pb-10">
        <!-- LEFT: FORM -->
        <div class="border p-5 shadow-md">
            <h2 class="text-lg font-bold mb-4">{{ $addressId ? 'Edit Alamat' : 'Tambah Alamat' }}</h2>

            @if (session()->has('success'))
                <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium">Nama Penerima</label>
                    <input type="text" wire:model.defer="receiver_name" class="w-full border px-3 py-2">
                    @error('receiver_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Nomor Telepon</label>
                    <input type="text" wire:model.defer="phone_number" class="w-full border px-3 py-2">
                    @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium">Provinsi</label>
                    <input type="text" wire:model.defer="province" class="w-full border px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Kota</label>
                    <input type="text" wire:model.defer="city" class="w-full border px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Kode Pos</label>
                    <input type="text" wire:model.defer="postal_code" class="w-full border px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Detail Alamat</label>
                    <textarea wire:model.defer="detail" class="w-full border px-3 py-2"></textarea>
                </div>
                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                    @if ($addressId)
                        <button type="button" wire:click="resetForm" class="text-sm text-gray-500">Batal Edit</button>
                    @endif
                </div>
            </form>
        </div>

        <!-- RIGHT: ADDRESS LIST -->
        <div class="border p-5 shadow-md overflow-y-auto max-h-[600px]">
            <h2 class="text-lg font-bold mb-4">Daftar Alamat</h2>

            @foreach ($addresses as $addr)
                <div class="border p-4 mb-4 rounded">
                    <p><strong>{{ $addr->receiver_name }}</strong></p>
                    <p>{{ $addr->detail }}</p>
                    <p>{{ $addr->province }}, {{ $addr->city }}</p>
                    <p>{{ $addr->postal_code }}</p>
                    <div class="flex justify-between mt-2">
                        <button wire:click="edit({{ $addr->id }})" class="text-blue-600 text-sm">Edit</button>
                        <button wire:click="delete({{ $addr->id }})" class="text-red-600 text-sm"
                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>