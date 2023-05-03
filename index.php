<?php /** @noinspection PhpUnhandledExceptionInspection */
error_reporting(E_ALL ^ E_DEPRECATED);

require_once 'welcome/lang.php';
require_once 'welcome/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Class declarations
class Project {
    public string $id;
    public string $icon;
    public string $name;
    public string $desc;
    public array $anchors;
    public string $microType;
    public string $os;
    public string $category;

    function __construct($id, $icon, $anchors, $microType, $os, $category) {
        global $l, $sp;
        $this->id = $id;
        $this->icon = $icon;
        $this->name = $sp[$id . 'Name'][$l];
        $this->desc = $sp[$id . 'Desc'][$l];
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

    function __construct($href, $title = "", $name = null, $icon = null, $microType = null) {
        $this->href = $href;
        $this->title = $title;
        $this->name = $name;
        $this->icon = $icon;
        $this->microType = $microType;
    }
}

// Choose the language
global $langs, $s, $sp;
$l = 0;
$LANG = 'en';
$getHl = $_GET['hl'] ?? 'en';
for ($i = 0; $i < count($langs); $i++)
    if ($getHl == $langs[$i]['id']) {
        $LANG = $getHl;
        $l = $i;
    }

// Process the current page: Main
$social = array(
    new Link("https://www.facebook.com/mpg973", "Mahdi Prs", icon: "facebook"),
    /*new Link("https://www.instagram.com/fulcrum6378/",
        "Mahdi Parastesh (@fulcrum6378) • Instagram photos and videos", icon: "instagram"),*/
    /*new Link("https://twitter.com/fulcrum6378", "Mahdi Parastesh (@fulcrum6378) / Twitter", icon: "twitter"),*/
    new Link("https://github.com/fulcrum6378", "fulcrum6378 (Mahdi Parastesh) · GitHub", icon: "github"),
    new Link("https://www.linkedin.com/in/fulcrum6378/", "Mahdi Parastesh | LinkedIn", icon: "linkedin"),
    new Link("https://play.google.com/store/apps/dev?id=8797895762316770334",
        "Android Apps by Mahdi Parastesh on Google Play", icon: "google_play"),
    new Link("https://stackoverflow.com/users/10728785/mahdi-parastesh",
        "User Mahdi Parastesh - Stack Overflow", icon: "stackoverflow"),
);
$projects = array(
    new Project('it', "instatools",
        array(
            new Link("https://mahdiparastesh.ir/misc/instatools.apk",
                name: $sp['apk'][$l], microType: "downloadUrl"),
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.instatools",
                title: $sp['bazaarDesc'][$l], name: $sp['bazaar'][$l], microType: "installUrl"),
            new Link("https://myket.ir/app/ir.mahdiparastesh.instatools",
                title: $sp['myketDesc'][$l], name: $sp['myket'][$l], microType: "installUrl"),
            /*new Link("https://mahdiparastesh.ir/welcome/privacy/instatools.html",
                name: $sp['privacy'][$l], microType: "publishingPrinciples"),*/
        ),
        "MobileApplication", "Android", "Tools, Personalisation"
    ),
    new Project('fr', "fortuna",
        array(
            new Link(
                "https://github.com/fulcrum6378/fortuna",
                name: $sp['androidKotlin'][$l], microType: "url"),
            new Link(
                "https://play.google.com/store/apps/details?id=ir.mahdiparastesh.fortuna.gregorian",
                name: $sp['googlePlay'][$l], microType: "installUrl"),
            new Link(
                "https://github.com/fulcrum6378/fortuna_flutter",
                name: $sp['flutter'][$l], microType: "url"),
            /*new Link(
                "https://fortuna.mahdiparastesh.ir/",
                name: $sp['websiteDemo'][$l], microType: "sameAs"),*/
            new Link(
                "https://mahdiparastesh.ir/welcome/privacy/fortuna.html",
                name: $sp['privacy'][$l], microType: "publishingPrinciples"),
        ),
        "SoftwareApplication", "Android, Web, iOS", "Philosophy, Lifestyle, Events, Health"
    ),
    new Project('tx', "telexporter",
        array(
            new Link("https://galaxystore.samsung.com/detail/ir.mahdiparastesh.telexporter",
                name: $sp['galaxyStore'][$l], microType: "installUrl"),
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.telexporter",
                title: $sp['bazaarDesc'][$l], name: $sp['bazaar'][$l], microType: "installUrl"),
            new Link("https://myket.ir/app/ir.mahdiparastesh.telexporter",
                title: $sp['myketDesc'][$l], name: $sp['myket'][$l], microType: "installUrl"),
            new Link("https://mahdiparastesh.ir/welcome/privacy/telexporter.html",
                name: $sp['privacy'][$l], microType: "publishingPrinciples"),
        ),
        "MobileApplication", "Android", "Tools"
    ),
    new Project("mg", "migratio",
        array(
            new Link("https://play.google.com/store/apps/details?id=ir.mahdiparastesh.migratio",
                name: $sp['googlePlay'][$l], microType: "installUrl"),
            new Link("https://galaxystore.samsung.com/detail/ir.mahdiparastesh.migratio",
                name: $sp['galaxyStore'][$l], microType: "installUrl"),
            /*new Link("https://migratio.mahdiparastesh.ir/",
                name: $sp['website'][$l], microType: "sameAs"),*/
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.migratio",
                title: $sp['bazaarDesc'][$l], name: $sp['bazaar'][$l], microType: "installUrl"),
            new Link("https://myket.ir/app/ir.mahdiparastesh.migratio",
                title: $sp['myketDesc'][$l], name: $sp['myket'][$l], microType: "installUrl"),
            new Link("https://github.com/fulcrum6378/migratio_android",
                name: $sp['androidKotlin'][$l], microType: "url"),
            new Link("https://github.com/fulcrum6378/migratio",
                name: $sp['wpTheme'][$l], microType: "url"),
            new Link("https://mahdiparastesh.ir/welcome/privacy/migratio.html",
                name: $sp['privacy'][$l], microType: "publishingPrinciples"),
        ),
        "SoftwareApplication", "Android, Web", "Tools, Travel, Migration"
    ),
    new Project("m4", "mergen_iv",
        array(
            new Link("https://github.com/fulcrum6378/mergen_android",
                name: $sp['androidJava'][$l], microType: "sameAs"),
        ),
        "SoftwareApplication", "Android", "AI, Logic, Robot"
    ),
    new Project("m3", "mergen",
        array(
            new Link(
                "https://github.com/fulcrum6378/mergen_server",
                name: $sp['serverPython'][$l], microType: "sameAs"),
            new Link(
                "https://github.com/fulcrum6378/mergen_client",
                name: $sp['androidKotlin'][$l], microType: "url"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP"
    ),
    new Project("m2", "mergen_red",
        array(
            new Link(
                "https://github.com/fulcrum6378/pronouncer",
                name: $sp['serverPython'][$l], microType: "sameAs"),
            new Link(
                "https://github.com/fulcrum6378/mergen_client",
                name: $sp['androidKotlin'][$l], microType: "url"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP"
    ),
    new Project("m1", "mergen",
        array(
            new Link(
                "https://github.com/fulcrum6378/mergen_server",
                name: $sp['python'][$l], microType: "sameAs"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP"
    ),
    new Project("ft", "friend_tracker",
        array(
            new Link(
                "https://github.com/fulcrum6378/friend_tracker",
                name: $sp['androidJava'][$l], microType: "sameAs"),
        ),
        "MobileApplication", "Android", "Maps & Navigation, Communication, Social"
    ),
    new Project("sm", "saam",
        array(
            new Link(
                "https://github.com/fulcrum6378/saam",
                name: $sp['python'][$l], microType: "sameAs"),
        ),
        "SoftwareApplication", "Windows", "Finance, Business, Tools"
    ),
);
if (isset($_GET["fk"]) && $_GET["fk"] == "1") $projects[] =
    new Project("sx", "sexbook",
        array(
            new Link("https://play.google.com/store/apps/details?id=ir.mahdiparastesh.sexbook",
                name: $sp['googlePlay'][$l], microType: "installUrl"),
            new Link("https://galaxystore.samsung.com/detail/ir.mahdiparastesh.sexbook",
                name: $sp['galaxyStore'][$l], microType: "installUrl"),
            new Link("https://apkpure.com/p/ir.mahdiparastesh.sexbook",
                title: $sp['apkPureDesc'][$l], name: $sp['apkPure'][$l], microType: "installUrl"),
            new Link("https://mahdiparastesh.ir/welcome/privacy/sexbook.html",
                name: $sp['privacy'][$l], microType: "publishingPrinciples"),
        ),
        "MobileApplication", "Android", "Lifestyle, Events, Dating"
    );

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

// Render the template using Twig
// For that, run $ cd welcome; ../.composer/composer require "twig/twig:^3.0" --ignore-platform-reqs
echo (new Environment(new FilesystemLoader(["welcome"])))->render('temp.html', $data);


/*TODO:
 * Masonry doesn't render in RTL properly
 * Add an arrow near the flag of UK and minimise the flags
 *
 * Notes:
 * In case of SVG error, add ' version="1.1"' to the SVG tag and turn "img/png" to "image/png".
 */
