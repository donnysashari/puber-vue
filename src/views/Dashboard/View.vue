<script setup>
import axios from "axios";
</script>


<template>
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
              <button class="nav-link" @click="logout">Log Out</button>
            </li>
          </ul>
        </div>
      </div>
      </nav>
  <main class="d-flex flex-nowrap">
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
          <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                  <span data-feather="home" class="align-text-bottom"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file" class="align-text-bottom"></span>
                  Area Sebaran
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                  Santri
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users" class="align-text-bottom"></span>
                  Dropspot
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                  Badan Keamanan & Ketertiban
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers" class="align-text-bottom"></span>
                  E-Bekal Santri
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers" class="align-text-bottom"></span>
                  Bendahara Pesantren
                </a>
              </li>
            </ul>

          </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" >
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="form-row">
                <div class="form-group col-md-12 col-sm-12">
                <button class="btn btn-success btn-sm float-right" @click="AddNew()">Tambah Santri</button>
                <b-button v-b-modal.modal-xl variant="success">Tambah Santri</b-button>
            </div>
              </div>
          </div>
          </div>

          <h2 >Table</h2>
          <div class="scrolling longdiv">
            <table class="table table-striped myTable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIUP</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Desa</th>
                  <th scope="col">Kecamatan</th>
                  <th scope="col">Kabupaten</th>
                  <th scope="col">Provinsi</th>
                  <th scope="col">Kamar</th>
                  <th scope="col">Daerah</th>
                  <th scope="col">Wilayah</th>
                  <th scope="col">Nomor Wali</th>
                  <th scope="col">Status Kepulangan</th>
                  <th scope="col">Lembaga</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Valid Dropspot</th>
                  <th scope="col">Tarif</th>
                  <th scope="col">Pembayaran</th>
                  <th scope="col">Cek Bayar</th>
                  <th scope="col">My Bus</th>
                  <th scope="col">Pendamping</th>
                  <th scope="col">Nomor HP Pendamping</th>
                  <th scope="col">Keterangan Tarif Dropspot</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <tr v-for="data in Users">
                  <td>{{data.id}}</td>
                  <td>{{data.niup}}</td>
                  <td>{{data.nama_santri}}</td>
                  <td>{{data.desa}}</td>
                  <td>{{data.kecamatan}}</td>
                  <td>{{data.kabupaten}}</td>
                  <td>{{data.provinsi}}</td>
                  <td>{{data.kamar}}</td>
                  <td>{{data.daerah}}</td>
                  <td>{{data.wilayah}}</td>
                  <td>{{data.nomor_wali}}</td>
                  <td>{{data.status_kepulangan}}</td>
                  <td>{{data.lembaga}}</td>
                  <td>{{data.jenis_kelamin}}</td>
                  <td>{{data.valid_dropspot}}</td>
                  <td>{{data.tarif}}</td>
                  <td>{{data.pembayaran}}</td>
                  <td>{{data.cek_bayar}}</td>
                  <td>{{data.my_bus}}</td>
                  <td>{{data.pendamping}}</td>
                  <td>{{data.no_hp_pendamping}}</td>
                  <td>{{data.keterangan_tarif_dp}}</td>

                  <td> 
                    <button class="btn btn-info btn-sm"  @click="editUsers(data)">Edit</button>
                  </td>

                </tr>

                <tr>
                  <td>1,002</td>
                  <td>placeholder</td>
                  <td>irrelevant</td>
                  <td>visual</td>
                  <td>layout</td>
                </tr>
                
              </tbody>
            </table>
          </div>

          <!-- add users model -->

          <div class="modal fade" id="Users" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editLabel" >Tambah Santri Baru</h5>
                  <!--<h5 class="modal-title" id="editLabel" v-show="!addModal">Memperbaharui Info Santri</h5> -->

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <form action="" method="POST">

                <div class="modal-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="niup">NIUP</label>
                        <input type="text" name="niup" class="form-control" id="niup" placeholder="NIUP" v-model="UsersData.niup" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nama_santri">Nama Santri</label>
                        <input type="text" name="name" class="form-control" id="nama_santri" placeholder="Nama Santri" v-model="UsersData.nama_santri">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="desa">Desa</label>
                        <input type="text" name="desa" class="form-control" id="desa" placeholder="Desa" v-model="UsersData.desa" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" v-model="UsersData.kecamatan">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="kabupaten">Kabupaten</label>
                        <input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="Kabupaten" v-model="UsersData.kabupaten" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" name="name" class="form-control" id="provinsi" placeholder="Provinsi" v-model="UsersData.provinsi">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="kamar">Kamar</label>
                        <input type="text" name="kamar" class="form-control" id="kamar" placeholder="Kamar" v-model="UsersData.kamar" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="daerah">Daerah</label>
                        <input type="text" name="daerah" class="form-control" id="daerah" placeholder="Daerah" v-model="UsersData.daerah">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="wilayah">Wilayah</label>
                        <input type="text" name="wilayah" class="form-control" id="wilayah" placeholder="Wilayah" v-model="UsersData.wilayah" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nomor_wali">Nomor Wali</label>
                        <input type="text" name="nomor_wali" class="form-control" id="nomor_wali" placeholder="628xxxxxx" v-model="UsersData.nomor_wali">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="status_kepulangan">Status Kepulangan</label>
                        <input type="text" name="status_kepulangan" class="form-control" id="status_kepulangan" placeholder="Status Kepulangan" v-model="UsersData.status_kepulangan" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="lembaga">Lembaga</label>
                        <input type="text" name="Lembaga" class="form-control" id="Lembaga" placeholder="Lembaga" v-model="UsersData.lembaga">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6 mt-4">
                        Laki <input type="radio" name="gander" id="gander" value="Laki" v-model="UsersData.jenis_kelamin">
                        Perempuan <input type="radio" name="gander"  id="gander" value="Perempuan" v-model="UsersData.jenis_kelamin">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="valid_dropspot">Valid Dropspot</label>
                        <input type="text" name="valid_dropspot" class="form-control" id="valid_dropspot" placeholder="Valid Dropspot" v-model="UsersData.valid_dropspot" >
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="tarif">Tarif</label>
                        <input type="text" name="tarif" class="form-control" id="tarif" placeholder="Tarif" v-model="UsersData.tarif" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="pembayaran">Pembayaran</label>
                        <input type="text" name="pembayaran" class="form-control" id="pembayaran" placeholder="Pembayaran" v-model="UsersData.pembayaran">
                      </div>
                    </div>
                    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="cek_bayar">Cek Bayar</label>
                        <input type="text" name="cek_bayar" class="form-control" id="cek_bayar" placeholder="Cek Bayar" v-model="UsersData.cek_bayar" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="my_bus">My Bus</label>
                        <input type="text" name="my_bus" class="form-control" id="my_bus" placeholder="My Bus" v-model="UsersData.my_bus">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="pendamping">Pendamping</label>
                        <input type="text" name="pendamping" class="form-control" id="pendamping" placeholder="Pendamping" v-model="UsersData.pendamping" >
                      </div>
                      <div class="form-group col-md-6">
                        <label for="no_hp_pendamping">No HP Pendamping</label>
                        <input type="text" name="no_hp_pendamping" class="form-control" id="no_hp_pendamping" placeholder="No HP Pendamping" v-model="UsersData.no_hp_pendamping">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="keterangan_tarif_dp">Keterangan Tarif DP</label>
                        <input type="text" name="keterangan_tarif_dp" class="form-control" id="keterangan_tarif_dp" placeholder="Keterangan Tarif DP" v-model="UsersData.keterangan_tarif_dp" >
                      </div>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button  type="button" class="btn btn-primary" @click="AddUsers()">Add Users</button>
                </div>
                  </form>

              </div>
            </div>
          </div> 
          <!-- ad user modal end -->
        </main>
      </div>
    </div>


  </main>
</template>

<script>

  export default {
    name: "users",
    
    data() {
    return {
      modal:null,
      editModal:false,
      addModal:true,
      UsersData:{
        niup:null,
        nama_santri:null,
        desa:null,
        kecamatan:null,
        kabupaten:null,
        provinsi:null,
        kamar:null,
        daerah:null,
        wilayah:null,
        nomor_wali:null,
        status_kepulangan:null,
        lembaga:null,
        jenis_kelamin:null,
        dropspot:null,
        tarif:null,
        pembayaran:null,
        cek_bayar:null,
        my_bus:null,
        pendamping:null,
        nomor_hp_pendamping:null,
        keterangan_tarif_dp:null,
      },
      Users:[],
    };
  },

  created(){
  this.getUsers();
  },

    methods: {
      CobaModal(){
        window.jQuery("#Users").modal('show');
      },

      AddNew(){
      this.editModal=false;
      window.jQuery("#Users").modal('show');
      },

      AddUsers(){
      let data= new FormData();
      data.append("niup" ,this.UsersData.niup);
      data.append("nama_santri" ,this.UsersData.nama_santri);
      data.append("desa" ,this.UsersData.desa);
      data.append("kecamatan" ,this.UsersData.kecamatan);
      data.append("provinsi" ,this.UsersData.provinsi);
      data.append("kamar" ,this.UsersData.kamar);
      data.append("daerah" ,this.UsersData.daerah);
      data.append("wilayah" ,this.UsersData.wilayah);
      data.append("nomor_wali" ,this.UsersData.nomor_wali);
      data.append("status_kepulangan" ,this.UsersData.status_kepulangan);
      data.append("lembaga" ,this.UsersData.lembaga);
      data.append("jenis_kelamin" ,this.UsersData.jenis_kelamin);
      data.append("valid_dropspot" ,this.UsersData.valid_dropspot);
      data.append("tarif" ,this.UsersData.tarif);
      data.append("pembayaran" ,this.UsersData.pembayaran);
      data.append("cek_bayar" ,this.UsersData.cek_bayar);
      data.append("my_bus" ,this.UsersData.my_bus);
      data.append("pendamping" ,this.UsersData.pendamping);
      data.append("no_hp_pendamping" ,this.UsersData.no_hp_pendamping);
      data.append("keterangan_tarif_dp" ,this.UsersData.keterangan_tarif_dp);
      axios.post('http://localhost/vue-crud-puber/puber-vue/puber-vue/src/api/api.php?action=addusers',data).then((res)=>{
        if(res.data.error){
          alert("Error");
        }else{
      window.jQuery("#Users").modal('hide');
      this.getUsers();
          alert(res.data.message);
        }
      }).catch((err)=>{
        console.log(err);
      })
      },

      getUsers(){
        axios.get('http://localhost/vue-crud-puber/puber-vue/puber-vue/src/api/api.php?action=getuserinfo').then((res)=>{
          console.log(res.data.user_Data);
          this.Users=res.data.user_Data;
        }).catch((err)=>{
          console.log(err);
        })
      },

      editUsers(userid){
        this.editModal=true;
        this.addModal=false;


        this.UsersData =userid;
        window.jQuery("#Users").modal('show');

      },

      logout() {
        axios.post("http://localhost/vue-crud-puber/puber-vue/puber-vue/src/api/api.php?action=logout")
        .then(res => { 
          alert(res.message);
          this.$router.push("/");
        })
      }
    }
  }
</script>

<style>
* {
  box-sizing: border-box;
}


.myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
  overflow-x:auto;
}

.myTable th, .myTable td {
  text-align: left;
  padding: 40px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

#scrolling {
  overflow: hidden;
  width: 1500px;
  display: block;
  position: relative;
  border: 1px solid blue;
}
#longdiv {
  width: 1500px;
  height: 2000px;
  border: 1px solid red;
}

</style>