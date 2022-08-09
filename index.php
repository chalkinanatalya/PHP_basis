<?php 

//Task 1

$question = readLine("Who is the original creator of PHP language? 1.Rasmus Lerdorf 2.James Gosling 3.Brendan Eich ");
$flag = false;

 do {
    switch($question) {
        case $question === "1":
            echo "Great! $question is correct!";
            $flag = true;
            break;
         case $question === "2":
            echo "$question is incorrect! He was Java creator.";
            $flag = true;
            break;
        case $question === "3":
            echo "$question is incorrect! He was a JavaScript creator.";
            $flag = true;
            break;
        default:
            $question = readLine("Who is the original creator of PHP language? 1.Rasmus Lerdorf 2.James Gosling 3.Brendan Eich");
    }
} while (!$flag);


//Task 2
$name = readLine("Как тебя зовут?");
$tasks_amount = (int)readLine("Сколько задач Вы запланировали на сегодня? Введите число.");

if(gettype($tasks_amount) !== 0) {
    echo "Нужно ввести корректное число";
} else {

    $current_task = '';
    $current_time = null;
    $total_time = null;
    $tasks_array = [];
    $times_array = [];


    for($i = 0; $i < $tasks_amount; $i++) {
        $current_task = readLine("Какая задача стоит перед вами сегодня?");
        $current_time = (int)readLine("Сколько примерно времени эта задача займет?");

        array_push($tasks_array, $current_task);
        array_push($times_array, $current_time);

        $total_time = array_sum($times_array);
    }

    echo "$name, сегодня у вас запланировано $tasks_amount приоритетных задачи на день:";

    for($i = 0; $i < count($tasks_array); $i++) {
            echo "- $tasks_array[$i] ({$times_array[$i]}ч)";
    }

    echo "Примерное время выполнения плана = {$total_time}ч";

}


//Task 3
$finger = (int)readLine("Введите число и я определю палец: ");

if(($finger - 1) % 8 === 0) {
    echo "Большой палец";
} elseif ($finger % 8 === 0 || $finger % 8 === 2) {
    echo "Указательный палец";
} elseif (($finger + 1) % 4 === 0) {
    echo "Средний палец";
} elseif ($finger % 8 === 4 || $finger % 8 === 6) {
    echo "Безымянный палец";
} elseif (($finger - 5) % 8 === 0) {
    echo "Мизинец  палец";
};