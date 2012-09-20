{foreach from=$arrayAnswers key = key item = value}
    {foreach from=$value key=key2 item=value2}
    Вопрос: <br>
    &nbsp  &nbsp  &nbsp {$key2}<br>
    Варианты ответов:
    <ul>
        {foreach from=$value2 item=value3}
            <li>{$value3}</li>
        {/foreach}
    </ul>
    {/foreach}
<hr>
{/foreach}
