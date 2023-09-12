<?php
require_once '../header.php';
require_once 'sidebar.php';
$tasks = dbQuery('SELECT * FROM taken LIMIT 12');
?>
    <div class="container">
        <div class="px-5 row justify-content-between mt-5">
            <div class="mt-5 col-3 bg-cyan text-white rounded-4 fw-bold fs-4"><i
                        class="fa-regular fa-clipboard"></i>
                <a class="text-white text-decoration-none" href="/dashboard/taken"> Taken</a>
            </div>
            <div class="mt-5 col-3 bg-red text-white rounded-4 fw-bold fs-4"><i class="fa-solid fa-users"></i>
                <a class="text-white text-decoration-none" href="/dashboard/contacten">Klanten</a>
            </div>
            <div class="mt-5 col-3 bg-blue text-white rounded-4 fw-bold fs-4"><i class="fa-solid fa-brain"></i>
                <a class="text-white text-decoration-none" href="/dashboard/ideeen">Ideeën</a>
            </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="container mt-5 px-5 text-white ">
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
                            endforeach; ?>
                        </a>
                    </td>
                    <td>
                        <a href="https://danielpekel.nl/dashboard/taken/task.php?id=<?php echo $task['id']; ?>">
                            <p><?php if ($task['status'] == 0) {
                                    echo 'Afgerond';
                                } elseif ($task['status'] == 1) {
                                    echo 'In behandeling';
                                } elseif ($task['status'] == 2) {
                                    echo 'Open';
                                } elseif ($task['status'] == 3) {
                                    echo 'Wachten op klant';
                                } ?></p>
                        </a>
                    </td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>
        </table>
    </div>

<?php require_once 'dashboardFooter.php'; ?>