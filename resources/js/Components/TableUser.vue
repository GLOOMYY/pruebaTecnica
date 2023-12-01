<script>
export default {
  data() {
    return {
      items: []
    };
  },
  mounted() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
      try {
        const response = await fetch("http://127.0.0.1:8000/api/v1/usuarios/", {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        });

        if (response.ok) {
          const data = await response.json(); 
          this.items = data; // Asegúrate de que 'data' sea la estructura correcta de tu respuesta
        } else {
          console.error('Error al obtener los datos:', response.status);
          console.error(response)
        }
      } catch (error) {
        console.error('Error en la solicitud:', error);
      }
    },
    formatDate(dateString) {
      // Función para dar formato a la fecha
      return new Date(dateString).toLocaleString();
    }
  }
};


</script>


<template>
    <div>
      <h1>Dashboard</h1>
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Last</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Created at</th>
            <th scope="col">Change Status</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="index">
            <th scope="row">{{ user.id }}</th>
            <td>{{ user.name }}</td>
            <td>{{ user.lastname }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.active==1 ? "Activo":"Inactivo" }}</td>
            <td>{{ formatDate(user.created_at) }}</td>
            <td>
              <button class="btn btn-primary">Activar/Desactivar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
