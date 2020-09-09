<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Created Article</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<p>Selamat Saudara/i {{ $name }} , blog Anda yang berjudul "{{ $title }}", akan kami review. Kami akan mengirimkan email kepada Anda jika blog Anda sudah berhasil dipublish</p>
	<h5>Status Artikel</h5>
	@if($status == 0) 
		<p>Belum disetujui</p>
	@elseif ($status == 1) 
		<p>Sudah Disetujui</p>
	@endif
</body>
</html>