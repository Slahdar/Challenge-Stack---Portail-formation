<template>
    <div class="login-container">
      <form @submit.prevent="submitForm">
        <div>
          <label for="username">Nom d'utilisateur:</label>
          <br>
          <input type="text" id="username" v-model="username">
        </div>
        <div>
          <label for="password">Mot de passe:</label>
          <br>
          <input type="password" id="password" v-model="password">
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        username: '',
        password: '',
      };
    },
    methods: {
      submitForm() {
        const userData = {       
    username: this.username,
    password: this.password,
  };
  fetch('url api symfony', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(userData),
  })
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error('Error:', error));
        console.log(this.username, this.password);
      }
    }
  }
  </script>
  
  <style>
  .login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .login-container button{
    margin: auto;
  }
  </style>