{foreach from=$randomRows key = key item = value}

    {$key} :::::: {$value} <br>

{/foreach}
<hr>
{foreach from=$arrayAnswers key = key item = value}
    Вопрос : {$key}<br>
    Варианты ответов:
<ul>
    {foreach from=$value item = value2}
        <li>{$value2}</li>
    {/foreach}
</ul>
{/foreach}
