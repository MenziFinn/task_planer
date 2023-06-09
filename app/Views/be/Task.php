<!DOCTYPE html>
<html lang="de">
<head>
    <title>Aufgaben</title>
    <?php include('inc/header-inc.php'); ?>
</head>
<body>
<div class="container-scroller">
    <?php include('inc/menu.php'); ?>
    <div class="container-fluid page-body-wrapper">
        <?php include('inc/nav-top.php') ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <?php if (session("message")): ?>
                        <div class="col-12 grid-margin">
                            <div class="card flash-message">
                                <div class="card-body">
                                    <h4 class="<?= session("status") ?> m-0"><?= session("message") ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="page-title">Aufgaben Erstellen</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= site_url('Save/Task'); ?>" method="post"
                                      class="form-sample">
                                    <input type="hidden" value="-1" name="id">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Titel</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                           value="" name="title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Beschreibung</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text"
                                                           value="" name="description">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Start Datum</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="datetime-local"
                                                           value=""
                                                           name="start">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">End Datum</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control" name="end"
                                                           value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Priorität</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="priority">
                                                        <option value="1">Niedrig</option>
                                                        <option value="2">Mittel</option>
                                                        <option value="3">Hoch</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>



                                    <?php if($admin === true): ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Benutzer</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="user_id">
                                                            <?php foreach ($users as $user): ?>
                                                                <option value="<?= $user->id; ?>"><?= $user->username; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="status">
                                                            <option value="1">Genehmigt</option>
                                                            <option value="2">offen</option>
                                                            <option value="3">Abgelehnt</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>






                                    <div class="row flex-row-reverse mb-4">
                                        <div class="col-md-6">
                                            <div class="row flex-row-reverse">
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-success btn-icon-text"
                                                            style="width: 100%">
                                                        <i class="mdi mdi-content-save"></i> Speichern
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="border-top">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Titel</th>
                                                    <th>Beschreibung</th>
                                                    <th>Start</th>
                                                    <th>End</th>
                                                    <th>Priorität</th>
                                                    <th>Status</th>
                                                    <th>Bearbeiten</th>
                                                    <th>Löschen</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php foreach ($tasks as $task): ?>
                                                    <tr class="entry-<?= $task->id; ?>">
                                                        <td><?= $task->id; ?></td>
                                                        <td><?= $task->title; ?></td>
                                                        <td><?= $task->description; ?></td>
                                                        <td><?= $task->start; ?></td>
                                                        <td><?= $task->end; ?></td>
                                                        <td><?= $task->priority; ?></td>
                                                        <td><?= $task->status; ?></td>
                                                        <td>
                                                            <button onclick="ajaxEdit(<?= $task->id; ?>)" class="btn">
                                                                Bearbeiten
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button onclick="ajaxDelete(<?= $task->id; ?>)" class="btn">
                                                                Löschen
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    function ajaxEdit(id) {
        $.ajax({
            url: '<?= site_url('Task/Edit/') ?>' + id,
            method: 'post',
            dataType: 'json',
            success: function (response) {
                if(response.error){
                    alert(response.error);
                }else{
                    $('form input[name="id"]').val(response.id);

                    $('form input[name="title"]').val(response.title);
                    $('form input[name="description"]').val(response.description);

                    $('form select[name="priority"]').val(response.priority);
                    $('form select[name="status"]').val(response.status);
                    $('form select[name="user_id"]').val(response.user_id);

                    $('form input[name="end"]').val(response.end.replace(" ", "T"));
                    $('form input[name="start"]').val(response.start.replace(" ", "T"));

                    setTimeout(function() {
                        location.reload();
                    }, 180000);
                }

            }, error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error: ' + errorMessage);
            }
        });
    }

    function ajaxDelete(id) {
        $.ajax({
            url: '<?= site_url('Task/Delete/') ?>' + id,
            method: 'post',
            dataType: 'json',
            success: function (response) {
                $('.entry-' + id).hide();
            }, error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error: ' + errorMessage);
            }
        });
    }
</script>
</body>
</html>

