<h3>Всем привет это главная страница моего теста по РиЭУБД!</h3>
    Хотите создать свой вопрос, тогда вам сюда --><a href="{$smarty.const.URL}test/create">жмак</a>

    <br>
<h2>{$count}</h2>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Тема</th>
        <th>Вопрос</th>
        <th>Правильный ответ</th >
    </tr>
    </thead>
    <tbody>
    {foreach from=$testList key = key item = value}
        <tr>
            <td>{$value.id}</td>
            <td>{$value.theme}</td>
            <td>{$value.question}</td>
            <td>{$value.correct_answer}</td>
        </tr>
    {/foreach}
    </tbody>
</table>
