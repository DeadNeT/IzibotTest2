<?php
/**
 * Created by PhpStorm.
 * User: Разработка
 * Date: 17.01.2019
 * Time: 14:51
 */

include './classes/Auth.class.php';
include './classes/AjaxRequest.class.php';
print_r($_POST);

$comments = getInfo(1, "username");

function getInfo ($page = 1, $order = "username") {
    $offset = 0;
    if ($page != 1) {
        $offset = 25 * ( $page - 1 ) + 1;
    }
    $user = new Auth\User();

    try {
        $comments = $user->getInfoFromDB($offset, $order);
    }
    catch( \Exception $e ) {
        return;
    }
    return $comments;
}


?>



<body>
<form method="post" action="getcomment.php">
    <select>
        <option value="username">username</option>
        <option value="email">email</option>
        <option value="datetime">datetime</option>
    </select>
    <button class="btn btn-large btn-primary" type="submit">Send</button>
</form>

<table border="1px">
    <tr>
        <td>username</td>
        <td>email</td>
        <td>homepage</td>
        <td>text</td>
        <td>ip</td>
        <td>browser</td>
        <td>datetime</td>
    </tr>
    <?php foreach($comments as $item => $key) { ?>
        <tr>
            <td><?php print_r( $key[ "username" ] ) ?></td>
            <td><?php print_r( $key[ "email" ] ) ?></td>
            <td><?php print_r( $key[ "homepage" ] ) ?></td>
            <td><?php print_r( $key[ "text" ] ) ?></td>
            <td><?php print_r( $key[ "ip" ] ) ?></td>
            <td><?php print_r( $key[ "browser" ] ) ?></td>
            <td><?php print_r( $key[ "datetime" ] ) ?></td>
        </tr>
    <?php } ?>
</table>
</body>
