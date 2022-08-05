<?php 

//Task 1
$name = readLine("Как тебя зовут?");
$age = (int)readLine("Сколько тебе лет?");

echo "Вас зовут $name, вам $age лет";

//Task 2
$total_amount = 3;
$task1 = readLine("Какая задача стоит перед вами сегодня?");
$time1 = (int)readLine("Сколько примерно времени эта задача займет?");

$task2 = readLine("Какая задача стоит перед вами сегодня?");
$time2 = (int)readLine("Сколько примерно времени эта задача займет?");

$task3 = readLine("Какая задача стоит перед вами сегодня?");
$time3 = (int)readLine("Сколько примерно времени эта задача займет?");

$total_time = $time1 + $time2 + $time3;

echo "$name, сегодня у вас запланировано $total_amount приоритетных задачи на день:
- $task1 ({$time1}ч)
- $task2 ({$time2}ч)
- $task3 ({$time3}ч)
Примерное время выполнения плана = {$total_time}ч";
