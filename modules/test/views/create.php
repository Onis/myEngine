<form class="form-horizontal" action="<?php echo URL; ?>test/createQuestion" method="post">
    <fieldset>
        <legend>Создание вопроса</legend>
        <input type="text" name="theme" placeholder="Тема вопроса"><br />
        <input type="text" name="question" placeholder="Вопрос"><br />
        <input type="text" name="correct_answer" placeholder="Правильный ответ"><br />
        <input type="text" name="incorrect_answers" placeholder="Неправильные ответы"><br />
        <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
        </div>
    </fieldset>
</form>