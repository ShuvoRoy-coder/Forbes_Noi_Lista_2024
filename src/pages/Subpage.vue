<script setup>
    import { ref, onBeforeMount, onMounted, watch } from 'vue';
    import Slider from "@/components/Slider.vue";
    import volvoBox from "@/components/volvoBox.vue";
    import listaPopUp from '@/components/listaPopUp.vue'
    import verticalBanner from "@/components/banner/verticalBanner.vue";
    import mobileBanner from "@/components/banner/mobileBanner.vue";
    import filterItem from "@/components/filterItem.vue";
    import subpageImgDesign from "@/components/subpageImgDesign.vue";
    import subpageTextArea from "@/components/subpageTextArea.vue";
    import tovabbButton from "@/components/tovabbButton.vue";
    import { useRoute } from 'vue-router';
    import { useFilteredItemsStore } from '@/components/stores/filteredItemsStore';
    import { useHelpers } from '@/composables/useHelpers';
import router from '@/router';
    
    const filteredItemsStore = useFilteredItemsStore();
    const { url } = useHelpers();

    const route = useRoute()

    const user = ref({});

    onBeforeMount(async () => {
        
        filteredItemsStore.init(route.params.tag);

        const response = await fetch(url('data.json'))
        
        const users = await response.json();

        filteredItemsStore.init(route.params.tag, users);
    })

    const selectUser = () => {
        user.value = filteredItemsStore.users.find((user) => user.url == route.params.url);
    }

    const previousPageURL = () => {
        const index = filteredItemsStore.filteredItems.findIndex((item) => item.url == route.params.url);

        let previousIndex = 0;

        if(index <= 0) {

            previousIndex = filteredItemsStore.filteredItems.length - 1;
        }
        else {
            previousIndex = index - 1; 
        }

        return filteredItemsStore.filteredItems[previousIndex].url;
    }

    const nextPageURL = () => {
        const index = filteredItemsStore.filteredItems.findIndex((item) => item.url == route.params.url);

        let nextIndex = 0;

        let maxIndex = filteredItemsStore.filteredItems.length - 1;

        if(index >= maxIndex) {

            nextIndex = 0;
        }
        else {
            nextIndex = index + 1; 
        }

        return filteredItemsStore.filteredItems[nextIndex].url;
    }

    const onSlideChange = (event) => {
        const index = event.realIndex;

        // let maxIndex = filteredItemsStore.filteredItems.length - 1;

        // let index = 0;

        // if(activeIndex >= maxIndex) {
        //     index = 0;
        // }
        // else if(activeIndex <= 0) {
        //     index = maxIndex
        // }
        // else {
        //     index = activeIndex > event.previousRealIndex
        //     ? activeIndex + 1
        //     : activeIndex - 1
        // }

        const item = filteredItemsStore.filteredItems[index];

        router.push({name: 'subpage', params: {
            tag: route.params.tag,
            url: item.url
        }})

    }

    onMounted( async () => {

        selectUser()

        // fetch the user information when params change
        watch(
            () => [route.params.url, route.params.tag],
            () => {
                selectUser()
            }
        )
    })
    
</script>

<template>
    <div class="bg-black space-y-8 relative bg-no-repeat bg-center bg-cover w-full h-screen overflow-auto z-10" style="background-image: url(/images/desktop-background.png)">
        
        
        <div class="bg-black/80 w-full h-full absolute top-0 left-0 overflow-auto z-10 pb-[80px] lg:pb-0">

            <!-- list popup start -->
                <listaPopUp/>
            <!-- list popup end -->

            <div class="container mx-auto py-[24px] lg:py-[45px] px-[15px] mini:px-[20px]">

                <div class="top flex flex-col lg:flex-row items-start justify-between gap-10">
                    <!-- left area start -->
                    <div class="w-[130px] h-[130px] mini:w-[170px] mini:h-[170px] sm:w-[181px] sm:h-[181px]">
                        <volvoBox :small="true"/>
                    </div>

                    <!-- left area end -->
                    <!-- right and filter area start  -->

                    <filterItem/>

                    <!-- right area end -->
                </div>


                <div class="w-full mt-10 md:mt-0 lg:w-[90%] xl:w-[85%] lg:ml-auto relative">
                    
                <!-- center area start -->
                    <div class="w-full flex flex-col lg:flex-row gap-20 lg:gap-3 xl:gap-6">
                        <div class="w-full xl:w-[80%] flex-col md:flex-row flex items-center justify-center md:justify-start gap-3 xl:gap-4">
                        
                        <!-- image area Start-->
                            <subpageImgDesign
                                :user="user"
                            />
                        <!-- image area End-->
                            
                        <!-- text-area start-->
                            <subpageTextArea
                                :user="user"
                            />
                        <!-- text-area end-->

                        </div>
                        <!-- banner area -->
                        <div class="lg:block hidden w-[20%]">
                            <verticalBanner/>
                        </div>

                        <!-- mobile banner area -->
                        <div class="flex flex-col items-center gap-10 lg:hidden">
                            <div class="block lg:hidden">
                                <mobileBanner/>
                            </div>
                            <div class="volvo-image mx-auto max-w-[141px] w-full block lg:hidden">
                                <img src="/images/volvo-logo.svg" alt="volvo-image">
                            </div>
                        </div>
                        <!-- mobile banner area -->
                        
                    </div>
                    
                <!-- center area end -->
                <!-- slider area start -->

                    <div 
                        class="hidden lg:block relative w-full mt-20"
                        v-if="filteredItemsStore.filteredItems.length > 1"
                    >                    
                        <div class="slider w-[75%] mx-auto">
                            <Slider
                                @slideChange="onSlideChange"
                            />
                        </div>
                    </div>
                    
                <!-- slider area end -->



                </div>
            </div>
            
            <!-- Next page and previous page button start-->
            <div 
                class="grid grid-cols-2 gap-1 fixed bottom-0 left-0 z-40 w-full lg:hidden"
                v-if="filteredItemsStore.filteredItems.length > 1"
            >
                <tovabbButton 
                    buttonText="Previous page" 
                    name="subpage" 
                    :tag="route.params.tag" 
                    :url="previousPageURL()"
                /> 
                <tovabbButton 
                    buttonText="Next page" 
                    name="subpage" 
                    :tag="route.params.tag" 
                    :url="nextPageURL()"
                /> 
            </div>
            <!-- Next page and previous page button end-->

        </div>
    </div>
</template>
