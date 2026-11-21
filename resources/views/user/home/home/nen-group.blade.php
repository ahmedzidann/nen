{{-- NEN Group: the group's companies as sticky stacking cards (each card shrinks and dims as the next slides over it).
     STATIC for now: there is no dashboard table for the group yet. Copy and logos are from NEN's live site
     (site.nen-global.org). When a dashboard source exists, replace $nxGroup with it. --}}
@php
    $nxGroup = [
        ['name' => ['Technology', 'التقنية'], 'ghost' => ['TECHNOLOGY', 'تقنية'], 'year' => '2008', 'logo' => 'images/subsidiaries/nen-tech.png',
            'text' => ['The engine behind our e-learning, e-exam and verification platforms, and Microsoft cloud, security and software services.', 'المحرك وراء منصاتنا للتعليم والاختبارات والتحقق الإلكتروني، وخدمات مايكروسوفت السحابية والأمنية والبرمجية.']],
        ['name' => ['Academy', 'الأكاديمية'], 'ghost' => ['ACADEMY', 'أكاديمية'], 'year' => '2010', 'logo' => 'images/subsidiaries/nen-learningacademy.png',
            'text' => ['Accredited courses and professional certification programs that help learners build, prove and grow their skills.', 'دورات معتمدة وبرامج شهادات مهنية تساعد المتعلمين على بناء مهاراتهم وإثباتها وتطويرها.']],
        ['name' => ['Aviation', 'الطيران'], 'ghost' => ['AVIATION', 'طيران'], 'year' => '2010', 'logo' => 'images/subsidiaries/nenaviation.png',
            'text' => ['Aviation training and certification programs delivered through IATA-accredited NEN centers.', 'برامج تدريب واعتماد في مجال الطيران تُقدَّم عبر مراكز نين المعتمدة من الاتحاد الدولي للنقل الجوي (إياتا).']],
        ['name' => ['Verification (vData)', 'التحقق (في داتا)'], 'ghost' => ['VERIFICATION', 'تحقق'], 'year' => '2015', 'logo' => 'images/subsidiaries/vdata.png', 'tone' => 'red',
            'text' => ['Secure verification of academic and professional documents, certificates and personal data for employers, universities and government entities.', 'تحقق آمن من الوثائق والشهادات الأكاديمية والمهنية والبيانات الشخصية لجهات العمل والجامعات والجهات الحكومية.']],
        ['name' => ['Integrated Solutions', 'الحلول المتكاملة'], 'ghost' => ['INTEGRATED', 'حلول'], 'year' => '2022', 'logo' => 'uploads/sections/file_6adf0fb8745ec.png',
            'text' => ['Integrated education and business systems (ERP, school management, training management) designed around how institutions actually work.', 'أنظمة تعليم وأعمال متكاملة (تخطيط الموارد وإدارة المدارس وإدارة التدريب) مصممة حول طريقة عمل المؤسسات فعليًا.']],
        ['name' => ['BIO', 'بايو'], 'ghost' => ['BIO', 'بايو'], 'year' => '2023', 'logo' => 'images/subsidiaries/nen-bio.png',
            'text' => ['Training, certification and specialised services for the agriculture and agri-food sector.', 'تدريب واعتماد وخدمات متخصصة لقطاع الزراعة والصناعات الغذائية.']],
        ['name' => ['Foundation (NGO)', 'المؤسسة (غير ربحية)'], 'ghost' => ['FOUNDATION', 'مؤسسة'], 'year' => '2023', 'logo' => 'images/subsidiaries/nen-foundation-ngo.png', 'tone' => 'light',
            'text' => ['Our non-profit arm: free learning, skills programs and scholarships for young people and underserved communities.', 'ذراعنا غير الربحية: تعليم مجاني وبرامج مهارات ومنح دراسية للشباب والمجتمعات الأقل حظًا.']],
    ];
    $nxGn = count($nxGroup);
@endphp
<section class="nx nx-sec nx-group" id="nen-group-section" style="--nx-bg:#fff">
    <div class="container">
        @include('user.home.home._head', [
            'n' => ++$nxSec->n,
            'title' => $t('NEN Group', 'مجموعة نين'),
            'intro' => $t("Specialised companies, one shared network. Each NEN company focuses on one field and draws on the group's partners, centers and regional presence.", 'شركات متخصصة، وشبكة واحدة مشتركة. تركّز كل شركة من شركات نين على مجال واحد، وتستفيد من شركاء المجموعة ومراكزها وحضورها الإقليمي.'),
        ])
        <div class="nx-stack">
            @foreach ($nxGroup as $i => $co)
                <article class="nx-stack-card{{ isset($co['tone']) ? ' nx-stack-card--' . $co['tone'] : '' }}" style="--i:{{ $i }}" data-nx-stack-card>
                    <div class="nx-stack-card__meta nx-mono"><span>{{ $nxPad($i + 1) }} / {{ $nxPad($nxGn) }}</span><span>{{ $t('Since', 'منذ') }} {{ $co['year'] }}</span></div>
                    <span class="nx-stack-card__logo"><img src="{{ $nxSite . $co['logo'] }}" alt="NEN | {{ $co['name'][0] }}" loading="lazy" decoding="async"></span>
                    <h3 class="nx-stack-card__name"><span>{{ $t('NEN |', 'نين |') }}</span>{{ $t($co['name'][0], $co['name'][1]) }}</h3>
                    <p class="nx-stack-card__desc">{{ $t($co['text'][0], $co['text'][1]) }}</p>
                    <span class="nx-stack-card__ghost" aria-hidden="true">{{ $t($co['ghost'][0], $co['ghost'][1]) }}</span><span class="nx-stack-card__shade" aria-hidden="true"></span>
                </article>
            @endforeach
        </div>
    </div>
</section>
