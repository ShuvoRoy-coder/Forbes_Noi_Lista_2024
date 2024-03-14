<script setup>
    import listaPageValue from './listaPageValue.vue';
    import { ref } from 'vue';

    defineProps({
        small: Boolean
    });

    const openlistapge = ref(false);

    const toggle = () => {
        openlistapge.value = !openlistapge.value;
    };
</script>

<template>
     <!-- lista popup start-->

     <transition
        enter-active-class="ease-out duration-300"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="ease-in duration-200"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
        >
        <!-- page value start -->
        <div v-show="openlistapge" class="w-full h-full overflow-auto bg-[#2D2D2D]/70 backdrop-blur-lg fixed inset-0 z-50">
            <listaPageValue
                @closePopup="openlistapge = false"
            />
        </div>
        <!-- page value end -->
    </transition>
    <!-- toogle button -->
    <button @click="toggle" class="lg:hidden block">
        <span v-show="!openlistapge" class="w-full">
            <span v-show="small" class="w-full text-center font-bold text-[18px]">LISTA</span>
            <img v-show="!small" src="/images/collapse-open-button.svg" alt="collapse-open-button" class="w-[30px] h-[30px] fixed z-40 top-10 right-10">
        </span>
        <span v-show="openlistapge" class="text-white font-bold text-[14px] leading-normal fixed z-50 top-10 right-10">Vissza</span>
    </button>
    <!-- lista popup end -->


</template>