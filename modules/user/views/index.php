<form class="form-horizontal" action="<?php echo URL; ?>user/create" method="post">
    <fieldset>
        <legend>Создание пользователя</legend>
        <input type="text" name="login" placeholder="Логин"><br />
        <input type="password" name="password" placeholder="Пароль"><br />
        <select name="role">
             <option value="default">Default</option>
             <option value="admin">Admin</option>
        </select><br /><br />
        <button type="submit" class="btn btn-primary">Сохранить</button>
               </div>
        </div>
    </fieldset>
</form>
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