<h1>Commande #{{ $order->id }}</h1>

<p><b>Statut :</b> {{ $order->status }}</p>
<p><b>Total :</b> {{ $order->total }} MAD</p>

<h3>Produits dans la commande</h3>

<table border="1" cellpadding="6">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total ligne</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product?->nom ?? $item->product?->name ?? 'Produit' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->unit_price }} MAD</td>
                <td>{{ $item->line_total }} MAD</td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('client.orders.index') }}">⬅ Retour</a>
