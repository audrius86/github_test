<form autocomplete="off" action="index.php?page=save_user" method="post">
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
                Lytis:
            </td>
            <td>
                <select name="sex">
                    <option value="">-</option>
                    <option value="male"
                        <?php if ($sex ?? null == 'male') {
                            echo 'selected';
                        } ?>
                    >Male
                    </option>
                    <option value="female"
                        <?php if ($sex ?? null == 'female') {
                            echo 'selected';
                        } ?>
                    >Female
                    </option>
                </select>
            </td>
            <td>
                <?php
                if (isset($errors['sex'])) {
                    echo implode(",", $errors['sex']);
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
                Paštas:
            </td>
            <td>
                <input type="text" value="<?php echo $email ?? null ?>" name="email">
            </td>
            <td>
                <?php
                if (isset($errors['email'])) {
                    echo implode(",", $errors['email']);
                } ?>
            </td>
        </tr>
        <tr>
            <td>
                Slaptažodis:
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
                Pakartoti slaptažodį:
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
        <tr>
            <td>
                Saugos kodas: <?php echo $_SESSION['code'] ?>
            </td>
            <td>
                <input type="text" name="code">
            </td>
            <td>
                <?php
                if (isset($errors['code'])) {
                    echo implode(",", $errors['code']);
                } ?>
            </td>
        </tr>
    </table>
    <br/>
    <button type="submit">Išsaugoti</button>
</form>