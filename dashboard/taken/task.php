<?php
require_once '../../header.php';
require_once '../sidebar.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = dbQuery('SELECT * FROM taken WHERE id = ' . $id);
    $res = dbFetch($query);
    $userQuery = dbQuery('SELECT * FROM customers where id = ' . $res['customerOrCompany']);
    $userres = dbFetch($userQuery);
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        if ($status == 'Afgerond') {
            $status = 0;
        } elseif ($status == 'In behandeling') {
            $status = 1;
        } elseif ($status == 'Open') {
            $status = 2;
        } elseif ($status == 'Wachten op klant') {
            $status = 3;
        }
        dbQuery('UPDATE taken SET status = ' . $status . ' WHERE id = ' . $id);
        header('Location: task.php?id=' . $id);
    }
    // TODO fix this query
    if (isset($_POST['information'])) {
        $taskinfo = $_POST['info'];
        dbQuery('UPDATE taken SET information = ' . $taskinfo . ' WHERE id = ' . $id);
        header('Location: task.php?id=' . $id);
    }
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="row">
                            <input type="submit" name="status"
                                   class="col-10 mr-0 borderbottom modalbutton <?php if ($res['status'] == 0) { ?>selected<?php } ?>"
                                   value="Afgerond">
                            <div class="col-2 ml-0 borderbottom <?php if ($res['status'] == 0) { ?>selected<?php } ?>"></div>
                            <input type="submit" name="status"
                                   class="col-10 borderbottom modalbutton <?php if ($res['status'] == 1) { ?>selected<?php } ?>"
                                   value="In behandeling">
                            <div class="col-2 ml-0 borderbottom <?php if ($res['status'] == 1) { ?>selected<?php } ?>"></div>
                            <input type="submit" name="status"
                                   class="col-10 borderbottom modalbutton <?php if ($res['status'] == 2) { ?>selected<?php } ?>"
                                   value="Open">
                            <div class="col-2 ml-0 borderbottom <?php if ($res['status'] == 2) { ?>selected<?php } ?>"></div>
                            <input type="submit" name="status"
                                   class="col-10 borderbottom modalbutton <?php if ($res['status'] == 3) { ?>selected<?php } ?>"
                                   value="Wachten op klant">
                            <div class="col-2 ml-0 borderbottom <?php if ($res['status'] == 3) { ?>selected<?php } ?>"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5 pt-3">
        <button class="goBack" onclick="history.back()">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
    </div>
    <form method="post">
        <div class="container mt-5">
            <div class="row justify-content-between">
                <div class="py-4 px-4 col-12 col-md-7 rounded-4 bg-grey">
                    <h5 class="fw-bold">Taak</h5>
                    <textarea style="border:none;" class="px-3 py-3 mt-3 w-100 rounded-4"
                              rows="10" name="info"><?php echo $res['information']; ?></textarea>
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-2 mt-3">
                                <input name="information" type="submit" value="Opslaan" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-4 px-4 col-12 col-md-4 rounded-4 bg-grey">
                    <h5 class="fw-bold">Gegevens</h5>
                    <div class="container pt-3">
                        <div class="row fs-4 information">
                            <!-- name -->
                            <div class="py-2 col-2 mr-0"><i class="text-orange fa-solid fa-user"></i></div>
                            <div class="py-2 col-10 ml-0"><?php echo $userres['name']; ?></div>
                            <!-- phone -->
                            <div class="py-2 col-2 mr-0"><i class="text-pink fa-solid fa-phone"></i></div>
                            <div class="py-2 col-10 ml-0"><?php echo $userres['phoneNumber']; ?></div>
                            <!-- email -->
                            <div class="py-2 col-2 mr-0"><i class="text-blue fa-solid fa-envelope"></i></div>
                            <div class="py-2 col-10 ml-0"><a
                                        href="mailto:<?php echo $userres['email']; ?>"><?php echo $userres['email']; ?></a>
                            </div>
                            <!-- status --><?php if ($res['status'] == 0) { ?>
                                <div class="py-2 col-2 mr-0 noborder" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal"><i class="text-green fa-solid fa-check"></i></div>
                                <div class="py-2 col-10 ml-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Afgerond
                                </div>
                            <?php }
                            if ($res['status'] == 1) { ?>
                                <div class="py-2 col-2 mr-0 noborder" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal"><i
                                            class="text-light_pink fa-solid fa-circle-pause"></i></div>
                                <div class="py-2 col-10 ml-0" data-bs-toggle="modal" data-bs-target="#exampleModal">In
                                    behandeling
                                </div>
                            <?php }
                            if ($res['status'] == 2) { ?>
                                <div class="py-2 col-2 mr-0 noborder" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal"><i class="text-orange fa-solid fa-clock"></i>
                                </div>
                                <div class="py-2 col-10 ml-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Open
                                </div>
                            <?php }
                            if ($res['status'] == 3) { ?>
                                <div class="py-2 col-2 mr-0 noborder" data-bs-toggle="modal"
                                     data-bs-target="#exampleModal"><i class="text-red fa-solid fa-mug-hot"></i></div>
                                <div class="py-2 col-10 ml-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Wachten op klant
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }
require_once '../dashboardFooter.php';
