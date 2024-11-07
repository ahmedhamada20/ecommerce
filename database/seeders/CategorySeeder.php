<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::deleteDirectory('public/category');
        Storage::makeDirectory('public/category');
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();


        $data =  Category::create([
            'name_ar' => "منتجات البشرة",
            'name_en' => "Skin products",
            'icon' => fake()->imageUrl(),
            'image' => fake()->image(storage_path('app/public/category'), 640, 480, null, false),
            'active' => fake()->boolean(),
            'description_ar' => "مؤقتًا وقد يكون عرضة للتحرش. السلع الذكية المشابهة للوجه يمكن أن تحزن بطريقة ما. الخيار nulla autem odio est.Sit Earum rerum rerum tempore molestias.",
            'description_en' => "Tempore est et aut suscipit ad molestias. Commodi sapiente similique eos facere quisquam dolorem modi ea. Optio nulla autem odio est. Sit earum rerum tempore molestias.",
            'parent_id' => null,
            'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
        ]);


        Category::create([
            'name_ar' => "منتجات العناية بالبشرة",
            'name_en' => "Skin care products",
            'icon' => fake()->imageUrl(),
            'image' => '1730981471.jpg',
            'active' => fake()->boolean(),
            'description_ar' => "استخدم الناس مستحضرات التجميل منذ آلاف السنين للعناية بالبشرة وتحسين مظهرها. لقد دخلت مستحضرات التجميل المرئية للنساء والرجال الموضة وخرجت على مر القرون.

استخدمت بعض الأشكال المبكرة لمستحضرات التجميل مكونات ضارة مثل الرصاص التي تسببت في مشاكل صحية خطيرة وأدت في بعض الأحيان إلى الوفاة. يتم اختبار مستحضرات التجميل التجارية الحديثة بشكل عام",
            'description_en' => "People have used cosmetics for thousands of years for skin care and appearance enhancement. Visible cosmetics for women and men have gone in and out of fashion over the centuries.

Some early forms of cosmetics used harmful ingredients such as lead that caused serious health problems and sometimes resulted in death. Modern commercial cosmetics are generally tested for",
            'parent_id' => $data->id,
            'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
        ]);

        Category::create([
            'name_ar' => "منتجات ازالة شعر الجسم",
            'name_en' => "Body hair removal products",
            'icon' => fake()->imageUrl(),
            'image' => '1730981471.jpg',
            'active' => fake()->boolean(),
            'description_ar' => "يمكن استخدام مستحضرات التجميل المصممة للعناية بالبشرة لتنظيف البشرة وتقشيرها وحمايتها، فضلاً عن تجديدها، وذلك باستخدام مستحضرات الجسم والمنظفات والتونر والأمصال والمرطبات وكريمات العين والريتينول والبلسم. يمكن استخدام مستحضرات التجميل المصممة للعناية الشخصية بشكل عام، مثل الشامبو والصابون وغسول الجسم، لتنظيف الجسم.

يمكن استخدام مستحضرات التجميل المصممة لتحسين مظهر الشخص (المكياج) لإخفاء العيوب أو تعزيز السمات الطبيعية أو إضافة لون إلى وجه الشخص. في بعض الحالات، يتم استخدام أشكال أكثر تطرفًا من المكياج في العروض وعروض الأزياء والأشخاص الذين يرتدون الأزياء ويمكن أن يغير مظهر الوجه بالكامل ليشبه شخصًا أو مخلوقًا أو كائنًا مختلفًا. تشمل تقنيات تغيير المظهر تحديد الوجه، والذي يهدف إلى إعطاء شكل لمنطقة من الوجه.

يمكن أيضًا تصميم مستحضرات التجميل لإضافة العطر إلى الجسم.

تُصنف المنتجات المستخدمة للعناية بالشعر، مثل التموجات الدائمة، وألوان الشعر، ومثبتات الشعر، ضمن مستحضرات التجميل أيضًا",
            'description_en' => "Cosmetics designed for skin care may be used to cleanse, exfoliate and protect the skin, as well as replenish it, using body lotions, cleansers, toners, serums, moisturizers, eye creams, retinol, and balms. Cosmetics designed for more general personal care, such as shampoo, soap, and body wash, can be used to clean the body.

Cosmetics designed to enhance one's appearance (makeup) can be used to conceal blemishes, enhance one's natural features, or add color to a person's face. In some cases, more extreme forms of makeup are used for performances, fashion shows, and people in costume and can change the appearance of the face entirely to resemble a different person, creature, or object. Techniques for changing appearance include contouring, which aims to give shape to an area of the face.

Cosmetics can also be designed to add fragrance to the body.

Products used for haircare, such as permanent waves, hair colors, and hairsprays, are classified as cosmetic products as well.[7]",
            'parent_id' => $data->id,
            'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
        ]);

        Category::create([
            'name_ar' => "منتجات تنظيف البشرة",
            'name_en' => "Skin cleansing products",
            'icon' => fake()->imageUrl(),
            'image' => '1730981471.jpg',
            'active' => fake()->boolean(),
            'description_ar' => "لدى الاتحاد الأوروبي والهيئات التنظيمية حول العالم لوائح صارمة فيما يتعلق بمستحضرات التجميل. في الولايات المتحدة، لا تتطلب منتجات ومكونات مستحضرات التجميل موافقة إدارة الغذاء والدواء. منعت بعض الدول استخدام الحيوانات لإجراء اختبارات التجميل.",
            'description_en' => "The European Union and regulatory agencies around the world have stringent regulations for cosmetics. In the United States, cosmetic products and ingredients do not require FDA approval. Some countries have banned using animals for cosmetic testing.",
            'parent_id' => $data->id,
            'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
        ]);

        $data2 =  Category::create([
            'name_ar' => "منتجات الشعر وفروة الرأس",
            'name_en' => "Hair and scalp products",
            'icon' => fake()->imageUrl(),
            'image' => '1730981991.jpg',
            'active' => fake()->boolean(),
            'description_ar' => "
تم استخدام مستحضرات التجميل منذ آلاف السنين، حيث استخدمها المصريون القدماء والسومريون. في أوروبا، استمر استخدام مستحضرات التجميل في العصور الوسطى - حيث تم تبييض الوجه وأحمر الخدود - [8] على الرغم من تباين المواقف تجاه مستحضرات التجميل على مر الزمن، مع استهجان استخدام مستحضرات التجميل علنًا في العديد من النقاط في التاريخ الغربي. [9] بغض النظر عن التغيرات في المواقف الاجتماعية تجاه مستحضرات التجميل، فقد حقق الكثيرون أحيانًا مظهرًا مثاليًا من خلال مستحضرات التجميل.

وفقًا لأحد المصادر، تشمل التطورات الرئيسية المبكرة في مستحضرات التجميل ما يلي:[1]

الكحل كان يستخدمه المصريون القدماء
كما استخدم زيت الخروع في مصر القديمة كبلسم وقائي
كريمات البشرة المصنوعة من شمع النحل وزيت الزيتون وماء الورد، والتي وصفها الرومان
الفازلين واللانولين في القرن التاسع عشر.",
            'description_en' => "Cosmetics have been in use for thousands of years, with ancient Egyptians and Sumerians using them. In Europe, the use of cosmetics continued into the Middle Ages—where the face was whitened and the cheeks rouged—[8] though attitudes towards cosmetics varied throughout time, with the use of cosmetics being openly frowned upon at many points in Western history.[9] Regardless of the changes in social attitudes towards cosmetics, many occasionally achieved ideals of appearance through cosmetics.

According to one source, early major developments in cosmetics include:[1]
Kohl used by ancient Egyptians
Castor oil also used in ancient Egypt as a protective balm
Skin creams made of beeswax, olive oil, and rose water, described by the Romans
Vaseline and lanolin in the nineteenth century.",
            'parent_id' => null,
            'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
        ]);

        Category::create([
            'name_ar' => "منتجات العناية بالشعر وفروة الرأس وتنظيفها",
            'name_en' => "Hair and scalp care and cleansing products",
            'icon' => fake()->imageUrl(),
            'image' => '1730982038.jpg',
            'active' => fake()->boolean(),
            'description_ar' => "تاريخياً، أدى غياب تنظيم تصنيع واستخدام مستحضرات التجميل، فضلاً عن غياب المعرفة العلمية فيما يتعلق بتأثيرات المركبات المختلفة على جسم الإنسان خلال معظم هذه الفترة الزمنية، إلى عدد من الآثار السلبية على من استخدموها. مستحضرات التجميل، بما في ذلك التشوهات والعمى وفي بعض الحالات الوفاة. على الرغم من استخدام منتجات غير ضارة، مثل التوت والشمندر، إلا أن العديد من مستحضرات التجميل المتوفرة في ذلك الوقت كانت لا تزال مشكوك فيها كيميائيًا وحتى سامة. تشمل أمثلة الاستخدام السائد لمستحضرات التجميل الضارة استخدام السيروز (الرصاص الأبيض) في عدد من الثقافات المختلفة، مثل عصر النهضة في الغرب، والعمى الناجم عن الماسكارا Lash Lure خلال أوائل القرن العشرين. خلال القرن التاسع عشر،",
            'description_en' => "Historically, the absence of regulation of the manufacture and use of cosmetics, as well as the absence of scientific knowledge regarding the effects of various compounds on the human body for much of this time period, led to a number of negative effects upon those who used cosmetics, including deformities, blindness, and, in some cases, death. Although harmless products were used, such as berries, and beetroot, many cosmetic products available at this time were still chemically dubious and even poisonous. Examples of the prevalent usage of harmful cosmetics include the use of ceruse (white lead) throughout a number of different cultures, such as during the Renaissance in the West, and blindness caused by the mascara Lash Lure during the early 20th century. During the 19th century,",
            'parent_id' => $data2->id,
            'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
        ]);

        Category::create([
            'name_ar' => "منتجات تلوين الشعر",
            'name_en' => "Hair colouring products",
            'icon' => fake()->imageUrl(),
            'image' => '1730982081.jpg',
            'active' => fake()->boolean(),
            'description_ar' => "طوال أواخر القرن التاسع عشر وأوائل القرن العشرين، أدت التغيرات في المواقف السائدة تجاه مستحضرات التجميل إلى توسع أوسع في صناعة مستحضرات التجميل. في عام 1882، أصبحت الممثلة الإنجليزية وشخصية المجتمع ليلي لانغتري هي الفتاة الملصقة لفيلم Pears of London، مما يجعلها أول شخصية مشهورة تؤيد منتجًا تجاريًا. وسمحت باستخدام اسمها على مساحيق الوجه ومنتجات البشرة.[12] خلال العقد الأول من القرن العشرين، تم تطوير السوق في الولايات المتحدة على يد شخصيات مثل إليزابيث أردن، وهيلينا روبنشتاين، وماكس فاكتور. انضمت ريفلون إلى هذه الشركات قبل الحرب العالمية الثانية مباشرة، وإستي لودر بعدها مباشرة. بحلول منتصف القرن العشرين، كان استخدام مستحضرات التجميل على نطاق واسع من قبل النساء في جميع المجتمعات الصناعية تقريبًا حول العالم، حيث أصبحت صناعة مستحضرات التجميل مشروعًا بمليارات الدولارات بحلول بداية القرن الحادي والعشرين. أدى القبول الواسع لاستخدام مستحضرات التجميل إلى اعتبار البعض للمكياج أداة تستخدم في قمع المرأة وإخضاعها لمعايير مجتمعية غير عادلة. في عام 1968، في احتجاج ملكة جمال أمريكا النسوية، ألقى المتظاهرون بشكل رمزي عددًا من المنتجات النسائية في سلة مهملات الحرية،[14] مع مستحضرات التجميل من بين العناصر التي أطلق عليها المتظاهرون \"أدوات تعذيب الإناث\"[15] ومعدات ما لقد نظروا إلى الأنوثة القسرية.",
            'description_en' => "Throughout the late 19th and early 20th centuries, changes in the prevailing attitudes towards cosmetics led to a wider expansion of the cosmetics industry. In 1882, English actress and socialite Lillie Langtry became the poster girl for Pears of London, making her the first celebrity to endorse a commercial product.[11] She allowed her name to be used on face powders and skin products.[12] During the 1910s, the market in the US was developed by figures such as Elizabeth Arden, Helena Rubinstein, and Max Factor. These firms were joined by Revlon just before World War II and Estée Lauder just after. By the middle of the 20th century, cosmetics were in widespread use by women in nearly all industrial societies around the world, with the cosmetics industry becoming a multibillion-dollar enterprise by the beginning of the 21st century.[13] The wider acceptance of the use of cosmetics led some to see makeup as a tool used in the oppression and subjection of women to unfair societal standards. In 1968, at the feminist Miss America protest, protesters symbolically threw a number of feminine products into a Freedom Trash Can,[14] with cosmetics among the items the protesters called \"instruments of female torture\"[15] and accoutrements of what they perceived to be enforced femininity.",
            'parent_id' => $data2->id,
            'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
        ]);



        // for ($i = 1; $i <= 5; $i++) {
        //     Category::create([
        //         'name_ar' => fake()->name(),
        //         'name_en' => fake()->name(),
        //         'icon' => fake()->imageUrl(),
        //         'image' => fake()->image(storage_path('app/public/category'), 640, 480, null, false),
        //         'active' => fake()->boolean(),
        //         'description_ar' => fake()->text(),
        //         'description_en' => fake()->text(),
        //         'parent_id' => $i === 1 ? null : (fake()->boolean() ? null : Category::inRandomOrder()->first()->id),
        //         'user_id' => auth('web')->check() ? auth('web')->user()->id : null,
        //     ]);
        // }
    }
}
