<script setup>
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();
</script>

<template>
    <iframe class="w-[300px] h-[600px]" :src="url('subpage-banner-lg/index.html')" frameborder="0"></iframe>
</template>