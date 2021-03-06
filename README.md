[![Total Downloads](https://poser.pugx.org/larakit/lk-html/d/total.svg)](https://packagist.org/packages/larakit/lk-html)
[![Latest Stable Version](https://poser.pugx.org/larakit/lk-html/v/stable.svg)](https://packagist.org/packages/larakit/lk-html)
[![Latest Unstable Version](https://poser.pugx.org/larakit/lk-html/v/unstable.svg)](https://packagist.org/packages/larakit/lk-html)
[![License](https://poser.pugx.org/larakit/lk-html/license.svg)](https://packagist.org/packages/larakit/lk-html)
#larakit/lk-html
Библиотека для генерации HTML-сущностей на основе PEAR/HTML_Common2

Позволяет работать с элементом HTML как с объектом с использованием цепочки методов, постепенно добавляя, изменяя и удаляя значение аттрибутов элемента, в отличие от других библиотек позволяющих разово инициализировать и сгенерировать элемент.

### Для установки:
1) установить пакет
~~~bash
$ php composer.phar require larakit/laravel-larakit-html
~~~
2) запустить перегенерацию автокомплита
~~~bash
php artisan ide-helper:generate
~~~

### Основные методы:
1) Если элемент состоит из двух закрывающих тегов, то содержимое устанавливается методом
~~~php
$el->setContent($text)
~~~
2) Если элемент состоит из одного тега, то все его аттрибуты устанавливаются методом
~~~php
$el->setAttribute($name, $value);
~~~
3) Управление CSS - классами заключается в использовании методов (можно несколько раз добавить один класс, все равно в итоговый аттрибут попадут только уникальные классы)
~~~php
$el->addClass($class)->removeClass($class);
~~~
### Элемент A (ссылка)
~~~php
$el = \HtmlA::setHref('/')->setContent('TeXt');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{ html_a('/').setContent('TeXt')|raw }}
~~~
результат
~~~html
<a href="/">TeXt</a>
~~~

### Элемент Abbr (аббревиатура)
~~~php
$el = \HtmlAbbr::setTitle('HyperText Markup Language')
    ->setContent('HTML');
echo $el;
$el = \HtmlAbbr::setTitle('PHP: Hypertext Preprocessor')
    ->setContent('PHP')
    ->asInitialism();
echo $el;
~~~
или в шаблоне Twig
~~~html
{{ html_abbr('HyperText Markup Language').setContent('HTML')|raw }}
{{ html_abbr('PHP: Hypertext Preprocessor').setContent('PHP').asInitialism()|raw }}
~~~
результат
~~~html
<abbr title="HyperText Markup Language">HTML</abbr>
<abbr title="PHP: Hypertext Preprocessor" class="initialism">PHP</abbr>
~~~

### Элемент Area/Map (ссылка)
~~~php
$map = \HtmlMap::setName('map')->setId('map-123');
$map->addArea()->setShape('poly')
    ->setCoords('1601,15,1602,52,1676,52,1676,205,1590,203')
    ->setHref('/page123');
$map->addArea()->setShape('poly')
    ->setCoords('1676,205,1590,203,1591,170,1440,169,1439,14')
    ->setAttribute('777');
echo $map;
~~~
или в шаблоне Twig
~~~html
{% set map = html_map('map', 'map-123') %}
{% set area = map.addArea().setShape('poly').setCoords('1601,15,1602,52,1676,52,1676,205,1590,203').setHref('/page123') %}
{% set area = map.addArea().setShape('poly').setCoords('1676,205,1590,203,1591,170,1440,169,1439,14').setHref('777') %}
{{ map|raw }}
~~~
результат
~~~html
<map name="map" id="map-123">
  <area shape="poly" href="/page123" coords="1601,15,1602,52,1676,52,1676,205,1590,203">
  <area shape="poly" data-id="777" coords="1676,205,1590,203,1591,170,1440,169,1439,14">
</map>
~~~

### Элемент Blockquote (цитата)
~~~php
$el = \HtmlBlockquote::setAuthor('В.И. Ленин')
    ->setContent('Главная проблема цитат в интернете – люди сразу верят в их подлинность.');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{ html_blockquote('Главная проблема цитат в интернете – люди сразу верят в их подлинность.', 'В.И. Ленин')|raw }}
~~~
результат
~~~html
<blockquote>
  <p>Главная проблема цитат в интернете – люди сразу верят в их подлинность.</p>
  <footer>В.И. Ленин</footer>
</blockquote>
~~~

### Элемент Button (кнопка)
~~~php
$el = \HtmlButton::setContent('Удалить')
    ->setTitle('Удаление не доступно')
    //классы можно добавлять через пробел
    ->addClass('btn btn-danger')    
    //следом можно добавить еще один класс, даже дублировать предыдущий (вставится только один)
    ->addClass('disabled btn');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{ html_button('Удалить')
    .setTitle('Удаление не доступно')
    .addClass('btn btn-danger')
    .addClass('disabled btn')|raw }}
~~~
результат
~~~html
<button class="btn btn-danger disabled" title="Удаление не доступно">Удалить</button>
~~~

### Элемент Div (блочная обертка)
~~~php
$el = \HtmlDiv::addClass('row');
$el->setContent(
    \HtmlDiv::addClass('col-lg-6')->setContent('Attribute')
    .
    \HtmlDiv::addClass('col-lg-6')->setContent('Value');
);    
echo $el;
~~~
или в шаблоне Twig
~~~html
{{
    html_div(
        html_div('Attribute').addClass('col-lg-6')
        ~
        html_div('Value').addClass('col-lg-6')
    )
    .addClass('row')|raw
}}
~~~
результат
~~~html
<div class="row">
    <div class="col-lg-6">Attribute</div>
    <div class="col-lg-6">Value</div>
</div>
~~~

### Элемент I (курсив) используется для иконочных шрифтов
~~~php
$el = \HtmlI::addClass('fa fa-bed');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{  html_i().addClass('fa fa-bed')|raw  }}
~~~
результат
~~~html
<i class="fa fa-bed"></i>
~~~

### Элемент Img (картинка)
~~~php
$el = \HtmlImg::setSrc('/picture.jpg');
echo $el;
$el = \HtmlImg::setAttribute('data-src',  'holder.js/140x140')
        ->setTitle('A generic square placeholder image with rounded corners')
        ->addClass('img-rounded');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{  html_image('/picture.jpg')|raw  }}
{{  html_image()
        .setAttribute('data-src',  'holder.js/140x140')
        .setTitle('A generic square placeholder image with rounded corners')
        .addClass('img-rounded')|raw
}}
~~~
результат
~~~html
    <img src="/picture.jpg">
    <img data-src="holder.js/140x140" class="img-rounded" 
        alt="A generic square placeholder image with rounded corners">
~~~

### Элемент Span (инлайновая обертка)
~~~php
$el = \HtmlSpan::addClass('text-success')
    ->setContent('Groove');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{  html_span('Groove').addClass('text-success')|raw  }}
~~~
результат
~~~html
<span class="text-success">Groove</span>
~~~

### Элемент Strike (зачеркнутый текст)
~~~php
$el = \HtmlStrike::setContent('Старая цена: 100руб.');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{  html_strike('Старая цена: 100руб.')|raw  }}
~~~
результат
~~~html
<strike>Старая цена: 100руб.</strike>
~~~

### Элемент Strong (жирный текст)
~~~php
$el = \HtmlStrong::setContent('Важный текст');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{  html_strong('Важный текст')|raw  }}
~~~
результат
~~~html
<strong>Важный текст</strong>
~~~

### Элемент Video
~~~php
$el = \HtmlVideo::setSrc('http://ste.com/video.mp4');
echo $el;
~~~
или в шаблоне Twig
~~~html
{{ html_video('http://ste.com/video.mp4') }}
~~~
результат
~~~html
<video>
    <source src="http://ste.com/video.mp4" type="video/mp4">
    Тег video не поддерживается вашим браузером
    <a href="http://ste.com/video.mp4">Скачайте видео</a>
</video>
~~~

### Элемент Table (таблица)
~~~php
$table = \HtmlTable::addClass('table')->setCaption('Заголовок таблицы');
$tr = $table->addRow();
$tr->addCell()->setContent('Предмет')->asTh()->setRowspan(2);
$tr->addCell()->setContent('Габариты')->asTh()->setColspan(3);
$tr->addCell()->setContent('Вес')->asTh()->setRowspan(2);
$tr = $table->addRow();
$tr->addCell()->setContent('Длина')->asTh();
$tr->addCell()->setContent('Ширина')->asTh();
$tr->addCell()->setContent('Высота')->asTh();
$tr = $table->addRow();
$tr->addCell()->setContent('Стол');
$tr->addCell()->setContent('2000 мм');
$tr->addCell()->setContent('1000 мм');
$tr->addCell()->setContent('900 мм');
$tr->addCell()->setContent('15 кг');
$tr = $table->addRow();
$tr->addCell()->setContent('Шкаф');
$tr->addCell()->setContent('3500 мм');
$tr->addCell()->setContent('600 мм');
$tr->addCell()->setContent('2400 мм');
$tr->addCell()->setContent('65 кг');
echo $table;
~~~
результат:
~~~html
<table class="table">
    <caption>Заголовок таблицы</caption>
    <tbody>
        <tr>
            <th rowspan="2">Предмет</th>
            <th colspan="3">Габариты</th>
            <th rowspan="2">Вес</th>
        </tr>
        <tr>
            <th>Длина</th>
            <th>Ширина</th>
            <th>Высота</th>
        </tr>
        <tr>
            <td>Стол</td>
            <td>2000 мм</td>
            <td>1000 мм</td>
            <td>900 мм</td>
            <td>15 кг</td>
        </tr>
        <tr>
            <td>Шкаф</td>
            <td>3500 мм</td>
            <td>600 мм</td>
            <td>2400 мм</td>
            <td>65 кг</td>
        </tr>
    </tbody>
</table>
~~~
