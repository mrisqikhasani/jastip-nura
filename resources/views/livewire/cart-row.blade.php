<tr class="h-[100px] border-b">
    <td class="align-middle">
        <div class="flex">
            <div class="ml-3 flex flex-col justify-center">
                <p class="text-xl font-bold">{{ $cartItem->product->name }}</p>
            </div>
        </div>
    </td>
    <td class="mx-auto text-center">Rp {{ number_format($cartItem->product->price) }}</td>
    <td class="align-middle">
        <div class="flex items-center justify-center">
            <button
                class="quantity-btn flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100"
                wire:click="decreaseQty">
                -
            </button>
            <div class="flex h-8 w-8 items-center justify-center border-t border-b">
                {{ $cartItem->quantity }}
            </div>
            <button
                class="quantity-btn flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100"
                wire:click="increaseQty">
                +
            </button>
        </div>
    </td>
    <td class="mx-auto text-center">
        Rp {{ number_format($cartItem->product->price * $cartItem->quantity) }}
    </td>
    <td class="align-middle">
        <button wire:click="$emit('deleteCartItem', {{ $cartItem->id }})" class="delete-btn">
            <!-- SVG Icon Here -->
        </button>
    </td>
</tr>
