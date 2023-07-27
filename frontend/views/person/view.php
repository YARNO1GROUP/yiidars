

<?php



?>

<div class="container">

    <h1>This is page Person/View</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created_at</th>
            <th scope="col">Updated-at</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?= $data['id'] ?></th>
                <td><?= $data['author_id'] ?></td>
                <td><?= $data['category_id'] ?></td>
                <td><?= $data['title'] ?></td>
                <td><?= $data['body'] ?></td>
                <td><?= $data['created_at'] ?></td>
                <td><?= $data['updated_at'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
