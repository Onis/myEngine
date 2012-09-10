<form class="form-inline" action="<?php echo URL; ?>news/create" method="POST">
    <input type="text" name="text">
    <input type="submit" class="btn">
</form>

<br />

<table>
    <?php
    foreach ($this->newsList as $key => $value) {
        echo '<tr>';
        echo '<td>'.$value['id'].'</td>';
        echo '<td>'.$value['text'].'</td>';

        echo '<td>
                    <a href="' .URL. 'news/delete/'.$value['id'].'">Delete</a></td>';
        echo '</tr>';
    }
    ?>
</table>
