<script setup>
import { useRouter } from 'vue-router';
import { useFilteredItemsStore } from './stores/filteredItemsStore';

const filter = useFilteredItemsStore();
const router = useRouter();

const emits = defineEmits([
    'filtered'
]) ;

const selectTag = (tag) => {
    
    filter.selectTag(tag)
    emits('filtered', tag);
    router.push({ name: 'subpage', params: { tag: filter.getSelectedTag, url: filter.getSelectedUrl(0) } })
}

</script>

<template>
    <div class="filter flex flex-wrap items-center justify-center lg:justify-end gap-x-3 mini:gap-x-4 gap-y-1 w-full lg:w-[80%] md:pb-8 lg:pb-0">
        <button
            v-for="(tag, index) in filter.tags"
            :key="tag"
            @click="selectTag(tag)"
            class="text-[16px] font-bold transition-all duration-75 hover:border-b-2 hover:border-white hover:text-white"
            :class="{ 'text-white border-b-2 border-white': filter.getSelectedTag === tag,
                    'text-[#EFA477] border-b-2 border-transparent ': filter.getSelectedTag != tag}"
        >
            {{ filter.users.find(user => user.tag == tag).tag_name }}
        </button>
    </div>

    

</template>
