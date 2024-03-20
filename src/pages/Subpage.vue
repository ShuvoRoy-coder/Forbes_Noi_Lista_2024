<script setup>
import { ref, onBeforeMount, onMounted, watch } from 'vue';
import magazine from "@/components/Magazine.vue";
import Slider from "@/components/Slider.vue";
import volvoBox from "@/components/volvoBox.vue";
import listaPopUp from '@/components/listaPopUp.vue'
import verticalBanner from "@/components/banner/verticalBanner.vue";
import mobileBanner from "@/components/banner/mobileBanner.vue";
import filterItem from "@/components/filterItem.vue";
import subpageImgDesign from "@/components/subpageImgDesign.vue";
import subpageTextArea from "@/components/subpageTextArea.vue";
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

const previousPage = () => {
    const index = filteredItemsStore.users.findIndex((item) => item.url == route.params.url);

    let previousIndex = 0;

    if(index <= 0) {

        previousIndex = filteredItemsStore.users.length - 1;
    }
    else {
        previousIndex = index - 1; 
    }

    return filteredItemsStore.users[previousIndex];
}

const nextPage = () => {
    const index = filteredItemsStore.users.findIndex((item) => item.url == route.params.url);

    let nextIndex = 0;

    let maxIndex = filteredItemsStore.users.length - 1;

    if(index >= maxIndex) {

        nextIndex = 0;
    }
    else {
        nextIndex = index + 1; 
    }

    return filteredItemsStore.users[nextIndex];
}

const onSlideChange = () => {
    setTimeout(() => {
        const slide = document.querySelector('.swiper-slide-active');

        if(slide) {

            console.log(slide.id);

            const item = filteredItemsStore.users.find((user) => `slide_${user.id}` == slide.id);

            router.push({
                name: 'subpage', 
                params: {
                    tag: item.tag,
                    url: item.url
                },
                query: {
                    savedPosition: true 
                }
            })
        }
    }, 200)

}

const initialSlide = (route.params.url.split('-')[0] ?? 1) - 1;
const slideTo = ref(null);

const slideToTag = (tag) => {
    slideTo.value = filteredItemsStore.users.findIndex(user => user.tag == tag);
    console.log(slideTo.value)
}

onMounted( async () => {

    selectUser()

    // fetch the user information when params change
    watch(
        () => [route.params.url, route.params.tag],
        () => {
            selectUser()
            filteredItemsStore.selectTag(route.params.tag)
        }
    )
    watch(
        () => [route.params.tag],
        () => {
            filteredItemsStore.selectTag(route.params.tag)
        }
    )
})
</script>

<template>
        <div id="main" class="bg-black space-y-8 relative bg-no-repeat bg-center bg-fixed bg-cover w-full min-h-screen z-[0]" :style="{'background-image' : `url(${url('/images/desktop-background.png')})`}">
            
            <div class="bg-black/80 w-full min-h-screen pb-[80px] lg:pb-0">

                <!-- list popup start -->
                    <listaPopUp :small="false"/>
                <!-- list popup end -->

                <div class="container relative mx-auto py-[24px] lg:py-[45px] px-[15px] mini:px-[20px]">

                    <div class="top flex flex-col lg:flex-row items-start justify-between gap-10">
                        <!-- left area start -->
                        <div class="w-[130px] h-[130px] mini:w-[170px] mini:h-[170px] sm:w-[181px] sm:h-[181px]">
                            <volvoBox :small="true"/>
                        </div>

                        <!-- left area end -->
                        <!-- right and filter area start  -->

                        <filterItem
                            @filtered="slideToTag"
                        />

                        <!-- right area end -->
                    </div>


                    <div class="w-full mt-10 md:mt-0 lg:w-[90%] xl:w-[85%] lg:ml-auto relative">
                        
                    <!-- center area start -->
                        <div class="w-full flex flex-col lg:flex-row gap-20 lg:gap-3 xl:gap-6">
                            <div class="w-full xl:w-[80%] flex-col lg:flex-row flex items-center justify-center gap-3 xl:gap-4">
                            
                            <!-- image area Start-->
                                <div class="w-full lg:w-[40%]">
                                    <subpageImgDesign
                                        :user="user"
                                    />
                                </div>
                            <!-- image area End-->
                                
                            <!-- text-area start-->
                                <div class="w-full lg:w-[60%]">
                                    <subpageTextArea
                                        :user="user"
                                    />
                                </div>
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
                        >                    
                            <div class="slider w-[65%] mx-auto">
                                <Slider
                                    @slideChange="onSlideChange"
                                    :initialSlide="initialSlide"
                                    :slideTo="slideTo"
                                />
                            </div>
                        </div>
                        
                    <!-- slider area end -->



                    </div>
                    <magazine type="subpage"/>
                </div>
                
                <!-- Next page and previous page button start-->
                <div 
                    class="grid grid-cols-3 justify-between gap-1 fixed bottom-0 left-0 z-40 w-full lg:hidden text-white
                    bg-gradient-to-bl font-urban from-orange-300 via-orange-400 to-orange-600 py-3 px-4"
                    v-if="filteredItemsStore.filteredItems.length > 1"
                >

                <router-link :to="{name: 'subpage', params: {tag: previousPage().tag, url: previousPage().url }}"
                class="flex items-center justify-start"
                >   
                    <div class="w-[33px] h-[20px] rotate-180">
                        <svg width="100%" height="100%" viewBox="0 0 33 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.5 1L31 10M31 10L22.5 19M31 10H0" stroke="white" stroke-width="2"></path></svg>
                    </div>
                </router-link>

                
                    <listaPopUp :small="true"/>
                

                <router-link :to="{name: 'subpage', params: {tag: nextPage().tag, url: nextPage().url }}"
                    class="flex items-center justify-end"
                >
                    <div class="w-[33px] h-[20px]">
                        <svg width="100%" height="100%" viewBox="0 0 33 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.5 1L31 10M31 10L22.5 19M31 10H0" stroke="white" stroke-width="2"></path></svg>
                    </div>
                </router-link>
                </div>
                <!-- Next page and previous page button end-->

            </div>
        </div>
</template>
