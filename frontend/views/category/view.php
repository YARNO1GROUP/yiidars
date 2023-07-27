<?php

/**
 * @var $category \frontend\models\MyModel
 */

?>


<div class="container">

    <h1>This is page Category/view</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Author_ID</th>
                <th scope="col">Category_ID</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
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
                    <td>
                        <a href="/post/view/?id=<?= $post['id'] ?>" class="btn btn-success">View</a>
                        <a href="/post/edit/?id=<?= $post['id'] ?>" class="btn btn-primary">Update</a>
                        <a href="/post/delete/?id=<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
</div>
