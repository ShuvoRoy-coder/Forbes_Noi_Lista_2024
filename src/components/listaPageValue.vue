<script setup>
    import { useFilteredItemsStore } from './stores/filteredItemsStore';
    import { RouterLink, useRoute } from 'vue-router';
    import volvoBox from './volvoBox.vue';
    import { useHelpers } from '../composables/useHelpers';
    import { ref, watch } from 'vue';
    
    const { url } = useHelpers();
    const filteredItemsStore = useFilteredItemsStore();
    const route = useRoute();

    const emits = defineEmits([
        'closePopup'
    ]);

    watch(() => [route.params.tag, route.params.url],
        () => {
            emits('closePopup');
        }
    )

</script>

<template>

    <div class="container mx-auto px-4 py-6 space-y-10 w-full">

        <div class="w-[130px] h-[130px] mini:w-[170px] mini:h-[170px] sm:w-[181px] sm:h-[181px]">
            <volvoBox :small="true"/>
        </div>

        <!-- <div class="bg-white w-full h-[5000px]">asdfasdf</div> -->

        <div class="max-w-[280px] mx-auto space-y-5">
            <RouterLink
                v-for="item in filteredItemsStore.filteredItems"
                :key="item"
                class="cursor-pointer flex items-center justify-start gap-3"
                :to="{name: 'subpage', params: {url: item.url, tag: item.tag}}"
                @click="emits('closePopup')"
            >   

                <span 
                    :class="{'border-[3px] border-[#FDB78B]': route.params.url == item.url}"
                    class="h-[122px] block w-[122px] rounded-full overflow-hidden object-cover">
                    
                    <img :src="url(`/person-images/${item.image}`)" alt="person-image" class="w-full">
                    
                </span>
                <span 
                    :class="{'text-white': route.params.url == item.url}"
                    class="text-[#CD7849] block text-[16px] font-bold text-center">
                    {{ item.name }}
                </span>
            </RouterLink>
        
        </div>



    </div>

</template>