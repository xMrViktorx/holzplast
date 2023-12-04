@extends('shop::layouts.master')

@section('content')
    <div class="flex justify-center items-center gap-8 p-2 sm:p-8 pt-32 sm:pt-32">
         <div class="shadow-lg p-4">
            <p class="font-bold">Rólunk</p>
            <p>A Holz-Plast Műanyag és Faipari Kft. 1994-ben alakult családi vállalkozásként, 2021-től új tulajdonossal, és ezáltal megújlt fejlesztési ambíciókkal, folytatja az eddigi eredményes gyártási folyamatokat. A cég magas minőségi és műszaki követelményeket kielégítő műanyag termékek fröccsöntésével foglalkozik.  Elsősorban saját fejlesztésű építőipari segédeszközöket gyártunk, lapozáshoz, betonozáshoz,  kisebb részben  háztartási eszközök gyártóinak beszállítójaként működünk. Jelenleg a vállalkozás 9 főt foglalkoztat, saját tulajdonú telephelyén, Kalocsán.</p><br>

            <p>A cég ISO 9001 és 14001 szabvány szerinti minőségirányítási rendszert működtet.</p><br>

            <p>A cég filozófiája, hogy ipari melléktermékek újra hasznosításával a környezetterhelést minimálisra csökkentve állít elő különféle műanyagipari termékeket. Ezzel összhangban műanyagyártó vállalatként, a kiemelkedő minőségű termelés mellett, fő célkitűzésünk a környezetünk megőrzése, az anyagok – közöttük a műanyagok- körforgalma. Arra törekszünk, az európai műanyaggyártókhoz hasonlóan, hogy egyre zöldebbé váljunk. Célunk a műanyagok körforgásos gazdaságban betöltött szerepével kapcsolatos európai stratégiák sikerre vitele, különösen az egyszer használatos termékek – mennyiségének mérséklése az iparban és a mindennapi életben is.</p><br>

            <p>Folyamatosan új piacokat keresve saját fejlesztési tevékenységünket kihasználva dobunk a piacra újabbnál újabb termékeket, amelyeket a fogyasztók visszajelzései alapján fejlesztünk tovább.</p><br>
            
            <p>A Holz-Plast Kft, elkötelezett szándéka, hogy a megrendelt termékek gyártását és a hozzá kapcsolódó egyéb feladatokat, környezetkímélően, a legjobb szakmai gyakorlat szerint, a legköltséghatékonyabb módszerekkel, ugyanakkor, a szolgáltatásainkat igénybe vevők elvárásainak megfelelően végezze el.</p><br>

            <p class="font-bold">Elérhetőségek:</p>
            <p>H-6300 Kalocsa<br>
            Erkel Ferenc utca 28.<br>
            Tel: +36 30 4283201<br>
            e-mail: holzplast@rcgroup.co</p><br>
            <a href="{{ route('shop.terms') }}" class="font-bold underline cursor-pointer">Általános szerződési feltételek</a><br><br>

            <p class="font-bold">Fizetés</p>

            <p>Vásárlás esetén a Vásárló banki átutalásos előre fizetés, vagy utánvétes készpénzes fizetés (futárszolgálatnál vagy személyes átvételkor) fizetési lehetőségek közül választhat. A fizetés módját Vásárló a rendelés elküldésekor választja ki és adja meg. Vásárlónak a fizetési mód megváltoztatására a rendelés elküldését követően, a csomag feladásáig áll módjában, melyről kizárólag e-mailben kell értesítenie Üzemeltetőt.</p><br>
            
            <p class="font-bold">Szállítás</p>
            <p>A megrendelt terméke(ke)t a GLS futárszolgálat szállítja ki és kézbesíti a Vásárló által megadott szállítási címre. Az Üzemeltető kizárólag magyarországi címre kézbesítteti a termékeket a jelen ÁSZF szerinti szállítási díjakon. A kézbesítés részletes feltételeire a Futárszolgálatok általános üzleti feltételei és az adatvédelemre vonatkozó szabályai irányadóak.</p><br>

            <a href="{{ route('shop.privacy') }}" class="font-bold underline cursor-pointer">Adatkezelési tájékoztató</a>
        </div>
    </div>
@endsection
