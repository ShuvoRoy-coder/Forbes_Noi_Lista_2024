<script setup>

import volvoBox from '@/components/volvoBox.vue';
import tovabbButton from '@/components/tovabbButton.vue';
import horizontalBanner from '@/components/banner/horizontalBanner.vue';
import { useFilteredItemsStore } from '@/components/stores/filteredItemsStore';
import { onBeforeMount } from 'vue';
import { useHelpers } from '@/composables/useHelpers';

const { url } = useHelpers();

const filteredItemsStore = useFilteredItemsStore();

onBeforeMount(async () => {
    
    filteredItemsStore.init();

    const response = await fetch(url('data.json'))
    
    const users = await response.json();

    filteredItemsStore.init(null, users);
})



</script>

<template>
    <div class="bg-black  bg-no-repeat bg-center bg-cover bg-fixed w-full h-screen overflow-auto" style="background-image: url(/images/desktop-background.png)">
        <div class="container mx-auto relative pt-10 space-y-8">
        
            <div class="flex flex-col gap-4 items-center justify-center max-w-[473px] mx-auto">
                
                <div class="sm:w-full mini:w-[400px] mob:w-[300px] w-full">

                <!-- volvo box start -->
                    <volvo-box :small="false"/>

                <!-- volvo box End-->
                
                </div>
                <!-- button area start -->
                <div class="sm:w-full mini:w-[400px] mob:w-[300px] w-full">
                    <tovabb-button showarrow="" buttonText="Tovább" name="subpage" :tag="filteredItemsStore.getSelectedTag" :url="filteredItemsStore.getSelectedUrl(0)"/>
                </div>

                <!-- button area end -->
            </div>

        <!-- banner area start -->
            <div class="w-full sm:block hidden">
                <horizontal-banner />
            </div>
        <!-- banner area end -->
        </div>


    </div>
</template>