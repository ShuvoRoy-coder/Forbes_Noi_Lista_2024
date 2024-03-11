<script setup>
     defineProps({
        small: Boolean
    });
</script>

<template>
    <!-- Big volvoBox start -->
    <div v-show="!small" class="bg-gradient-to-bl font-urban from-orange-300 via-orange-400 to-orange-600
            flex flex-col items-center justify-center space-y-[100px] sm:space-y-[150px] w-full h-full py-[20px] mini:py-[48px] rounded-[14px]">
        <div class="top">                
            <h3 class="text-orange-800 font-bold text-[14px] mini:text-[20px] leading-normal text-center">Gratulál a listán szereplőknek a</h3>
            
            <div class="mx-auto w-[150px] mini:w[180px] sm:w-[211px] py-2">
                <img src="/images/volvo-logo.svg" alt="volvo-logo" class="w-full">
            </div>
        </div>

        <div class="bottom">
            <div class="mx-auto w-[80px] sm:w-[94px]">
                <img src="/images/Forbes.svg" alt="forbes-logo">
            </div>
            <h1 class="text-[25px] sm:text-[40px] leading-normal text-center text-white font-semibold">A legbefolyásosabb</h1>
            <div class="mx-auto w-[189px] sm:w-[291px] -translate-y-3 sm:-translate-y-4">
                <img src="/images/magyar.svg" alt="forbes-logo">
            </div>
        </div>
    </div>

    <!-- Big volvoBox end -->
    <!-- Small volvoBox start -->

    <router-link to="/"
        v-show="small"class="bg-gradient-to-bl font-urban from-orange-300 via-orange-400 to-orange-600
            flex items-end justify-center w-full h-full py-[10px] mini:py-[14px] sm:py-[18px] rounded-[14px]">
        
        <div class="space-y-[1px] sm:space-y-2">
            <div class="mx-auto w-[22px] md:w-[28px] sm:w-[35.97px]">
                <img src="/images/Forbes.svg" alt="forbes-logo" class="w-full">
            </div>

            <h1 class="text-[10px] mini:text-[12px] sm:text-[15px] leading-normal text-center text-white font-semibold">A legbefolyásosabb</h1>
            <div class="mx-auto w-[80px] -translate-y-[5px] mini:w-[90px] mini:-translate-y-[7px] sm:w-[112px] sm:h-[20px] sm:-translate-y-4">
                <img src="/images/magyar.svg" alt="forbes-logo" class="w-full">
            </div>

        </div>
    </router-link>
    <!-- Small volvoBox end -->
</template>