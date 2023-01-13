<?php
// Load the template
$tmp = file_get_contents("welcome/temp.html");

// Process the current page: Main
$main = file_get_contents("welcome/main.html");
$social = '
    <span tal:repeat="s social" class="social"
          data-bs-toggle="tooltip" data-bs-placement="top" title="${s.title}"
          itemprop="mainEntityOfPage" itemscope itemtype="https://schema.org/ProfilePage">
      <a href="${s.link}" target="_blank" itemprop="sameAs">
        <img src="%ROOT%/img/${s.icon}.svg" itemprop="thumbnailUrl">
      </a>
    </span>';
$projects = '
    <section class="grid-item ${p.id}" itemprop="subjectOf"
             itemscope itemtype="https://schema.org/${p.microType}"
             tal:repeat="p projects">
      <div class="grid-inner animated-button">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <img src="%ROOT%/img/${p.icon}_round.png" class="icon" itemprop="logo">
        <p class="projName" itemprop="name" tal:content="p.name"/>
        <p class="projDesc" itemprop="disambiguatingDescription" tal:content="p.desc"/>
        <div tal:repeat="a p.anchors" class="anchor">
          <hr>
          <a href="${a.link}" target="_blank" itemprop="${a.microType}"
             data-bs-toggle="tooltip" data-bs-placement="top" title="${a.title}">${a.name}</a>
        </div>
      </div>
      <meta itemprop="operatingSystem" content="${p.os}">
      <meta itemprop="isAccessibleForFree" content="true">
      <meta itemprop="applicationCategory" content="${p.category}">
    </section>';

// Merge it with the template
$tmp = str_replace("%CONTENT%", $main, $tmp);
$data = array(
    "ROOT" => "/welcome",
    "PAGE" => "main",
    "TITLE" => "Mahdi Parastesh",
    "FAVICON" => "", //"https://mahdi.mahdiparastesh.ir/Images/fav-icon.ico",
    "HELP" => $_GET["hl"] ?? "",
    "COUNTRY" => "",
);
$keys = array();
foreach (array_keys($data) as $k) $keys[] = "%$k%";
$tmp = str_replace($keys, array_values($data), $tmp);
echo $tmp;
