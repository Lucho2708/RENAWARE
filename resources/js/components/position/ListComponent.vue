<template>
  <div>
    <h5 class="card-tite">Empleados</h5>
    <br>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Cargo</th>
          <th scope="col">Salario</th>
          <th scope="col">Detalle</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="data in positions">
          <th>{{data.cargo}}</th>
          <th>{{data.salario}}</th>
          <th><button type="button" class="btn btn-info">Info</button></th>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  data(){
    return {
      positions: ''

    }
  },
  created() {
    this.getPosition();
  },methods: {
    getPosition()
    {
      axios.get('cargo/getPositionAll')
      .then(response =>{
        this.positions = response.data;
        console.log("Funciona");
      })
    }
  }
}
</script>
