<div id="cart-dropdown" class="absolute right-0 z-50 w-80 p-4 mt-2 bg-white border rounded shadow-lg hidden">
    <h4 class="mb-2 text-sm font-semibold">Votre panier</h4>
    <div id="cart-items" class="space-y-2 max-h-64 overflow-auto">
        <p class="text-sm text-gray-500">Aucun produit dans le panier.</p>
    </div>
    <div class="mt-3">
        <div class="flex items-center justify-between">
            <span class="text-sm font-medium">Total</span>
            <span id="cart-total" class="text-sm font-bold">0 DH</span>
        </div>
        <div class="mt-3">
            <form id="checkout-form" method="POST" action="{{ route('orders.store') }}">
                @csrf
                <button type="submit" class="w-full px-4 py-2 text-white bg-purple-600 rounded hover:bg-purple-700">Passer la commande</button>
            </form>
        </div>
    </div>
</div>
