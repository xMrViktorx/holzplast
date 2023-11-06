<?php

namespace Modules\Shop\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Category;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Product;
use Modules\Admin\Entities\ProductImage;

class ShopDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $now = Carbon::now();
        $category1 = Category::updateOrCreate(
            [
                'name' => 'Ékek',
                'slug' => 'ekek',
            ],
            [
                'status' => 1,
                'created_at' => $now
            ]
        );

        $category2 = Category::updateOrCreate(
            [
                'name' => 'Távtartók',
                'slug' => 'tavtartok',
            ],
            [
                'status' => 1,
                'created_at' => $now
            ]
        );

        //First product
        Product::updateOrCreate(
            [
                'name' => 'H&P Csavaros lapszintező talp 2 mm, 3 mm vastagságban',
                'slug' => 'hp-csavaros-lapszintez-talp-2-mm-3-mm-vastagsagban',
            ],
            [
                'status' => 1,
                'description' => '<p>3-20 mm vastag lapokhoz csavaros lapszintező fejhez. Szerszám nélküli egyszerű használat, külön szerszámot vagy fogót nem igényel használata, nagy lapok burkolásánál a tökéletes kivitelezéshez elengedhetetlen segédeszköz, gyors egyszerű és megbízható használat, padlón és falfelületeken is használható.</p>
                <p>Kompatibilis a Rubi, TLS, Raimondi és Bautool lapszintező fejekkel.</p>
                <p>Kiszerelés: 100 db/csomag vagy ömlesztve.</p>',
                'price' => 1999,
                'amount' => 20,
                'category_id' => $category1->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 1],
            [
                'path' => 'images/products/1/1.jpg',
                'created_at' => $now
            ]
        );

        //Second product
        Product::updateOrCreate(
            [
                'name' => 'H&P Burkolat szintező ék',
                'slug' => 'hp-burkolat-szintez-ek',
            ],
            [
                'status' => 1,
                'description' => '<p>A precíz burkoló munkát segíti a burkolat szintező segédeszköz. Az ékelés hatására a még meglévő, két egymás melletti burkoló lapok szintkülönbségei teljesen eltűnnek, a legnagyobb segítséget a nagyobb méretű lapok esetében nyújtja. Aljzaton, oldalfalakon egyaránt alkalmazható. A burkolat szintező talpelemből, ékekből és egy fogóból áll. A burkolat alá behelyezett talpelem talpainak segítségével, alulról támasztva lehet ék segítségével szintbe feszíteni a burkoló lapokat. Az ék megfeszítése pedig egy speciálisan kialakított fogó segítségével végezhető el.</p>
                <p>Méret: 21,6 x 80 x 12 mm</p>
                <p>Kiszerelés: 50 db/csomag (fekete-fehér csomagolás) vagy ömlesztve</p>
                <p>Kiszerelés: 50 db/csomag (színes csomagolás)</p>',
                'price' => 200,
                'amount' => 30,
                'category_id' => $category1->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 2],
            [
                'path' => 'images/products/2/2.jpg',
                'created_at' => $now
            ]
        );

        //Third product
        Product::updateOrCreate(
            [
                'name' => 'H&P Fugakereszt, 3 mm',
                'slug' => 'hp-fugakereszt-3-mm',
            ],
            [
                'status' => 1,
                'description' => '<p>Csempék, burkolólapok közötti távolság pontos tartására, egyenletes, egységes kialakításhoz, a fugakereszteket a fugázás előtt el kell távolítani.</p>
                <p>Kiszerelés: 200 db/csomag vagy ömlesztve</p>',
                'price' => 500,
                'amount' => 5,
                'category_id' => $category1->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 3],
            [
                'path' => 'images/products/3/3.jpg',
                'created_at' => $now
            ]
        );

        //Fourth product
        Product::updateOrCreate(
            [
                'name' => 'H&P Fuga ék, 7x5x30 mm',
                'slug' => 'hp-fugakereszt-3-mm',
            ],
            [
                'status' => 1,
                'description' => '<p>A fugaék segíti a burkolólapok vízszintes beállítását, használható lapszintező kapuhoz. Lapszintező kapuval és fugaékkel idő és költséghatékony a burkolási folyamat. Nagy lapok burkolásánál elengedhetetlen segédeszközök. Strapabíró polipropilénből készül.</p>
                <p>Kiszerelés: 300 db/ csomag vagy ömlesztve</p>',
                'price' => 1000,
                'amount' => 100,
                'category_id' => $category1->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 4],
            [
                'path' => 'images/products/4/4.jpg',
                'created_at' => $now
            ]
        );

        //Fifth product
        Product::updateOrCreate(
            [
                'name' => 'H&P Távtartó léc',
                'slug' => 'hp-tavtarto-lec',
            ],
            [
                'status' => 1,
                'description' => '<p>Vonal menti műanyag távtartó, vízszintesen fektetett vasalatok, alsó betonacél hálók távtartásához, 2 m hosszúságú. 25 és 30 mm szélességben.</p>',
                'price' => 150,
                'amount' => 60,
                'category_id' => $category2->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 5],
            [
                'path' => 'images/products/5/5.jpg',
                'created_at' => $now
            ]
        );

        //Sixth product
        Product::updateOrCreate(
            [
                'name' => 'H&P Távtartó, vertikális és horizontális használatra egymásba kapcsolható',
                'slug' => 'hp-tavtarto-vertikalis-es-horizontalis-hasznalatra-egymasba-kapcsolhato',
            ],
            [
                'status' => 1,
                'description' => '<p>25 és 50 mm magasságban</p>',
                'price' => 100,
                'amount' => 20,
                'category_id' => $category2->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 6],
            [
                'path' => 'images/products/6/6.jpg',
                'created_at' => $now
            ]
        );

        //Seventh product
        Product::updateOrCreate(
            [
                'name' => 'H&P Fix távtartó Vertikális és horizontális használatra',
                'slug' => 'hp-fix-tavtarto-vertikalis-es-horizontalis-hasznalatra',
            ],
            [
                'status' => 1,
                'description' => '<p>Betonacélok távtartását biztosítja, kis felületen érintkezik a zsaluzattal. 28x8 cm, 25 mm. Az egyik végén 2 db akasztóval, ami lehetővé teszi a vertikális használatot is.</p>
                <p>Méret: 28 cm x 8 cm x 25 mm</p>',
                'price' => 5000,
                'amount' => 10,
                'category_id' => $category2->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 7],
            [
                'path' => 'images/products/7/7.jpg',
                'created_at' => $now
            ]
        );

        //Eight product
        Product::updateOrCreate(
            [
                'name' => 'H&P Kör távtartó, csillag',
                'slug' => 'hp-kor-tavtarto-csillag',
            ],
            [
                'status' => 1,
                'description' => '<p>Különböző vasátmérőhöz, általában függőleges vasalásoknál használják, különböző átmérőben és formában. Kiemeli a betonvasat a zsalutól így biztosítható a megfelelő betontakarás.</p>
                <p>Kiszerelés: 100 db/csomag vagy ömlesztve</p>',
                'price' => 156,
                'amount' => 20,
                'category_id' => $category2->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 8],
            [
                'path' => 'images/products/8/8.jpg',
                'created_at' => $now
            ]
        );

        //Ninth product
        Product::updateOrCreate(
            [
                'name' => 'H&P H4 Távtartó',
                'slug' => 'hp-h4-tavtarto',
            ],
            [
                'status' => 1,
                'description' => '<p>2 méret az egyben, 25 x 30 x 45 x 50 mm</p>
                <p>Kiszerelés: 100 db/csomag vagy ömlesztve</p>',
                'price' => 1500,
                'amount' => 25,
                'category_id' => $category2->id,
                'created_at' => $now
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => 9],
            [
                'path' => 'images/products/9/9.jpg',
                'created_at' => $now
            ]
        );
    }
}
