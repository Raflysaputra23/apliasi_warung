<div class="container-fluid border mt-3 rounded-2 overflow-auto gx-0 p-2 shadow-sm d-flex flex-wrap justify-content-between position-relative" style="height: 65vh";>
	<!-- BUTTON MODAL -->
	<button id="tambahProduk" class="btn btn-primary position-fixed opacity-50 hover" style="bottom: 10%; right: 20%; z-index: 9999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
		<i class="fa fa-plus"></i>
		<div class="pover2 font-poppins" style="font-size: 12px;">Tambah Produk</div>
	</button>

	<!-- MODAL -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5 font-tilana" id="exampleModalLabel">Tambah Produk</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <form action="<?= Constant::BASEURL ?>product/tambahProduk" method="post" enctype="multipart/form-data" autocomplete="off">
	        	<div class="d-flex gap-4">
		        	<div class="form-group font-poppins mb-3 position-relative" style="flex-basis: 40%;">
		        		<img id="preview" src="" alt="" width="100%" height="180px" style="margin-top: 35px; border-radius: 10px;">
		        		<div class="rounded-circle border bg-primary position-absolute overflow-hidden" style="width: 40px; height: 40px; bottom: 0px; right: -12px;"><input id="upload" name="gambar_produk" type="file" style="width: 100%; height: 100%; opacity: 0;" class="position-absolute z-3"><i class="fa fa-camera position-absolute top-50 start-50 translate-middle text-white"></i></div>
		        	</div>
		        	<div class="" style="flex-basis: 60%;">
			        	<div class="form-group font-poppins mb-3">
			        		<label for="namaPoduk" class="mb-1">Nama Produk</label>
			        		<input type="text" name="nama_produk" class="form-control" required>
			        	</div>
			        	<div class="form-group font-poppins mb-3">
			        		<label for="stokProduk" class="mb-1">Stok</label>
			        		<input type="text" name="stok_produk" class="form-control" required>
			        	</div>
			        	<div class="form-group font-poppins mb-3">
			        		<label for="hargaPoduk" class="mb-1">Harga</label>
			        		<input type="text" name="harga_produk" class="form-control" required>
			        	</div>
		        	</div>
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Tambah</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>

	<?php if ($data['produk'] != []): ?>
	<?php foreach ($data['produk'] as $produk): ?>
	<div class="card mb-3 overflow-hidden position-relative" style="max-width: 440px; max-height: 200px; height: 200px;">
		<i class="fa fa-bars position-absolute propers d-none" style="font-size: 20px; transform: scaleX(.2); right: 2px; top: 5px;" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-content='
		  <div class="d-flex flex-column justify-content-center gap-2">
			<a href="<?= Constant::BASEURL ?>product/hapusProduk/<?= $produk["id_produk"]?>" class="btn btn-outline-danger hapusProduk"><i class="fa fa-trash"></i></a>
			<a href="" class="btn btn-outline-warning"><i class="fa fa-pencil"></i></a>
		  </div>
			'>
		</i>
	  <div class="row g-0" style="height: 100%;">
	    <div class="col-md-6 position-relative">
	    	<?php if ($produk['stok_produk'] > 0): ?>
	    	<img src="img/<?= $produk['gambar_produk']?>" class="img-fluid rounded-start" style="height: 100%;" alt="...">
	    	<?php else : ?>
	      	<h2 class="position-absolute font-tilana m-0 py-1 bg-danger start-50 top-50 translate-middle text-center text-white" style="width: 100%;">SOLD OUT</h2>
	      	<img src="img/<?= $produk['gambar_produk']?>" class="img-fluid rounded-start" style="height: 100%;" alt="...">
	    	<?php endif ; ?>
	    </div>
	    <div class="col-md-6">
	      <div class="card-body">
	        <h5 class="card-title font-poppins fw-bold"><?= $produk['nama_produk']?></h5>
	        <p class="card-text" style="line-height: 2px; font-size: 14px;"><small class="text-body-secondary"><?= $produk['current_at']?></small></p>
	        <div class="mt-4 d-flex gap-1">
		        <div class="border rounded-3 d-flex flex-column align-items-center justify-content-between font-poppins py-1 gap-1" style=" flex-grow: 1;">
		        	<p class=" m-0">Stok</p>
		        	<p class="lh-1 m-0 "><small class="text-body-secondary"><?= $produk['stok_produk']?></small></p>
		        </div>
		        <div class="border rounded-3 d-flex flex-column align-items-center justify-content-between font-poppins py-1 gap-1" style=" flex-grow: 2;">
		        	<p class=" m-0">Harga</p>
		        	<p class="lh-1 m-0"><small class="text-body-secondary">Rp.<?= number_format($produk['harga_produk'],0,',','.')?></small></p>
		        </div>
	        </div>
	        <div class="mt-3">
	        	<?php if ($produk['stok_produk'] > 0): ?>
	        		<a href="<?= Constant::BASEURL ?>product/pembayaran/<?= $produk['id_produk']?>/<?= $_SESSION['id_user']?>/<?= $produk['harga_produk'] ?>" class="btn btn-primary">Pesan</a>
	        		<a href="<?= Constant::BASEURL ?>product/plusKeranjang/<?= $produk['id_produk']?>/<?= $_SESSION['id_user']?>/<?= $produk['harga_produk'] ?>" class="btn btn-outline-danger"><i class="fa fa-shopping-cart"></i></a>
	        	<?php else : ?>
	        		<button class="btn btn-primary" disabled>Pesan</button>
	        		<button class="btn btn-outline-danger" disabled><i class="fa fa-shopping-cart"></i></button>
	        	<?php endif ; ?>		        	
		        
			</div>
	      </div>
	    </div>
	  </div>
	</div>
	<?php endforeach ?>

	<?php else: ?>
		<h2 class="font-poppins m-auto">Produk belum tersedia <i class="fa fa-search"></i></h2>
	<?php endif; ?>
</div>


<script>
	// FUNGSI UNTUK MENAMPILKAN GAMBAR
  const upload = document.getElementById('upload');
   upload.addEventListener('change', function(event) {
    let file = event.target.files[0];
    let reader = new FileReader();

    reader.onload = function(e) {
      let img = document.getElementById('preview');
      img.src = e.target.result;         
    };
    reader.readAsDataURL(file);
    })
</script>