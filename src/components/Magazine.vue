<script setup>
import { useHelpers } from '@/composables/useHelpers';

defineProps({
    type: String,
    required: true,
})

const { url } = useHelpers();

</script>

<template>

    <div
        :class="[type == 'subpage' ? 'hidden lg:block top-[84%] lg:left-2 xl:left-1' : 'right-6 xl:right-10 half:right-6 2xl:right-0']" 
        class="py-14 mini:py-12 sm:py-4 lg:py-0 lg:absolute top-[50px] z-10">
        <div
            :class="[type == 'subpage' ? 'lg:w-[230px] xl:w-[270px]' : 'mob:w-[300px] mini:w-[400px] sm:w-[473px] lg:w-[225px] xl:w-[300px]']"
            class="relative flex items-center justify-between mx-auto"
        >

            <a href="https://magazin.forbes.hu/2024-aprilis" target="_black" 
                class="text-skyish hover:text-orange-400 border-[1px] bg-[#383838] border-[#E96D12] rounded-[14px] w-full py-3 mini:py-5 px-4
                    text-white transition underline text-[12px] mini:text-[14px] lg:text-[12px] xl:text-[14px] font-semibold">
                A teljes lista és részletek<br>
                a magazinban
            </a>
            <div class="absolute right-0 rotate-[21deg] w-[70px] mini:w-[90px] lg:w-[70px] xl:w-[96px]">
                <img class="w-full shadow-black shadow-lg" :src="url('./images/magazine.png')" alt="magazine-book" />
            </div>
        </div>
    </div>

</template>