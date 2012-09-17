<h3>Всем привет это главная страница моего теста по РиЭУБД!</h3>
    Хотите создать свой вопрос, тогда вам сюда --><a href="<?php echo URL; ?>test/create">жмак</a>

    <br>
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
    <?php
    foreach ($this->testList as $key => $value) {
        echo '<tr>';
        echo '<td>'.$value['id'].'</td>';
        echo '<td>'.$value['theme'].'</td>';
        echo '<td>'.$value['question'].'</td>';
        echo '<td>'.$value['correct_answer'].'</td>';
    }
    ?>
    </tbody>
</table>
