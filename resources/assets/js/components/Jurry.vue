<template>
  <div>
    <h1>Jurries</h1>
    <ol>
      <li v-for="jurry in jurries" :key="jurry.id">
        {{jurries.aap}} , {{jurries.idref}},
        {{jurries.orcid}} , {{jurries.prenom}},{{jurries.genre}}
        {{jurries.iso_country}}, {{jurries.pays}}, {{jurries.code_affiliation}},
        {{jurries.affiliation}}
      </li>
    </ol>
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