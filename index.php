<?php 

//Task 1

$arr_first = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$arr_second = [9, 8, 7, 6, 5, 4, 3, 2, 1];

$result_arr = array_map(function ($ind1, $ind2) {
    return $ind1 * $ind2;
}, $arr_first, $arr_second);

var_dump($result_arr);

//Task 2

$name = readline("Как тебя зовут?");
$celebration = readline("Что празднуем?");

function felicitation ($name, $celebration) {
    $wishes = ["счастья", "здоровья", "благополучия", "терпения", "воображения", "достатка", "долголетия"];
    $epithets = ["железного", "огромного", "прекрасного", "полного", "бесконечного", "золотого", "безудержного"];

    $congrats = "";
    $gaps = [", ", " и ", " "];
    $selected_wishes = array_rand($wishes, 3);
    $selected_epithets = array_rand($epithets, 3);

    for($i = 0; $i < count($selected_wishes); $i++) {
        $congrats .= $epithets[$selected_epithets[$i]] . " " . $wishes[$selected_wishes[$i]] . $gaps[$i];
    }

    return "Дорогой $name, в этот светлый праздник - $celebration, от всего сердца поздравляю тебя, желаю тебе $congrats!";
}

echo felicitation($name, $celebration);

//Task 3
$arr_half = [1,2,3,4,5,0,0,0,0,0];
$double_arr = [];

for($i = 0, $j = 0; $i < 5; $i++, $j+=2) {
    $double_arr[$j] = $arr_half[$i];
    $double_arr[$j+1] = $arr_half[$i];
}

var_dump($double_arr);

//Task 4
$ranged_arr = range(1, 200);
shuffle($ranged_arr);
$random_arr = array_slice($ranged_arr, 100);

var_dump($random_arr);

//Task 5

$students = [
    'БАП1320' => [ 
       "Смирнова Христина" => 3,
       "Рогозин Даниил" => 2,
       "Золин Владилен" => 3,
       "Архаткина Владислава" => 3,
       "Мещерякова Мария" => 3,
       "Саврасова Фаина" => 3,
       "Хромченко Зинаида" => 5,
       "Протасова Майя" => 3,
    ],
    "ИТ720" => [
       "Ябров Тимур" => 4,
       "Белорусов Ефрем" => 4,
       "Ягода Назар" => 2,
       "Ярилова Розалия" => 4,
       "Нырко Платон" => 2,
       "Калинин Агап" => 4,
       "Никифоров Юлиан" => 5
    ],
  ];

  $avr_mark = ['БАП1320' => 0, "ИТ720" => 0];
  $expelled_list = [];

foreach($students as $group => $members) {
    foreach($members as $member => $mark) {
        $avr_mark[$group] += $mark;

        if($mark < 3) {
            $expelled_list[] = $member;
        }
    }
    $avr_mark[$group] /= count($members);
}

print_r($avr_mark);
print_r($expelled_list);