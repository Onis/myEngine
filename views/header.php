<!doctype html>
<html>
<head>
    <title>Движок</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" >
</head>
<body>
    <?php Session::init(); ?>
    <div class="container-fluid" >
        <div class="row-fluid">
            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="nav nav-pills">
                        <li><a href="<?php echo URL; ?>index">Главная</a></li>
                        <li><a href="<?php echo URL; ?>registration">Зарегистрироваться</a></li>
                        <li><a href="<?php echo URL; ?>news">Новости</a></li>
                        <li><a href="<?php echo URL; ?>user">Пользователи</a></li>
                        <li><a href="<?php echo URL; ?>login">Вход</a></li>
                    </ul>
                </div>
            </div>

            <div class="hero-unit">


