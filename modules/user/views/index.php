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
        <?php
        foreach ($this->userList as $key => $value) {
            echo '<tr>';
            echo '<td>'.$value['id'].'</td>';
            echo '<td>'.$value['login'].'</td>';
            echo '<td>'.$value['role'].'</td>';
            echo '<td>
                        <a href="' .URL. 'user/edit/'.$value['id'].'">Изменить |</a>
                        <a href="' .URL. 'user/delete/'.$value['id'].'"> Удалить</a></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>