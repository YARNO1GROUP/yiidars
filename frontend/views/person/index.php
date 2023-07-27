<?php

/**
 * @var $users \frontend\models\MyModel
 */

use yii\bootstrap5\LinkPager;

?>


<div class="container">

    <h1>This is page Post/index</h1>
    <a href="/post/create/" class="btn btn-primary">Create Post</a>

    <div class="row my-3">
        <form class="d-flex" method="get">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col"><Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Birthday</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <th scope="row"><?= $user->id;?></th>
                <td><?= $user->firstname;?></td>
                <td><?= $user->lastname;?></td>
                <td><?= $user->birthday;?></td>
                <td><?= $user->phone;?></td>
                <td>
                    <a href="/person/view/?id=<?= $user['id'] ?>" class="btn btn-success">View</a>
                    <a href="/person/edit/?id=<?= $user['id'] ?>" class="btn btn-primary">Update</a>
                    <a href="/person/delete/?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php

    echo LinkPager::widget([
        'pagination' => $pagination,
        'maxButtonCount' => 3
    ])

    ?>

</div>
