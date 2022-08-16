<?php 

//Task 1

$array_int =  [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
$even_odd = fn($number):string => $number % 2 === 0? "even" : "odd";

print_r(array_map($even_odd ,$array_int));

//Task 2

function sort_array(array $arr):array{
    $max = asort($arr);
    $min = arsort($arr);
    $avg = array_sum($arr)/count($arr);

    return ["max" => $max, "min" => $min, "avg" => round($avg)];
    
}

sort_array($array_int);

// Task 3

$box = [
    [
        0 => 'Тетрадь',
        1 => 'Книга',
        2 => 'Настольная игра',
        3 => [
            'Настольная игра',
            'Настольная игра',
        ],
        4 => [
            [
                'Ноутбук',
                'Зарядное устройство'
            ],
            [
                'Компьютерная мышь',
                'Набор проводов',
                [
                    'Фотография',
                    'Картина'
                ]
            ],
            [
                'Инструкция',
                [
                    'Ключ'
                ]
            ]
        ]
    ],
    [
        0 => 'Пакет кошачьего корма',
        1 => [
            'Музыкальный плеер',
            'Книга'
        ]
    ]
 ];

 $staff_name = readline("Что ищем?");

 function find_staff(string $staff_name, array $box):bool {

    foreach($box as $staff_in_box) {
        if(gettype($staff_in_box) === "array") {
            if (find_staff($staff_name, $staff_in_box)) {
                return true;
            }
        } else {
            if ($staff_name === $staff_in_box) {
                return true;
            }
        }
    }
    return false;
 }

 if(find_staff($staff_name, $box)) {
    print_r("Нашел '{$staff_name}'");
 } else {
    print_r("Не нашлось");
 }
