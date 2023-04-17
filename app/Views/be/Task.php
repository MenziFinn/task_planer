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

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="status">
                                                        <option value="yes">Genehmigt</option>
                                                        <option value="open">offen</option>
                                                        <option value="no">Abgelehnt</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                        <div class="row">
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
                                                    <tr>
                                                        <td><?= $task->id; ?></td>
                                                        <td><?= $task->title; ?></td>
                                                        <td><?= $task->description; ?></td>
                                                        <td><?= $task->start; ?></td>
                                                        <td><?= $task->end; ?></td>
                                                        <td><?= $task->priority; ?></td>
                                                        <td><?= $task->status; ?></td>
                                                        <td><button onclick="ajaxEdit(<?= $task->id; ?>)" class="btn">Bearbeiten</button></td>
                                                        <td><button onclick="ajaxDelete(<?= $task->id; ?>)" class="btn">Löschen</button></td>
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
    function ajaxEdit(id){
        $.ajax({
            url: '<?= site_url('Task/Edit/') ?>' + id,
            method: 'post',

            dataType: 'json',
            success: function (response) {
                console.log(response);
                $('form input[name="title"]').val(response.title);
                $('form input[name="description"]').val(response.description);

                //hier selector vorauswählen val is falsche function giebt glaub sel function von jquery
                $('form select[name="priority"]').val(response.priority);
                $('form select[name="status"]').val(response.status);

                var end = new Date(response.end);
            var endFormatted = end.toLocaleDateString('de-DE'); //EU datumformat
            $('form input[name="end"]').val(endFormatted);

            var start = new Date(response.start);
            var startFormatted = start.toLocaleDateString('de-DE'); //EU datumformat
            console.log(startFormatted)
            $('form input[name="start"]').val(startFormatted);
            }, error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error: ' + errorMessage);
            }
        });
    }

    function ajaxDelete(id){
        $.ajax({
            url: '<?= site_url('Task/Delete/') ?>' + id,
            method: 'post',
            dataType: 'json',
            success: function (response) {
                console.log(response);

            }, error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error: ' + errorMessage);
            }
        });
    }
</script>
</body>
</html>

