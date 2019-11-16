<template>
<p></p>
</template>

<script>
export default {
   mounted: function () {
        this.$router.push(`/pokedex/1`)
        window.location.reload()
   }
}
</script>
