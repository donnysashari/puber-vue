<script setup>
import { RouterLink, RouterView } from 'vue-router'
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
              <RouterLink class="nav-link" to="/login">Login</RouterLink>
            </li>
          </ul>
        </div>
      </div>
      </nav>
<body>

<h2 class="text-center p-2">Login Form</h2>

<form method="POST" @submit.prevent="onLogin">
  <div class="imgcontainer">
    <img src="../assets/photo1679237533.jpeg" class="avatar">
  </div>

  <div class="container">
    <label for="User" ><b>Username</b></label>
    <input type="text" placeholder="Enter Username" class="form-control" id="User" name="username" v-model="Admin.username" >

    <label for="User"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" class="form-control" name="password" v-model="Admin.password" >
        
    <button type="submit">Login</button>
  </div>
</form>
</body>

</template>

<script>
import axios from "axios";
export default {
  name: "LoginView", 
  data(){
    return{
      Admin:{
        username: null,
        password: null
      }
    }
  },
  methods:{
    onLogin(){
      var data = new FormData();
      data.append('username',this.Admin.username);
      data.append('password',this.Admin.password);
      axios.post("http://localhost/vue-crud-puber/puber-vue/puber-vue/src/api/api.php?action=login" , data)
      .then(res => {
          if (res.data.error) {
            console.log("Error", res.data);
            alert(res.data.message);
          } else {
            console.log("Success", res.data.message);
            alert(res.data.message);
            this.$router.push("/dashboard");
          }
        })
    }
  }
}
</script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
