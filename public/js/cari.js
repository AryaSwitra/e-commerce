// console.log('ok');

// ambil element yang di butuhkan
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('isi');

// tombolCari.addEventListener('click', function() {
// 	alert('berhasil!!');
// });


// tambahkan event ketikan keyword di tulis
keyword.addEventListener('keyup', function(){

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
	xhr.open('GET', '/data?keyword=' + keyword.value, true); //membuat koneksi ajax
	xhr.send(); // untuk menjalankan ajax
});