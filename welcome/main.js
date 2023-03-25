// noinspection JSUnresolvedFunction

window.onload = function () {
    // Initialize the Grid view
    $('.grid').masonry({itemSelector: '.grid-item'});

    $("#loading").fadeOut(315);
    $("body").css("overflow-y", "scroll");
    $("main").animate({opacity: 1}, 636);
};

// Translation
function translate(hl) {
    let dict;
    switch (hl) {
        case "fa":
            document.title = "مهدی پرستش";
            $("figcaption").text("مهدی پرستش");
            $("blockquote").html(
                "بنده مدت ۵ سال در برنامه نویسی اندروید و ۳ سال در کدنویسی فولستک (بک اند + فرانت اند) بعلاوه فلاتر " +
                "تجربه دارم. زبان های برنامه نویسی که در اونها مسلط هستم: <b>جاواسکریپت، PHP، جاوا، کاتلین، دارت، " +
                "پایتون و سی پلاس پلاس</b> هستند. اپلیکیشن های اندرویدی چه با جاوا/کاتلین و چه با فلاتر بهمراه iOS " +
                "طراحی کردم.<br>فریمورک هایی که به اونها مسلط هستم: جنگو، Node.js، TensorFlow و Vulkan هستند " +
                "و با دیتابیس های MySQL، SQLite و MongoDB کار کردم.<br>گاهی اوقات به تمرین " +
                "«یادگیری ماشینی» میپردازم چه با استفاده از تنسورفلو و چه با کد های خودم.<br>همچنین به سیستم " +
                "عامل های لینوکسی، FreeBSD، OpenBSD و Windows Server مسلط هستم."
            );
            $("#cv").text("مشاهده رزومه من");
            $(".mergen4 .projName").text("مِرگِن ۴");
            $(".mergen4 .projDesc").text(
                "یک ربات نرم افزاری هوش مصنوعی منطقی دارای حس های چندگانه که موقتا برای اندروید طراحی می شود.");
            $(".instatools .projName").text("اینستاتولز");
            $(".instatools .projDesc").text(
                "آنفالویاب، دانلود هر گونه پست و استوری از اینستاگرام، دانلود پست های سیو شده " +
                "و استخراج دایرکت ها در HTML ،PDF  و TXT.");
            $(".telexporter .projName").text("تلکسپورتر");
            $(".telexporter .projDesc").text(
                "اس ام اس ها و تاریخچه تماس های خود را در قالب های وب، پی دی اف و تکست استخراج کنید.");
            $(".migratio .projName").text("میگراتیو");
            $(".migratio .projDesc").text(
                "یک ابزار جغرافی-آماری برای تعیین کردن بهترین مقصد مهاجرت افراد مختلف.");
            $(".mergen3 .projName").text("مِرگِن ۳");
            $(".mergen3 .projDesc").text(
                "یک نرم افزار رباتیک هوش مصنوعی برای پردازش چند نوع حس های متفاوت که به یک سرور و یک یا چند کلاینت نیاز داشت. " +
                "این روش بعدا با روشی جایگزین شد که به سرور و کلاینت نیاز نداشت. (پروژه آرشیو شده)");
            $(".mergen2 .projName").text("مِرگِن ۲");
            $(".mergen2 .projDesc").text(
                "یک ربات نرم افزاری صوتی (شنیداری و گفتاری) برای پردازش زبان انسان، " +
                "که بعدا با یک نرم افزار برای پردازش هم صوت و هم تصویر جایگزین شد. (پروژه آرشیو شده)");
            $(".mergen1 .projName").text("مِرگِن ۱");
            $(".mergen1 .projDesc").text(
                "یک نرم افزار هوش مصنوعی منطقی برای پردازش زبان انسانی؛ که قرار بود فقط از راه متن دیجیتال " +
                "تفکر کند و بعدا با یک نرم افزاری پردازش صوت جایگزین شد. (پروژه آرشیو شده)");
            $(".fortuna .projName").text("فورتونا");
            $(".fortuna .projDesc").text(
                "نرم افزاری متن باز بر مبنای فلسفه «هدونیسم»");
            $(".friend_tracker .projName").text("ردیاب دوستان");
            $(".friend_tracker .projDesc").text(
                "دوستان خود را از روی نقشه ردیابی کنید. (پروژه آرشیو شده)");
            $(".saam .projName").text("سام");
            $(".saam .projDesc").text(
                "گرداور و ذخیره کننده اطلاعات بورس، ساخته شده بر مبنای متاتریدر ۵ (پروژه آرشیو شده)");
            $(".sexbook .projName").text("سکسبوک");
            $(".sexbook .projDesc").text(
                "زندگی جنسی خود را ثبت کرده و آمارگیری و کنترل کنید.");
            $("body").css("font-family", "IRANYekan");
            dict = {
                "Google Play": "گوگل پلی",
                "Galaxy Store": "گلکسی استور",
                "Website": "وبسایت",
                "Website (Demo)": "وبسایت (دمو)",
                "Android Source": "سورس اندروید",
                "Android Source (Kotlin)": "سورس اندروید (کاتلین)",
                "Android Source (Java)": "سورس اندروید (جاوا)",
                "Flutter Source": "سورس فلاتر",
                "Software Source (Python)": "سورس نرم افزار (پایتون)",
                "Web Template": "قالب وب",
                "Server Source (Python)": "سورس سرور (پایتون)",
                "NashStore": "ناشستور",
                "Myket": "مایکت",
                "Bazaar": "بازار",
                "Privacy Policy": "سیاست حریم خصوصی",
                "Russian App Store": "فروشگاه اپلیکیشن روسی ناشستور",
                "Iranian Android Myket Store": "فروشگاه اپلیکیشن ایرانی مایکت",
                "Iranian Android Bazaar Store": "فروشگاه اپلیکیشن ایرانی بازار",
                "APKPure.com a third-party APK store": "یک وبسایت معروف دانلود اپ اندروید",
                "Download for Android": "دانلود برای اندروید",
                "Wordpress Theme": "تم وردپرس",
            };
            if (document.location.toString().indexOf("hl=en") !== -1)
                history.pushState({}, null, document.location.toString()
                    .replace("?hl=en", "").replace("&hl=en", ""));
            break;
        default:
            let goTo = document.location.toString();
            if (goTo.indexOf("hl=en") === -1) goTo += ((goTo.indexOf("?") === -1) ? "?" : "&") + "hl=en";
            document.location.assign(goTo);
            break;
    }
    if (dict) $(".anchor a").each(function () {
        $(this).text(dict[$(this).text()]);
        $(this).attr("data-bs-original-title", dict[$(this).attr("data-bs-original-title")]);
    });
    if (["fa", "ar"].includes(hl))
        $("blockquote, .projDesc").css("direction", "rtl");
    $('.grid').masonry();
    $("#langSelect").attr("src", $("#lang li img[data-lang=" + hl + "]").attr("src"));
}

$("#lang li img").on('click', function () {
    translate($(this).attr("data-lang"));
});
if ($("#help").val() !== "en") switch ($("#country").val()) {
    case "IR":
        translate("fa");
        break;
}
