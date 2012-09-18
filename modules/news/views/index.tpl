<form class="form-inline" action="{$smarty.const.URL}news/create" method="POST">
    <input type="text" name="text">
    <input type="submit" class="btn">
</form>

<br />

<table>
    {foreach from=$newsList key = key item = value}
        <tr>
        <td>{$value.id}</td>
        <td>{$value.text}</td>

        <td>
            <a href="{$smarty.const.URL}news/delete/{$value.id}">Delete</a></td>
        </tr>
    {/foreach}
</table>
