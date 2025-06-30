<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
  <!-- FORM -->
  <div class="border p-5 shadow-md">
    <h2 class="text-lg font-bold mb-4">Tambah / Edit Alamat</h2>

    @if (session()->has('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

    <form wire:submit.prevent="save" class="space-y-4">
      <div>
        <label>Nama Penerima</label>
        <input type="text" wire:model="receiver_name" class="w-full border px-3 py-2" />
        @error('receiver_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      </div>
      <div>
        <label>Phone Number</label>
        <input type="text" wire:model="phone_number" class="w-full border px-3 py-2" />
        @error('phone_number') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      </div>
      <div>
        <label>Provinsi</label>
        <input type="text" wire:model="province" class="w-full border px-3 py-2" />
        @error('province') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      </div>
      <div>
        <label>Kota</label>
        <input type="text" wire:model="city" class="w-full border px-3 py-2" />
        @error('city') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      </div>
      <div>
        <label>Postal Code</label>
        <input type="text" wire:model="postal_code" class="w-full border px-3 py-2" />
        @error('postal_code') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      </div>
      <div>
        <label>Detail</label>
        <textarea wire:model="detail" class="w-full border px-3 py-2"></textarea>
        @error('detail') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      </div>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
      </button>
    </form>
  </div>

  <!-- ADDRESS LIST -->
  <div class="border p-5 shadow-md overflow-y-auto max-h-[600px]">
    <h2 class="text-lg font-bold mb-4">Daftar Alamat</h2>

    <button wire:click="resetForm" class="mb-4 bg-green-600 text-white px-4 py-2 rounded">
      + Tambah Alamat Baru
    </button>

    @forelse ($address as $addr)
    <div class="border p-4 mb-4 rounded cursor-pointer hover:bg-slate-100 hover:border-slate-300
    @if($address_id == $addr->id)
      bg-slate-100 border-slate-300
    @endif
    " 
    wire:click="fillForm({{ $addr->id }})"
    >
      <p><strong>{{ $addr->receiver_name }}</strong></p>
      <p>{{ $addr->province }}, {{ $addr->city }}</p>
      <p>{{ $addr->postal_code }}</p>
      <p>{{ $addr->detail }}</p>
      <div class="flex space-x-4 mt-2">
      <!-- Tombol EDIT -->
      <button wire:click="fillForm({{ $addr->id }})" class="text-blue-600 hover:underline">
        Edit
      </button>

      <!-- Tombol DELETE -->
      <button wire:click="delete({{ $addr->id }})" class="text-red-600 hover:underline"
        onclick="return confirm('Yakin ingin menghapus alamat ini?')">
        Delete
      </button>
      </div>
    </div>
  @empty
    <p class="text-gray-500">Belum ada alamat.</p>
  @endforelse
  </div>
</div>