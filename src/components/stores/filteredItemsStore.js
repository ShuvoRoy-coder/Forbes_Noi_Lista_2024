import { defineStore } from 'pinia';
import jsonData from '../constants/data.json';

export const useFilteredItemsStore = defineStore({
  id: 'filteredItems',

  state: () => {
    return {
      filteredItems: [],
      __tags: [],
      selectedTag: null,
    }
  },

  getters: {
    tags: (state) => {
      
      return state.__tags;
    },
    
    getSelectedTag: (state) => {
      
      return state.selectedTag;
    },
    getSelectedName: (state) => {
      
      return (index) => (index != null && index in state.filteredItems) ? state.filteredItems[index].name : state.filteredItems[0].name;
    }
  },
  
  actions: {
    setFilteredItems() {
      this.filteredItems = this.selectedTag ? jsonData.filter(item => item.tag === this.selectedTag) : [];
    },
    init(){
      this.__tags = [...new Set(jsonData.map(item => item.tag ?? null))];
      if(!this.selectedTag){
        this.selectTag();
      }
      console.log(this.__tags);
    },

    selectTag(tag = null){
      if(!tag || !this.__tags.includes(tag)) {
        this.selectedTag = this.__tags[0] ?? null;
      }
      else {
        this.selectedTag = tag;
      }
      this.setFilteredItems();
    },

  },
});
