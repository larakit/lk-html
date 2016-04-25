<?php

//регистрируем функцию Twig
\Larakit\Twig::register_function(
    'larahtml', function ($element, $content = '') {
        $element = '\Html' . \Illuminate\Support\Str::studly($element);
        return $element::setContent($content);
    }
);