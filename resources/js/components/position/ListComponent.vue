<template>
  <div>

  </div>
</template>
<script>
export default {
  data:(){
    return {
      employees = []
    }
  },
  created() {

  },methods: {
    getPosition() {
      axios.get('getPosition')
      .then(response =>{
        this.positions = response.data;
      })
    }
  }
}
</script>
