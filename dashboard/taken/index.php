<?php require_once '../../header.php';
require_once '../sidebar.php';
$tasks = dbQuery("SELECT * FROM taken");
$opentasks = countRows("SELECT * FROM taken WHERE status = 2");
?>
<div class="text-white my-5 container">
    <h1>U heeft <?php if ($opentasks == 0) {
            echo 'geen taken open staan';
        } else {
            echo $opentasks . ' taken open staan';
        } ?></h1>
    <div class="container my-5 px-5">
        <table class="rounded-4 w-100 tableint">
            <tr class="w-100">
                <th>ID</th>
                <th>Taak</th>
                <th>Naam</th>
                <th>Status</th>
            </tr>
            <?php $i = 0;
            foreach ($tasks as $task) : ?>
                <tr class="w-100 <?php if ($i % 2 == 0) { ?> even <?php } ?>">
                    <td class="w-10 text-center">
                        <a href="https://danielpekel.nl/dashboard/taken/task.php?id=<?php echo $task['id']; ?>">
                            <?php echo $task['id']; ?>
                        </a>
                    </td>
                    <td>
                        <a href="https://danielpekel.nl/dashboard/taken/task.php?id=<?php echo $task['id']; ?>">
                            <?php echo $task['information']; ?>
                        </a>
                    </td>
                    <td>
                        <a href="https://danielpekel.nl/dashboard/taken/task.php?id=<?php echo $task['id']; ?>">
                            <?php $custquery = dbQuery('SELECT name FROM customers WHERE id=' . $task['customerOrCompany']);
                            foreach ($custquery as $cust):
                                echo $cust['name'];
                            endforeach; ?>                        </a>
                    </td>
                    <td>
                        <a href="https://danielpekel.nl/dashboard/taken/task.php?id=<?php echo $task['id']; ?>">
                            <p><?php if($task['status'] == 0){echo 'Afgerond';}elseif ($task['status'] == 1){echo 'In behandeling';}elseif ($task['status'] == 2){echo 'Open';}elseif ($task['status'] == 3){echo 'Wachten op klant';} ?></p>
                        </a>
                    </td>
                </tr>
                <?php
                $i++;
            endforeach;
            // TODO: add pagination
            ?>
        </table>
    </div>
</div>


<?php require_once '../dashboardFooter.php'; ?>
