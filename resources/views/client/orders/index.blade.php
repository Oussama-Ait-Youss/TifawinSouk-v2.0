<h1>Mes commandes</h1>

@forelse($orders as $order)
    <div style="border:1px solid #ddd;padding:10px;margin:10px 0;">
        <b>Commande #{{ $order->id }}</b><br>
        Statut: {{ $order->status }}<br>
        Total: {{ $order->total }} MAD<br>

        <a href="{{ route('client.orders.show', $order) }}">
            Voir détails
        </a>
    </div>
@empty
    <p>Aucune commande trouvée.</p>
@endforelse

{{ $orders->links() }}
