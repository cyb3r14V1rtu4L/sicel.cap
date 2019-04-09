<?php
/**
 * Created by PhpStorm.
 * User: cybeiro
 * Date: 5/19/17
 * Time: 11:55 AM
 */
?>
<div id="import_weeks_content">
    <div class="col-lg-4">
    <div class="panel panel-success" style="background-color: white">
        <div class="panel-heading">Import Weeks Automatically</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <label class="control-label">CSV Import File</label>
                    <input id="migration_file" name="migration_file[]" type="file" multiple class="file-loading">
                    <div id="errorBlock" class="help-block"></div>
                </div>
            </div>
            <div class="row">
                <a id="import_db" onclick="importWeeks();" class="btn btn-danger-dark pull-right" style="margin-right: 15px;display: none">
                    Import to DB &nbsp;&nbsp;<i class="fa fa-paper-plane"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
    <div class="col-lg-8">

        <div id="import_results" style="display: none">
            <div class="panel panel-success" style="background-color: white">
                <div class="panel-heading">Import Results</div>
                <div class="panel-body">
                    <div id="import_result"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function()
    {
        setImportFile();
    };
</script>