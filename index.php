<?php /** @noinspection PhpUnhandledExceptionInspection */
error_reporting(E_ALL ^ E_DEPRECATED);

require_once 'welcome/vendor/autoload.php';
global $s;
require 'welcome/lang.php';
$l = 0;

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

    function __construct($id, $icon, $name, $desc, $anchors, $microType, $os, $category) {
        $this->id = $id;
        $this->icon = $icon;
        $this->name = $name;
        $this->desc = $desc;
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

// Process the current page: Main
$main = file_get_contents("welcome/main.html");
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
$htmlSocial = "";
foreach ($social as $link) $htmlSocial .= '
    <span class="social" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $link->title . '"
          itemprop="mainEntityOfPage" itemscope itemtype="https://schema.org/ProfilePage">
      <a href="' . $link->href . '" target="_blank" itemprop="sameAs">
        <img src="{{ ROOT }}/img/' . $link->icon . '.svg" alt="' . $link->icon . '" itemprop="thumbnailUrl">
      </a>
    </span>';
$projects = array(
    new Project(
        "instatools", "instatools", "InstaTools",
        "Find unfollowers, download all saved posts, download any post and export DMs into HTML, PDF and TXT.",
        array(
            new Link("https://mahdiparastesh.ir/misc/instatools.apk",
                name: "Download for Android", microType: "downloadUrl"),
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.instatools",
                title: "Iranian Android Bazaar Store", name: "Bazaar", microType: "installUrl"),
            new Link("https://myket.ir/app/ir.mahdiparastesh.instatools",
                title: "Iranian Android Myket Store", name: "Myket", microType: "installUrl"),
            /*new Link("https://mahdiparastesh.ir/welcome/privacy/instatools.html",
                name: "Privacy Policy", microType: "publishingPrinciples"),*/
        ),
        "MobileApplication", "Android", "Tools, Personalisation"
    ),
    new Project(
        "fortuna", "fortuna", "Fortuna",
        "An open-source application of the Hedonist philosophy!",
        array(
            new Link(
                "https://github.com/fulcrum6378/fortuna",
                name: "Android Source (Kotlin)", microType: "url"),
            new Link(
                "https://play.google.com/store/apps/details?id=ir.mahdiparastesh.fortuna.gregorian",
                name: "Google Play", microType: "installUrl"),
            new Link(
                "https://github.com/fulcrum6378/fortuna_flutter",
                name: "Flutter Source", microType: "url"),
            /*new Link(
                "https://fortuna.mahdiparastesh.ir/",
                name: "Website (Demo)", microType: "sameAs"),*/
            new Link(
                "https://mahdiparastesh.ir/welcome/privacy/fortuna.html",
                name: "Privacy Policy", microType: "publishingPrinciples"),
        ),
        "SoftwareApplication", "Android, Web, iOS", "Philosophy, Lifestyle, Events, Health"
    ),
    new Project(
        "telexporter", "telexporter", "Telexporter",
        "Export your messages and call history into HTML, PDF or TXT file types.",
        array(
            new Link("https://galaxystore.samsung.com/detail/ir.mahdiparastesh.telexporter",
                name: "Galaxy Store", microType: "installUrl"),
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.telexporter",
                title: "Iranian Android Bazaar Store", name: "Bazaar", microType: "installUrl"),
            new Link("https://myket.ir/app/ir.mahdiparastesh.telexporter",
                title: "Iranian Android Myket Store", name: "Myket", microType: "installUrl"),
            new Link("https://mahdiparastesh.ir/welcome/privacy/telexporter.html",
                name: "Privacy Policy", microType: "publishingPrinciples"),
        ),
        "MobileApplication", "Android", "Tools"
    ),
    new Project(
        "migratio", "migratio", "Migratio",
        "A geographical statistical tool for determining someone's best destination for migration.",
        array(
            new Link("https://play.google.com/store/apps/details?id=ir.mahdiparastesh.migratio",
                name: "Google Play", microType: "installUrl"),
            new Link("https://galaxystore.samsung.com/detail/ir.mahdiparastesh.migratio",
                name: "Galaxy Store", microType: "installUrl"),
            /*new Link("https://migratio.mahdiparastesh.ir/",
                name: "Website", microType: "sameAs"),*/
            new Link("https://cafebazaar.ir/app/ir.mahdiparastesh.migratio",
                title: "Iranian Android Bazaar Store", name: "Bazaar", microType: "installUrl"),
            new Link("https://myket.ir/app/ir.mahdiparastesh.migratio",
                title: "Iranian Android Myket Store", name: "Myket", microType: "installUrl"),
            new Link("https://github.com/fulcrum6378/migratio_android",
                name: "Android Source (Kotlin)", microType: "url"),
            new Link("https://github.com/fulcrum6378/migratio",
                title: "Wordpress Theme", name: "Web Template", microType: "url"),
            new Link("https://mahdiparastesh.ir/welcome/privacy/migratio.html",
                name: "Privacy Policy", microType: "publishingPrinciples"),
        ),
        "SoftwareApplication", "Android, Web", "Tools, Travel, Migration"
    ),
    new Project(
        "mergen4", "mergen_iv", "Mergen IV",
        "A logical multi-sensed artificially intelligent robot (AIR) software. Temporarily designed for Android.",
        array(
            new Link("https://github.com/fulcrum6378/mergen_android",
                name: "Android Source", microType: "sameAs"),
        ),
        "SoftwareApplication", "Android", "AI, Logic, Robot"
    ),
    new Project(
        "mergen3", "mergen", "Mergen III",
        "A multi-sensed artificially intelligent robot (AIR) software, which needed a server and (a) client(s). "
        . "It was replaced by one which didn't need server and client. (archived project)",
        array(
            new Link(
                "https://github.com/fulcrum6378/mergen_server",
                name: "Server Source (Python)", microType: "sameAs"),
            new Link(
                "https://github.com/fulcrum6378/mergen_client",
                name: "Android Source (Kotlin)", microType: "url"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP"
    ),
    new Project(
        "mergen2", "mergen_red", "Mergen II (Pronouncer)",
        "An auditory (talking and hearing) NLP software robot. It was replaced by a auditory-visual software "
        . "AI robot. (archived project)",
        array(
            new Link(
                "https://github.com/fulcrum6378/pronouncer",
                name: "Server Source (Python)", microType: "sameAs"),
            new Link(
                "https://github.com/fulcrum6378/mergen_client",
                name: "Android Source (Kotlin)", microType: "url"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP"
    ),
    new Project(
        "mergen1", "mergen", "Mergen I",
        "An NLP logical artificial intelligence software, aimed to think using pure digital text. "
        . "It was replaced by an auditory one. (archived project)",
        array(
            new Link(
                "https://github.com/fulcrum6378/mergen_server",
                name: "Software Source (Python)", microType: "sameAs"),
        ),
        "SoftwareApplication", "Android, Windows, Linux, macOS",
        "Artificial Intelligence, AI, Logic, NLP"
    ),
    new Project(
        "friend_tracker", "friend_tracker", "Friend Tracker",
        "Easily track your friends on the map. (archived project)",
        array(
            new Link(
                "https://github.com/fulcrum6378/friend_tracker",
                name: "Android Source (Java)", microType: "sameAs"),
        ),
        "MobileApplication", "Android", "Maps & Navigation, Communication, Social"
    ),
    new Project(
        "saam", "saam", "Saam",
        "Stock market data collector based on MetaTrader5 (archived project)",
        array(
            new Link(
                "https://github.com/fulcrum6378/saam",
                name: "Software Source (Python)", microType: "sameAs"),
        ),
        "SoftwareApplication", "Windows", "Finance, Business, Tools"
    ),
);
if (isset($_GET["fk"]) && $_GET["fk"] == "1") $projects[] = new Project(
    "sexbook", "sexbook", "Sexbook",
    "With this app, you can record any kind of sexual activities you had in the past and view their "
    . "statistics, frequency, recency, etc.",
    array(
        new Link("https://play.google.com/store/apps/details?id=ir.mahdiparastesh.sexbook",
            name: "Google Play", microType: "installUrl"),
        new Link("https://galaxystore.samsung.com/detail/ir.mahdiparastesh.sexbook",
            name: "Galaxy Store", microType: "installUrl"),
        new Link("https://apkpure.com/p/ir.mahdiparastesh.sexbook",
            title: "APKPure.com a third-party APK store", name: "APKPure", microType: "installUrl"),
        new Link("https://mahdiparastesh.ir/welcome/privacy/sexbook.html",
            name: "Privacy Policy", microType: "publishingPrinciples"),
    ),
    "MobileApplication", "Android", "Lifestyle, Events, Dating"
);
$htmlProjects = "";
foreach ($projects as $p) {
    $htmlAnchors = "";
    foreach ($p->anchors as $a) $htmlAnchors .= '
        <div class="anchor">
          <hr>
          <a href="' . $a->href . '" target="_blank" itemprop="' . $a->microType . '"
             data-bs-toggle="tooltip" data-bs-placement="top" title="' . $a->title . '">' . $a->name . '</a>
        </div>';
    $htmlProjects .= '
    <section class="grid-item ' . $p->id . '" itemprop="subjectOf"
             itemscope itemtype="https://schema.org/' . $p->microType . '">
      <div class="grid-inner animated-button">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <img src="{{ ROOT }}/img/' . $p->icon . '_round.png" alt="' . $p->icon . '" class="icon" itemprop="logo">
        <p class="projName" itemprop="name">' . $p->name . '</p>
        <p class="projDesc" itemprop="disambiguatingDescription">
          ' . $p->desc . '
        </p>' . $htmlAnchors . '
      </div>
      <meta itemprop="operatingSystem" content="' . $p->os . '">
      <meta itemprop="isAccessibleForFree" content="true">
      <meta itemprop="applicationCategory" content="' . $p->category . '">
    </section>';
}

// Collect the required data for the templates
$data = array(
    'ROOT' => '/welcome',
    'PAGE' => 'main',
    'HELP' => $_GET['hl'] ?? '',
    'COUNTRY' => '',
    'SOCIAL' => $htmlSocial,
    'PROJECTS' => $htmlProjects,
);
foreach ($s as $key => $value) $data[$key] = $value[$l];

// Render the template using Twig
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$twig = new Environment(new FilesystemLoader(["welcome"]));
$data["CONTENT"] = $twig->render('main.html', $data);
echo $twig->render('temp.html', $data);


/*TODO:
 * List the Github Gists in a new grid
 * Add an arrow near the flag of UK and minimise the flags
 */
