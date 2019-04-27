<?php
$arr = ['<c>','<a>','<b>','</b>','</a>','</c>','<d>','</d>'];

function checkTags($arr) 
{
  $tags = [];
  foreach($arr as $val)
  {
    $tags = array_values($tags); //сброс индекса у массива - каждый раз начинать с 0-го индекса
    if(preg_match('/^<\//',$val) && count($tags)>=1) // если тег начинается со слеша - закрывающий
    {
      $val = str_replace('/','',$val); // убрать у тега слеш
      if ($tags[count($tags)-1]==$val)  unset($tags[count($tags)-1]);//сравнить с предыдущей записью
      else return 'false';
    }
    elseif(preg_match('/^</',$val)) //если тег не начинается со слеша, то открывающий
    {
      $tags[] = $val;//записать в массив тегов
    }
  }
  if(count($tags)==0) return 'true';
}

echo checkTags($arr);
