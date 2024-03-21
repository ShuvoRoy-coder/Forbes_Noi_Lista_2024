<script setup>
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();
</script>

<template>

<iframe class="w-[300px] h-[250px]" :src="url('subpage-banner-sm/index.html')" frameborder="0"></iframe>

</template>