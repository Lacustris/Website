<html>
<body>
<h1>Nieuwe aanmelding via de website</h1>
<table>
@foreach($info as $key => $value)
<tr>
	<td>{{ $key }}</td>
	<td>{{ $value }}</td>
</tr>
@endforeach
</table>

</body>
</html>
