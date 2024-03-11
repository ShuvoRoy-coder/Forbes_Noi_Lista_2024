<script setup>
    import { ref, onBeforeMount } from 'vue';
    import Slider from "@/components/Slider.vue";
    import volvoBox from "@/components/volvoBox.vue";
    import listaPopUp from '@/components/listaPopUp.vue'
    import verticalBanner from "@/components/banner/verticalBanner.vue";
    import mobileBanner from "@/components/banner/mobileBanner.vue";
    import filterItem from "@/components/filterItem.vue";
    import subpageImgDesign from "@/components/subpageImgDesign.vue";
    import subpageTextArea from "@/components/subpageTextArea.vue";
    import tovabbButton from "@/components/tovabbButton.vue";

    import { useFilteredItemsStore } from '@/components/stores/filteredItemsStore';
    const filteredItemsStore = useFilteredItemsStore();

    onBeforeMount(() => {
        filteredItemsStore.init();
    })
    
</script>

<template>
    <div class="bg-black space-y-8 relative bg-no-repeat bg-center bg-cover w-full h-screen overflow-auto z-10" style="background-image: url(/images/desktop-background.png)">
        
        
        <div class="bg-black/80 w-full h-full absolute top-0 left-0 overflow-auto z-10 pb-[80px] lg:pb-0">

            <!-- list popup start -->
                <listaPopUp />
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
                            <subpageImgDesign/>
                        <!-- image area End-->
                            
                        <!-- text-area start-->
                            <subpageTextArea/>
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

                    <div class="hidden lg:block relative w-full mt-20">                    
                        <div class="slider w-[75%] mx-auto">
                            <Slider/>
                        </div>
                    </div>
                    
                <!-- slider area end -->



                </div>
            </div>
            
            <!-- Next page and previous page button start-->
            <div class="grid grid-cols-2 gap-1 fixed bottom-0 left-0 z-40 w-full lg:hidden">
                <tovabbButton buttonText="Previous page" name="subpage" tag="üzlet" uniqueName="shuvo"/> 
                <tovabbButton buttonText="Next page" name="subpage" tag="üzlet" uniqueName="shuvo"/> 
            </div>
            <!-- Next page and previous page button end-->

        </div>
    </div>
</template>
