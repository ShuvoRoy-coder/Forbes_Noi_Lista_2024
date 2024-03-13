import { defineStore } from 'pinia';

export const useFilteredItemsStore = defineStore({
  id: 'filteredItems',

  state: () => {
    return {
      filteredItems: [],
      __tags: [],
      selectedTag: null,
      users: [],
    }
  },

  getters: {
    tags: (state) => {
      return state.__tags;
    },
    
    getSelectedTag: (state) => {
      return state.selectedTag;
    },

    getSelectedUrl: (state) => {
      return (index) => (index != null && index in state.filteredItems) ? state.filteredItems[index].url : state.filteredItems[0].url;
    }
  },
  
  actions: {
    setFilteredItems() {
      this.filteredItems = this.selectedTag ? this.users.filter(item => item.tag === this.selectedTag) : [];
    },

    init(tag = null, users = []){

      if(users.length) {
        this.users = users

        localStorage.setItem('users', JSON.stringify(users));
      }
      else {
        this.users = JSON.parse(localStorage.getItem('users') ?? '[]');
      }
      
      this.__tags = [...new Set(this.users.map(item => item.tag ?? null))];
      
      if(!this.selectedTag){
        this.selectTag(tag);
      }
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
