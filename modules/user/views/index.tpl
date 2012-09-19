<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Логин</th>
        <th>Роль</th>
        <th>Действия</th >
    </tr>
    </thead>
    <tbody>
    {foreach from=$userList key = key item = value}
        <tr>
            <td>{$value.id}</td>
            <td>{$value.login}</td>
            <td>{$value.role}</td>
            <td>
                <a href="{$smarty.const.URL}user/edit/{$value.id}">Изменить |</a>
                <a href="{$smarty.const.URL}user/delete/{$value.id}"> Удалить</a>
            </td>
        </tr>
    {/foreach}
    </tbody>
</table>