<template>
  <div class="">
    <h5 class="card-title">Crear cargo</h5>
    <br>
    <form @submit.prevent="create">
      <div class="form-group">
        <label for="cargo">Cargo:</label>
        <input type="text" class="form-control" :class="{'is-invalid':this.errors.cargo}"  id="cargo" v-model="position.cargo">
        <div class="invalid-feedback" v-for="data in errors.cargo">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="salario">Salario:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.salario}"  id="salario" v-model="position.salario" >
        <div class="invalid-feedback" v-for="data in errors.salario">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="impuesto">Impuesto:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.impuesto}"  id="impuesto" v-model="position.impuesto" step=0.01>
        <div class="invalid-feedback" v-for="data in errors.impuesto">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="salud">Salud:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.salud}"  id="salud" v-model="position.salud" step=0.01>
        <div class="invalid-feedback" v-for="data in errors.salud">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="pension">Pension:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.pension}"  id="pension" v-model="position.pension" step=0.01>
        <div class="invalid-feedback" v-for="data in errors.pension">
          {{data}}
        </div>
      </div>
      <div class="form-group">
        <label for="valor_primas">Valor prima:</label>
        <input type="number" class="form-control" :class="{'is-invalid':this.errors.valor_primas}"  id="valor_primas" v-model="position.valor_primas" step=0.01>
        <div class="invalid-feedback" v-for="data in errors.valor_primas">
          {{data}}
        </div>
      </div>
      <button type="submit" class="btn btn-success">Crear</button>
    </form>
  </div>
</template>

<script>
export default {
  data(){
    return {
      position: {cargo:'', salario:'', impuesto:'', salud:'',pension:'',valor_primas:''},
      errors:''
    }
  },
  methods:{
    create()
    {
      const params = {
        cargo: this.position.cargo,
        salario: this.position.salario,
        impuesto: this.position.impuesto,
        salud: this.position.salud,
        pension: this.position.pension,
        valor_primas: this.position.valor_primas,
      };
      axios.post('crear', params)
      .then(response => {
        this.position.cargo='',
        this.position.salario='',
        this.position.impuesto='',
        this.position.salud='',
        this.position.pension='',
        this.position.valor_primas='',
        this.errors ='';
      })
      .catch(error => {
        this.errors = ''
        if(error.response.status == 422){
          this.errors = (error.response.data.errors);
          console.log(this.errors);
        }
      });
    }
  }
}
</script>
