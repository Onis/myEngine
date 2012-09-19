<a href="{$smarty.const.URL}news/create"><h4>Создать новость</h4></a><br>
<table border=1>
    {foreach from=$newsList key = key item = value}
        <tr>
        <td>{$value.title}</td>
        <td>{$value.text}</td>

        <td>
            <a href="{$smarty.const.URL}news/delete/{$value.id}">Delete</a></td>
        </tr>
    {/foreach}
</table>
