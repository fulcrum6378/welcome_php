<?php
require_once 'welcome/lang.php';
require_once 'welcome/vendor/autoload.php';

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

// class declarations
class Project {
    public string $id;
    public string $icon;
    public string $name;
    public string $desc;
    public array $anchors;
    public string $microType;
    public string $os;
    public string $category;

    function __construct(
        string $id, string $icon, array $anchors, string $microType, string $os, string $category, bool $archived
    ) {
        global $l, $sp;
        $this->id = $id;
        $this->icon = $icon;
        $this->name = $sp[$id . 'Name'][$l];
        $this->desc = $sp[$id . 'Desc'][$l];
        if ($archived) $this->desc .= $sp['archived'][$l];
        $this->anchors = $anchors;
        $this->microType = $microType;
        $this->os = $os;
        $this->category = $category;
    }
}

class Link {
    public string $href;
    public string $title;
    public ?string $name;
    public ?string $icon;
    public ?string $microType;

    function __construct(
        string $href, string $title = "", ?string $name = null, ?string $icon = null, ?string $microType = null
    ) {
        $this->href = $href;
        $this->title = $title;
        $this->name = $name;
        $this->icon = $icon;
        $this->microType = $microType;
    }
}

// choose a language
global $langs, $s, $sp;
$l = 0;
$LANG = 'fa';
$getHl = $_GET['hl'] ?? $LANG;
for ($i = 0; $i < count($langs); $i++)
    if ($getHl == $langs[$i]['id']) {
        $LANG = $getHl;
        $l = $i;
    }

// process the current page: Main
$social = array(
    new Link("https://github.com/fulcrum6378", "fulcrum6378 (Mahdi Parastesh)", icon: "github"),
    new Link("https://codeberg.org/fulcrum6378", "Mahdi Parastesh - Codeberg.org", icon: "codeberg"),
    new Link("https://www.linkedin.com/in/fulcrum6378/", "Mahdi Parastesh | LinkedIn", icon: "linkedin"),
    new Link("https://stackoverflow.com/users/10728785/mahdi-parastesh",
        "User Mahdi Parastesh - Stack Overflow", icon: "stackoverflow"),
    new Link("https://www.instagram.com/fulcrum6378/",
        "Mahdi Parastesh (@fulcrum6378) • Instagram photos and videos", icon: "instagram"),
    /*new Link("https://x.com/fulcrum6378",
        "Mahdi Parastesh (@fulcrum6378) / X", icon: "twitter"),*/
    new Link("https://t.me/Fulcrum6378", "Telegram: Contact @Fulcrum6378", icon: "telegram"),
);
$sexbook_pos = 2;
$projects = array(
    new Project('tx', "telexporter",
        array(
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.telexporter",
                title: $sp['bazaarDesc'][$l], name: $sp['bazaar'][$l], microType: "installUrl"),
            new Link("https://myket.ir/app/ir.mahdiparastesh.telexporter",
                title: $sp['myketDesc'][$l], name: $sp['myket'][$l], microType: "installUrl"),
        ),
        "MobileApplication", "Android", "Tools", false,
    ),
    new Project('fr', "fortuna",
        array(
            new Link("https://github.com/fulcrum6378/fortuna",
                name: $sp['androidKotlin'][$l], microType: "url"),
            new Link("https://apkpure.com/p/ir.mahdiparastesh.fortuna.gregorian",
                title: $sp['3rdPartyApkStoreDesc'][$l], name: "APKPure", microType: "installUrl"),
            new Link("https://github.com/fulcrum6378/fortuna_flutter",
                name: $sp['flutter'][$l], microType: "url"),
            new Link("https://mahdiparastesh.ir/welcome/privacy/fortuna.html",
                name: $sp['privacy'][$l], microType: "publishingPrinciples"),
        ),
        "SoftwareApplication", "Android, Web, iOS", "Philosophy, Lifestyle, Events, Health",
        false,
    ),
    new Project('it', "instatools",
        array(
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.instatools",
                title: $sp['bazaarDesc'][$l], name: $sp['bazaar'][$l], microType: "installUrl"),
        ),
        "MobileApplication", "Android", "Tools, Personalisation", false,
    ),
    new Project("md", "mcdtp",
        array(
            new Link("https://github.com/fulcrum6378/mcdtp",
                name: $sp['androidJava'][$l], microType: "url")
        ),
        "MobileApplication", "Android", "Tools", false,
    ),
    new Project("hc", "homechat",
        array(
            new Link("https://github.com/fulcrum6378/homechat",
                name: $sp['androidKotlin'][$l], microType: "url")
        ),
        "MobileApplication", "Android", "Communication, Social, LAN, Network", true,
    ),
    new Project("m4", "mergen_iv",
        array(
            new Link("https://github.com/fulcrum6378/mergen_android",
                name: $sp['androidC++'][$l], microType: "sameAs"),
            new Link("https://github.com/fulcrum6378/mergen4bsd",
                name: $sp['softwareC++'][$l], microType: "sameAs"),
            new Link("https://github.com/fulcrum6378/mergen_linux",
                name: $sp['linuxC++'][$l], microType: "sameAs"),
            new Link("https://github.com/fulcrum6378/mycv",
                name: $sp['softwarePython'][$l], microType: "sameAs"),
        ),
        "SoftwareApplication", "Android, FreeBSD, Linux", "AI, Logic, Robot", true,
    ),
    new Project("m3", "mergen",
        array(
            new Link("https://github.com/fulcrum6378/mergen_server",
                name: $sp['serverPython'][$l], microType: "sameAs"),
            new Link("https://github.com/fulcrum6378/mergen_client",
                name: $sp['androidKotlin'][$l], microType: "url"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP", true,
    ),
    new Project("sm", "saam",
        array(
            new Link("https://github.com/fulcrum6378/saam",
                name: $sp['softwarePython'][$l], microType: "sameAs"),
        ),
        "WebApplication", "Windows", "Finance, Business, Tools", true,
    ),
    new Project("m2", "mergen_iii",
        array(
            new Link("https://github.com/fulcrum6378/pronouncer",
                name: $sp['serverPython'][$l], microType: "sameAs"),
            new Link("https://github.com/fulcrum6378/mergen_client",
                name: $sp['androidKotlin'][$l], microType: "url"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP", true,
    ),
    new Project("m1", "mergen",
        array(
            new Link("https://github.com/fulcrum6378/mergen_server",
                name: $sp['softwarePython'][$l], microType: "sameAs"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP", true,
    ),
    new Project("ft", "friend_tracker",
        array(
            new Link("https://github.com/fulcrum6378/friend_tracker",
                name: $sp['androidJava'][$l], microType: "sameAs"),
        ),
        "MobileApplication", "Android", "Maps & Navigation, Communication, Social", true,
    ),
    new Project("mg", "migratio",
        array(
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.migratio",
                title: $sp['bazaarDesc'][$l], name: $sp['bazaar'][$l], microType: "installUrl"),
            new Link("https://myket.ir/app/ir.mahdiparastesh.migratio",
                title: $sp['myketDesc'][$l], name: $sp['myket'][$l], microType: "installUrl"),
            new Link("https://apkpure.com/p/ir.mahdiparastesh.migratio",
                title: $sp['3rdPartyApkStoreDesc'][$l], name: "APKPure", microType: "installUrl"),
            new Link("https://github.com/fulcrum6378/migratio_android",
                name: $sp['androidKotlin'][$l], microType: "url"),
            new Link("https://github.com/fulcrum6378/migratio",
                name: $sp['wpTheme'][$l], microType: "url"),
            new Link("https://mahdiparastesh.ir/welcome/privacy/migratio.html",
                name: $sp['privacy'][$l], microType: "publishingPrinciples"),
        ),
        "SoftwareApplication", "Android, Web", "Tools, Travel, Migration", true,
    ),
);
if (isset($_GET["fk"]) && $_GET["fk"] == "1") array_splice($projects, $sexbook_pos, 0, array(
    new Project("sx", "sexbook",
        array(
            new Link("https://mahdiparastesh.ir/misc/sexbook/app-release.apk",
                name: $sp['apk'][$l], microType: "installUrl"),
            new Link("https://sexbook.en.uptodown.com/android",
                title: $sp['3rdPartyApkStoreDesc'][$l], name: "Uptodown", microType: "installUrl"),
            new Link("https://apkpure.com/p/ir.mahdiparastesh.sexbook",
                title: $sp['3rdPartyApkStoreDesc'][$l], name: "APKPure", microType: "installUrl"),
            new Link("https://mahdiparastesh.ir/welcome/privacy/sexbook.html",
                name: $sp['privacy'][$l], microType: "publishingPrinciples"),
        ),
        "MobileApplication", "Android", "Lifestyle, Events, Dating", false,
    )
));

// Collect the required data for the templates
$data = array(
    'LANGS' => $langs,
    'LANG' => $LANG,
    'ROOT' => '/welcome',
    'PAGE' => 'main',
    'SOCIAL' => $social,
    'PROJECTS' => $projects,
);
foreach ($s as $key => $value) $data[$key] = $value[$l];

// render the template using Twig
try {
    echo (new Environment(new FilesystemLoader(["welcome"])))->render('temp.html', $data);
} catch (LoaderError|SyntaxError|RuntimeError $e) {
    echo "Twig render error:\n" . $e->getMessage();
}


/*TODO:
 * Masonry doesn't render in RTL properly
 * Add an arrow near the flag of UK and minimise the flags
 *
 * Notes:
 * In case of SVG error, add ' version="1.1"' to the SVG tag and turn "img/png" to "image/png".
 */
