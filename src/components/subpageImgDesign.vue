<script setup>

//----------- access the filteredItems--------
import { useFilteredItemsStore } from './stores/filteredItemsStore';
const filteredItemsStore = useFilteredItemsStore();

</script>

<template>

    <div class="imge-area relative">                        
        <img src="/person-images/01_meszaros_lorinc.jpg" alt="person-image" class="rounded-full w-[220px] mini:w-[250px] h-[220px] mini:h-[250px] xl:w-[320px]  xl:h-[320px] translate-x-8 mini:translate-x-10 absolute top-0 -z-10">
        <div class="w-[220px] mini:w-[250px] h-[220px] mini:h-[250px] xl:w-[320px] xl:h-[320px] border-[2px] border-[#FDB78B] rounded-full">
            <div class="bg-[#EFA477] h-[45px] w-[45px] xl:h-[58px] xl:w-[58px] rounded-full grid place-content-center  ml-auto text-white font-bold text-[32px]">
                1
            </div>
        </div>
    </div>

</template>