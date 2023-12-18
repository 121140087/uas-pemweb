<!-- <?php
session_start();
include "database_connect.php";

// check cookie
if (!isset($_COOKIE['user_id'])) {
  header("Location: index.php");
  exit();
}
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Toko Ikan - Home</title>
  <link rel="stylesheet" type="text/css" href="home.css" />
</head>

<body>
  <div class="menu">
    <!-- TAMBAH IKAN -->
    <form class="form" action="ikan_tambah.php" method="post">
      <h2>Tambah Ikan</h2>
      <label for="kode">Kode Ikan:</label>
      <input class="input-field" type="text" name="kode" />

      <br />
      <label for="nama">Nama Ikan:</label>
      <input class="input-field" type="text" name="nama" />

      <br />
      <label for="jenis">Jenis Ikan:</label>
      <div class="radio-container">
        <input type="radio" id="Ikan Hias" name="jenis" value="Ikan Hias" />
        <label for="Ikan Hias">Ikan Hias</label>

        <input type="radio" id="Ikan Ternak" name="jenis" value="Ikan Ternak" />
        <label for="Ikan Ternak">Ikan Ternak</label>
      </div>

      <br />
      <label for="habitat">Habitat:</label>
      <select name="habitat" id="habitat" class="input-field">
        <option selected value="Air Tawar">Air Tawar</option>
        <option value="Air Asin">Air Asin</option>
        <option value="Air Payau">Air Payau</option>
      </select>

      <br />
      <label for="stock">Stock Ikan:</label>
      <input class="input-field" type="number" name="stock" />

      <br />
      <input type="submit" value="Tambah Ikan" />
    </form>

    <!-- EDIT IKAN -->
    <form class="form" action="ikan_edit.php" method="post">
      <h2>Edit Ikan</h2>
      <label for="kode">Kode Ikan:</label>
      <input class="input-field" type="text" name="kode" />

      <br />
      <label for="nama">Nama Ikan:</label>
      <input class="input-field" type="text" name="nama" />

      <br />
      <label for="jenis">Jenis Ikan:</label>
      <div class="radio-container">
        <input type="radio" id="Ikan Hias - edit" name="jenis" value="Ikan Hias" />
        <label for="Ikan Hias">Ikan Hias</label>

        <input type="radio" id="Ikan Ternak - edit" name="jenis" value="Ikan Ternak" />
        <label for="Ikan Ternak">Ikan Ternak</label>
      </div>

      <br />
      <label for="habitat">Habitat:</label>
      <select name="habitat" id="habitat-edit" class="input-field">
        <option selected value="Air Tawar">Air Tawar</option>
        <option value="Air Asin">Air Asin</option>
        <option value="Air Payau">Air Payau</option>
      </select>

      <br />
      <label for="stock">Stock Ikan:</label>
      <input class="input-field" type="number" name="stock" />

      <br />
      <input type="submit" value="Edit Ikan" />
    </form>

    <!-- HAPUS IKAN -->
    <form class="form" action="ikan_hapus.php" method="get">
      <h2>Hapus Ikan</h2>
      <label for="del">Kode Ikan:</label>
      <input class="input-field" type="text" name="del" />

      <br />
      <input type="submit" value="Hapus Ikan" />
    </form>
  </div>

  <button class="logout" onclick="Keluar()">Keluar</button>

  <select class="filter" onchange="AmbilData()">
    <option value="">Pilih Habitat</option>
    <option value="Air Tawar">Air Tawar</option>
    <option value="Air Asin">Air Asin</option>
    <option value="Air Payau">Air Payau</option>
  </select>

  <!-- TABEL IKAN -->
  <div class="table-container">
    <table>
      <thead>
        <th>Kode Ikan</th>
        <th>Nama Ikan</th>
        <th>Jenis Ikan</th>
        <th>Habitat</th>
        <th>Stock</th>
      </thead>
      <tbody class="table-body"></tbody>
    </table>
  </div>

  <script>
    function CekCookie() {
      var userIdCookie = AmbilCookie("user_id");
      if (!userIdCookie) {
        window.location.href = "index.php";
      }
    }

    function AmbilCookie(name) {
      var match = document.cookie.match(
        new RegExp("(^| )" + name + "=([^;]+)")
      );
      return match ? match[2] : null;
    }

    AmbilData();
    // checkCookie();

    function Keluar() {
      document.cookie =
        "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      window.location.href = "index.php";
    }

    function AmbilData() {
      const habitat = document.querySelector(".filter").value;

      const fetchUrl = habitat
        ? `ikan_data.php?habitat=${encodeURIComponent(habitat)}`
        : "ikan_data.php";

      fetch(fetchUrl)
        .then((response) => {
          if (!response.ok) {
            throw new Error("Network response was not ok");
          }
          return response.json();
        })
        .then((data) => {
          TampilData(data);
        })
        .catch((error) => {
          console.error(
            "There was a problem with the fetch operation:",
            error
          );
        });
    }

    function TampilData(data) {
      const tableBody = document.querySelector(".table-body");
      tableBody.innerHTML = "";

      if (data.length != 0) {
        data.forEach((row) => {
          const tr = `<tr><td>${row.kode}</td><td>${row.nama}</td><td>${row.jenis}</td><td>${row.habitat}</td><td>${row.stock}</td></tr>`;
          tableBody.innerHTML += tr;
        });
      } else {
        tableBody.innerHTML += `<tr><td colspan="6">Data Tidak Ditemukan</td></tr>`;
      }
    }
  </script>
</body>

</html>