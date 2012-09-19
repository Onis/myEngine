<form class="form-horizontal" action="{$smarty.const.URL}registration/create" method="post">
    <fieldset>
        <legend>Создание пользователя</legend>
        <input type="text" name="login" placeholder="Логин"><br />
        <input type="password" name="password" placeholder="Пароль"><br />
        <select name="role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
        </select><br /><br />
        <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
        </div>
    </fieldset>
</form>