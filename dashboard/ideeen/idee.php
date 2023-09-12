<?php
require_once '../../header.php';
require_once '../sidebar.php';
$id = $_GET['id'];
$idea = dbQuery("SELECT * FROM ideas WHERE id = " . $id);
$residea = dbFetch($idea);
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <input type="submit"
                               class="col-10 mr-0 borderbottom modalbutton <?php if ($residea['importancy'] == 0) { ?>selected<?php } ?>"
                               value="Hoog">
                        <div class="col-2 ml-0 borderbottom <?php if ($residea['importancy'] == 0) { ?>selected<?php } ?>"></div>
                        <input type="submit"
                               class="col-10 borderbottom modalbutton <?php if ($residea['importancy'] == 1) { ?>selected<?php } ?>"
                               value="Gemiddeld">
                        <div class="col-2 ml-0 borderbottom <?php if ($residea['importancy'] == 1) { ?>selected<?php } ?>"></div>
                        <input type="submit"
                               class="col-10 borderbottom modalbutton <?php if ($residea['importancy'] == 2) { ?>selected<?php } ?>"
                               value="Laag">
                        <div class="col-2 ml-0 borderbottom <?php if ($residea['importancy'] == 2) { ?>selected<?php } ?>"></div>
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
<form>
    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="py-4 px-4 col-12 col-md-7 rounded-4 bg-grey">
                <h5 class="fw-bold">Taak</h5>
                <textarea class="mt-3 w-100 rounded-4" rows="10"><?php echo $residea['information']; ?></textarea>
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-1">
                            <input type="submit" value="Opslaan" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-4 px-4 col-12 col-md-4 rounded-4 bg-grey">
                <h5 class="fw-bold">Gegevens</h5>
                <div class="container pt-3">
                    <div class="row fs-4 information">
                        <!-- importancy
                         --><?php if ($residea['importancy'] == 0) { ?>
                            <div class="py-2 col-2 mr-0 noborder" data-bs-toggle="modal"
                                 data-bs-target="#exampleModal"><i class="fa-solid fa-flag text-red"></i></div>
                            <div class="py-2 col-10 ml-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Hoog
                            </div>
                        <?php }
                        if ($residea['importancy'] == 1) { ?>
                            <div class="py-2 col-2 mr-0 noborder" data-bs-toggle="modal"
                                 data-bs-target="#exampleModal"><i class="fa-solid fa-flag text-yellow"></i></div>
                            <div class="py-2 col-10 ml-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Gemiddeld
                            </div>
                        <?php }
                        if ($residea['importancy'] == 2) { ?>
                            <div class="py-2 col-2 mr-0 noborder" data-bs-toggle="modal"
                                 data-bs-target="#exampleModal"><i class="fa-solid fa-flag text-blue"></i>
                            </div>
                            <div class="py-2 col-10 ml-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Laag
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php require_once '../dashboardFooter.php'; ?>
