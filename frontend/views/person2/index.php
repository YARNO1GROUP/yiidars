<?php

/**
 * @var $data \frontend\models\MyModel
 */

?>


<div class="container">

    <h1>This is page Person2/index</h1>
    <a href="/post/create/" class="btn btn-primary">Create Person2</a>

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
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $post): ?>
            <tr>
                <th scope="row"><?= $post['id'] ?></th>
                <td><?= $post->author->username; ?></td>
                <td><?= $post->category_id; ?></td>
                <td><?= $post->title; ?></td>
                <td><?= $post->body; ?></td>
                <td><?= $post->created_at; ?></td>
                <td><?= $post->updated_at; ?></td>
                <td>
                    <a href="/post/view/?id=<?= $post['id'] ?>" class="btn btn-success">View</a>
                    <a href="/post/edit/?id=<?= $post['id'] ?>" class="btn btn-primary">Update</a>
                    <a href="/post/delete/?id=<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <!--         <nav>-->
    <!--             <ul class="pagination">-->
    <!--              <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
    <!--                 --><?php //for ($page = 1; $page <= $pageCount; $page++): ?>
    <!--                     <li class="page-item"><a class="page-link" href="/post/index?page=--><?//= $page  ?><!--">--><?//= $page  ?><!--</a></li>-->
    <!--                  --><?php //endfor; ?>
    <!--               <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
    <!--            </ul>-->
    <!--        </nav>-->
</div>
