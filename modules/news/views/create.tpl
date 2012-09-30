<form id="news_form" class="form-horizontal" action="{$smarty.const.URL}news/createNews" method="post">
    <fieldset>
        <legend>Создание Новости</legend>
        <input type="text" name="title" placeholder="Заглавие новости"><br />
        <input type="text" name="text" placeholder="Содержание"><br />
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </fieldset>
</form>