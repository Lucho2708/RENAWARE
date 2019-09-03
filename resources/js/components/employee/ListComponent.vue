<template>
  <div>
    <h5 class="card-tite">Empleados</h5>
    <br>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Nombres</th>
          <th scope="col">Telefono</th>
          <th scope="col">Cargo</th>
          <th scope="col">Detalle</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="data in positions">
          <th>{{data.employee.nombres}}</th>
          <th>{{data.employee.telefono}}</th>
          <th>{{data.cargo}}</th>
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
    positions: []

    }
  },
  created(){
    this.getEmployee();
  },
  methods: {
    getEmployee()
    {
      axios.get('empleado/getEmployeeAll')
      .then( response =>{
        this.positions = response.data;

        console.log(this.positions);
      });
    }
  }
}
</script>
