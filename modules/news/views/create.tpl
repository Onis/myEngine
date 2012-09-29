<form id="randomInsert" class="form-horizontal" action="{$smarty.const.URL}news/createNews" method="post">
    <fieldset>
        <legend>Создание Новости</legend>
        <input type="text" name="name" placeholder="Заглавие новости"><br />
        <input type="text" name="Examine" placeholder="Содержание"><br />
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </fieldset>
</form>