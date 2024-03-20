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

    <div class="imge-area relative lg:block flex items-center justify-center">                        
        <img :src="url(`/person-images/${user.image}`)" alt="person-image" class="rounded-full w-[220px] mini:w-[250px] h-[220px] mini:h-[250px] xl:w-[320px] xl:h-[320px] translate-x-8 mini:translate-x-10">
        <div class="w-[220px] mini:w-[250px] h-[220px] mini:h-[250px] xl:w-[320px] xl:h-[320px] border-[2px] border-[#FDB78B] rounded-full absolute top-0 lef-0">
            <div class="bg-[#EFA477] h-[45px] w-[45px] xl:h-[58px] xl:w-[58px] rounded-full grid place-content-center  ml-auto text-white font-bold text-[32px]">
                {{ user.serial }}
            </div>
        </div>
    </div>

</template>