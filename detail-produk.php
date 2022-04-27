<?php
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> BukaWarung_RIZKYA S </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">	
			<h1><a href="index.php"> Buka Warung </a></h1>
				<ul>
					<li><a href="produk.php"> Produk </a></li>
				</ul>
		</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>" >
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>


	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h2> Detail Produk </h2>
			<div class="box">
				<div class="col-2">
					<img src="produk/<?php echo $p->product_image ?> " width="50%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->product_name ?></h3>
					<h4> Rp. <?php echo number_format($p->product_price) ?></h4>
					<p> Deskripsi : <br>
						<?php echo $p->product_description ?>	
					</p>
					<p>
						<a href="https://wa.me/6285742217624" target="_blank">
							<b><h3>Klik dibawah ini untuk memesannya :</h3></b> 
							<i><h3>Hubungin Via WhatsApp .<img src="img/whatsapp.png" width="7%"></h3></i>
						</a>
					</p>


				</div>
			</div>
		</div>		
	</div>


	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4> Alamat </h4>
			<p><?php echo $a->admin_address ?></p>

			<h4> Email </h4>
			<p> <?php echo $a->admin_email ?> </p>

			<h4> No. HP </h4>
			<p> <?php echo $a->admin_telp ?> </p>

			<small> Copyright &copy; 2022 - Bukawarung. </small>
		</div>
	</div>

</body>
</html>