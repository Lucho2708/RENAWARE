<template>
  <div>
    <h5 class="card-tite">Crear empleado</h5>
    <br>
    <div v-if="notificacion == 1" class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Ojo!</strong> Actualmente no cuenta con cargos nuevos para asignar al empleado, por favor cree un nuevo cargo.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <br>
    <form @submit.prevent="create">
      <div class="form-group">
        <label for="nombres">Nombres:</label>
        <input type="text" class="form-control" :class="{'is-invalid':this.errors.nombres!=null}" id="nombres" v-model="employee.nombres" :disabled="this.positions==''">
        <div class="invalid-feedback" v-for="data in errors.nombres">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="documento">Documento:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.documento!=null}" id="documento" v-model="employee.documento" :disabled="this.positions==''">
        <div class="invalid-feedback" v-for="data in errors.documento">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="telefono">Telefono:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.telefono!=null}" id="telefono" v-model="employee.telefono" :disabled="this.positions==''">
        <div class="invalid-feedback" v-for="data in errors.telefono">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="direccion">Direccion:</label>
        <input type="text" class="form-control" :class="{'is-invalid':this.errors.direccion!=null}" id="direccion" v-model="employee.direccion" :disabled="this.positions==''">
        <div class="invalid-feedback"  v-for="data in errors.direccion">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="cargo">Cargo:</label>
        <select class="form-control" :class="{'is-invalid':this.errors.cargo!=null}" v-model="employee.cargo" :disabled="this.positions==''">
          <option value="" selected disabled>Seleccionar</option>
          <option v-model="employee.cargo" v-bind:value="data.id" v-for="data in positions">{{data.cargo}}</option>
        </select>
        <div class="invalid-feedback" v-for="data in errors.cargo">
          {{data}}
        </div>
      </div>
      <button type="submit" class="btn btn-success" :disabled="this.positions==''">Crear</button>
    </form>
    {{notificacion}}
  </div>
</template>

<script>
export default {
  data(){
    return{
      employees: [],
      employee: {nombres: '', documento: '', telefono: '', direccion:'', cargo:''},
      errors:'',
      positions: '',
      notificacion: 0
    }
  },
  created:  function() {
    this.getPosition();
    this.validateNull();
  },
  methods:{
    getPosition()
    {
      axios.get('getPosition')
      .then(response =>{
        this.positions = response.data;
      })
    },
    validateNull()
    {
      if (this.position==null) {
        this.notificacion=1;
        return this.notificacion;
        console.log(this.notificacion);
      }else{
        this.notificacion=0;
      }
    }
    ,
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
        this.employee.cargo = '',
        this.errors = '';
        this.getPosition();
        this.validateNull();
      })
      .catch( error =>{
        this.errors = ''
        if(error.response.status == 422){
          this.errors=(error.response.data.errors);
        }
      });
    }
  }
}
</script>
