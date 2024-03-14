<script setup>
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();

const props = defineProps({
    user: {
        type: Object,
        default: {}
    }
})

</script>

<template>

    <div class="text-area flex flex-col items-center justify-center lg:items-start lg:justify-start gap-8 md:gap-8">
        <div class="name-and-subtitle pl-10">
            <div class="name text-[22px] mini:text-[50px] text-center sm:text-start font-bold text-white mini:leading-[60px]">{{ user.name }}</div>
            <div class="subtitle text-white font-bold text-[14px] mini:text-[16px] text-center lg:text-start mini:leading-[22px]">{{ user.sub_title }}</div>
        </div>
        <!-- paragraph -->
        <div class="w-full bg-white rounded-[10px] px-8 py-6 mini:px-10 mini:py-8 relative">
            <div class="tagname bg-[#EFA477] inline-block absolute top-0 right-[35%] mini:right-[40%] md:right-[10%] -translate-y-[50%] text-white text-[18px] leading-[23px] px-5 py-2 rounded-[7px]">{{ user.tag }}</div>
            <div class=" text-[14px] leading-[18px] mini:text-[18px] mini:leading-[23px] text-[#CD7849] font-bold">
                {{ user.paragraph }}
            </div>
            <div class="bg-[#EFA477] w-[44px] mini:w-[50px] h-[44px] mini:h-[50px] rounded-full inline-block absolute right-[65%] md:right-[8%] bottom-0 translate-y-[50%]"></div>
        </div>
        <div class="bg-[#EFA477] h-[3px] w-[150px] rounded-full ml-10 lg:block hidden"></div>
    </div>

</template>