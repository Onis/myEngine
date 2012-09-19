<form class="form-horizontal" action="{$smarty.const.URL}user/editSave/{$user[0]['id']}" method="post">
    <fieldset>
        <legend>Изменения данных пользователя {$user[0]['login']}</legend>
        <input type="text" name="login" value={$user[0]['login']}><br />
        <input type="password" name="password" value={$user[0]['login']}><br />
        <select name="role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
            <option value="owner">Owner</option>
        </select><br /><br />
        <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
        </div>
    </fieldset>
</form>