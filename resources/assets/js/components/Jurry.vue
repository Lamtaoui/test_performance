<template>
  <div>
    <h1>Jurries</h1>
    <div>
      <ol>
        <li v-for="jurry in jurries" :key="jurry.aap">
          {{jurries.nom}} , {{jurries.prenom}}
        </li>
      </ol>
    </div>
  </div>
</template>

<script>
export default {
name: "Jurry"
}
props: {
  jurries: Array
}
</script>

<style scoped>

</style>