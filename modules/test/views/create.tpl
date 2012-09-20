<form class="form-horizontal" action="{$smarty.const.URL}test/createQuestion" method="post">
    <fieldset>
        <legend>Создание вопроса</legend>
        <input type="text" name="theme" placeholder="Тема вопроса"><br />
        <textarea rows="4" name="question" placeholder="Вопрос"></textarea><br />
        <input type="text" name="correct_answer" placeholder="Правильный ответ"><br />
        <textarea rows="4" name="incorrect_answers" placeholder="Неправильные ответы"></textarea><br />
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </fieldset>
</form>