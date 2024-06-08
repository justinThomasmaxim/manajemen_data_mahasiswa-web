// SEARCH MAHASISWA
let searchMahasiswa = document.getElementById("search-mahasiswa");
let daftarMahasiswa = document.getElementById("daftar-mahasiswa");

searchMahasiswa.addEventListener("keyup", function () {
  // buat objek ajax
  let ajax = new XMLHttpRequest();

  // cek kesiapan ajax
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      // console.log(ajax.responseText);
      daftarMahasiswa.innerHTML = ajax.responseText;
    }
  };

  // eksekusi ajax
  ajax.open(
    "GET",
    "./ajax/search_daftar_mahasiswa.php?search=" + searchMahasiswa.value,
    true
  );
  ajax.send();
});

// SEARCH MATAKULIAH
let searchMatakuliah = document.getElementById("search-matakuliah");
let daftarMatakuliah = document.getElementById("daftar-matakuliah");

searchMatakuliah.addEventListener("keyup", function () {
  // buat objek ajax
  let ajax = new XMLHttpRequest();

  // cek kesiapan ajax
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      // console.log(ajax.responseText);
      daftarMatakuliah.innerHTML = ajax.responseText;
    }
  };

  // eksekusi ajax
  ajax.open(
    "GET",
    "./ajax/search_daftar_matakuliah.php?search=" + searchMatakuliah.value,
    true
  );
  ajax.send();
});

// SEARCH NILAI
let searchNilai = document.getElementById("search-nilai");
let daftarNilai = document.getElementById("daftar-nilai");

searchNilai.addEventListener("keyup", function () {
  // buat objek ajax
  let ajax = new XMLHttpRequest();

  // cek kesiapan ajax
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      // console.log(ajax.responseText);
      daftarNilai.innerHTML = ajax.responseText;
    }
  };

  // eksekusi ajax
  ajax.open(
    "GET",
    "./ajax/search_daftar_nilai.php?search=" + searchNilai.value,
    true
  );
  ajax.send();
});
