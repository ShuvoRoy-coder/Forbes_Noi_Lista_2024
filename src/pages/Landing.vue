<script setup>
import volvoBox from '@/components/volvoBox.vue';
import tovabbButton from '@/components/tovabbButton.vue';
import magazine from '@/components/Magazine.vue';
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
    <div id="main" class="bg-black bg-no-repeat bg-center bg-cover bg-fixed w-full h-screen overflow-auto" :style="{'background-image' : `url(${url('/images/desktop-background.png')})`}">
        <div class="container mx-auto relative pt-20 space-y-8">

                <div class="flex flex-col gap-4 items-center justify-center max-w-[473px] mx-auto">
                    
                    <div class="sm:w-full mini:w-[400px] mob:w-[300px] w-full">
                        <volvo-box :small="false"/>
                    </div>
                    <!-- button area start -->
                    <div class="sm:w-full mini:w-[400px] mob:w-[300px] w-full">
                        <tovabb-button showarrow="" buttonText="Tovább" name="subpage" :tag="filteredItemsStore.getSelectedTag" :url="filteredItemsStore.getSelectedUrl(0)"/>
                    </div>

                    <!-- button area end -->
                </div>

            <magazine type="landing"/>

            <!-- banner area start -->
            <div class="w-full lg:block hidden">
                <horizontal-banner />
                <p class="text-white text-center text-[8px] py-2">HIRDETÉS</p>
            </div>
        <!-- banner area end -->

        </div>


    </div>
</template>