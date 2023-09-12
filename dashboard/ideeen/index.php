<?php require_once '../../header.php';
require_once '../sidebar.php';
$query = dbQuery('SELECT * FROM ideas');
?>
<div class="container pt-5 px-5">
    <div class="row justify-content-between">
        <div class="col-2">
            <h1 class="text-left text-white">Ideeën</h1>
        </div>
        <div class="col-2">
            <a href="create.php" class="btn btn-primary">Nieuwe idee</a>
        </div>
    </div>
    <table class="text-white">
        <thead>
        <tr>
            <th>Importance</th>
            <th>Information</th>
            <th>Created at</th>
            <!--            <th>Updated at</th>-->
            <!--            <th>Actions</th>-->
        </tr>
        </thead>
        <tbody>
        <?php foreach ($query

                       as $idea) { ?>

            <tr>
                <a href="idee.php?id=<?php echo $idea['id']; ?>">
                    <!--            <td>--><?php //echo $idea['name']; ?><!--</td>-->
                    <?php if ($idea['importancy'] == 0) {
                        echo '<td class="text-red">Hoog</td>';
                    }
                    if ($idea['importancy'] == 1) {
                        echo '<td class="text-yellow">Gemiddeld</td>';
                    }
                    if ($idea['importancy'] == 2) {
                        echo '<td class="text-blue">Laag</td>';
                    } ?>
                    <td><?php echo $idea['information']; ?></td>
                    <!--            <td>--><?php //echo $idea['created_at']; ?><!--</td>-->
                    <!--            <td>--><?php //echo $idea['updated_at']; ?><!--</td>-->
                    <td>
                        <a href="idee.php?id=<?php echo $idea['id']; ?>" class="btn btn-primary">Bekijken</a>
                        <a href="delete.php?id=<?php echo $idea['id']; ?>" class="btn btn-primary">Verwijderen</a>
                    </td>
                </a>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once '../dashboardFooter.php'; ?>
