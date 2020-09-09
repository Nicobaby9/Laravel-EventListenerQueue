<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Updated Article status</title>
    <link rel="stylesheet" href="">
</head>
<body>
	<h5>Status Artikel</h5>
	@if($status == 0)
		<p>Belum disetujui</p>
	@elseif ($status == 1)
		<p>Sudah Disetujui</p>
	@endif
    <p>Artikel anda yang berjudul "{{ $title }} telah disetujui dan sudah dipublikasi."</p>
    <h5>isi : </h5>
    <p> {{ $body }} </p>
</body>
</html>