<template>
  <div>
    <h5 class="card-tite">Crear empleado</h5>
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
        <span>{{employee}}</span>
      </div>
      <button type="submit" class="btn btn-success" :disabled="this.positions==''">Crear</button>
    </form>
    <div class="">
      <pre>{{this.positions}}</pre>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      employees: [],
      employee: {nombres: '', documento: '', telefono: '', direccion:'', cargo:''},
      errors:'',
      positions: ''
    }
  },
  created:  function() {
    this.getPosition();
  },
  methods:{
    getPosition()
    {
      axios.get('getPosition')
      .then(response =>{
        this.positions = response.data;
        if (this.position==null) {
          //configuracion de mensaje TOASTR
        }
      })

    },
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
