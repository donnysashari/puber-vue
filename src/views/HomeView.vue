<script setup>
</script>

<template>
  <main>
    <body>
      <h2 class="header" style="margin:auto;max-width:500px;padding:20px">Aplikasi pulang Bersama Santri</h2>
      <img src="../assets/photo1679237533.jpeg" style="margin:auto; max-width:300px">
      <form class="header" action="/action_page.php" style="margin:auto;max-width:500px">
        <input type="text" placeholder="Cari NIUP.." name="search2">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
      <p class="header" style="margin:auto;max-width:500px;padding:20px">MASUKKAN NIUP, JIKA ADA KENDALA SILAHKAN MENGHUBUNGI PANITIA BAGIAN DATA</p>
    </body>
  </main>
</template>

<style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  padding: 40px;
}

form.header input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.header button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #078d0e;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.header button:hover {
  background: #078d0e;
}

form.header::after {
  content: "";
  clear: both;
  display: table;
}
</style>
