const lang = localStorage.getItem('lang')
// slides Data
const slidesData = [{
        imageSrc: 'https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp',
        destination: 'Destination',
        destinationAr: 'الوجهة',
        title: 'Exploring the Wonders of Hiking',
        titleAr: 'استكشاف عجائب المشي لمسافات طويلة',
        description: 'An iconic landmark, this post unveils the secrets that make this destination a traveler\'s paradise.',
        descriptionAr: 'معلم بارز، يكشف هذا المنشور الأسرار التي تجعل هذه الوجهة جنة للمسافرين.',
        profile: {

            publicationDate: '24 Jan 2024',
            readTime: '10 minutes ago'
        },
        profileAr: {

            publicationDate: '24 يناير 2024',
            readTime: 'منذ 10 دقائق'
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"

    },
    {
        imageSrc: 'https://img-cdn.pixlr.com/image-generator/history/65bb541e67330b7e1e5eb3b5/8928eb7d-033d-4469-be54-d743ddfc006b/medium.webp',
        destination: 'Football',
        destinationAr: 'كرة القدم',
        title: 'Discovering Hidden Beaches',
        titleAr: 'اكتشاف الشواطئ الخفية',
        description: 'This post reveals the beauty of untouched beaches and the best spots to visit.',
        descriptionAr: 'يكشف هذا المنشور عن جمال الشواطئ البكر وأفضل الأماكن التي يمكن زيارتها.',
        profile: {

            publicationDate: '5 Feb 2024',
            readTime: '8 minutes ago'
        },
        profileAr: {

            publicationDate: '5 فبراير 2024',
            readTime: 'منذ 8 دقائق'
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    },
    {
        imageSrc: 'https://img-cdn.pixlr.com/image-generator/history/65ba5701b4f4f4419f746bc3/806ecb58-167c-4d20-b658-a6a6b2f221e9/medium.webp',
        destination: 'tips & tricks',
        destinationAr: 'نصائح وحيل',
        title: 'Exploring the Wonders of Hiking',
        titleAr: 'استكشاف عجائب المشي لمسافات طويلة',
        description: 'An iconic landmark, this post unveils the secrets that make this destination a traveler\'s paradise.',
        descriptionAr: 'معلم بارز، يكشف هذا المنشور الأسرار التي تجعل هذه الوجهة جنة للمسافرين.',
        profile: {

            publicationDate: '24 Jan 2024',
            readTime: '10 minutes ago'
        },
        profileAr: {

            publicationDate: '5 فبراير 2024',
            readTime: 'منذ 8 دقائق'
        },
        category: "Culinary",
        categoryAr: "الطهي"
    },
    {
        imageSrc: 'https://img-cdn.pixlr.com/image-generator/history/65772796905f29530816ea40/4ca9ba3d-c418-4153-a36a-77f4182236a7/medium.webp',
        destination: 'Lifestyle',
        destinationAr: 'أسلوب الحياة',
        title: 'Discovering Hidden Beaches',
        titleAr: 'اكتشاف الشواطئ الخفية',
        description: 'This post reveals the beauty of untouched beaches and the best spots to visit.',
        descriptionAr: 'يكشف هذا المنشور عن جمال الشواطئ البكر وأفضل الأماكن التي يمكن زيارتها.',
        profile: {

            publicationDate: '5 Feb 2024',
            readTime: '8 minutes ago'
        },
        profileAr: {

            publicationDate: '5 فبراير 2024',
            readTime: 'منذ 8 دقائق'
        }

        ,
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    },
];

// Articles Data
let articlesData = [{
        id: 1,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    },
    {
        id: 2,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    },
    {
        id: 3,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 4,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    },
    {
        id: 5,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 6,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 7,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 8,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 9,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 10,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 11,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 12,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 13,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 14,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 15,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 16,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 17,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 18,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 19,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 20,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    }, {
        id: 21,
        imgSrc: "https://wakeb-tech-site.vercel.app/images/useCases/cases/solar.webp",
        date: "20 Jan 2024",
        dateAr: "20 يناير 2024",
        readTime: "8 minutes ago",
        readTimeAr: "منذ 8 دقائق",
        title: "A fashionista's guide to wanderlust",
        titleAr: "دليل الموضة لعشاق السفر",
        description: "Explore the intersection of fashion and travel as we dive into the wardrobes of globetrotters.",
        descriptionAr: "اكتشف تقاطع الموضة والسفر بينما نتعمق في خزائن المسافرين",
        author: {
            name: "Maximilian Bartholomew",
            nameAr: "ماكسيميليان بارتولوميو",
            imgSrc: "./images/people/person2.jpg"
        },
        category: "Lifestyle",
        categoryAr: "أسلوب الحياة"
    },
];

// Categorates list
let categorateList = ['All', 'Lifestyle', 'Destination', 'Tips & Hacks', 'Culinary', 'Tips & Hacks', 'Culinary',
    'Tips & Hacks', 'Culinary', 'Tips & Hacks', 'Culinary'
]
let categorateListAr = ['الكل', 'أسلوب الحياة', 'وجهة', 'نصائح وحيل', 'الطهي', 'الكل', 'أسلوب الحياة', 'أسلوب الحياة',
    'وجهة', 'نصائح وحيل', 'الطهي', 'الكل'
];
//Start DisplayContent
function displaycontent(slidesData) {

    const list = document.querySelector('.list');
    if (!list) return
    slidesData.forEach((data, index) => {
        const destination = lang === 'ar' ? data.destinationAr : data.destination;
        const title = lang === 'ar' ? data.titleAr : data.title;
        const description = lang === 'ar' ? data.descriptionAr : data.description;
        const category = lang === 'ar' ? data.categoryAr : data.category;
        const publicationDate = lang === 'ar' ? data.profileAr.publicationDate : data.profile.publicationDate;
        const readTime = lang === 'ar' ? data.profileAr.readTime : data.profile.readTime;
        list.innerHTML += `  

  <div class="item position-relative overflow-hidden" style="min-width:100%;">
    <img src="${data.imageSrc}" class="w-100 h-100 object-fit-cover" alt="${title}">
    <div class="content d-flex justify-content-between align-items-start flex-wrap z-2 gap-3 position-absolute text-white ">
      <div class="content-text" >
        <p class="destination bg-secondary bg-opacity-75 py-2 px-3 rounded-pill text-truncate">
          ${destination}
        </p>
        <h2 class="my-3   text-truncate">${title}</h2>
        <p class="fw-normal fs-6 lh-base">
          ${description}
        </p>
      </div>
      <div class="profile position-relative mt-4 d-flex flex-column gap-3 align-self-center ">
        <div class="name d-flex align-items-center gap-2 cursor-pointer">
        <svg class="no-rotate" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g stroke-width="0"></g>
                <g stroke-linecap="round" stroke-linejoin="round"></g>
                <g>
                    <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z" stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z" stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z" stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke="#ffffff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
            <p class="fw-bold my-auto">${category}</p>
        </div>
        <div class="date d-flex  align-items-center position-relative fw-normal opacity-75 gap-4">
          <span class="Publication-date d-flex align-items-center gap-2">
          <svg class="no-rotate" fill="#ffffff" width="16" viewBox="0 0 35 35" data-name="Layer 2" id="a866a81f-2948-4418-8bd5-1a5193c5f74e" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z"></path><path d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z"></path><path d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z"></path><path d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z"></path></g></svg>
          ${publicationDate}</span>
          <span class="read-time d-flex align-items-center gap-1">
          <svg class="no-rotate" fill="#ffffff" width="16" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z"></path> </g> </g> <g> <g> <polygon points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 "></polygon> </g> </g> </g></svg>
          ${readTime}</span>
        </div>
      </div>
    </div>
  </div>
        `
        const sliderDots = document.querySelector('.slider-dots')
        if (sliderDots) {
            let sliderDot = document.createElement('span')
            sliderDot.classList.add('dot')
            if (index === 0) {
                sliderDot.classList.add('active');
            }
            sliderDots.appendChild(sliderDot)
        }
    });

    getIndex();

}


// End Display Content Function


// Start Display Categorates Function
function displayCategorates() {
    let categoratesDiv = document.querySelector('.categorates');
    if (!categoratesDiv) return;

    let categorateName = lang === 'ar' ? categorateListAr : categorateList;

    categorateName.forEach((categorate, i) => {
        const categorateBtn = document.createElement('button');
        categorateBtn.classList.add('fs-6', 'rounded', 'py-2', 'text-truncate', 'px-2');
        categorateBtn.textContent = `${categorate}`;
        categoratesDiv.appendChild(categorateBtn);
        // console.log(categorate);
        if (i === 0) {
            categorateBtn.classList.add('active');
            filterData('All');
        }

        categorateBtn.addEventListener('click', () => {
            categoratesDiv.querySelectorAll('button').forEach(btn => {
                btn.classList.remove('active');
            });
            filterData(categorate);
            categorateBtn.classList.add('active');
            // console.log(categorate);
        });
    });

    const swiperBtns = document.querySelectorAll('.swiper-btn');
    categoratesDiv.addEventListener('scroll', () => {
        updateSwiperBtnsVisibility();

    });
    swiperBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const firstCategorateBtnWidth = document.querySelector('.categorates button').clientWidth;

            // Scroll the categoratesDiv left or right
            if (btn.classList.contains('back-btn')) {
                categoratesDiv.scrollBy({
                    left: -firstCategorateBtnWidth,
                    behavior: 'smooth'
                });
            } else {
                categoratesDiv.scrollBy({
                    left: firstCategorateBtnWidth,
                    behavior: 'smooth'
                });
            }
            updateSwiperBtnsVisibility();
        });
    });


    function updateSwiperBtnsVisibility() {
        const backBtn = document.querySelector('.back-btn');
        const nextBtn = document.querySelector('.next-btn');

        // Check if we are at the start
        if (lang != 'ar') {

            if (categoratesDiv.scrollLeft === 0) {
                backBtn.disabled = true;
                backBtn.style.opacity = '.4';
                backBtn.style.cursor = 'default';


            } else {
                backBtn.disabled = false; // Enable back button
                backBtn.style.opacity = '1'; // Visual indication of disabled state
                backBtn.style.cursor = 'pointer'; // Visual indication of disabled state
            }

            // Check if we are at the end
            const maxScrollLeft = categoratesDiv.scrollWidth - categoratesDiv.clientWidth;
            if (categoratesDiv.scrollLeft >= maxScrollLeft - 1) {
                nextBtn.disabled = true; // Disable next button
                nextBtn.style.opacity = '.4'; // Visual indication of disabled state
                nextBtn.style.cursor = 'default'; // Visual indication of disabled state

            } else {
                nextBtn.disabled = false; // Enable next button
                nextBtn.style.opacity = '1'; // Visual indication of disabled state
                nextBtn.style.cursor = 'pointer'; // Visual indication of disabled state

            }
        }
        if (lang == 'ar') {
            const maxScrollLeft = categoratesDiv.scrollWidth - categoratesDiv.clientWidth;

            if (-categoratesDiv.scrollLeft >= maxScrollLeft - 1) {
                backBtn.disabled = true; // Disable back button
                backBtn.style.opacity = '.4'; // Visual indication of disabled state
                backBtn.style.cursor = 'default'; // Visual indication of disabled state

            } else {
                backBtn.disabled = false; // Enable back button
                backBtn.style.opacity = '1'; // Visual indication of disabled state
                backBtn.style.cursor = 'pointer'; // Visual indication of disabled state
            }

            if (categoratesDiv.scrollLeft == 0) {
                nextBtn.disabled = true; // Disable next button
                nextBtn.style.opacity = '.4'; // Visual indication of disabled state
                nextBtn.style.cursor = 'default'; // Visual indication of disabled state

            } else {
                nextBtn.disabled = false; // Enable next button
                nextBtn.style.opacity = '1'; // Visual indication of disabled state
                nextBtn.style.cursor = 'pointer'; // Visual indication of disabled state

            }
        }
    }

    // Initial call to set button visibility
    updateSwiperBtnsVisibility();

}


// Update visibility of swiper buttons
function updateSwiperBtnsVisibility() {
    const categoratesDiv = document.querySelector('.categorates');
    const screenWidth = window.innerWidth;
    const categorateBtns = categoratesDiv.querySelectorAll('button');
    const swiperBtns = document.querySelectorAll('.swiper-btn'); // Move this here to ensure it's scoped correctly

    if (categorateBtns.length === 0 || swiperBtns.length === 0) return; // Prevent errors if no buttons exist

    const buttonWidth = categorateBtns[0].clientWidth;
    const visibleButtons = Math.floor(categoratesDiv.clientWidth / buttonWidth);

    if (screenWidth >= 1024) {
        if (visibleButtons < 5) {
            swiperBtns.forEach(btn => btn.style.display = 'none');
        } else {
            swiperBtns.forEach(btn => btn.style.display = 'block');
        }
    } else if (screenWidth >= 768 && screenWidth < 1024) {
        if (visibleButtons < 4) {
            swiperBtns.forEach(btn => btn.style.display = 'none');
        } else {
            swiperBtns.forEach(btn => btn.style.display = 'block');
        }
    } else {
        swiperBtns.forEach(btn => btn.style.display = 'block');
    }
}

window.addEventListener('resize', updateSwiperBtnsVisibility);


//Start GetSort function

function getSortBy() {
    if (typeof window === 'undefined') return;
    const selectElement = document.getElementById('select');

    selectElement.addEventListener('change', (event) => {
        const selectedValue = event.target.value;
        console.log(selectedValue);
    });
}

//End GetSort function

//Start Pagination function
let currentPage = 1;
let itemsPerPage = 9;
let NumberOfPages = Math.ceil(articlesData / itemsPerPage)
let filteredData = articlesData;

// Function to display pagination buttons and manage pagination behavior
function displayPagination() {
    const pagination = document.querySelector('.pagination');
    pagination.innerHTML = '';
    // Create and append back button if currentPage > 1
    const backButton = document.createElement('button');
    backButton.classList.add('pagination-btn', 'p-1', 'rounded');
    backButton.innerHTML =
        '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M15 18l-6-6 6-6"></path></svg>';

    backButton.addEventListener('click', () => {
        currentPage--;
        displayArticles(filteredData);
        displayPagination();
        const blogsElement = document.querySelector('.blogs');
        blogsElement.scrollIntoView({
            behavior: 'smooth'
        });
    });

    if (NumberOfPages > 1) {
        pagination.appendChild(backButton);
    }
    if (currentPage <= 1) {
        backButton.classList.add('disabled')
        backButton.style.opacity = '.5'
        backButton.style.cursor = 'default'
        backButton.setAttribute('disabled', 'true')
    }
    // Create and append pagination number buttons
    if (NumberOfPages > 1) {
        for (let i = 1; i <= NumberOfPages; i++) {
            const pageNumberBtn = document.createElement('button');
            pageNumberBtn.classList.add('pagination-btn', 'px-3', 'py-1', 'my-0', 'mx-1', 'border-0', 'rounded',
                'cursor-pointer', 'fw-bold');
            pageNumberBtn.textContent = i;

            // Highlight current page as active
            if (i === currentPage) {
                pageNumberBtn.classList.add('active');
            }

            // Logic for showing pages
            if (
                i === 1 ||
                i === NumberOfPages ||
                (currentPage === 1 && i <= 3) || // Always show the last page
                (i >= currentPage - 1 && i <= currentPage + 1) // Show current page and neighbors
            ) {
                pageNumberBtn.addEventListener('click', () => {
                    currentPage = i;
                    console.log(currentPage)

                    displayArticles(filteredData);
                    displayPagination();

                    const blogsElement = document.querySelector('.blogs');
                    blogsElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                });

                pagination.appendChild(pageNumberBtn);
            } else if (i === currentPage + 3 || (i === 2 && currentPage > 3)) {
                const dots = document.createElement('span');
                dots.classList.add('my-auto', 'pagination-dots');
                dots.textContent = '...';
                pagination.appendChild(dots);
            }
        }
    }

    // Create and append next button if currentPage < NumberOfPages
    const nextButton = document.createElement('button');
    nextButton.classList.add('pagination-btn', 'p-1', 'fs-5', 'rounded');
    nextButton.innerHTML =
        '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><path d="M9 18l6-6-6-6"></path></svg>';

    nextButton.addEventListener('click', () => {
        currentPage++;
        displayArticles(filteredData);
        displayPagination();

        const blogsElement = document.querySelector('.blogs');
        blogsElement.scrollIntoView({
            behavior: 'smooth'
        });
    });
    if (NumberOfPages > 1) {
        pagination.appendChild(nextButton);
    }
    if (currentPage == NumberOfPages) {
        nextButton.classList.add('disabled')
        nextButton.style.opacity = '.5'
        nextButton.style.cursor = 'default'
        nextButton.setAttribute('disabled', 'true')
    }

}

// Function to filter data based on category

function filterData(category) {
    if (typeof window === 'undefined') return;
    document.querySelectorAll('.categorate-button').forEach(btn => {
        btn.classList.remove('active')
    })
    if (category !== 'All' && category !== 'الكل') {
        filteredData = articlesData.filter(article => lang === 'ar' ? article.categoryAr === category : article
            .category === category);
    } else {
        filteredData = articlesData
    }
    NumberOfPages = Math.ceil(filteredData.length / itemsPerPage);
    currentPage = 1;
    displayArticles(filteredData)
    displayPagination();
}

// Function to display articles based on current page

function displayArticles(articlesData) {
    if (typeof window === 'undefined') return;
    const cards = document.querySelector('.cards');
    cards.innerHTML = '';

    //Get the start index and end index of the number of data to display.

    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const paginatedData = articlesData.slice(startIndex, endIndex);
    paginatedData.forEach(article => {
        const category = lang === 'ar' ? article.categoryAr : article.category;
        const title = lang === 'ar' ? article.titleAr : article.title;
        const description = lang === 'ar' ? article.descriptionAr : article.description;
        const publicationDate = lang === 'ar' ? article.dateAr : article.date;
        const readTime = lang === 'ar' ? article.readTimeAr : article.readTime;
        const card = document.createElement('div');
        card.classList.add('card', 'border-0', 'py-2', 'col-12', 'col-md-6', 'col-lg-4')
        card.innerHTML = `      
<a href="{{route('blogs.details')}}" target="__blannk" class="text-black text-decoration-none">
      <div class="img-container">
            <img class="card-img w-100 h-100 object-fit-cover rounded-2" src="${article.imgSrc || './images/default.jpg'} " alt="${article.title}" />
          <h4 class="category fs-6 py-2 px-3 d-inline position-absolute rounded-pill text-truncate">${category}</h4>
      </div>
            <div class="card-body d-flex flex-column  justify-content-between">
              <div class="d-flex flex-column justify-content-between flex-grow-1">
              <div>
              <div class="date d-flex align-items-center my-1  position-relative fs-6 fw-normal opacity-75 gap-4">
                <span class="Publication-date d-flex gap-2 align-items-center"> 
                <svg class="no-rotate" fill="#000000" width="18" viewBox="0 0 35 35" data-name="Layer 2" id="a866a81f-2948-4418-8bd5-1a5193c5f74e" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M29.545,34.75H5.455a5.211,5.211,0,0,1-5.2-5.2V8.56a5.21,5.21,0,0,1,5.205-5.2h24.09a5.21,5.21,0,0,1,5.2,5.205V29.545A5.211,5.211,0,0,1,29.545,34.75ZM5.455,5.855A2.708,2.708,0,0,0,2.75,8.56V29.545a2.709,2.709,0,0,0,2.705,2.7h24.09a2.708,2.708,0,0,0,2.7-2.7V8.56a2.707,2.707,0,0,0-2.7-2.7Z"></path><path d="M33.5,17.331H1.541a1.25,1.25,0,0,1,0-2.5H33.5a1.25,1.25,0,0,1,0,2.5Z"></path><path d="M9.459,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,9.459,9.155Z"></path><path d="M25.542,9.155a1.249,1.249,0,0,1-1.25-1.25V1.5a1.25,1.25,0,0,1,2.5,0V7.905A1.25,1.25,0,0,1,25.542,9.155Z"></path></g></svg>
                ${publicationDate} </span>
                <span class="read-time d-flex gap-2 align-items-center">
                <svg fill="#000000" width="18" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M256,0C114.84,0,0,114.84,0,256s114.84,256,256,256s256-114.84,256-256S397.16,0,256,0z M423.127,396.636l-30.258-30.258 l-26.49,26.49l30.258,30.258c-33.551,28.279-75.697,46.657-121.905,50.598v-42.896h-37.463v42.896 c-46.207-3.941-88.354-22.319-121.905-50.598l30.258-30.258l-26.49-26.49l-30.258,30.258 c-28.279-33.551-46.657-75.697-50.598-121.905h42.896v-37.463H38.275c3.941-46.207,22.319-88.354,50.598-121.905l30.258,30.258 l26.49-26.49l-30.258-30.258c33.551-28.279,75.697-46.657,121.905-50.598v42.896h37.463V38.275 c46.207,3.941,88.354,22.319,121.905,50.598l-30.258,30.258l26.49,26.49l30.258-30.258 c28.279,33.551,46.657,75.697,50.598,121.905h-42.896v37.463h42.896C469.784,320.939,451.405,363.085,423.127,396.636z"></path> </g> </g> <g> <g> <polygon points="274.732,237.268 274.732,118.634 237.268,118.634 237.268,274.732 355.902,274.732 355.902,237.268 "></polygon> </g> </g> </g></svg> 
                ${readTime} </span>
              </div>
                      <h4 class="card-title text-truncate fs-3 mb-1">${title}</h4>
              <div class="description">
                <p class="card-text fs-6 overflow-hidden opacity-75 lh-base mb-2">
                  ${description}
                </p>
              </div>
              </div>
  
                <div class="profile justify-content-between d-flex align-items-center gap-2">
                  <div class="name d-flex gap-2">
                  <svg width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                  ${category}
                  </div>
                                          <svg  width='20' class="go" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
                </div>
              </div>
            </div>
</a>
        `
        cards.appendChild(card)
    })

}

let currentIndex = 0;

// Function to get the current index of the slider from the dot buttons
function getIndex() {
    const sliderDots = document.querySelectorAll('.slider-dots .dot');

    sliderDots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
            currentIndex = i;
            showSlide(currentIndex);
            console.log(currentIndex)
        })
    })

}
// End get index From dot button funcion

// Function to automatically transition to the next slide every 5 seconds
function autoSlide() {
    const slides = document.querySelectorAll('.list .item')
    setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;

        showSlide(currentIndex);
    }, 5000)
}
// Function to show the slide corresponding to the given index
function showSlide(index) {
    const list = document.querySelector('.slider .list');
    const X = window.localStorage.getItem('lang') == 'ar' ? index * 100 : -index * 100;
    list.style.transform = `translateX(${X}%)`;
    updateActiveDot(index);
}

// Function to update the active dot based on the current slide
function updateActiveDot(index) {
    if (typeof window === 'undefined') return;
    const sliderDots = document.querySelectorAll('.slider-dots .dot');
    sliderDots.forEach(dot => dot.classList.remove('active'));
    sliderDots[index].classList.add('active');

}

function changeToArabic(lang) {
    if (typeof window === 'undefined') return;
    if (lang === 'ar') {
        const navBarLinks = document.querySelectorAll('#navBarLinks li a');

        navBarLinks[0].innerHTML = 'فندق';
        navBarLinks[1].innerHTML = 'رحلة';
        navBarLinks[2].innerHTML = 'قطار';
        navBarLinks[3].innerHTML = 'سفر';
        navBarLinks[4].innerHTML = 'تأجير سيارات';

        const BlogTile = document.querySelector('#blogText h2')
        const BlogParagraph = document.querySelector('#blogText p')
        BlogTile.innerHTML = 'مدونات'
        BlogParagraph.innerHTML = 'نشارك هنا نصائح السفر وأدلة الوجهات والقصص التي إلهام مغامرتك القادمة.'

        const sortTitle = document.querySelector('#sortTitle')
        const sortOptions = document.querySelectorAll('#sort select option')

        sortTitle.innerHTML = 'الترتيب حسب:'
        sortOptions[0].innerHTML = 'الكل'
        sortOptions[1].innerHTML = 'اخر المدونات'
        sortOptions[2].innerHTML = 'اقدم المدونات'
        sortOptions[3].innerHTML = 'اشهر المدونات'

        const bookingTitle = document.querySelector('#booking h2');
        const bookingDescription = document.querySelector('#booking p');
        const bookingButton = document.querySelector('#booking button');

        bookingTitle.innerHTML = 'استكشف أكثر للحصول على منطقة راحتك';
        bookingDescription.innerHTML = 'احجز إقامتك المثالية معنا.';
        bookingButton.innerHTML = 'احجز الآن ';

        const articleText = document.querySelector('#article p');
        const articleCount = document.querySelector('#article h3');

        articleText.innerHTML = 'مقالات متاحة';
        articleCount.innerHTML = '78';

        const beyondTitle = document.querySelector('#beyond h2');

        beyondTitle.innerHTML = 'خارج الإقامة، خلق ذكريات تدوم مدى الحياة';
    }
}
document.addEventListener('DOMContentLoaded', () => {
    if (typeof window === 'undefined') return;
    // 1. Call Displaycontent function 
    displaycontent(slidesData);
    // 3. Call displayArticles Function
    displayArticles(articlesData);

    // 4. Initialize the slider (if it depends on displayed content)
    getIndex(); // Set up event listeners for dots
    autoSlide();

    getSortBy()
    // 5. Other initializations
    displayPagination(); // Pagination depends on articlesData

    // Function to toggle the menu list when the dashboard button is clicked
    displayCategorates()


});