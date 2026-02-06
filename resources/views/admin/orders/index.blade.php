<h1>Admin - Gestion des commandes</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endifl

@foreach($orders as $order)
    <div style="border:1px solid #ddd;padding:10px;margin:10px 0;">
        <b>Commande #{{ $order->id }}</b><br>
        Client: {{ $order->user?->name ?? 'Client' }}<br>
        Total: {{ $order->total }} MAD<br>

        <form method="POST" action="{{ route('admin.orders.status', $order) }}">
            @csrf
            @method('PATCH')

            <select name="status">
                @foreach(['pending','shipped','delivered','canceled'] as $s)
                    <option value="{{ $s }}" @selected($order->status === $s)>{{ $s }}</option>
                @endforeach
            </select>

            <button type="submit">Mettre à jour</button>
        </form>
    </div>
@endforeach

{{ $orders->links() }}
