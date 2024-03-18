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
                                <div class="font-[500] text-[18px] mt-4">
                                    Kik kerülnek fel a listára?
                                </div>
                                <div class="mt-5">
                                    Az ötven leggazdagabb magyar között olyan magyar milliárdosok szerepelnek, akik meghatározó üzleti tevékenységet folytatnak Magyarországon, vagy akiket üzleti érdekeltségeik ide kötnek. Módszertanunk szerint magyar az, akinek van magyar állampolgársága (a kettős állampolgárság nem kizáró ok), a magyarországi lakhely viszont nem feltétel. A testvérpárokat egyben számoltuk, ha érdekeltségeik legalább kilencven százaléka egyenlő arányban oszlik meg közöttük.
                                </div>
                                <div class="font-[500] text-[18px] mt-5">
                                    Hogyan számoltunk?
                                </div>
                                <div class="mt-5">
                                    A vagyonbecslés alapja a cégértékelés. A társaságokat az amerikai Forbes módszertanát alapul véve értékeltük. Ahol lehetett, az EBITDA alapján számoltunk, leginkább ez alkalmas arra, hogy megmutassa a cégek pénztermelő képességét. A nemzetközi vállalatértékelési gyakorlat alapján az EBITDA-t felszoroztuk egy iparági szorzóval, majd az így kapott értékből levontuk a vállalat hosszú lejáratú kötelezettségeit, és hozzáadtuk a készpénzállományát.
                                </div>
                                <div class="mt-5">
                                    Nem termelő cégeknél (azaz például pénzügyi szolgáltatóknál, ingatlanfejlesztőknél) is az amerikai anyalap útmutatása alapján jártunk el, itt a vállalkozásban felhalmozott értékből – leginkább eszközökből – indulunk ki, és levonjuk az összes kötelezettséget. Így jártunk el az állami megrendeléseknek nagy mértékben kitett, vagy állami koncessziókat tulajdonló cégeknél is. Az állami kitettséget az elmúlt három év közbeszerzésen elnyert megbízásainak összege alapján vizsgáltuk; ahol ez a legfrissebb éves árbevétel legalább nyolcvan százalékát elérte, ott nem tartottuk indokoltnak a piaci, EBITDA-alapú megközelítést, mivel a pénztermelő képesség nagyban függ az állammal kötött szerződésektől. Ugyanígy vizsgáltuk a tendergyőztesek alvállalkozóit is.
                                </div>
                                <div class="mt-5">
                                    Szintén az amerikai Forbes módszertanát követve, valamint magyar M&A tanácsadókkal egyeztetve egységesen tízszázalékos likviditási diszkontot alkalmaztunk a privát cégekre. Ennek az az oka, hogy ezek a társaságok kevésbé likvidek, mint a tőzsdei cégek, eladásuk az egyre inkább jellemző hatósági engedélyeztetési eljárások miatt költségesebb is. Startupok esetében az eddig kapott tőkebefektetésekből és piaci információkból indultunk ki.
                                </div>
                                <div class="mt-5">
                                    A 2023-as listán a módszertant azzal frissítettük, hogy minden magyarországi központú termelőcégnél a legfrissebb EBITDA helyett az elmúlt három év EBITDA-jának átlaga alapján számoljuk ki a becsült cégértéket. Több, általunk megkérdezett M&A tanácsadó szerint az elmúlt időszak inflációs környezetében a piac jelenleg így árazza a magyar vállalatokat, az utóbbi hónapokban minden potenciális felvásárló, ha ajánlatot tesz, az elmúlt évek EBITDA-jának átlaga alapján áraz.
                                </div>
                                <div class="mt-5">
                                    Az osztalékoknál levontuk az adókat, ahol tudtuk, felmértük az adott tulajdonos egyéb érdekeltségeinek finanszírozási igényét, illetve beszámítottuk az elmúlt évek osztalékainak egy részét is.
                                </div>
                                <div class="mt-5">
                                    Munkánkat az Opten céginformáció-szolgáltató adatai és kimutatásai segítették. A cégértékelésben a Concorde MB Partners munkatársai adtak tanácsot. Segítségünkre volt kimutatásaival az Ingatlan.com is. Jogi ügyekben a Társaság a Szabadságjogokért (TASZ) szakértői segítik munkánkat.
                                </div>
                                <div class="font-[500] text-[18px] mt-5">
                                    Milyen adatokat használtunk fel?
                                </div>
                                <div class="mt-5">
                                    Publikusan elérhető információkból dolgoztunk, ahol lehetett, konszolidált adatokat használtunk, ennek híján az elérhető információk alapján magunk konszolidáltuk az eredményeket. A 2023. december 1-jéig feltöltött éves beszámolókból dolgoztunk, vagyis a becslések alapját a 2022-es üzleti évről szóló hivatalos beszámolók adták. A részvényeknél, devizaárfolyamoknál a legfrissebb adatokkal számoltunk.
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </transition>
            </div>
        </transition>
    </teleport>
</template>