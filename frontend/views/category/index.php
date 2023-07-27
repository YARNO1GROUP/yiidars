<?php

/**
 * @var $category \frontend\models\MyModel
 */

use yii\bootstrap5\LinkPager;

?>


<div class="container">

    <h1>This is page Post/index</h1>

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
            <th scope="col">Author_ID</th>
            <th scope="col">Category_ID</th>
            <th scope="col"><?=$sort->link('title');?></th>
            <th scope="col"><?=$sort->link('body');?></th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($category->posts as $post): ?>
            <tr>
                <th scope="row"><?= $post->id;?></th>
                <td><?= $post->author->username;?></td>
                <td><?= $post->category->name;?></td>
                <td><?= $post->title;?></td>
                <td><?= $post->body;?></td>
                <td><?= $post->created_at;?></td>
                <td><?= $post->updated_at;?></td>
                <td>
                    <a href="/post/view/?id=<?= $post['id'] ?>" class="btn btn-success">View</a>
                    <a href="/post/edit/?id=<?= $post['id'] ?>" class="btn btn-primary">Update</a>
                    <a href="/post/delete/?id=<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
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
