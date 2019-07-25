<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Pedido</title>
</head>
<body>
	<p>Se ha realizado un nuevo pedido</p>
	<p>Estos son los datos del cliente que realizó el pedido</p>
	<ul>
		<li>
			<strong>Nombre:</strong>
			{{  $user->name }}
		</li>
		<li>
			<strong>E-mail:</strong>
			{{ $user->email }}
		</li>
		<li>
			<strong>Fecha del pedido:</strong>
			{{  $cart->order_date }}
		</li>
	</ul>
	<hr>
	<p>Y este es el detalle del pedido:</p>
	<ul>
		@foreach($cart->details as $detail)
		<li>
			{{ $detail->product_name}} x {{ $detail->quantity }}
			($ {{ $detail->quantity * $detail->product->price }})
		</li>
		@endforeach
	</ul>
	<p>
		<strong>Y este es el importe a pagar: </strong>{{ $cart->total }}
	</p>
	<p>
		<a href="{{ url('/admin/order/'.$cart->id) }}">Haz click aquí</a> para ver más información sobre este pedido.
	</p>
</body>
</html>
</html>