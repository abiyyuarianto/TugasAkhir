//ambil dulu elemen2 yang di butuhkan
var search = document.getElementById('search');
var kurung = document.getElementById('kurung');

//tambahkan event ketika keyword di isi
search.addEventListener('keyup', function () {
    //buat object ajax
    var xhr = new XMLHttpRequest();
    //cek kesiapan ajax nya
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            kurung.innerHTML = xhr.responseText;
        }
    }
    //open
    xhr.open('GET', 'ajax/nama.php?=search' + search.value, true);
    xhr.send();
})

