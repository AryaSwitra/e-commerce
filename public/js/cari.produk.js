// console.log('ok');

// ambil element yang di butuhkan
var kunci = document.getElementById('kunci');
var tombol = document.getElementById('tombol');
var container = document.getElementById('containerisi');

// tombolCari.addEventListener('click', function() {
// 	alert('berhasil!!');
// });


// tambahkan event ketikan kunci di tulis
kunci.addEventListener('keyup', function(){

	// buat object ajax
	var xhr = new XMLHttpRequest();

	// cek kesiapan ajax 
	xhr.onreadystatechange = function(){
		if (xhr.readyState == 4 && xhr.status == 200) {
			// console.log(xhr.responseText); //mengambil isi data ajax/coba.txt

			container.innerHTML = xhr.responseText; //mengambil isi folder ajax/mahasiswa.php
		}
	}

	// eksekusi ajax
	xhr.open('GET', '/data_produk?kunci=' + kunci.value, true); //membuat koneksi ajax
	xhr.send(); // untuk menjalankan ajax
});