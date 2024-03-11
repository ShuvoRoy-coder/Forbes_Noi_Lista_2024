<script setup>
    import volvoBox from './volvoBox.vue';
    
    
    import { ref } from 'vue';
    const active = ref(true);
    
    import { useHelpers } from '../composables/useHelpers';
    const { url } = useHelpers();

    import { useFilteredItemsStore } from './stores/filteredItemsStore';
    const filteredItemsStore = useFilteredItemsStore();

</script>

<template>

    <div class="container mx-auto px-4 py-6 space-y-10 w-full">

        <div class="w-[130px] h-[130px] mini:w-[170px] mini:h-[170px] sm:w-[181px] sm:h-[181px]">
            <volvoBox :small="true"/>
        </div>

        <!-- <div class="bg-white w-full h-[5000px]">asdfasdf</div> -->

        <div class="max-w-[280px] mx-auto space-y-5">
            <div
                v-for="item in filteredItemsStore.filteredItems"
                :key="item"
                class="cursor-pointer flex items-center justify-start gap-3"
            >   

                <div 
                    :class="{'border-[3px] border-[#FDB78B]': active}"
                    class="h-[122px] w-[122px] rounded-full overflow-hidden object-cover">
                    
                    <img :src="url(`/person-images/${item.image}`)" alt="person-image" class="w-full">
                    
                </div>
                <h1 
                    :class="{'text-white': active}"
                    class="text-[#CD7849] text-[16px] font-bold text-center">
                    {{ item.name }}
                </h1>
            </div>
        
        </div>



    </div>

</template>