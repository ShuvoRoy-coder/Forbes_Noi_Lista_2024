<script setup>
import { ref } from 'vue';
import ModszertanModal from './ModszertanModal.vue';
import { useHelpers } from '@/composables/useHelpers';

    defineProps({
        small: Boolean
    });
    

    let showModal = ref(false);

    const modszertPopup = ref(false);
    const closePopup = () => {
        modszertPopup.value = false;
    }
    const showPopup = () => {
        modszertPopup.value = true;
    }

    const { url } = useHelpers();

</script>

<template>
    <ModszertanModal 
        :showPopup="modszertPopup"
        @close-popup="closePopup"
    />

    <!-- Big volvoBox start -->
    <div v-show="!small" class="bg-gradient-to-bl font-urban from-orange-300 via-orange-400 to-orange-600
            flex flex-col items-center justify-center space-y-[60px] sm:space-y-[80px] w-full h-full pt-[20px] pb-[10px] mini:pt-[48px] mini:pb-[25px] rounded-[14px]">
        <div class="top">                
            <h3 class="text-orange-800 font-bold text-[14px] mini:text-[20px] leading-normal text-center">Gratulál a listán szereplőknek a</h3>
            
            <div class="mx-auto w-[150px] mini:w[180px] sm:w-[211px] py-2">
                <img :src="url('./images/volvo-logo.svg')" alt="volvo-logo" class="w-full">
            </div>
        </div>

        <div class="bottom">
            <div class="mx-auto w-[120px] sm:w-[180px]">
                <img :src="url('./images/Forbes.svg')" alt="forbes-logo">
            </div>
            <h1 class="text-[25px] sm:text-[40px] leading-normal text-center text-white font-semibold">A legbefolyásosabb</h1>
            <div class="mx-auto w-[189px] sm:w-[291px] -translate-y-3 sm:-translate-y-4">
                <img :src="url('./images/magyar.svg')" alt="forbes-logo">
            </div>
            <div class="w-full px-3">
                <div class="text-[#833E17] font-bold text-[10px] sm:text-[14px] leading-normal text-center">
                    SZERKESZTETTE: TÓTH-BIRÓ MARIANNA <br>
                    ÍRTA: BÁNÁTI ANNA, G. TÓTH ILDA, TÓTH-BIRÓ MARIANNA <br>
                    FOTÓK: Mohai Balázs, a Forbes archív képei, az érintettek LinkedIn-profilfotói, cégeik hivatalos oldalán található életrajzi vagy egyéb fotók, MTI Fotóbank, közszereplői Facebook-oldalak
                </div>
                
                <button class="pt-3 cursor-pointer font-bold text-[10px] sm:text-[14px] leading-normal text-[#833E17] hover:text-[#FFB489] transition-all block mx-auto underline" 
                    @click="showPopup"
                    >
                        Módszertan
                </button>

            </div>
            
        </div>
    </div>

    <!-- Big volvoBox end -->
    <!-- Small volvoBox start -->
    
    <router-link :to="{name: 'landing'}"
        v-show="small"class="bg-gradient-to-bl font-urban from-orange-300 via-orange-400 to-orange-600
            flex items-end justify-center w-full h-full py-[10px] mini:py-[14px] sm:py-[18px] rounded-[14px]">
        
        <div class="space-y-[1px] sm:space-y-2">
            <div class="mx-auto w-[50px] sm:w-[65px]">
                <img :src="url('./images/Forbes.svg')" alt="forbes-logo" class="w-full">
            </div>

            <h1 class="text-[10px] mini:text-[12px] sm:text-[15px] leading-normal text-center text-white font-semibold">A legbefolyásosabb</h1>
            <div class="mx-auto w-[80px] -translate-y-[5px] mini:w-[90px] mini:-translate-y-[7px] sm:w-[112px] sm:h-[20px] sm:-translate-y-4">
                <img :src="url('./images/magyar.svg')" alt="forbes-logo" class="w-full">
            </div>

        </div>
    </router-link>
    <!-- Small volvoBox end -->
</template>