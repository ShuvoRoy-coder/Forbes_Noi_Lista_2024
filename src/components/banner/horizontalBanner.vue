<script setup>
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();

</script>

<template>
    <iframe class="w-[970px] h-[250px] mx-auto" :src="url('landing-banner-lg/index.html')" frameborder="0"></iframe>

</template>

<style scoped>
   
</style>