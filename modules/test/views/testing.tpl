<form class="well" action="{$smarty.const.URL}testing/result" method="post">
    <fieldset>
        <legend>Тест на тему БД</legend>
            <div class="control-group">
                {foreach from=$arrayAnswers key = key item = value name = questions }
                    {foreach from=$value key=key2 item=value2}
                        <label class="control-label" for="input01">
                            <h5>Вопрос №{$smarty.foreach.questions.iteration}: {$key2}</h5>
                        </label>
                    <div class="controls">
                        {foreach from=$value2 item=value3}
                            <input type="radio" class="input-xlarge" name="group{$key}" value="{$value3}" id="input01"> {$value3} <br>
                        {/foreach}
                    </div>
                    {/foreach}
            </div>
                <hr>
                {if $smarty.foreach.questions.last}
                    {$count = $smarty.foreach.questions.iteration}
                {/if}
                {/foreach}
        <button type="submit" class="btn">Завершить тест</button>
    </fieldset>
</form>


