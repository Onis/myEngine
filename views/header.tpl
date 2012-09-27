<!doctype html>
<html>
<head>
    <title>Движок</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{$smarty.const.URL}public/css/bootstrap.min.css" >
    <script src="{$smarty.const.URL}public/js/jquery.min.js"></script>
    <script type="text/javascript" src="{$smarty.const.URL}public/js/bootstrap.min.js"></script>
    {if (isset($jsArray))}
        {foreach from = $jsArray item = js}
            <script type="text/javascript" src="{$smarty.const.URL}/modules/{$js}"></script>
        {/foreach}
    {/if}
</head>
<body>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="navbar">
                <div class="navbar-inner">
                    <ul class="nav nav-pills">
                        <li><a href="{$smarty.const.URL}index">Главная</a></li>
                        <li><a href="{$smarty.const.URL}registration">Зарегистрироваться</a></li>
                        <li><a href="{$smarty.const.URL}news">Новости</a></li>
                        <li><a href="{$smarty.const.URL}user">Пользователи</a></li>
                        <li><a href="{$smarty.const.URL}login">Вход</a></li>
                        <li><a href="{$smarty.const.URL}test">Тест</a></li>
                    </ul>
                </div>
            </div>

            </div >
        </div>


