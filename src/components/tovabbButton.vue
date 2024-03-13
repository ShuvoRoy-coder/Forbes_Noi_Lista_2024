<script setup>
    import { defineProps } from 'vue';


    const props = defineProps({
        buttonText: String,
        name: String,
        tag: String,
        url: String,
        showarrow: Boolean
    });
    
</script>

<template>
    <router-link :to="{name: props.name, params: {tag: props.tag, url: props.url }}"
            class="relative
            text-white text-[20px] block font-bold leading-normal text-center rounded-[14px] py-[20px] group
            bg-white hover:text-orange-600 transition-colors duration-[.4s]"
        >
            <span class="relative z-10">{{ buttonText }}</span>
            <span v-show="showarrow"
                class="absolute z-10 left-[60%] opacity-0 group-hover:opacity-100 transition-opacity duration-[.4s]">
                <span class="bg-[#CD7849] rounded-full w-[28px] h-[28px] grid place-content-center">
                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.999999 6.99994L11 6.99994L7.71 10.2899C7.61627 10.3829 7.54188 10.4935 7.49111 10.6154C7.44034 10.7372 7.4142 10.8679 7.4142 10.9999C7.4142 11.132 7.44034 11.2627 7.49111 11.3845C7.54188 11.5064 7.61627 11.617 7.71 11.7099C7.89736 11.8962 8.15081 12.0007 8.415 12.0007C8.67918 12.0007 8.93264 11.8962 9.12 11.7099L13.41 7.40994C13.7856 7.03659 13.9978 6.52952 14 5.99994C13.9951 5.47383 13.7832 4.97084 13.41 4.59994L9.12 0.299939C9.02676 0.207357 8.9162 0.134046 8.79463 0.0841928C8.67306 0.0343394 8.54286 0.00891829 8.41147 0.00938271C8.28007 0.00984714 8.15005 0.0361876 8.02884 0.0868992C7.90762 0.137611 7.79758 0.211701 7.705 0.30494C7.61242 0.398178 7.53911 0.50874 7.48925 0.63031C7.4394 0.751881 7.41398 0.88208 7.41444 1.01348C7.41491 1.14487 7.44125 1.27489 7.49196 1.3961C7.54267 1.51732 7.61676 1.62736 7.71 1.71994L11 4.99994L0.999999 4.99994C0.734783 4.99994 0.480427 5.1053 0.292891 5.29283C0.105355 5.48037 -1.35956e-06 5.73472 -1.38274e-06 5.99994C-1.40593e-06 6.26516 0.105355 6.51951 0.292891 6.70705C0.480427 6.89458 0.734783 6.99994 0.999999 6.99994Z" fill="white"/>
                    </svg>
                </span>
            </span>
            <span class="group-hover:opacity-0 transition-opacity duration-[.4s] bg-gradient-to-bl font-urban from-orange-300 via-orange-400 to-orange-600 absolute h-full w-full top-0 left-0 rounded-[14px]"/>
    </router-link>
</template>