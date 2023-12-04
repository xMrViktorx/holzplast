@extends('shop::layouts.master')

@section('content')
    <div class="flex justify-center items-center gap-8 p-2 sm:p-8 pt-32 sm:pt-32">
         <div class="shadow-lg p-4">
            <p class="font-bold">ADATKEZELÉSI SZABÁLYZAT</p>
            <p>Jelen adatvédelmi - adatkezelési szabályzat (továbbiakban: "Szabályzat") célja, hogy a Társaság (Holz-Plast Kft, 6300 Kalocsa, Erkel Ferenc utca 28, email: <a href="mailto:holzplast@rcgroup.co" class="text-blue-800">holzplast@rcgroup.co</a>, adószám: 11426556-2-03 ; továbbiakban: "Adatkezelő") a shop.holzplast.hu oldalon elérhető honlapján tárolt adatok kezelésével, felhasználásával, továbbításával, valamint az Adatkezelőnél való regisztrációval kapcsolatosan a legszélesebb körben tájékoztassa az érintetteket.</p><br>

            <p class="font-bold">Fogalmak:</p><br>

            <ul class="list-disc pl-4">
                <li><b>adatállomány:</b> az egy nyilvántartó-rendszerben kezelt adatok összessége,</li><br>
                <li><b>adatfeldolgozás:</b> az adatkezelési műveletekhez kapcsolódó technikai feladatok elvégzése, függetlenül a műveletek végrehajtásához alkalmazott módszertől és eszköztől, valamint az alkalmazás helyétől,</li><br>

                <li><b>adatfeldolgozó:</b> az a természetes vagy jogi személy, illetve jogi személyiséggel nem rendelkező szervezet, aki vagy amely az adatkezelő megbízásából - beleértve a jogszabály rendelkezése alapján történő megbízást is - személyes adatok feldolgozását végzi,</li><br>
                
                <li><b>adatkezelés:</b> az alkalmazott eljárástól függetlenül a személyes adatokon végzett bármely művelet, vagy a műveletek összessége, így például gyűjtése, felvétele, rögzítése, rendszerezése, tárolása, megváltoztatása, felhasználása, továbbítása, nyilvánosságra hozatala, összehangolása vagy összekapcsolása, zárolása, törlése és megsemmisítése, valamint az adatok további felhasználásának megakadályozása. Adatkezelésnek számít a fénykép-, hang- vagy képfelvétel készítése, valamint a személy azonosítására alkalmas fizikai jellemzők (pl. ujj- vagy tenyérnyomat, DNS-minta, íriszkép) rögzítése is,</li><br>

                <li><b>adatkezelő:</b> az a természetes vagy jogi személy, illetve jogi személyiséggel nem rendelkező szervezet, aki, vagy amely a személyes adatok kezelésének célját meghatározza, az adatkezelésre (beleértve a felhasznált eszközt) vonatkozó döntéseket meghozza és végrehajtja, vagy az általa megbízott adatfeldolgozóval végrehajtatja;</li><br>

                <li><b>adatmegsemmisítés:</b> az adatok vagy az azokat tartalmazó adathordozó teljes fizikai megsemmisítése,</li><br>

                <li><b>adattovábbítás:</b> ha az adatot meghatározott harmadik személy számára hozzáférhetővé teszik,</li><br> <li><b>adattörlés:</b> az adatok felismerhetetlenné tétele oly módon, hogy a helyreállításuk többé nem lehetséges,</li><br>

                <li><b>adatzárolás:</b> az adatok továbbításának, megismerésének, nyilvánosságra hozatalának, átalakításának, megváltoztatásának, megsemmisítésének, törlésének, összekapcsolásának vagy összehangolásának és felhasználásának véglegesen vagy meghatározott időre történő lehetetlenné tétele,</li><br>

                <li><b>harmadik személy:</b> olyan természetes vagy jogi személy, illetve jogi személyiséggel nem rendelkező szervezet, amely vagy aki nem azonos az érintettel, az adatkezelővel vagy az adatfeldolgozóval.</li><br>

                <li><b>hozzájárulás:</b> az érintett kívánságának önkéntes és határozott kinyilvánítása, amely megfelelő tájékoztatáson alapul, és amellyel félreérthetetlen beleegyezését adja a rá vonatkozó személyes adatok - teljes körű vagy egyes műveletekre kiterjedő - kezeléséhez,</li><br>
                <li><b>különleges adat:</b> a faji eredetre, a nemzeti és etnikai kisebbséghez tartozásra, a politikai véleményre vagy pártállásra, a vallásos vagy más világnézeti meggyőződésre, az érdekképviseleti szervezeti tagságra, az egészségi állapotra, a kóros szenvedélyre, a szexuális életre vonatkozó adat, valamint a bűnügyi személyes adat,</li><br>
                <li><b>nyilvánosságra hozatal:</b> ha az adatot bárki számára hozzáférhetővé teszik,</li><br>
                <li><b>regisztráció:</b> a szolgáltatást igénybe vevő azonosításához szükséges és elégséges azonosító adatok megadása az adatkezelő részére</li><br>
                <li><b>személyes adat:</b> bármely meghatározott (azonosított vagy azonosítható) természetes személlyel (a továbbiakban: "Érintett") kapcsolatba hozható adat, az adatból levonható, az érintettre vonatkozó következtetés. A személyes adat az adatkezelés során mindaddig megőrzi e minőségét, amíg kapcsolata az érintettel helyreállítható. A személy különösen akkor tekinthető azonosíthatónak, ha őt - közvetlenül vagy közvetve - név, azonosító jel, illetőleg egy vagy több, fizikai, fiziológiai, mentális, gazdasági, kulturális vagy szociális azonosságára jellemző tényező alapján azonosítani lehet;</li><br>
                <li><b>tiltakozás:</b> az érintett nyilatkozata, amellyel személyes adatainak kezelését kifogásolja, és az adatkezelés megszüntetését, illetve a kezelt adatok törlését kéri</li><br>

                <b>Adatkezelésre, adatfeldolgozásra vonatkozó szabályok:</b><br><br>

                <li>Személyes adat akkor kezelhető, ha</li>
                <div>
                 - ahhoz az érintett hozzájárul, vagy<br>
                 - azt törvény vagy - törvény felhatalmazása alapján, az abban meghatározott körben - helyi önkormányzat rendelete elrendeli.<br>
                </div><br>
                <li>Az érintett megrendelő regisztrációja során megadott adatait, mint a szolgáltatást igénybe vevő azonosításához szükséges és elégséges azonosító adatokat a szolgáltató a 2001. évi CVIII. Tv. szerint, az információs társadalommal összefüggő szolgáltatás nyújtására irányuló szerződés létrehozása, tartalmának meghatározása, módosítása, teljesítésének figyelemmel kísérése, az abból származó ellenértékek számlázása, valamint az azzal kapcsolatos követelések érvényesítése céljából kezeli.</li><br>
                <li>Különleges adatot az Adatkezelő nem kezel.</li><br>

                <li>Törvény közérdekből - az adatok körének kifejezett megjelölésével - elrendelheti a személyes adat nyilvánosságra hozatalát. Minden egyéb esetben a nyilvánosságra hozatalhoz az érintett hozzájárulása, különleges adat esetében írásbeli hozzájárulása szükséges. Kétség esetén azt kell vélelmezni, hogy az érintett a hozzájárulását nem adta meg. Az érintett hozzájárulását megadottnak kell tekinteni az érintett közszereplése során általa közölt vagy a nyilvánosságra hozatal céljából általa átadott adatok tekintetében. Az érintett kérelmére indult eljárásban a szükséges adatainak kezeléséhez való hozzájárulását vélelmezni kell. Erre a tényre az érintett figyelmét fel kell hívni.</li><br>

                <li>Jelen Szabályzat szempontjából adatfeldolgozó a Holz-Plast Korlátolt Felelőségű Társaság.</li><br>

                <li>Az adatfeldolgozónak a személyes adatok feldolgozásával kapcsolatos jogait és kötelezettségeit az adatkezelő határozza meg. Az adatkezelési műveletekre vonatkozó utasítások jogszerűségéért az adatkezelő felel. Az adatfeldolgozó tevékenységi körén belül, illetőleg az adatkezelő által meghatározott keretek között felelős a személyes adatok feldolgozásáért, megváltoztatásáért, törléséért, továbbításáért és nyilvánosságra hozataláért. Az adatfeldolgozó tevékenységének ellátása során más adatfeldolgozót nem vehet igénybe. Az adatfeldolgozó az adatkezelést érintő érdemi döntést nem hozhat, a tudomására jutott személyes adatokat kizárólag az adatkezelő rendelkezései szerint dolgozhatja fel, saját céljára adatfeldolgozást nem végezhet, továbbá a személyes adatokat az adatkezelő rendelkezései szerint köteles tárolni és megőrizni.</li><br>

                <li>Fentiek alapján az Adatkezelő az érintettek következő adatait kezeli: név, e-mail cím, cím, telefonszám, számlázási adatok, rendelési adatok.</li><br>

                <li>A szolgáltató az információs társadalommal összefüggő szolgáltatás nyújtására irányuló szerződésből származó ellenértékek számlázása céljából kezeli az információs társadalommal összefüggő szolgáltatás igénybevételével kapcsolatos olyan személyes adatokat, amelyek az ellenérték meghatározása és a számlázás céljából elengedhetetlenek, így különösen a szolgáltatás igénybevételének időpontjára, időtartamára és helyére vonatkozó adatokat. A szolgáltató a fentieken felül a szolgáltatás nyújtása céljából kezeli azon személyes adatokat, amelyek a szolgáltatás nyújtásához technikailag elengedhetetlenül szükségesek. A szolgáltató a szolgáltatás igénybevételével kapcsolatos adatokat a szolgáltatása hatékonyságának növelése, az igénybe vevőnek címzett elektronikus hirdetés vagy egyéb címzett tartalom eljuttatása, piackutatás céljából is kezeli, s ehhez az igénybe vevő regisztrációja útján kifejezetten hozzájárult.</li><br>

                <li>Az igénybe vevő az információs társadalommal összefüggő szolgáltatás igénybevételét megelőzően és a szolgáltatás igénybevétele során is folyamatosan biztosítja, hogy a szolgáltatása hatékonyságának növelése, az igénybe vevőnek címzett elektronikus hirdetés vagy egyéb címzett tartalom eljuttatása, piackutatás céljából is kezelt adatoknak e célból való adatkezelését az igénybe vevő megtilthassa.</li><br>

                <li>Az igénybe vevő regisztrálásával hozzájárulását adja ahhoz, hogy a szolgáltatóval együttműködő más szolgáltatók (továbbiakban: harmadik fél) részére adatait a szolgáltató átadja mindazon célra, amely célra az adatok kezelésére maga a szolgáltató is jogosult. Amennyiben a szolgáltató adatkezelési joga valamely cél tekintetében megszűnik, úgy erről a harmadik felet értesíti.</li><br>

                <li>Az adatkezelési jog megszűnése esetén a szolgáltató a szolgáltatást igénybe vevő adatait törli. A szolgáltató biztosítja, hogy az igénybe vevő az információs társadalommal összefüggő szolgáltatás igénybevétele előtt és az igénybevétel során bármikor megismerhesse, hogy a szolgáltató mely adatkezelési célokból mely adatfajtákat kezel.</li><br>

                <li>Az érintett megrendelő adatszolgáltatási kötelezettsége önkéntes, azonban a szükséges és elégséges adatok hiányában a szolgáltató az érintett megrendelő megrendeléseit nem tudja teljesíteni. Így a szolgáltatásunk teljesítése céljából, és e szabályzat szerinti feltételek mellett kérjük "kötelező" jelleggel megadni a szükséges és elégséges adatokat. A kötelező kifejezés jelen esetben nem az adatfelvétel kötelező jellegére utal, hanem arra, hogy vannak olyan rekordok, amelyek kitöltése nélkül a megrendelés sikerrel nem zárulhat, így bizonyos mezők kitöltetlenül hagyása, vagy nem megfelelő kitöltése a megrendelés elutasításához vezethet.</li><br>

                <li>A szolgáltatást igénybe vevő a megrendeléssel elismeri, hogy önkéntesen, egyértelmű és előzetes hozzájárulását adta ahhoz, hogy részére a szolgáltató, és szolgáltatóval együtt működő más szolgáltató elektronikus hirdetést küldjön a részére. E hozzájáruló nyilatkozatot bármikor korlátozás és indokolás nélkül, valamint ingyenesen visszavonhatja. Ebben az esetben a nyilatkozó nevét a jogszabály által előírt, meghatározott nyilvántartásból haladéktalanul törli a szolgáltató, és részére elektronikus hirdetést a továbbiakban nem küld. Az elektronikus hirdetés küldése során a hirdető tájékoztatja a címzettet arról az elektronikus levelezési címről és egyéb elérhetőségről, ahol az elektronikus hirdetések információs társadalommal összefüggő szolgáltatás felhasználásával történő küldésének megtiltása iránti igényét bejelentheti.</li><br>

                <li>Regisztrációhoz, előfizetéshez kötött szolgáltatásaink esetében ügyfeleink számára bizonyos időközönként tájékoztató célú körleveleket küldünk új szolgáltatásainkról, speciális ajánlatainkról stb. Amennyiben ügyfeleink nem akarják az ilyen promóciós leveleket a továbbiakban fogadni, bár korábban e szándékukat nem jelezték, lemondhatják azokat ugyanolyan módon és csatornán keresztül, ahogy a szolgáltatás igénybevételét kezdeményezték.</li><br>

                <li>A megrendeléssel az igénybe vevő, mint megrendelő elismeri, hogy a szolgáltató adatkezelési szabályait megismerte, és elfogadta, és az abban meghatározott nyilatkozatokat megtette, illetve a regisztrációja az adatkezeléshez való hozzájárulásnak minősül.</li><br>

                <li>Az adatkezelő vállalja, hogy amennyiben bármilyen módon változtatna a személyes adatok kezelésére vonatkozó elvein és gyakorlatán, ezekről a változásokról előzetesen értesíti honlapjának látogatóit, hogy azok mindig pontosan és folyamatosan ismerjék az adatkezelő portáljának egész területén érvényes adatkezelési elveket és gyakorlatot. A személyes adatok kezeléséről és védelméről szóló jelen Szabályzat mindig a ténylegesen alkalmazott elveket és a valóságos gyakorlatot tükrözi.</li><br>

                <li>Ha a személyes adatokat olyan módon szeretnénk felhasználni, hogy ez a felhasználási mód eltérne a személyes adatok gyűjtésekor meghirdetett elvektől és céloktól, akkor előzetesen e- mailen keresztül értesítjük az érintetteket, akiknek felajánljuk azt a lehetőséget, hogy eldönthessék, vállalják-e, azaz hozzájárulnak-e az új feltételek mentén is személyes adataik korábbiaktól eltérő módon történő kezeléséhez.</li><br>

                <li>Nem minősülnek személyes adatnak azok az anonim információk, melyeket a személyes azonosíthatóság kizárásával gyűjtenek és természetes személlyel nem hozhatóak kapcsolatba, illetve azok a demográfiai adatok sem minősülnek személyes adatnak, melyeket úgy gyűjtenek, hogy nem kapcsolják hozzá azokat azonosítható személyek személyes adataihoz, s ezáltal nem állítható fel kapcsolat természetes személlyel.</li><br>

                <li>Az érintettek által biztosított személyes, illetve egyéb adatokat nem egészítjük ki és nem kapcsoljuk össze más forrásból származó adatokkal, vagy információval. Amennyiben a jövőben különböző forrásokból származó adatok ilyenfajta összekapcsolására kerülne sor, ezt a tényt kizárólag a megfelelő tájékoztatást követően, előzetesen, az adott érintettől kapott hozzájárulás esetén tesszük meg.</li><br>

                <li>Amennyiben az arra feljogosított hatóságok a jogszabályokban előírt módon kérik fel személyes adatok átadására a szolgáltatót, az adatkezelő - törvényi kötelezettségének eleget téve - átadja a kért és rendelkezésre álló információkat.</li><br>

                <li>Amennyiben megrendelőink személyes adatokat bocsátanak a rendelkezésünkre, minden szükséges lépést megteszünk, hogy biztosítsuk ezeknek az adatoknak a biztonságát - mind a hálózati kommunikáció (tehát online adatkezelés) során, mind az adatok tárolása, őrzése (tehát offline adatkezelés) során.</li><br>

                <li>A személyes adatokhoz csak az illetékes munkaköröket betöltő személyek férhetnek hozzá.</li><br>

                <li>Az adatkezelő jelenleg nem kínál kifejezetten 14 éven aluli gyermekek számára szánt szolgáltatást, ezúton kijelenti, hogy nem gyűjt, és nem kezel 14 éven aluli gyermekekről személyes adatokat. Amennyiben 14 éven aluli gyermek személyes adatainak kezelésére vonatkozó igény merül fel, csak abban az esetben lehetséges ilyen adatok rögzítése, amennyiben megfelelően kiállított ellenőrizhető formájú szülői, vagy más törvényes képviselői beleegyezés, hozzájárulás áll rendelkezésünkre. Ilyen felhatalmazás hiányában gyerekek személyes adatait nem rögzítjük (még akkor sem, ha ennek hiányában a szolgáltatást nem lehet igénybe venni).</li><br>

                <p class="font-bold">Érintettek jogai:</p><br>

                <li>Az érintett tájékoztatást kérhet személyes adatai kezeléséről, valamint kérheti személyes adatainak helyesbítését, illetve - a jogszabályban elrendelt adatkezelések kivételével - törlését.</li><br>

                <li>Az érintett kérelmére az adatkezelő tájékoztatást ad az általa kezelt, illetőleg az általa megbízott feldolgozó által feldolgozott adatairól, az adatkezelés céljáról, jogalapjáról, időtartamáról, az adatfeldolgozó nevéről, címéről (székhelyéről) és az adatkezeléssel összefüggő tevékenységéről, továbbá arról, hogy kik és milyen célból kapják vagy kapták meg az adatokat. Az adatkezelő köteles a kérelem benyújtásától számított legrövidebb idő alatt, legfeljebb azonban 30 napon belül írásban, közérthető formában megadni a tájékoztatást.</li><br>

                <li>Az érintett tájékoztatását az adatkezelő csak akkor tagadhatja meg, ha azt törvény, az állam külső és belső biztonsága, így a honvédelem, a nemzetbiztonság, a bűnmegelőzés vagy bűnüldözés érdekében, továbbá állami vagy helyi önkormányzati pénzügyi érdekből, valamint az érintett vagy mások jogainak védelme érdekében korlátozza. Az adatkezelő köteles az érintettel a felvilágosítás megtagadásának indokát közölni. Az elutasított kérelmekről az adatkezelő az adatvédelmi biztost évente értesíti.</li><br>

                <li>A valóságnak meg nem felelő adatot az adatkezelő helyesbíteni köteles.</li><br>

                <li>A személyes adatot törölni kell, ha:<br>
                    <div>
                        - kezelése jogellenes,<br>
                        - az érintett kéri,<br>
                        - az hiányos vagy téves - és ez az állapot jogszerűen nem korrigálható -, feltéve, hogy a
                        törlést törvény nem zárja ki,<br>
                        - az adatkezelés célja megszűnt, vagy az adatok tárolásának törvényben
                        meghatározott határideje lejárt,<br>
                        - azt a bíróság vagy az adatvédelmi biztos elrendelte.
                    </div>
                </li><br>

                <li>A helyesbítésről és a törlésről az érintettet, továbbá mindazokat értesíteni kell, akiknek korábban az adatot adatkezelés céljára továbbították. Az értesítés mellőzhető, ha ez az adatkezelés céljára való tekintettel az érintett jogos érdekét nem sérti.</li><br>

                <li>Az érintett tiltakozhat személyes adatának kezelése ellen, ha:<br>
                    <div >
                        - a személyes adatok kezelése (továbbítása) kizárólag az adatkezelő vagy az
                        adatátvevő jogának vagy jogos érdekének érvényesítéséhez szükséges, kivéve, ha az
                        adatkezelést törvény rendelte el,<br>
                        - a személyes adat felhasználása vagy továbbítása közvetlen üzletszerzés,
                        közvélemény-kutatás vagy tudományos kutatás céljára történik,<br>
                        - a tiltakozás jogának gyakorlását egyébként törvény lehetővé teszi.
                    </div>
                </li><br>

                <li>Az adatkezelő - az adatkezelés egyidejű felfüggesztésével - a tiltakozást köteles a kérelem
                benyújtásától számított legrövidebb időn belül, de legfeljebb 15 nap alatt megvizsgálni, és
                annak eredményéről a kérelmezőt írásban tájékoztatni. Amennyiben a tiltakozás indokolt, az
                adatkezelő köteles az adatkezelést - beleértve a további adatfelvételt és adattovábbítást is -
                megszüntetni, és az adatokat zárolni, valamint a tiltakozásról, illetőleg az annak alapján tett
                intézkedésekről értesíteni mindazokat, akik részére a tiltakozással érintett személyes adatot
                korábban továbbította, és akik kötelesek intézkedni a tiltakozási jog érvényesítése
                érdekében. Amennyiben az érintett az adatkezelőnek ezen döntésével nem ért egyet, az
                ellen - annak közlésétől számított 30 napon belül - bírósághoz fordulhat.</li><br>

                <li>Az adatkezelő az érintett adatát nem törölheti, ha az adatkezelést törvény rendelte el. Az
                adat azonban nem továbbítható az adatátvevő részére, ha az adatkezelő egyetértett a
                tiltakozással, illetőleg a bíróság a tiltakozás jogosságát megállapította.</li><br>

                <li>Az érintett a jogainak megsértése esetén az adatkezelő ellen bírósághoz fordulhat.</li><br>
            </ul>
        </div>
    </div>
@endsection
