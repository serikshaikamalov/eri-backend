<?php $this->title = 'Active Record';  ?>

<h1>ActiveRecord - Работа с базы данными</h1>


<h2>Что нам позволяет Active Record?</h2>

<ul>
    <li>Работать с базы данными делая CRUD операций</li>
</ul>


<h2>Как все работает? </h2>

<ul>
    <li>Создаем таблицу через миграцию</li>
    <li>На основания этой таблицы создается Model</li>
    <li>В модели также есть возможность валидации</li>
</ul>


<h2 class="text-center">Операции</h2>
<ul>
    <li><a href="/web/index.php?r=staffs/list">Список всех сотрудников</a> </li>
    <li><a href="/web/index.php?r=staffs/staff-by-id&Id=1">Поиск сотрудника через его ID</a> </li>
    <li><a href="/web/index.php?r=staffs/search-by-title&Title=r">Поиск сотрудника через его имя</a> </li>
    <li><a href="/web/index.php?r=staffs/insert">Вставляем нового сотрудника</a> </li>
    <li><a href="/web/index.php?r=staffs/update&Id=1">Изменяем сотрудника</a> </li>
    <li><a href="/web/index.php?r=staffs/delete&Id=1">Удаляем сотрудника</a> </li>
</ul>