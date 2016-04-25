<?php
//######################################################################
// регистрируем алиасы
//######################################################################
Larakit\SPA::register_alias('HtmlProgress', Larakit\Html\Facades\Progress::class);
Larakit\SPA::register_alias('HtmlProgressBar', Larakit\Html\Facades\ProgressBar::class);
Larakit\SPA::register_alias('HtmlA', Larakit\Html\Facades\A::class);
Larakit\SPA::register_alias('HtmlAudio', Larakit\Html\Facades\Audio::class);
Larakit\SPA::register_alias('HtmlAbbr', Larakit\Html\Facades\Abbr::class);
Larakit\SPA::register_alias('HtmlArea', Larakit\Html\Facades\Area::class);
Larakit\SPA::register_alias('HtmlBlockquote', Larakit\Html\Facades\Blockquote::class);
Larakit\SPA::register_alias('HtmlBody', Larakit\Html\Facades\Body::class);
Larakit\SPA::register_alias('HtmlButton', Larakit\Html\Facades\Button::class);
Larakit\SPA::register_alias('HtmlDiv', Larakit\Html\Facades\Div::class);
Larakit\SPA::register_alias('HtmlI', Larakit\Html\Facades\I::class);
Larakit\SPA::register_alias('HtmlImg', Larakit\Html\Facades\Img::class);
Larakit\SPA::register_alias('HtmlMap', Larakit\Html\Facades\Map::class);
Larakit\SPA::register_alias('HtmlSpan', Larakit\Html\Facades\Span::class);
Larakit\SPA::register_alias('HtmlStrike', Larakit\Html\Facades\Strike::class);
Larakit\SPA::register_alias('HtmlStrong', Larakit\Html\Facades\Strong::class);
Larakit\SPA::register_alias('HtmlSub', Larakit\Html\Facades\Sub::class);
Larakit\SPA::register_alias('HtmlSup', Larakit\Html\Facades\Sup::class);
Larakit\SPA::register_alias('HtmlTable', Larakit\Html\Facades\Table::class);
Larakit\SPA::register_alias('HtmlTableRow', Larakit\Html\Facades\TableRow::class);
Larakit\SPA::register_alias('HtmlTableRowCell', Larakit\Html\Facades\TableRowCell::class);
Larakit\SPA::register_alias('HtmlLi', Larakit\Html\Facades\Li::class);
Larakit\SPA::register_alias('HtmlUl', Larakit\Html\Facades\Ul::class);
Larakit\SPA::register_alias('HtmlOl', Larakit\Html\Facades\Ol::class);
Larakit\SPA::register_alias('HtmlVideo', Larakit\Html\Facades\Video::class);

//######################################################################
// регистрируем функции
//######################################################################
Larakit\Twig::register_function('html_progress', function () {
    return HtmlProgress::setContent('');
});
Larakit\Twig::register_function('html_map', function ($name, $id=null) {
    return \HtmlMap::setName($name)->setId($id?$id:$name);
});
Larakit\Twig::register_function('html_progress_bar', function () {
    return HtmlProgressBar::setContent('');
});
Larakit\Twig::register_function('html_a', function ($url) {
    return HtmlA::setHref($url)->setContent($url);
});
Larakit\Twig::register_function('html_audio', function ($src) {
    return HtmlAudio::setSrc($src);
});
Larakit\Twig::register_function('html_abbr', function ($abbr, $fulltext) {
    return HtmlAbbr::setContent($abbr)->setTitle($fulltext);
});
Larakit\Twig::register_function('html_blockquote', function ($content, $author = null) {
    return HtmlBlockquote::setContent($content)->setAuthor($author);
});
Larakit\Twig::register_function('html_button', function ($content) {
    return HtmlButton::setContent($content);
});
Larakit\Twig::register_function('html_div', function ($content = null) {
    return HtmlDiv::setContent($content);
});
Larakit\Twig::register_function('html_i', function ($content = null) {
    return HtmlI::setContent($content);
});
Larakit\Twig::register_function('html_span', function ($content = null) {
    return HtmlSpan::setContent($content);
});
Larakit\Twig::register_function('html_strike', function ($content = null) {
    return HtmlStrike::setContent($content);
});
Larakit\Twig::register_function('html_strong', function ($content = null) {
    return HtmlStrong::setContent($content);
});
Larakit\Twig::register_function('html_sup', function ($content = null) {
    return HtmlSup::setContent($content);
});
Larakit\Twig::register_function('html_sub', function ($content = null) {
    return HtmlSub::setContent($content);
});
Larakit\Twig::register_function('html_ul', function ($items=[]) {
    $list = HtmlUl::setContent(null);
    if(count($items)){
        foreach($items as $item){
            $list->addItem($item);
        }
    }
    return $list;
});
Larakit\Twig::register_function('html_ol', function ($items=[]) {
    $list = HtmlOl::setContent(null);
    if(count($items)){
        foreach($items as $item){
            $list->addItem($item);
        }
    }
    return $list;
});
Larakit\Twig::register_function('html_table', function ($class = 'table table-striped table-bordered table-condensed') {
    return HtmlTable::addClass($class);
});
Larakit\Twig::register_function('html_image', function ($src = null) {
    return HtmlImg::setSrc($src);
});
Larakit\Twig::register_function('html_video', function ($src = null) {
    return HtmlVideo::setSrc($src);
});
