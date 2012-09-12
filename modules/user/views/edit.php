<form class="form-horizontal" action="<?php echo URL. 'user/editSave/'. $this->user[0]['id']; ?>" method="post">
    <fieldset>
        <legend>Изменения данных пользователя <?php echo $this->user[0]['login']?></legend>
        <input type="text" name="login" placeholder="Введите новый логин"><br />
        <input type="password" name="password" placeholder="Введите новый пароль"><br />
        <select name="role">
            <option value="default" <?php if ($this->user[0]['role'] == 'default') echo 'selected'; ?>>Default</option>
            <option value="admin" <?php if ($this->user[0]['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="owner" <?php if ($this->user[0]['role'] == 'owner') echo 'selected'; ?>>Owner</option>
        </select><br /><br />
        <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
        </div>
    </fieldset>
</form>