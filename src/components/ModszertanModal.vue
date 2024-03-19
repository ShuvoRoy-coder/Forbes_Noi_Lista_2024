<script setup>
import { watch } from 'vue';

const props = defineProps({
    showPopup: {
        type: Boolean,
        default:  false,
    }
})

const emits = defineEmits([
    'closePopup'
])

watch(() => props.showPopup, () => {
    if (props.showPopup) {
        document.body.style.overflow = 'hidden';
        
    } else {
        document.body.style.overflow = null;
    }
});
</script>
<template>
    <teleport to="body">
        <transition leave-active-class="duration-200">
            <div 
                v-show="showPopup" class="fixed index-conflict inset-0 z-50 px-1 py-10 flex items-center"
                scroll-region>
                <transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <div v-if="showPopup" class="fixed inset-0 backdrop-blur bg-black/50 transition-opacity" aria-hidden="true" @click="() => { emits('closePopup') }">
                        <!-- <div class="absolute inset-0 backdrop-blur bg-black/50 transition-opacity" aria-hidden="true" /> -->
                    </div>
                </transition>

                <transition
                    enter-active-class="ease-out duration-300"
                    enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-active-class="ease-in duration-200"
                    leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                    leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div 
                        v-if="showPopup" 
                        class="bg-white overflow-hidden shadow-xl transform transition-all w-full sm:mx-auto max-w-4xl"
                    >

                        <div class="border-b border-gray3 py-3 px-5 font-semibold font-poppins text-md text-grayTxt flex justify-between items-center">
                            <span class="text-sm sm:text-lg">Módszertan</span>
                            <button 
                                class="ms-5 hover:text-skyish transition-colors"
                                @click="() => { emits('closePopup') }"
                            >
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg hover:fill-[red] transition-colors duration-[0.4s]" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                            </button>
                        </div>
                        <div 
                            class="pt-5 pb-10 px-2 sm:px-5 overflow-y-auto body"
                            :class="{'max-h-[calc(100vh-200px)]' : $slots.footer, 'max-h-[calc(100vh-130px)]' : !$slots.footer}" 
                            @scroll="(event) => {emits('modalScroll', event)}"
                        >
                            <div>
                                <div>
                                    A befolyáslista nem úgy készül, mint a Forbes alapvetően számolásra és adatgyűjtésre alapozó listái. Mivel a befolyás nem csak objektív tényezők alapján állapítható meg, fontosak a háttérinformációk és a nehezebben mérhető tényezők is: hogy az adott szereplő milyen kapcsolatot ápol a piaca és az ország piacok, vagy más befolyásos vezetőivel, milyen lobbierővel bír a gazdasági vagy kormányzati körökben, mekkora az autonómiája, vállal-e szerepet szakmai vagy társadalmi szervezetekben, számon tartják-e meghatározó informális körökben, és hogy pozíciója mit jelent a mai Magyarország üzleti és politikai realitásában.
                                </div>
                                <div class="mt-5">
                                    A befolyás erejét olyan objektív és szubjektív tényezők mérlegelésével állapította meg a szerkesztőség, mint a vezető felelősségi körébe tartozó cég mérete, a büdzsé és létszám, ami fölött diszponál, valamint pályájának íve. Az Üzlet kategóriában ezáltal a legnagyobb árbevételű magyarországi vállalatok csúcsvezetői, második számú vezetői, pénzügyi vezetők és olyan befolyásos nők kerültek be, akik bár nem vezetnek nagyvállalatot, de a kapcsolataik, befolyásuk, hatásuk nagy, akár egy-egy szűk területen.
                                </div>
                                <div class="mt-5">
                                    A Kultúra, a Média és a Közélet kategóriák esetében az egyes szereplőket és piacokat ismerő háttéremberek segítségével olyan szubjektív tényezőket is vizsgáltunk, amelyekkel a közbeszéd, a közgondolkodás, azaz a társadalomra gyakorolt hatás mérhető. Magyarán az, hogy az adott nőnek milyen lobbiereje van a piacán vagy tevékenységi területén; mennyire hallatja hangját társadalmi és szakmai ügyekben; e megszólalásoknak van-e, volt-e az elmúlt évben érdemi hatása a magyar társadalom működésére vagy formális és informális körökre; netán hogy vállal-e akár politikai kockázatot környezete fejlesztéséért, társadalmi ügyek előmozdításáért.
                                </div>
                                <div class="mt-5">
                                    Összefoglalva idén is elsősorban azt vizsgáltuk: mit jelent egy-egy adott nő személye, pozíciója és ezek kettőse a mai Magyarország politikai és üzleti életben. A pénzügyi és létszámadatokat a Partner Control adatbázisából gyűjtöttük ki, és a legtöbb esetben az utolsó elérhető teljes, azaz a 2022-es teljes pénzügyi évet érintő adatokat tüntettünk fel. Ahol rendelkezésünkre állt 2023-as előzetes adat, külön jelezzük. A további információk gyűjtésében tucatnyi háttérbeszélgetés, informátori és sajtóértesülések segítették munkánkat.
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </transition>
            </div>
        </transition>
    </teleport>
</template>