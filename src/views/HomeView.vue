<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <RouterLink class="navbar-brand" to="/">Pulang Bersama Santri</RouterLink>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <RouterLink class="nav-link active" to="/">Home</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink class="nav-link" to="/login">Login</RouterLink>
            </li>
          </ul>
        </div>
      </div>
      </nav>
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
