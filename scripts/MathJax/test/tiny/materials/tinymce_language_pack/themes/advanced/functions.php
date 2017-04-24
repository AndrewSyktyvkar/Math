<?php
function enable_more_buttons($buttons) {
$buttons[] = 'removeformat'; // удалить форматирование
$buttons[] = 'justifyfull'; // выравнивание по ширине
$buttons[] = 'forecolor'; // цвет текста
$buttons[] = 'backcolor'; // цвет фона
$buttons[] = 'charmap'; // символ
$buttons[] = 'sup'; //верхний индекс
$buttons[] = 'anchor'; // якорь
$buttons[] = 'styleselect'; // выбор стиля
return $buttons; }

add_filter("mce_buttons_3", "enable_more_buttons");
?>