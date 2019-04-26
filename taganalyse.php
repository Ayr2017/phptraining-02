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



//echo htmlentities($arr[count($arr)-1]);
// $q++;
        
//         if(preg_match('/^<\//',$val))
//         {
//             echo "VAL IS  - ". htmlentities($val)." <br>";
//             count($tags)>0 ? $last_index = count($tags)-1 : $last_index = 0;
//             echo "last index  -  $last_index <br>";
//             $previos_tag = $tags[$last_index];
//             echo "tags[last index]  - ". htmlentities($tags[$last_index]). "<br>";
//             $val = str_replace('/','',$val);

//             echo "previos tag is -> ".htmlentities($previos_tag)." <br>";
//             echo "current value is ->  ".htmlentities($val)." <br>";
//             echo "last index is -> $last_index <br>";

//             $tags_c[] = htmlentities($val);
//             if($previos_tag == $val)
//             {
//                 unset($tags[$last_index]);
//                 echo "Unset <br>";
//                 var_dump($tags);
//                 echo "<br>";
//             }
//             else
//             {
//                 echo "Error array";
//                 //return;
//             }
//         }
//         elseif(preg_match('/^</',$val))
//         {
//             $tags[] = $val;
//             $tags_b[] = htmlentities($val);
//             echo "current value is -  ".htmlentities($val)." <br>";
//         }
//         // if($q == 5) retur