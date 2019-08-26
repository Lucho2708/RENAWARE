<template>
  <div>
    <h5 class="card-tite">Crear empleado</h5>
    <div class="alert alert-danger" role="alert" aria-label="Close">
      A simple danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
    </div>
    <br>
    <form @submit.prevent="create">
      <div class="form-group">
        <label for="nombres">Nombres:</label>
        <input type="text" class="form-control" v-model="employee.nombres">
      </div>
      <div  class="invalid-feedback">
        Hola
      </div>
      <div class="form-group">
        <label for="documento">Documento:</label>
        <input type="number" class="form-control" v-model="employee.documento">
      </div>
      <div class="form-group">
        <label for="telefono">Telefono:</label>
        <input type="number" class="form-control" v-model="employee.telefono">
      </div>
      <div class="form-group">
        <label for="direccion">Direccion:</label>
        <input type="text" class="form-control" v-model="employee.direccion">
      </div>
      <div class="form-group">
        <label for="cargo">Cargo:</label>
        <select class="form-control" v-model="employee.cargo">
          <option disabled selected>Seleccionar:</option>
          <option value="">Tecnico</option>
          <option value="">Gerente</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Crear</button>
    </form>
  </div>
</template>

<script>
export default {
  data(){
    return{
      employees: [],
      employee: {nombres: '', documento: '', telefono: '', direccion:'', cargo:''},
      errors:[]
    }
  },
  methods:{
    create()
    {
      const params = {
        nombres:this.employee.nombres,
        documento:this.employee.documento,
        telefono:this.employee.telefono,
        direccion:this.employee.direccion,
        cargo:this.employee.cargo
      };
      axios.post('crear', params)
      .then(function (response){
        this.employee.nombres  = '',
        this.employee.documento = '',
        this.employee.telefono = '',
        this.employee.direccion = '',
        this.employee.cargo = ''

      })
      .catch(function (error){
        if (error.response.status == 422){
          errors.push(error.response.data.errors);
        }
      });
    }
  }
}
</script>
