<template>
  <div>
    <h5 class="card-tite">Crear empleado</h5>
    <br>
    <form @submit.prevent="create">
      <div class="form-group">
        <label for="nombres">Nombres:</label>
        <input type="text" class="form-control" :class="{'is-invalid':this.errors.nombres!=null}" id="nombres" v-model="employee.nombres">
        <div class="invalid-feedback">
          {{}}
        </div>
      </div>
      <div class="form-group">
        <label for="documento">Documento:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.documento!=null}" id="documento" v-model="employee.documento">
        <div class="invalid-feedback">
          {{errors.documento}}
        </div>
      </div>
      <div class="form-group">
        <label for="telefono">Telefono:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.telefono!=null}" id="telefono" v-model="employee.telefono">
        <div class="invalid-feedback">
          {{errors.telefono}}
        </div>
      </div>
      <div class="form-group">
        <label for="direccion">Direccion:</label>
        <input type="text" class="form-control" :class="{'is-invalid':this.errors.direccion!=null}" id="direccion" v-model="employee.direccion">
        <div class="invalid-feedback">
          {{errors.direccion}}
        </div>
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
      errors:''
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
      .then( response => {
        this.employee.nombres  = '',
        this.employee.documento = '',
        this.employee.telefono = '',
        this.employee.direccion = '',
        this.employee.cargo = ''
        this.errors = []

      })
      .catch( error =>{
        this.errors = []
        if(error.response.status == 422){
          this.errors = (error.response.data.errors);
          console.log(this.errors);
        }
      });
    }
  }
}
</script>
