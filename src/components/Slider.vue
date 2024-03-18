<script setup>

import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/bundle';
import 'swiper/css/free-mode';
import {Navigation } from 'swiper/modules';
import { useFilteredItemsStore } from './stores/filteredItemsStore';
import { useHelpers } from '../composables/useHelpers';
import { RouterLink, useRoute } from 'vue-router';
import { onMounted, watch, ref } from 'vue';

const props = defineProps({
    initialSlide: {
        default: 0,
        type: [String, Number]
    },
    slideTo: {
        default: null,
        type: [Number]
    }
})

const route = useRoute();

let slider = null;
const tagChanging = ref(false);
let tagChangingTimeOut = null

const { url } = useHelpers();
const filteredItemsStore = useFilteredItemsStore();

const emits = defineEmits([
    'slideChange'
]);


const onSlideChange = () => {
    if(!tagChanging.value) {
        emits('slideChange');
    }
}

onMounted(() => {
    watch(() => props.slideTo, () => {
        if(props.slideTo !== null && slider) {

            clearTimeout(tagChangingTimeOut);
            tagChanging.value = true;

            slider.slideToLoop(props.slideTo)

           tagChangingTimeOut =  setTimeout(() => {
                tagChanging.value = false;
            }, 400)
        }
    })
})

</script>

<template>

    <!-- swiper area start -->

    <swiper

        :modules="[Navigation]"
        :slidesPerView="3"
        :spaceBetween="30"
        :initialSlide="initialSlide"
        :navigation="true"
        :loop="true"
        :grabCursor="true"
        @slideChange="onSlideChange"
        @swiper="(event) => {slider = event}"

        :breakpoints="{
            '1390': {
                slidesPerView: 6,
                spaceBetween: 1,
            },

            '1280': {
                slidesPerView: 5,
                spaceBetween: 1,
            },

            '750': {
                slidesPerView: 4,
                spaceBetween: 1,
            },

            '550': {
                slidesPerView: 2,
                spaceBetween: 1,
            },

            '10': {
                slidesPerView: 1,
                spaceBetween: 1,
            },
        }"

        class="max-w-[1000px]"
    >
        <swiper-slide
            v-for="(item, index) in filteredItemsStore.users"
            :id="`slide_${item.id}`"
            class="transition-all duration-500 pt-5 cursor-pointer group"
        >   

            <RouterLink 
                :to="{ name: 'subpage', params: { tag: item.tag, url:item.url }, query: { savedPosition: true }}"
                :class="{'border-[#FDB78B]': route.params.url == item.url} , {'border-transparent': route.params.url != item.url}"
                class="h-[122px] block w-[122px] rounded-full overflow-hidden object-cover border-[3px] mx-auto transition-all duration-500 group-hover:-translate-y-5">
                
                <img :src="url(`/person-images/${item.image}`)" alt="person-image">
                
            </RouterLink>
                <h1 class="group-hover:text-[#CD7849] font-bold transition-all duration-500 group-hover:opacity-100 group-hover:visible opacity-0 invisible text-transparent text-[16px] text-center">
                    {{ item.name }}
                </h1>
        </swiper-slide>

        <!-- swiper area end -->

    </swiper>
</template>

<style>

    .swiper {
        position: static!important;
    }

    .swiper-button-prev, .swiper-button-next {
    position: absolute;
    border-radius: 50%;
    width: 39.2px!important;
    height: 39.2px!important;
    z-index: 10;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.swiper-button-next {
    right: 125px;
    
}
.swiper-button-prev {
    left: 125px;
}

.swiper-button-prev::after{
    content: "";
    display: inline-block;
    width: 100%;
    height: 100%;
    background-image: url('../components/icons/sliderIcon.svg');
    transform: rotate(180deg);
}

.swiper-button-next::after{
    content: "";
    display: inline-block;
    width: 100%;
    height: 100%;
    background-image: url('../components/icons/sliderIcon.svg');
}


</style>
