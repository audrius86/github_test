<form action="index.php?page=save_update" method="post">
    <table>
        <tr>
            <td>
                Vardas:
            </td>
            <td>
                <input type="text" value="<?php echo $name ?? null ?>" name="name">
            </td>
            <td>
                <?php
                if (isset($errors['name'])) {
                    echo implode(",", $errors['name']);
                } ?>
            </td>
        </tr>
        <tr>
            <td>
                Amžius:
            </td>
            <td>
                <input type="number" value="<?php echo $age ?? null ?>" name="age">
            </td>
            <td>
                <?php
                if (isset($errors['age'])) {
                    echo implode(",", $errors['age']);
                } ?>
            </td>
        </tr>
        <tr>
            <td>
                Slaptažodis*:
            </td>
            <td>
                <input type="text" name="password">
            </td>
            <td>
                <?php
                if (isset($errors['password'])) {
                    echo implode(",", $errors['password']);
                } ?>
            </td>
        </tr>
        <tr>
            <td>
                Pakartoti slaptažodį*:
            </td>
            <td>
                <input type="text" name="repeat_password">
            </td>
            <td>
                <?php
                if (isset($errors['repeat_password'])) {
                    echo implode(",", $errors['repeat_password']);
                } ?>
            </td>
        </tr>
    </table>
    <br/>
    <button type="submit">Išsaugoti</button>
    <h6>* - leave empty fields if you don't want to change password</h6>
</form>